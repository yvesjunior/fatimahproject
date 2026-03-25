<?php

namespace App\Filament\Resources\AboutPageResource\Pages;

use App\Filament\Resources\AboutPageResource;
use App\Models\AboutPage;
use Filament\Resources\Pages\EditRecord;

class EditAboutPage extends EditRecord
{
    protected static string $resource = AboutPageResource::class;

    public function mount(int|string $record = null): void
    {
        $record = AboutPage::content();
        parent::mount($record->id);
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
