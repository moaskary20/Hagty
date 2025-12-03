<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PediatricDoctorResource\Pages;
use App\Filament\Resources\PediatricDoctorResource\RelationManagers;
use App\Models\PediatricDoctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PediatricDoctorResource extends BaseResource
{
    protected static ?string $model = PediatricDoctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'أطباء الأطفال';
    protected static ?string $modelLabel = 'طبيب أطفال';
    protected static ?string $pluralModelLabel = 'أطباء الأطفال';
    protected static ?string $navigationGroup = 'أومومتي';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('specialty')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('whatsapp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('clinic_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('consultation_fee')
                    ->numeric(),
                Forms\Components\Textarea::make('working_hours')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('years_of_experience')
                    ->numeric(),
                Forms\Components\TextInput::make('photo')
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('specialty')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('clinic_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('consultation_fee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('years_of_experience')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('photo')
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
            'index' => Pages\ListPediatricDoctors::route('/'),
            'create' => Pages\CreatePediatricDoctor::route('/create'),
            'edit' => Pages\EditPediatricDoctor::route('/{record}/edit'),
        ];
    }
}
