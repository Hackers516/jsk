<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolunteerResource\Pages;
use App\Filament\Resources\VolunteerResource\RelationManagers;
use App\Models\Volunteer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VolunteerResource extends Resource
{
    protected static ?string $model = Volunteer::class;

    protected static ?string $navigationIcon = 'heroicon-c-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('full_name')->required(),
Forms\Components\TextInput::make('email')->required(),
Forms\Components\TextInput::make('phone')->required(),
Forms\Components\TextInput::make('date')->required(),
Forms\Components\TextInput::make('gender')->required(),
Forms\Components\TextInput::make('subject')->required(),
Forms\Components\TextInput::make('message')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')->sortable()->searchable(),
Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
Tables\Columns\TextColumn::make('phone')->sortable()->searchable(),
Tables\Columns\TextColumn::make('date')->sortable()->searchable(),
Tables\Columns\TextColumn::make('gender')->sortable()->searchable(),
Tables\Columns\TextColumn::make('subject')->sortable()->searchable(),
Tables\Columns\TextColumn::make('message')->sortable()->searchable()
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
            'index' => Pages\ListVolunteers::route('/'),
            'create' => Pages\CreateVolunteer::route('/create'),
            'view' => Pages\ViewVolunteer::route('/{record}'),
            'edit' => Pages\EditVolunteer::route('/{record}/edit'),
        ];
    }
}
