<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FashionistaVideoResource\Pages;
use App\Filament\Resources\FashionistaVideoResource\RelationManagers;
use App\Models\FashionistaVideo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FashionistaVideoResource extends BaseResource
{
    protected static ?string $model = FashionistaVideo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'دليل الفيديوهات / البلوجرز';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'عالم الموضة';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('عنوان_الفيديو')->label('عنوان الفيديو')->required(),
                Forms\Components\TextInput::make('رابط_الفيديو')->label('رابط الفيديو')->required(),
                Forms\Components\TextInput::make('اسم_البلوجر')->label('اسم البلوجر')->required(),
                Forms\Components\TextInput::make('التصنيف')->label('التصنيف'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('عنوان_الفيديو')->label('عنوان الفيديو')->searchable(),
                Tables\Columns\TextColumn::make('رابط_الفيديو')->label('رابط الفيديو')->searchable(),
                Tables\Columns\TextColumn::make('اسم_البلوجر')->label('اسم البلوجر')->searchable(),
                Tables\Columns\TextColumn::make('التصنيف')->label('التصنيف')->searchable(),
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
            'index' => Pages\ListFashionistaVideos::route('/'),
            'create' => Pages\CreateFashionistaVideo::route('/create'),
            'edit' => Pages\EditFashionistaVideo::route('/{record}/edit'),
        ];
    }
}
