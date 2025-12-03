<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TailorResource\Pages;
use App\Filament\Resources\TailorResource\RelationManagers;
use App\Models\Tailor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TailorResource extends BaseResource
{
    protected static ?string $model = Tailor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('اسم_الترزي')->label('اسم الترزي')->required(),
                Forms\Components\TextInput::make('الموقع')->label('الموقع')->required(),
                Forms\Components\TextInput::make('رابط_الخريطة')->label('رابط الخريطة'),
                Forms\Components\Textarea::make('نصائح_الخياطة')->label('نصائح الخياطة')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('اسم_الترزي')->label('اسم الترزي')->searchable(),
                Tables\Columns\TextColumn::make('الموقع')->label('الموقع')->searchable(),
                Tables\Columns\TextColumn::make('رابط_الخريطة')->label('رابط الخريطة')->searchable(),
                Tables\Columns\TextColumn::make('نصائح_الخياطة')->label('نصائح الخياطة'),
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
            'index' => Pages\ListTailors::route('/'),
            'create' => Pages\CreateTailor::route('/create'),
            'edit' => Pages\EditTailor::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'دليل الترزية';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'شياكتي';
    }
}
