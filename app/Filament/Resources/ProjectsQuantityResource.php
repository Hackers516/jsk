<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectsQuantityResource\Pages;
use App\Filament\Resources\ProjectsQuantityResource\RelationManagers;
use App\Models\ProjectsQuantity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\ProjectsName;

class ProjectsQuantityResource extends Resource
{
    protected static ?string $model = ProjectsQuantity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
Forms\Components\FileUpload::make('image')->required(),
Forms\Components\TextInput::make('quantity')->required()->numeric()
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
Tables\Columns\ImageColumn::make('image')->sortable()->searchable()->extraAttributes(['style' => 'background-color: #c4beab;']),
Tables\Columns\TextColumn::make('quantity')->sortable()->searchable()->badge()
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
            'index' => Pages\ListProjectsQuantities::route('/'),
            'create' => Pages\CreateProjectsQuantity::route('/create'),
            'view' => Pages\ViewProjectsQuantity::route('/{record}'),
            'edit' => Pages\EditProjectsQuantity::route('/{record}/edit'),
        ];
    }
}
