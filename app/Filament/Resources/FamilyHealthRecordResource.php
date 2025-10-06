<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamilyHealthRecordResource\Pages;
use App\Filament\Resources\FamilyHealthRecordResource\RelationManagers;
use App\Models\FamilyHealthRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyHealthRecordResource extends BaseResource
{
    protected static ?string $model = FamilyHealthRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    
    protected static ?string $navigationLabel = 'السجلات الصحية العائلية';
    
    protected static ?string $navigationGroup = 'عائلتى';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('member_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('relationship')
                    ->required(),
                Forms\Components\DatePicker::make('birth_date'),
                Forms\Components\TextInput::make('blood_type')
                    ->maxLength(255),
                Forms\Components\Textarea::make('chronic_diseases')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('allergies')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('current_medications')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('family_doctor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('doctor_phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\Textarea::make('emergency_notes')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('height')
                    ->numeric(),
                Forms\Components\TextInput::make('weight')
                    ->numeric(),
                Forms\Components\TextInput::make('insurance_company')
                    ->maxLength(255),
                Forms\Components\TextInput::make('insurance_number')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('member_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('relationship'),
                Tables\Columns\TextColumn::make('birth_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('blood_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('family_doctor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('doctor_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('height')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('insurance_company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('insurance_number')
                    ->searchable(),
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
            'index' => Pages\ListFamilyHealthRecords::route('/'),
            'create' => Pages\CreateFamilyHealthRecord::route('/create'),
            'edit' => Pages\EditFamilyHealthRecord::route('/{record}/edit'),
        ];
    }
}
