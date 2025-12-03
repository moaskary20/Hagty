<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BabyWelcomeGuideResource\Pages;
use App\Filament\Resources\BabyWelcomeGuideResource\RelationManagers;
use App\Models\BabyWelcomeGuide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BabyWelcomeGuideResource extends BaseResource
{
    protected static ?string $model = BabyWelcomeGuide::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'مرحباً بالطفل';
    protected static ?string $modelLabel = 'دليل';
    protected static ?string $pluralModelLabel = 'مرحباً بالطفل';
    protected static ?string $navigationGroup = 'أومومتي';
    protected static ?int $navigationSort = 5;

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
                Forms\Components\TextInput::make('baby_age')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('featured_image')
                    ->image(),
                Forms\Components\TextInput::make('checklist'),
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
                Tables\Columns\TextColumn::make('baby_age')
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
            'index' => Pages\ListBabyWelcomeGuides::route('/'),
            'create' => Pages\CreateBabyWelcomeGuide::route('/create'),
            'edit' => Pages\EditBabyWelcomeGuide::route('/{record}/edit'),
        ];
    }
}
