<?php

namespace App\Filament\Resources\ContactPageResource\Pages;

use App\Filament\Resources\ContactPageResource;
use App\Models\ContactPage;
use Filament\Resources\Pages\EditRecord;

class EditContactPage extends EditRecord
{
    protected static string $resource = ContactPageResource::class;

    public function mount(int|string $record = null): void
    {
        $record = ContactPage::content();
        parent::mount($record->id);
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
