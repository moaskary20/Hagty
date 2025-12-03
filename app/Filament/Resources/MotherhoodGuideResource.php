<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MotherhoodGuideResource\Pages;
use App\Filament\Resources\MotherhoodGuideResource\RelationManagers;
use App\Models\MotherhoodGuide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MotherhoodGuideResource extends BaseResource
{
    protected static ?string $model = MotherhoodGuide::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'كيف تكونين أمًا';
    protected static ?string $modelLabel = 'دليل';
    protected static ?string $pluralModelLabel = 'كيف تكونين أمًا';
    protected static ?string $navigationGroup = 'أومومتي';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('category')
                    ->maxLength(255),
                Forms\Components\TextInput::make('age_range')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('featured_image')
                    ->image(),
                Forms\Components\TextInput::make('tips'),
                Forms\Components\TextInput::make('views_count')
                    ->required()
                    ->numeric()
                    ->default(0),
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
                Tables\Columns\TextColumn::make('age_range')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\TextColumn::make('views_count')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListMotherhoodGuides::route('/'),
            'create' => Pages\CreateMotherhoodGuide::route('/create'),
            'edit' => Pages\EditMotherhoodGuide::route('/{record}/edit'),
        ];
    }
}
