<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventBannerResource\Pages;
use App\Models\EventBanner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;

class EventBannerResource extends BaseResource
{
    protected static ?string $model = EventBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    protected static ?string $navigationLabel = 'إعلانات البانر';
    
    protected static ?string $modelLabel = 'بانر';
    
    protected static ?string $pluralModelLabel = 'إعلانات البانر';
    
    protected static ?string $navigationGroup = 'ايفينتاتى';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات البانر')
                    ->schema([
                        Forms\Components\Select::make('event_id')
                            ->label('الفعالية (اختياري)')
                            ->relationship('event', 'title')
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان البانر')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('banner_image')
                            ->label('صورة البانر')
                            ->image()
                            ->required()
                            ->directory('event-banners')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ]),

                Section::make('الرابط والعرض')
                    ->schema([
                        Forms\Components\TextInput::make('link_url')
                            ->label('رابط البانر')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('offer_description')
                            ->label('وصف العرض')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('valid_until')
                            ->label('صالح حتى')
                            ->native(false),
                    ])
                    ->columns(3),

                Section::make('الإعدادات')
                    ->schema([
                        Forms\Components\TextInput::make('display_order')
                            ->label('ترتيب العرض')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner_image')
                    ->label('الصورة')
                    ->square()
                    ->size(60),
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('event.title')
                    ->label('الفعالية')
                    ->searchable()
                    ->default('بانر عام')
                    ->limit(30),
                Tables\Columns\TextColumn::make('offer_description')
                    ->label('العرض')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('valid_until')
                    ->label('صالح حتى')
                    ->date('Y/m/d')
                    ->sortable(),
                Tables\Columns\TextColumn::make('display_order')
                    ->label('الترتيب')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y/m/d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('نشط'),
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
            ->defaultSort('display_order', 'asc');
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
            'index' => Pages\ListEventBanners::route('/'),
            'create' => Pages\CreateEventBanner::route('/create'),
            'edit' => Pages\EditEventBanner::route('/{record}/edit'),
        ];
    }
}
