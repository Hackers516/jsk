<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardOfMemberResource\Pages;
use App\Filament\Resources\BoardOfMemberResource\RelationManagers;
use App\Models\BoardOfMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BoardOfMemberResource extends Resource
{
    protected static ?string $model = BoardOfMember::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-plus';

    protected static ?string $navigationGroup = 'Home Page';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
Forms\Components\TextInput::make('designation')->required(),
Forms\Components\FileUpload::make('image')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
Tables\Columns\TextColumn::make('designation')->sortable()->searchable(),
Tables\Columns\ImageColumn::make('image')->sortable()->searchable()
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
            'index' => Pages\ListBoardOfMembers::route('/'),
            'create' => Pages\CreateBoardOfMember::route('/create'),
            'view' => Pages\ViewBoardOfMember::route('/{record}'),
            'edit' => Pages\EditBoardOfMember::route('/{record}/edit'),
        ];
    }
}
