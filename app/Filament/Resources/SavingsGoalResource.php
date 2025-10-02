<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SavingsGoalResource\Pages;
use App\Filament\Resources\SavingsGoalResource\RelationManagers;
use App\Models\SavingsGoal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SavingsGoalResource extends Resource
{
    protected static ?string $model = SavingsGoal::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'أهداف الادخار';
    protected static ?string $navigationGroup = 'حساباتى';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->numeric(),
                Forms\Components\TextInput::make('goal_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('target_amount')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('current_amount')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\DatePicker::make('target_date'),
                Forms\Components\Toggle::make('is_completed')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('goal_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('target_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('target_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_completed')
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
            'index' => Pages\ListSavingsGoals::route('/'),
            'create' => Pages\CreateSavingsGoal::route('/create'),
            'edit' => Pages\EditSavingsGoal::route('/{record}/edit'),
        ];
    }
}
