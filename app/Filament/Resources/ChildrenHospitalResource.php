<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChildrenHospitalResource\Pages;
use App\Filament\Resources\ChildrenHospitalResource\RelationManagers;
use App\Models\ChildrenHospital;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChildrenHospitalResource extends BaseResource
{
    protected static ?string $model = ChildrenHospital::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'مستشفيات الأطفال';
    protected static ?string $modelLabel = 'مستشفى';
    protected static ?string $pluralModelLabel = 'مستشفيات الأطفال';
    protected static ?string $navigationGroup = 'أومومتي';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255),
                Forms\Components\TextInput::make('departments'),
                Forms\Components\TextInput::make('beds_count')
                    ->numeric(),
                Forms\Components\Toggle::make('has_emergency')
                    ->required(),
                Forms\Components\Toggle::make('has_icu')
                    ->required(),
                Forms\Components\Textarea::make('facilities')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('logo')
                    ->maxLength(255),
                Forms\Components\TextInput::make('images'),
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emergency_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('beds_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('has_emergency')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_icu')
                    ->boolean(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('logo')
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
            'index' => Pages\ListChildrenHospitals::route('/'),
            'create' => Pages\CreateChildrenHospital::route('/create'),
            'edit' => Pages\EditChildrenHospital::route('/{record}/edit'),
        ];
    }
}
