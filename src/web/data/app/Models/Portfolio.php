<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'image_file_id',
        'category',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Resolve the public URL for the gallery image.
     * - ImageKit (or any absolute) URL -> used as-is
     * - legacy static asset (portfolio/N.jpg not in storage) -> assets/img/...
     * - otherwise -> local public storage
     */
    public function getImageUrlAttribute(): string
    {
        $image = (string) $this->image;

        if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
            return $image;
        }

        if (str_starts_with($image, 'portfolio/') && ! Storage::disk('public')->exists($image)) {
            return asset('assets/img/' . $image);
        }

        return asset('storage/' . $image);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
