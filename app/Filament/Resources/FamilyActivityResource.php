<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamilyActivityResource\Pages;
use App\Filament\Resources\FamilyActivityResource\RelationManagers;
use App\Models\FamilyActivity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyActivityResource extends BaseResource
{
    protected static ?string $model = FamilyActivity::class;

    protected static ?string $navigationIcon = 'heroicon-o-sun';
    
    protected static ?string $navigationLabel = 'الأنشطة العائلية';
    
    protected static ?string $navigationGroup = 'عائلتى';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListFamilyActivities::route('/'),
            'create' => Pages\CreateFamilyActivity::route('/create'),
            'edit' => Pages\EditFamilyActivity::route('/{record}/edit'),
        ];
    }
}
