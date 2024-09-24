<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactInfoResource\Pages;
use App\Filament\Resources\ContactInfoResource\RelationManagers;
use App\Models\ContactInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactInfoResource extends Resource
{
    protected static ?string $model = ContactInfo::class;

    protected static ?string $navigationIcon = 'heroicon-s-phone-arrow-up-right';

    protected static ?string $navigationLabel = 'Contact Info';

  


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('address')->required(),
Forms\Components\TextInput::make('number')->required()->numeric()->placeholder('+92 300-0000000'),
Forms\Components\TextInput::make('number2')->numeric()->placeholder('+92 300-0000000')->label('2nd No: (optional)'),
Forms\Components\TextInput::make('email')->required()->placeholder('example@gmail.com')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address'),
Tables\Columns\TextColumn::make('number'),
Tables\Columns\TextColumn::make('email')
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
            'index' => Pages\ListContactInfos::route('/'),
            'view' => Pages\ViewContactInfo::route('/{record}'),
            'edit' => Pages\EditContactInfo::route('/{record}/edit'),
        ];
    }
}
