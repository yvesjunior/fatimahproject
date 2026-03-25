<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactPageResource\Pages;
use App\Models\ContactPage;
use BackedEnum;
use UnitEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactPageResource extends Resource
{
    protected static ?string $model = ContactPage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'Contact Us';


    protected static ?int $navigationSort = 2;

    protected static ?string $slug = 'contact-page';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->label('Phone Number')
                            ->maxLength(50),

                        Forms\Components\TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('address')
                            ->label('Office Address')
                            ->rows(2)
                            ->maxLength(500),

                        Forms\Components\TextInput::make('map_embed_url')
                            ->label('Google Maps Embed URL')
                            ->maxLength(1000),
                    ]),

                Section::make('Page Stats')
                    ->schema([
                        Forms\Components\TextInput::make('years_experience')
                            ->label('Years of Experience')
                            ->numeric()
                            ->required(),

                        Forms\Components\TextInput::make('volunteer_count')
                            ->label('Number of Volunteers')
                            ->numeric()
                            ->required(),

                        Forms\Components\TextInput::make('projects_completed')
                            ->label('Projects Completed')
                            ->numeric()
                            ->required(),
                    ])->columns(3),

                Section::make('Form Section')
                    ->schema([
                        Forms\Components\TextInput::make('form_subtitle')
                            ->label('Form Subtitle')
                            ->maxLength(100),

                        Forms\Components\TextInput::make('form_title')
                            ->label('Form Title')
                            ->maxLength(100),
                    ])->columns(2),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\EditContactPage::route('/'),
        ];
    }
}
