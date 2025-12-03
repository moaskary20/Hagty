<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MainScreenElementResource\Pages;
use App\Filament\Resources\MainScreenElementResource\RelationManagers;
use App\Models\MainScreenElement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MainScreenElementResource extends BaseResource
{
    protected static ?string $model = MainScreenElement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'شياكتي';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'شياكتي';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('نوع')
                    ->label('نوع العنصر')
                    ->options([
                        'شعار_راعي' => 'شعار راعي',
                        'بانر_إعلاني' => 'بانر إعلاني',
                        'فيديو_إعلاني' => 'فيديو إعلاني',
                        'عرض' => 'عرض',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('صورة_الشعار')->label('صورة شعار الراعي'),
                Forms\Components\TextInput::make('اسم_الراعي')->label('اسم الراعي'),
                Forms\Components\TextInput::make('رابط_الراعي')->label('رابط الراعي'),
                Forms\Components\FileUpload::make('صورة_البانر')->label('صورة البانر الإعلاني'),
                Forms\Components\TextInput::make('رابط_الإعلان')->label('رابط الإعلان'),
                Forms\Components\TextInput::make('عنوان_الإعلان')->label('عنوان الإعلان أو العرض'),
                Forms\Components\Toggle::make('حالة_التفعيل')->label('حالة التفعيل'),
                Forms\Components\TextInput::make('رابط_الفيديو')->label('رابط الفيديو الإعلاني'),
                Forms\Components\TextInput::make('مدة_التخطي')->label('مدة التخطي')->numeric()->default(6),
                Forms\Components\TextInput::make('عنوان_العرض')->label('عنوان العرض'),
                Forms\Components\Textarea::make('وصف_العرض')->label('وصف العرض أو الخصم')->columnSpanFull(),
                Forms\Components\FileUpload::make('صورة_العرض')->label('صورة العرض'),
                Forms\Components\TextInput::make('رابط_المتجر')->label('رابط المتجر الخاص بالعرض'),
                Forms\Components\DatePicker::make('تاريخ_الانتهاء')->label('تاريخ انتهاء العرض أو الخصم'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('نوع')->label('نوع العنصر')->searchable(),
                Tables\Columns\ImageColumn::make('صورة_الشعار')->label('صورة شعار الراعي'),
                Tables\Columns\TextColumn::make('اسم_الراعي')->label('اسم الراعي'),
                Tables\Columns\TextColumn::make('رابط_الراعي')->label('رابط الراعي'),
                Tables\Columns\ImageColumn::make('صورة_البانر')->label('صورة البانر الإعلاني'),
                Tables\Columns\TextColumn::make('رابط_الإعلان')->label('رابط الإعلان'),
                Tables\Columns\TextColumn::make('عنوان_الإعلان')->label('عنوان الإعلان أو العرض'),
                Tables\Columns\IconColumn::make('حالة_التفعيل')->label('حالة التفعيل'),
                Tables\Columns\TextColumn::make('رابط_الفيديو')->label('رابط الفيديو الإعلاني'),
                Tables\Columns\TextColumn::make('مدة_التخطي')->label('مدة التخطي'),
                Tables\Columns\TextColumn::make('عنوان_العرض')->label('عنوان العرض'),
                Tables\Columns\TextColumn::make('وصف_العرض')->label('وصف العرض أو الخصم'),
                Tables\Columns\ImageColumn::make('صورة_العرض')->label('صورة العرض'),
                Tables\Columns\TextColumn::make('رابط_المتجر')->label('رابط المتجر الخاص بالعرض'),
                Tables\Columns\TextColumn::make('تاريخ_الانتهاء')->label('تاريخ انتهاء العرض أو الخصم'),
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
            'index' => Pages\ListMainScreenElements::route('/'),
            'create' => Pages\CreateMainScreenElement::route('/create'),
            'edit' => Pages\EditMainScreenElement::route('/{record}/edit'),
        ];
    }
}
