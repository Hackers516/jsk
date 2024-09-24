<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectsNameResource\Pages;
use App\Filament\Resources\ProjectsNameResource\RelationManagers;
use App\Models\ProjectsName;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class ProjectsNameResource extends Resource
{
    protected static ?string $model = ProjectsName::class;

    protected static ?string $navigationIcon = 'heroicon-o-plus';
    protected static ?string $navigationLabel = 'Add Project';
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

   
 
protected static ?string $navigationGroup = 'Projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('project_name')
                ->live(onBlur: true)
                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                    if (($get('slug') ?? '') !== Str::slug($old)) {
                        return;
                    }
                
                    $set('slug', Str::slug($state));
                }), 

             TextInput::make('slug')->required()->readOnly()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project_name')->sortable()->searchable(),
Tables\Columns\TextColumn::make('slug')->sortable()->searchable()
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
            'index' => Pages\ListProjectsNames::route('/'),
            'create' => Pages\CreateProjectsName::route('/create'),
            'view' => Pages\ViewProjectsName::route('/{record}'),
            'edit' => Pages\EditProjectsName::route('/{record}/edit'),
        ];
    }
}
