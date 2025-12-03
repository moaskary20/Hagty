<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GoldShopResource\Pages;
use App\Filament\Resources\GoldShopResource\RelationManagers;
use App\Models\GoldShop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GoldShopResource extends BaseResource
{
    protected static ?string $model = GoldShop::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'متاجر الذهب';
    protected static ?string $modelLabel = 'متجر ذهب';
    protected static ?string $pluralModelLabel = 'متاجر الذهب';
    protected static ?string $navigationGroup = 'اكسسوراتى';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المتجر')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('اسم المتجر')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('city')
                            ->label('المدينة')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->label('العنوان')
                            ->rows(2)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('معلومات الاتصال')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->label('رقم الهاتف')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('واتساب')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('website')
                            ->label('الموقع الإلكتروني')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->collapsed(),

                Forms\Components\Section::make('الصور')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('شعار المتجر')
                            ->image()
                            ->directory('gold-shops/logos')
                            ->imageEditor(),
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('صورة الغلاف')
                            ->image()
                            ->directory('gold-shops/covers')
                            ->imageEditor(),
                        Forms\Components\FileUpload::make('images')
                            ->label('صور المنتجات')
                            ->image()
                            ->multiple()
                            ->directory('gold-shops/products')
                            ->maxFiles(10)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsed(),

                Forms\Components\Section::make('المنتجات والخدمات')
                    ->schema([
                        Forms\Components\Textarea::make('products')
                            ->label('المنتجات المتوفرة')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('مثال: خواتم ذهب، أساور، قلائد، أقراط، دبل...'),
                        Forms\Components\Textarea::make('services')
                            ->label('الخدمات')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('مثال: نقش، تصميم حسب الطلب، صيانة، تلميع...'),
                    ])
                    ->collapsed(),

                Forms\Components\Section::make('إعدادات')
                    ->schema([
                        Forms\Components\TextInput::make('rating')
                            ->label('التقييم')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(5)
                            ->step(0.1)
                            ->default(0.00),
                        Forms\Components\TextInput::make('views_count')
                            ->label('عدد المشاهدات')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('مميز')
                            ->default(false),
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                    ])
                    ->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('الشعار')
                    ->circular()
                    ->size(50),
                Tables\Columns\TextColumn::make('name')
                    ->label('اسم المتجر')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('city')
                    ->label('المدينة')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('الهاتف')
                    ->searchable()
                    ->icon('heroicon-o-phone'),
                Tables\Columns\TextColumn::make('rating')
                    ->label('التقييم')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color(fn ($state): string => match (true) {
                        $state >= 4.5 => 'success',
                        $state >= 3.5 => 'warning',
                        default => 'danger',
                    }),
                Tables\Columns\TextColumn::make('views_count')
                    ->label('المشاهدات')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
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
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('نشط')
                    ->placeholder('الكل')
                    ->trueLabel('نشط فقط')
                    ->falseLabel('غير نشط فقط'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('مميز')
                    ->placeholder('الكل')
                    ->trueLabel('مميز فقط')
                    ->falseLabel('غير مميز'),
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
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListGoldShops::route('/'),
            'create' => Pages\CreateGoldShop::route('/create'),
            'edit' => Pages\EditGoldShop::route('/{record}/edit'),
        ];
    }
}
