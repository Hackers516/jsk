<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-s-book-open';

    public static function form(Form $form): Form
    {
        return $form
       
            ->schema([

                Forms\Components\TextInput::make('name')->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                    if (($get('slug') ?? '') !== Str::slug($old)) {
                        return;
                    }                
                    $set('slug', Str::slug($state));
                }),                 
             TextInput::make('slug')->required()->readOnly(),
Forms\Components\DatePicker::make('date')->required(),
Forms\Components\TextInput::make('tags')->required(),


Forms\Components\TextInput::make('bio')->required()->columnSpan(3),
Forms\Components\FileUpload::make('image')->required()->columnSpan(2),
Forms\Components\RichEditor::make('details')->required()->columnSpan(4),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
Tables\Columns\TextColumn::make('date')->sortable()->searchable(),
Tables\Columns\TextColumn::make('image')->sortable()->searchable(),
Tables\Columns\TextColumn::make('bio')->sortable()->searchable(),
Tables\Columns\TextColumn::make('details')->sortable()->searchable(),
Tables\Columns\TextColumn::make('tags')->sortable()->searchable()
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'view' => Pages\ViewBlog::route('/{record}'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
