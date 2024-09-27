<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnualReportResource\Pages;
use App\Filament\Resources\AnnualReportResource\RelationManagers;
use App\Models\AnnualReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnnualReportResource extends Resource
{
    protected static ?string $model = AnnualReport::class;

    protected static ?string $navigationIcon = 'heroicon-m-square-3-stack-3d';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
Forms\Components\TextInput::make('year')->required()->numeric(),
Forms\Components\Repeater::make('categories')
                ->schema([
                    Forms\Components\TextInput::make('category')
                        ->required(),
                ])
                ->minItems(1)
                ->createItemButtonLabel('Add Category') // Button label to add more categories
                ->columns(1),
Forms\Components\FileUpload::make('file')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
Tables\Columns\TextColumn::make('year')->sortable()->searchable(),
Tables\Columns\TextColumn::make('category')->sortable()->searchable(),
Tables\Columns\TextColumn::make('file')->sortable()->searchable()
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
            'index' => Pages\ListAnnualReports::route('/'),
            'create' => Pages\CreateAnnualReport::route('/create'),
            'view' => Pages\ViewAnnualReport::route('/{record}'),
            'edit' => Pages\EditAnnualReport::route('/{record}/edit'),
        ];
    }
}
