<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopProjectResource\Pages;
use App\Filament\Resources\TopProjectResource\RelationManagers;
use App\Models\TopProject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\ProjectsName;

class TopProjectResource extends Resource
{
    protected static ?string $model = TopProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-thumb-up';

    protected static ?string $navigationGroup = 'Projects';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('projects_name_id')
                ->label('Project Name')
                ->options(ProjectsName::all()->pluck('project_name', 'id'))
                ->required()
                ->searchable(),
Forms\Components\FileUpload::make('image')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('projects_name.project_name')
                ->label('Project Name')
                ->sortable()
                ->searchable(),
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
            'index' => Pages\ListTopProjects::route('/'),
            'create' => Pages\CreateTopProject::route('/create'),
            'view' => Pages\ViewTopProject::route('/{record}'),
            'edit' => Pages\EditTopProject::route('/{record}/edit'),
        ];
    }
}
