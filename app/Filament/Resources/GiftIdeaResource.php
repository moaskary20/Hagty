<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GiftIdeaResource\Pages;
use App\Filament\Resources\GiftIdeaResource\RelationManagers;
use App\Models\GiftIdea;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GiftIdeaResource extends Resource
{
    protected static ?string $model = GiftIdea::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';
    protected static ?string $navigationLabel = 'أفكار الهدايا';
    protected static ?string $modelLabel = 'فكرة هدية';
    protected static ?string $pluralModelLabel = 'أفكار الهدايا';
    protected static ?string $navigationGroup = 'هديتي';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('category')
                    ->maxLength(255),
                Forms\Components\TextInput::make('occasion')
                    ->maxLength(255),
                Forms\Components\TextInput::make('price_range_min')
                    ->numeric(),
                Forms\Components\TextInput::make('price_range_max')
                    ->numeric(),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\TextInput::make('gallery_images'),
                Forms\Components\TextInput::make('purchase_url')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_featured')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('occasion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_range_min')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_range_max')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('purchase_url')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListGiftIdeas::route('/'),
            'create' => Pages\CreateGiftIdea::route('/create'),
            'edit' => Pages\EditGiftIdea::route('/{record}/edit'),
        ];
    }
}
