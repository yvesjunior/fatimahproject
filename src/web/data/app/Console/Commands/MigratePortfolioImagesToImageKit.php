<?php

namespace App\Console\Commands;

use App\Models\Portfolio;
use App\Services\ImageKitService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Throwable;

class MigratePortfolioImagesToImageKit extends Command
{
    protected $signature = 'portfolio:migrate-images
        {--dry-run : List what would be uploaded without changing anything}';

    protected $description = 'Upload locally-hosted gallery images to ImageKit and update their DB records';

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');

        // Resolve lazily so --dry-run works without ImageKit credentials.
        $imageKit = $dryRun ? null : app(ImageKitService::class);

        $portfolios = Portfolio::query()
            ->where(function ($q) {
                $q->whereNull('image')
                    ->orWhere(function ($q) {
                        $q->where('image', 'not like', 'http://%')
                            ->where('image', 'not like', 'https://%');
                    });
            })
            ->get()
            ->filter(fn (Portfolio $p) => filled($p->image));

        if ($portfolios->isEmpty()) {
            $this->info('Nothing to migrate — all gallery images are already on ImageKit.');

            return self::SUCCESS;
        }

        $this->info("Found {$portfolios->count()} image(s) to migrate.".($dryRun ? ' (dry run)' : ''));

        $migrated = 0;
        $skipped = 0;

        foreach ($portfolios as $portfolio) {
            $source = $this->resolveLocalPath($portfolio->image);

            if (! $source) {
                $this->warn("  SKIP #{$portfolio->id}: local file not found for '{$portfolio->image}'");
                $skipped++;

                continue;
            }

            if ($dryRun) {
                $this->line("  would upload #{$portfolio->id}: {$source}");
                $migrated++;

                continue;
            }

            try {
                $result = $imageKit->uploadPath($source, basename($portfolio->image));
                $portfolio->forceFill([
                    'image' => $result['url'],
                    'image_file_id' => $result['fileId'],
                ])->save();
                $this->line("  OK #{$portfolio->id} -> {$result['url']}");
                $migrated++;
            } catch (Throwable $e) {
                $this->error("  FAIL #{$portfolio->id}: {$e->getMessage()}");
                $skipped++;
            }
        }

        $this->newLine();
        $this->info("Done. Migrated: {$migrated}, skipped: {$skipped}.");

        return $skipped > 0 ? self::FAILURE : self::SUCCESS;
    }

    /**
     * Resolve a DB image value to an on-disk path, checking the legacy static
     * asset location first, then the public storage disk.
     */
    protected function resolveLocalPath(string $image): ?string
    {
        $legacy = public_path('assets/img/'.$image);
        if (is_file($legacy)) {
            return $legacy;
        }

        if (Storage::disk('public')->exists($image)) {
            return Storage::disk('public')->path($image);
        }

        return null;
    }
}
