<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModaTipResource\Pages;
use App\Filament\Resources\ModaTipResource\RelationManagers;
use App\Models\ModaTip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModaTipResource extends BaseResource
{
    protected static ?string $model = ModaTip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'نصائح الموضة من البلوجرز';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'شياكتي';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('عنوان_النصيحة')->label('عنوان النصيحة')->required(),
                Forms\Components\TextInput::make('رابط_الفيديو')->label('رابط الفيديو')->required(),
                Forms\Components\TextInput::make('اسم_البلوجر')->label('اسم البلوجر')->required(),
                Forms\Components\Toggle::make('حالة_الرعاية')->label('حالة الرعاية')->required(),
                Forms\Components\TextInput::make('مدة_التخطي')->label('مدة التخطي')->numeric()->default(6),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('عنوان_النصيحة')->label('عنوان النصيحة')->searchable(),
                Tables\Columns\TextColumn::make('رابط_الفيديو')->label('رابط الفيديو')->searchable(),
                Tables\Columns\TextColumn::make('اسم_البلوجر')->label('اسم البلوجر')->searchable(),
                Tables\Columns\IconColumn::make('حالة_الرعاية')->label('حالة الرعاية'),
                Tables\Columns\TextColumn::make('مدة_التخطي')->label('مدة التخطي'),
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
            'index' => Pages\ListModaTips::route('/'),
            'create' => Pages\CreateModaTip::route('/create'),
            'edit' => Pages\EditModaTip::route('/{record}/edit'),
        ];
    }
}
