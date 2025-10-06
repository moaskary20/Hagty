<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamilyPromotionalAdResource\Pages;
use App\Filament\Resources\FamilyPromotionalAdResource\RelationManagers;
use App\Models\FamilyPromotionalAd;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyPromotionalAdResource extends BaseResource
{
    protected static ?string $model = FamilyPromotionalAd::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    
    protected static ?string $navigationLabel = 'الإعلانات الدعائية';
    
    protected static ?string $modelLabel = 'إعلان دعائي';
    
    protected static ?string $pluralModelLabel = 'الإعلانات الدعائية';
    
    protected static ?string $navigationGroup = 'عائلتى';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الإعلان الأساسية')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان الإعلان')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('وصف الإعلان')
                            ->columnSpanFull()
                            ->rows(3),
                        Forms\Components\Select::make('ad_type')
                            ->label('نوع الإعلان')
                            ->required()
                            ->options([
                                'image' => 'صورة',
                                'video' => 'فيديو',
                                'banner' => 'بانر',
                            ]),
                        Forms\Components\Select::make('category')
                            ->label('فئة الإعلان')
                            ->required()
                            ->options([
                                'food' => 'طعام',
                                'entertainment' => 'ترفيه',
                                'education' => 'تعليم',
                                'health' => 'صحة',
                                'shopping' => 'تسوق',
                                'travel' => 'سفر',
                                'services' => 'خدمات',
                            ]),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('المحتوى والوسائط')
                    ->schema([
                        Forms\Components\FileUpload::make('image_url')
                            ->label('صورة الإعلان')
                            ->image()
                            ->directory('family-ads')
                            ->visibility('public'),
                        Forms\Components\TextInput::make('video_url')
                            ->label('رابط الفيديو')
                            ->url()
                            ->placeholder('https://www.youtube.com/embed/...'),
                        Forms\Components\TextInput::make('link_url')
                            ->label('رابط الإعلان')
                            ->url()
                            ->placeholder('https://...'),
                    ])
                    ->columns(1),
                
                Forms\Components\Section::make('التسعير والعروض')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->label('السعر')
                            ->numeric()
                            ->prefix('ج.م')
                            ->placeholder('0.00'),
                        Forms\Components\TextInput::make('discount_percentage')
                            ->label('نسبة الخصم')
                            ->placeholder('25%')
                            ->suffix('%'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('الإعدادات والجدولة')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('تاريخ البداية'),
                        Forms\Components\DatePicker::make('end_date')
                            ->label('تاريخ الانتهاء'),
                        Forms\Components\TextInput::make('display_order')
                            ->label('ترتيب العرض')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('إعلان مميز')
                            ->default(false),
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('الصورة')
                    ->size(60),
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('category')
                    ->label('الفئة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'food' => 'success',
                        'entertainment' => 'warning',
                        'education' => 'info',
                        'health' => 'danger',
                        'shopping' => 'primary',
                        'travel' => 'secondary',
                        'services' => 'gray',
                    }),
                Tables\Columns\TextColumn::make('ad_type')
                    ->label('النوع')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'image' => 'success',
                        'video' => 'danger',
                        'banner' => 'warning',
                    }),
                Tables\Columns\TextColumn::make('price')
                    ->label('السعر')
                    ->money('EGP')
                    ->sortable()
                    ->alignEnd(),
                Tables\Columns\TextColumn::make('discount_percentage')
                    ->label('الخصم')
                    ->badge()
                    ->color('success')
                    ->alignCenter(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('مميز')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-star')
                    ->trueColor('warning')
                    ->falseColor('gray'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('display_order')
                    ->label('الترتيب')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('ينتهي في')
                    ->date('Y-m-d')
                    ->sortable()
                    ->color(fn ($record) => $record->end_date && $record->end_date->isPast() ? 'danger' : 'success'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('الفئة')
                    ->options([
                        'food' => 'طعام',
                        'entertainment' => 'ترفيه',
                        'education' => 'تعليم',
                        'health' => 'صحة',
                        'shopping' => 'تسوق',
                        'travel' => 'سفر',
                        'services' => 'خدمات',
                    ]),
                Tables\Filters\SelectFilter::make('ad_type')
                    ->label('نوع الإعلان')
                    ->options([
                        'image' => 'صورة',
                        'video' => 'فيديو',
                        'banner' => 'بانر',
                    ]),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('إعلانات مميزة')
                    ->placeholder('جميع الإعلانات')
                    ->trueLabel('مميزة فقط')
                    ->falseLabel('غير مميزة'),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('الإعلانات النشطة')
                    ->placeholder('جميع الإعلانات')
                    ->trueLabel('نشطة فقط')
                    ->falseLabel('غير نشطة'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('display_order')
            ->reorderable('display_order');
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
            'index' => Pages\ListFamilyPromotionalAds::route('/'),
            'create' => Pages\CreateFamilyPromotionalAd::route('/create'),
            'edit' => Pages\EditFamilyPromotionalAd::route('/{record}/edit'),
        ];
    }
}
