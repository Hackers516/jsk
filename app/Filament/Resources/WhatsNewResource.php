<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhatsNewResource\Pages;
use App\Filament\Resources\WhatsNewResource\RelationManagers;
use App\Models\WhatsNew;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class WhatsNewResource extends Resource
{
    protected static ?string $model = WhatsNew::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Whats New';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options([
                        'news' => 'News',
                        'event' => 'Event',
                    ])
                    ->reactive(), 
    
                
    
                DatePicker::make('date')->required(),   
                
                Forms\Components\TextInput::make('name')->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                    if (($get('slug') ?? '') !== Str::slug($old)) {
                        return;
                    }                
                    $set('slug', Str::slug($state));
                }),                 
             TextInput::make('slug')->required()->readOnly(),
        
    
                TextInput::make('bio')->required(),
    
                // Conditionally hide the "organizer" field based on the selected status
                TextInput::make('organizer')
                    ->required()
                    ->hidden(fn (Get $get) => $get('status') === 'event'),
    
                TextInput::make('location')->required(),
                FileUpload::make('card_image')->required()->columnSpan(4),
                RichEditor::make('Detail')->required()->columnSpan(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('card_image')->sortable()->searchable(),
Tables\Columns\TextColumn::make('date')->sortable()->searchable(),
Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
Tables\Columns\TextColumn::make('bio')->sortable()->searchable(),
Tables\Columns\TextColumn::make('organizer')->sortable()->searchable(),
Tables\Columns\TextColumn::make('location')->sortable()->searchable(),
Tables\Columns\TextColumn::make('Detail')->sortable()->searchable()
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
            'index' => Pages\ListWhatsNews::route('/'),
            'create' => Pages\CreateWhatsNew::route('/create'),
            'view' => Pages\ViewWhatsNew::route('/{record}'),
            'edit' => Pages\EditWhatsNew::route('/{record}/edit'),
        ];
    }
}
