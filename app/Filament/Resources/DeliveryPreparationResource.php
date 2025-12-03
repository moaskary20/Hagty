<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryPreparationResource\Pages;
use App\Filament\Resources\DeliveryPreparationResource\RelationManagers;
use App\Models\DeliveryPreparation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeliveryPreparationResource extends BaseResource
{
    protected static ?string $model = DeliveryPreparation::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'استعدي لاستقبال...';
    protected static ?string $modelLabel = 'تحضيرات الولادة';
    protected static ?string $pluralModelLabel = 'استعدي لاستقبال مولودك';
    protected static ?string $navigationGroup = 'أومومتي';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('category')
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('preparation_steps'),
                Forms\Components\TextInput::make('tips_and_advice'),
                Forms\Components\TextInput::make('videos'),
                Forms\Components\TextInput::make('images'),
                Forms\Components\TextInput::make('checklist_items'),
                Forms\Components\TextInput::make('timeline'),
                Forms\Components\TextInput::make('importance_level')
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
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('importance_level')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
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
            'index' => Pages\ListDeliveryPreparations::route('/'),
            'create' => Pages\CreateDeliveryPreparation::route('/create'),
            'edit' => Pages\EditDeliveryPreparation::route('/{record}/edit'),
        ];
    }
}
