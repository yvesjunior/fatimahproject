<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use App\Services\ImageKitService;
use BackedEnum;
use UnitEnum;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Our Gallery';


    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->helperText('Uploaded to ImageKit CDN.')
                    // Upload straight to ImageKit; store the CDN URL in `image`
                    // and the ImageKit fileId in the hidden `image_file_id`.
                    ->saveUploadedFileUsing(function (TemporaryUploadedFile $file, Set $set): ?string {
                        $result = app(ImageKitService::class)->upload(
                            $file->get(),
                            $file->getClientOriginalName(),
                        );
                        $set('image_file_id', $result['fileId']);

                        return $result['url'];
                    })
                    // Render the existing image for preview (ImageKit URL, legacy
                    // static asset, or local storage).
                    ->getUploadedFileUsing(function (string $file): ?array {
                        if (str_starts_with($file, 'http://') || str_starts_with($file, 'https://')) {
                            return ['name' => basename(parse_url($file, PHP_URL_PATH) ?: $file), 'url' => $file];
                        }
                        if (str_starts_with($file, 'portfolio/') && ! Storage::disk('public')->exists($file)) {
                            return ['name' => basename($file), 'url' => asset('assets/img/' . $file)];
                        }

                        return ['name' => basename($file), 'url' => Storage::disk('public')->url($file)];
                    })
                    // Remove the file from ImageKit when cleared in the form.
                    ->deleteUploadedFileUsing(function (?string $file, Get $get): void {
                        app(ImageKitService::class)->delete($get('image_file_id'));
                    }),

                Forms\Components\Hidden::make('image_file_id'),

                Forms\Components\Textarea::make('description')
                    ->rows(3)
                    ->maxLength(1000),

                Forms\Components\Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),

                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->height(120)
                    ->width(160)
                    ->getStateUsing(fn (Portfolio $record): string => $record->image_url),

                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('sort_order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
