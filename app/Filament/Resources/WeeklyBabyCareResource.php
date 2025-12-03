<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WeeklyBabyCareResource\Pages;
use App\Filament\Resources\WeeklyBabyCareResource\RelationManagers;
use App\Models\WeeklyBabyCare;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeeklyBabyCareResource extends BaseResource
{
    protected static ?string $model = WeeklyBabyCare::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'العناية أسبوعياً';
    protected static ?string $modelLabel = 'عناية أسبوعية';
    protected static ?string $pluralModelLabel = 'العناية أسبوعياً';
    protected static ?string $navigationGroup = 'أومومتي';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('week_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('care_instructions')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('milestones')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('feeding_guidelines')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('sleep_patterns')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('health_tips')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('vaccination_schedule'),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('week_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
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
            'index' => Pages\ListWeeklyBabyCares::route('/'),
            'create' => Pages\CreateWeeklyBabyCare::route('/create'),
            'edit' => Pages\EditWeeklyBabyCare::route('/{record}/edit'),
        ];
    }
}
