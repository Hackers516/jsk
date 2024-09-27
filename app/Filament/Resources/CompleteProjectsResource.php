<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompleteProjectsResource\Pages;
use App\Filament\Resources\CompleteProjectsResource\RelationManagers;
use App\Models\CompleteProjects;
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

class CompleteProjectsResource extends Resource
{
    protected static ?string $model = CompleteProjects::class;

    protected static ?string $navigationIcon = 'heroicon-s-check-circle';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }  
 
protected static ?string $navigationGroup = 'Projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('title')->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                    if (($get('slug') ?? '') !== Str::slug($old)) {
                        return;
                    }
                
                    $set('slug', Str::slug($state));
                }), 
                

             TextInput::make('slug')->required()->readOnly(),
        
              
Forms\Components\DatePicker::make('date')->required(),

Forms\Components\RichEditor::make('desc')->required()->columnSpan(2),
Forms\Components\FileUpload::make('card_image')->required(),
Forms\Components\FileUpload::make('images')->required()->image()->multiple()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('card_image')->sortable()->searchable(),
Tables\Columns\TextColumn::make('date')->sortable()->searchable(),
Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
Tables\Columns\TextColumn::make('desc')->sortable()->searchable(),
Tables\Columns\TextColumn::make('images')->sortable()->searchable()
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
            'index' => Pages\ListCompleteProjects::route('/'),
            'create' => Pages\CreateCompleteProjects::route('/create'),
            'view' => Pages\ViewCompleteProjects::route('/{record}'),
            'edit' => Pages\EditCompleteProjects::route('/{record}/edit'),
        ];
    }
}
