<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\GalleryCategory;
use Filament\Forms\Components\Select;;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-s-banknotes';
    protected static ?string $navigationGroup = 'Gallery';

    protected static ?string $navigationLabel = 'Upload Pics';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('name_id')
                ->label('Category Name')
                ->options(GalleryCategory::all()->pluck('name', 'id'))
                ->required()
                ->searchable(),
Forms\Components\FileUpload::make('image')->required()->multiple()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_id')->sortable()->searchable(),
Tables\Columns\TextColumn::make('image')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'view' => Pages\ViewGallery::route('/{record}'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
