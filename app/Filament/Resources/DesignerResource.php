<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DesignerResource\Pages;
use App\Filament\Resources\DesignerResource\RelationManagers;
use App\Models\Designer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DesignerResource extends Resource
{
    protected static ?string $model = Designer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('اسم_المصمم')->label('اسم المصمم')->required(),
                Forms\Components\TextInput::make('الموقع')->label('الموقع')->required(),
                Forms\Components\Textarea::make('معرض_الأعمال')->label('معرض الأعمال (صور/فيديوهات)')->columnSpanFull(),
                Forms\Components\TextInput::make('رابط_الفيديو_القصير')->label('رابط فيديو قصير'),
                Forms\Components\TextInput::make('رابط_الدورات')->label('رابط الدورات'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('اسم_المصمم')->label('اسم المصمم')->searchable(),
                Tables\Columns\TextColumn::make('الموقع')->label('الموقع')->searchable(),
                Tables\Columns\TextColumn::make('رابط_الفيديو_القصير')->label('رابط فيديو قصير')->searchable(),
                Tables\Columns\TextColumn::make('رابط_الدورات')->label('رابط الدورات')->searchable(),
                Tables\Columns\TextColumn::make('معرض_الأعمال')->label('معرض الأعمال (صور/فيديوهات)'),
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
            'index' => Pages\ListDesigners::route('/'),
            'create' => Pages\CreateDesigner::route('/create'),
            'edit' => Pages\EditDesigner::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'دليل المصممين';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'عالم الموضة';
    }
}
