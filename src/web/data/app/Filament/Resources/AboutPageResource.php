<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Models\AboutPage;
use BackedEnum;
use UnitEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'About Us';

    protected static ?int $navigationSort = 3;

    protected static ?string $slug = 'about-page';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Why Choose Us')
                    ->description('The hero section with mission and vision tabs')
                    ->icon('heroicon-o-star')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('why_subtitle')
                                    ->label('Subtitle')
                                    ->placeholder('e.g. Why Choose Us')
                                    ->maxLength(100),

                                Forms\Components\TextInput::make('why_heading')
                                    ->label('Heading')
                                    ->placeholder('e.g. Trusted non profit donation center')
                                    ->maxLength(255),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Forms\Components\Textarea::make('mission_text')
                                    ->label('Our Mission')
                                    ->rows(5)
                                    ->required(),

                                Forms\Components\Textarea::make('vision_text')
                                    ->label('Our Vision')
                                    ->rows(5)
                                    ->required(),
                            ]),

                        Forms\Components\TextInput::make('video_url')
                            ->label('Video URL (YouTube embed)')
                            ->placeholder('https://www.youtube.com/embed/...')
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Our Programs')
                    ->description('Accordion items displayed on the about page')
                    ->icon('heroicon-o-academic-cap')
                    ->schema([
                        Forms\Components\Repeater::make('programs')
                            ->label('')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Program Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(1),

                                Forms\Components\Textarea::make('body')
                                    ->label('Description')
                                    ->required()
                                    ->rows(3)
                                    ->columnSpan(2),
                            ])
                            ->columns(3)
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'New Program')
                            ->defaultItems(3)
                            ->reorderable()
                            ->collapsible()
                            ->cloneable()
                            ->addActionLabel('Add Program'),
                    ])
                    ->collapsible(),

                Section::make('Get Involved')
                    ->description('Call-to-action section with stats')
                    ->icon('heroicon-o-hand-raised')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('involved_subtitle')
                                    ->label('Subtitle')
                                    ->placeholder('e.g. Get Involved')
                                    ->maxLength(100),

                                Forms\Components\TextInput::make('involved_heading')
                                    ->label('Heading')
                                    ->placeholder('e.g. Support Our Cause')
                                    ->maxLength(255),
                            ]),

                        Forms\Components\Textarea::make('involved_description')
                            ->label('Description')
                            ->rows(3)
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('raised_amount')
                                    ->label('Amount Raised ($)')
                                    ->numeric()
                                    ->prefix('$')
                                    ->required(),

                                Forms\Components\TextInput::make('raised_label')
                                    ->label('Raised Description')
                                    ->placeholder('e.g. Raised by 350 people in one year')
                                    ->maxLength(255),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('volunteer_count')
                                    ->label('Volunteer Count')
                                    ->numeric()
                                    ->required(),

                                Forms\Components\TextInput::make('volunteer_label')
                                    ->label('Volunteer Description')
                                    ->placeholder('e.g. Volunteers are available to help you')
                                    ->maxLength(255),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\EditAboutPage::route('/'),
        ];
    }
}
