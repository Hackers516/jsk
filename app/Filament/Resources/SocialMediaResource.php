<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaResource\Pages;
use App\Filament\Resources\SocialMediaResource\RelationManagers;
use App\Models\SocialMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialMediaResource extends Resource
{
    protected static ?string $model = SocialMedia::class;

    protected static ?string $navigationIcon = 'heroicon-s-link';

    protected static ?string $navigationLabel = 'Social Links';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('twitter'),
Forms\Components\TextInput::make('facebook')->required(),
Forms\Components\TextInput::make('youtube'),
Forms\Components\TextInput::make('instagram')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('twitter')->sortable()->searchable(),
Tables\Columns\TextColumn::make('facebook')->sortable()->searchable(),
Tables\Columns\TextColumn::make('youtube')->sortable()->searchable(),
Tables\Columns\TextColumn::make('instagram')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
               
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
            'index' => Pages\ListSocialMedia::route('/'),
            'view' => Pages\ViewSocialMedia::route('/{record}'),
            'edit' => Pages\EditSocialMedia::route('/{record}/edit'),
        ];
    }
}
