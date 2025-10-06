<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;

class EventResource extends BaseResource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    
    protected static ?string $navigationLabel = 'الفعاليات';
    
    protected static ?string $modelLabel = 'فعالية';
    
    protected static ?string $pluralModelLabel = 'الفعاليات';
    
    protected static ?string $navigationGroup = 'ايفينتاتى';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('المعلومات الأساسية')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان الفعالية')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('وصف الفعالية')
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\Select::make('event_type')
                            ->label('نوع الفعالية')
                            ->options([
                                'حفلة' => 'حفلة',
                                'مؤتمر' => 'مؤتمر',
                                'ورشة عمل' => 'ورشة عمل',
                                'ندوة' => 'ندوة',
                                'معرض' => 'معرض',
                                'احتفالية' => 'احتفالية',
                                'تجمع اجتماعي' => 'تجمع اجتماعي',
                                'أخرى' => 'أخرى',
                            ])
                            ->required()
                            ->searchable(),
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة الفعالية')
                            ->image()
                            ->directory('events')
                            ->imageEditor(),
                        Forms\Components\FileUpload::make('gallery_images')
                            ->label('معرض الصور')
                            ->image()
                            ->multiple()
                            ->directory('events/gallery')
                            ->maxFiles(10)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('الموقع والتاريخ')
                    ->schema([
                        Forms\Components\TextInput::make('location')
                            ->label('الموقع')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('google_maps_url')
                            ->label('رابط خرائط جوجل')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('event_date')
                            ->label('تاريخ الفعالية')
                            ->required()
                            ->native(false)
                            ->displayFormat('Y/m/d H:i')
                            ->seconds(false),
                        Forms\Components\TextInput::make('duration_hours')
                            ->label('مدة الفعالية (ساعات)')
                            ->numeric()
                            ->minValue(0),
                    ])
                    ->columns(2),

                Section::make('التسعير والحضور')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->label('السعر')
                            ->numeric()
                            ->prefix('جنيه')
                            ->minValue(0),
                        Forms\Components\TextInput::make('max_attendees')
                            ->label('الحد الأقصى للحضور')
                            ->numeric()
                            ->minValue(1),
                        Forms\Components\TextInput::make('current_attendees')
                            ->label('عدد الحضور الحالي')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->dehydrated(),
                    ])
                    ->columns(3),

                Section::make('معلومات المنظم')
                    ->schema([
                        Forms\Components\TextInput::make('organizer_name')
                            ->label('اسم المنظم')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('organizer_phone')
                            ->label('هاتف المنظم')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('organizer_email')
                            ->label('بريد المنظم')
                            ->email()
                            ->maxLength(255),
                    ])
                    ->columns(3),

                Section::make('روابط التواصل الاجتماعي')
                    ->schema([
                        Forms\Components\TextInput::make('facebook_url')
                            ->label('رابط فيسبوك')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram_url')
                            ->label('رابط انستجرام')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('website_url')
                            ->label('الموقع الإلكتروني')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(3),

                Section::make('الإعدادات')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('فعالية مميزة')
                            ->default(false),
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                        Forms\Components\Textarea::make('terms_conditions')
                            ->label('الشروط والأحكام')
                            ->rows(4)
                            ->columnSpanFull(),
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
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('event_type')
                    ->label('النوع')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_date')
                    ->label('التاريخ')
                    ->dateTime('Y/m/d H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('الموقع')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('price')
                    ->label('السعر')
                    ->money('EGP')
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_attendees')
                    ->label('الحضور')
                    ->formatStateUsing(fn ($record) => "{$record->current_attendees}" . ($record->max_attendees ? " / {$record->max_attendees}" : ''))
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('مميزة')
                    ->boolean(),
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
                Tables\Filters\SelectFilter::make('event_type')
                    ->label('نوع الفعالية')
                    ->options([
                        'حفلة' => 'حفلة',
                        'مؤتمر' => 'مؤتمر',
                        'ورشة عمل' => 'ورشة عمل',
                        'ندوة' => 'ندوة',
                        'معرض' => 'معرض',
                        'احتفالية' => 'احتفالية',
                        'تجمع اجتماعي' => 'تجمع اجتماعي',
                        'أخرى' => 'أخرى',
                    ]),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('مميزة'),
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
            ->defaultSort('event_date', 'desc');
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
