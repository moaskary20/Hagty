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
    
    protected static ?string $navigationLabel = 'إعلانات البانر';
    
    protected static ?string $modelLabel = 'بانر';
    
    protected static ?string $pluralModelLabel = 'إعلانات البانر';
    
    protected static ?string $navigationGroup = 'فورصى';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات البانر الأساسية')
                    ->schema([
                        Forms\Components\TextInput::make('job_id')
                            ->numeric()
                            ->label('معرف الوظيفة'),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('العنوان'),
                        Forms\Components\FileUpload::make('banner_image')
                            ->image()
                            ->required()
                            ->label('صورة البانر')
                            ->directory('forasy-banners'),
                        Forms\Components\TextInput::make('link_url')
                            ->maxLength(255)
                            ->label('رابط البانر'),
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull()
                            ->label('الوصف'),
                        Forms\Components\TextInput::make('offer_description')
                            ->maxLength(255)
                            ->label('وصف العرض'),
                        Forms\Components\DatePicker::make('valid_until')
                            ->label('صالح حتى'),
                        Forms\Components\TextInput::make('display_order')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->label('ترتيب العرض'),
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->label('نشط'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('نصوص البانر')
                    ->description('إضافة النصوص التي ستظهر على الصورة')
                    ->schema([
                        Forms\Components\TextInput::make('main_title')
                            ->maxLength(255)
                            ->label('العنوان الرئيسي')
                            ->placeholder('مثال: كورسات تعليمية احترافية'),
                        Forms\Components\TextInput::make('subtitle')
                            ->maxLength(255)
                            ->label('العنوان الفرعي')
                            ->placeholder('مثال: تعلمي من أفضل المدربين'),
                        Forms\Components\TextInput::make('button_text')
                            ->maxLength(255)
                            ->label('نص الزر')
                            ->placeholder('مثال: ابدئي التعلم'),
                        Forms\Components\TextInput::make('button_url')
                            ->maxLength(255)
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
                    ->label('الصورة')
                    ->size(60),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('العنوان'),
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
