<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorBannerResource\Pages;
use App\Filament\Resources\SponsorBannerResource\RelationManagers;
use App\Models\SponsorBanner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SponsorBannerResource extends BaseResource
{
    protected static ?string $model = SponsorBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'بانرز الممولين';
    protected static ?string $navigationGroup = 'إدارة النظام';
    protected static ?int $navigationSort = 1000;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('بيانات البانر')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('العنوان')
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('image')
                            ->label('صورة البانر')
                            ->image()
                            ->directory('sponsor-banners')
                            ->required(),

                        Forms\Components\TextInput::make('link_url')
                            ->label('رابط التحويل (اختياري)')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('نصوص البانر')
                    ->description('إضافة النصوص التي ستظهر على الصورة')
                    ->schema([
                        Forms\Components\TextInput::make('main_title')
                            ->maxLength(255)
                            ->label('العنوان الرئيسي')
                            ->placeholder('مثال: Apple'),
                        Forms\Components\TextInput::make('subtitle')
                            ->maxLength(255)
                            ->label('العنوان الفرعي')
                            ->placeholder('مثال: اكتشفي أفضل العروض والخدمات'),
                        Forms\Components\TextInput::make('button_text')
                            ->maxLength(255)
                            ->label('نص الزر')
                            ->placeholder('مثال: اضغطي للزيارة'),
                    ])
                    ->columns(2)
                    ->collapsed(),

                Forms\Components\Section::make('إعدادات التصميم')
                    ->description('تخصيص ألوان ومواضع النصوص')
                    ->schema([
                        Forms\Components\Select::make('text_position')
                            ->options([
                                'center' => 'وسط',
                                'left' => 'يسار',
                                'right' => 'يمين',
                            ])
                            ->default('center')
                            ->label('موضع النص'),
                        Forms\Components\ColorPicker::make('text_color')
                            ->default('#ffffff')
                            ->label('لون النص'),
                        Forms\Components\ColorPicker::make('button_color')
                            ->default('#d94288')
                            ->label('لون الزر'),
                        Forms\Components\Toggle::make('show_overlay')
                            ->default(true)
                            ->label('إظهار التدرج الخلفي'),
                    ])
                    ->columns(2)
                    ->collapsed(),

                Forms\Components\Section::make('الجدولة')
                    ->schema([
                        Forms\Components\DateTimePicker::make('start_date')
                            ->label('تاريخ البداية')
                            ->nullable(),
                        Forms\Components\DateTimePicker::make('end_date')
                            ->label('تاريخ النهاية')
                            ->nullable(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                        Forms\Components\TextInput::make('display_order')
                            ->label('ترتيب العرض')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('الصورة')
                    ->square()
                    ->size(80),
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable(),
                Tables\Columns\TextColumn::make('main_title')
                    ->label('العنوان الرئيسي')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('العنوان الفرعي')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('button_text')
                    ->label('نص الزر'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('يبدأ')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('ينتهي')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('display_order')
                    ->label('الترتيب')
                    ->numeric(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')->label('نشط'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('display_order');
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
            'index' => Pages\ListSponsorBanners::route('/'),
            'create' => Pages\CreateSponsorBanner::route('/create'),
            'edit' => Pages\EditSponsorBanner::route('/{record}/edit'),
        ];
    }
}
