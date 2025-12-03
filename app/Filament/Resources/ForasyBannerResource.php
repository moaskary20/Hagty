<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ForasyBannerResource\Pages;
use App\Filament\Resources\ForasyBannerResource\RelationManagers;
use App\Models\ForasyBanner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ForasyBannerResource extends BaseResource
{
    protected static ?string $model = ForasyBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    protected static ?string $navigationLabel = 'إدارة البانر الرئيسي';
    
    protected static ?string $modelLabel = 'بانر رئيسي';
    
    protected static ?string $pluralModelLabel = 'البانرات الرئيسية';
    
    protected static ?string $navigationGroup = 'إدارة النظام';
    
    protected static ?int $navigationSort = 1001;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات البانر الأساسية')
                    ->description('إضافة أو تعديل بانرات السلايدر الرئيسي في أعلى الصفحة الرئيسية')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('عنوان البانر')
                            ->placeholder('مثال: عروض خاصة'),
                        Forms\Components\FileUpload::make('banner_image')
                            ->image()
                            ->required()
                            ->label('صورة البانر')
                            ->directory('hero-banners')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                            ])
                            ->helperText('الحجم الموصى به: 1920x1080 بكسل')
                            ->maxSize(5120),
                        Forms\Components\TextInput::make('link_url')
                            ->maxLength(255)
                            ->url()
                            ->label('رابط البانر (اختياري)')
                            ->placeholder('https://example.com'),
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull()
                            ->rows(3)
                            ->label('وصف البانر (اختياري)'),
                        Forms\Components\TextInput::make('display_order')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->label('ترتيب العرض')
                            ->helperText('رقم أقل = يظهر أولاً'),
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->default(true)
                            ->label('نشط'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('نصوص البانر')
                    ->description('النصوص التي ستظهر فوق صورة البانر')
                    ->schema([
                        Forms\Components\TextInput::make('main_title')
                            ->maxLength(255)
                            ->label('العنوان الرئيسي')
                            ->placeholder('مثال: مرحباً بك في منصة HAGTY'),
                        Forms\Components\TextInput::make('subtitle')
                            ->maxLength(255)
                            ->label('العنوان الفرعي')
                            ->placeholder('مثال: منصة شاملة للمرأة العربية'),
                        Forms\Components\TextInput::make('button_text')
                            ->maxLength(255)
                            ->label('نص الزر')
                            ->placeholder('مثال: اكتشفي المزيد'),
                        Forms\Components\TextInput::make('button_url')
                            ->maxLength(255)
                            ->url()
                            ->label('رابط الزر')
                            ->placeholder('https://example.com'),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner_image')
                    ->label('صورة البانر')
                    ->square()
                    ->size(80),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('عنوان البانر')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('main_title')
                    ->searchable()
                    ->label('العنوان الرئيسي')
                    ->limit(30),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable()
                    ->label('العنوان الفرعي')
                    ->limit(30),
                Tables\Columns\TextColumn::make('button_text')
                    ->label('نص الزر'),
                Tables\Columns\TextColumn::make('text_position')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'center' => 'success',
                        'left' => 'warning',
                        'right' => 'info',
                    })
                    ->label('موضع النص'),
                Tables\Columns\TextColumn::make('display_order')
                    ->numeric()
                    ->sortable()
                    ->label('الترتيب'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('نشط'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ الإنشاء'),
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
            'index' => Pages\ListForasyBanners::route('/'),
            'create' => Pages\CreateForasyBanner::route('/create'),
            'edit' => Pages\EditForasyBanner::route('/{record}/edit'),
        ];
    }
}
