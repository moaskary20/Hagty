<?php

namespace App\Filament\Resources\Sehati;

use App\Filament\Resources\Sehati\PandemicAlertResource\Pages;
use App\Models\PandemicAlert;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\Alignment;

class PandemicAlertResource extends Resource
{
    protected static ?string $model = PandemicAlert::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';
    
    protected static ?string $navigationLabel = 'تنبيهات الجوائح';
    
    protected static ?string $modelLabel = 'تنبيه';
    
    protected static ?string $pluralModelLabel = 'تنبيهات الجوائح';
    
    protected static ?string $navigationGroup = 'صحتي';
    
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات التنبيه')
                    ->schema([
                        TextInput::make('title')
                            ->label('عنوان التنبيه')
                            ->required()
                            ->maxLength(255),
                        
                        Textarea::make('description')
                            ->label('وصف التنبيه')
                            ->required()
                            ->rows(3),
                        
                        Select::make('alert_level')
                            ->label('مستوى التنبيه')
                            ->options([
                                'low' => 'منخفض',
                                'medium' => 'متوسط',
                                'high' => 'عالي',
                                'critical' => 'حرج',
                            ])
                            ->required()
                            ->default('medium'),
                        
                        Select::make('content_type')
                            ->label('نوع المحتوى')
                            ->options([
                                'video' => 'فيديو',
                                'infographic' => 'رسم بياني',
                                'both' => 'فيديو ورسم بياني',
                            ])
                            ->required()
                            ->default('video')
                            ->live(),
                        
                        FileUpload::make('thumbnail')
                            ->label('صورة مصغرة')
                            ->image()
                            ->imageEditor()
                            ->directory('pandemic-alerts/thumbnails')
                            ->visibility('public'),
                        
                        Select::make('status')
                            ->label('حالة التنبيه')
                            ->options([
                                'active' => 'نشط',
                                'inactive' => 'غير نشط',
                            ])
                            ->required()
                            ->default('active'),
                    ])
                    ->columns(2),
                
                Section::make('المحتوى')
                    ->schema([
                        TextInput::make('video_url')
                            ->label('رابط الفيديو')
                            ->url()
                            ->placeholder('https://youtube.com/watch?v=...')
                            ->visible(fn (Forms\Get $get) => in_array($get('content_type'), ['video', 'both'])),
                        
                        FileUpload::make('infographic_image')
                            ->label('صورة الرسم البياني')
                            ->image()
                            ->imageEditor()
                            ->directory('pandemic-alerts/infographics')
                            ->visibility('public')
                            ->visible(fn (Forms\Get $get) => in_array($get('content_type'), ['infographic', 'both'])),
                        
                        FileUpload::make('audio_message')
                            ->label('الرسالة الصوتية')
                            ->acceptedFileTypes(['audio/*'])
                            ->directory('pandemic-alerts/audio')
                            ->visibility('public'),
                        
                        Textarea::make('safety_procedures')
                            ->label('إجراءات السلامة')
                            ->required()
                            ->rows(4)
                            ->placeholder('اكتب إجراءات السلامة المطلوبة...'),
                    ])
                    ->columns(2),
                
                Section::make('تفاصيل إضافية')
                    ->schema([
                        TextInput::make('health_authority')
                            ->label('الجهة الصحية المسؤولة')
                            ->placeholder('وزارة الصحة والسكان'),
                        
                        DatePicker::make('alert_date')
                            ->label('تاريخ التنبيه')
                            ->format('Y-m-d')
                            ->default(now()),
                        
                        DatePicker::make('expiry_date')
                            ->label('تاريخ انتهاء التنبيه')
                            ->format('Y-m-d')
                            ->placeholder('اختر التاريخ'),
                        
                        Textarea::make('target_areas')
                            ->label('المناطق المستهدفة')
                            ->placeholder('مثال: جميع المحافظات، القاهرة والجيزة...')
                            ->rows(2),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ViewColumn::make('thumbnail')
                    ->label('الصورة')
                    ->view('filament.tables.columns.pandemic-alert-thumbnail')
                    ->width('80px')
                    ->alignCenter(),
                
                TextColumn::make('title')
                    ->label('عنوان التنبيه')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->limit(50),
                
                TextColumn::make('alert_level_arabic')
                    ->label('مستوى التنبيه')
                    ->badge()
                    ->color(fn ($record) => $record->alert_level_color)
                    ->icon(fn ($record) => $record->alert_level_icon),
                
                TextColumn::make('content_type_arabic')
                    ->label('نوع المحتوى')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'فيديو' => 'info',
                        'رسم بياني' => 'success',
                        'فيديو ورسم بياني' => 'warning',
                        default => 'gray',
                    }),
                
                TextColumn::make('health_authority')
                    ->label('الجهة المسؤولة')
                    ->searchable()
                    ->limit(30)
                    ->placeholder('غير محدد'),
                
                TextColumn::make('alert_date')
                    ->label('تاريخ التنبيه')
                    ->date('Y-m-d')
                    ->sortable()
                    ->placeholder('غير محدد'),
                
                TextColumn::make('expiry_date')
                    ->label('تاريخ الانتهاء')
                    ->date('Y-m-d')
                    ->sortable()
                    ->placeholder('لا ينتهي')
                    ->color(fn ($record) => $record->expiry_date && $record->expiry_date->isPast() ? 'danger' : 'success'),
                
                TextColumn::make('alert_status')
                    ->label('حالة التنبيه')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'نشط' => 'success',
                        'غير نشط' => 'warning',
                        'منتهي الصلاحية' => 'danger',
                        default => 'gray',
                    }),
                
                TextColumn::make('video_url')
                    ->label('الفيديو')
                    ->url(fn ($record) => $record->video_url)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-play')
                    ->limit(0)
                    ->formatStateUsing(fn ($state) => $state ? 'مشاهدة' : 'غير متوفر')
                    ->color('primary'),
                
                TextColumn::make('audio_message')
                    ->label('الرسالة الصوتية')
                    ->formatStateUsing(fn ($state) => $state ? 'متوفر' : 'غير متوفر')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'gray')
                    ->icon('heroicon-o-speaker-wave'),
                
                TextColumn::make('target_areas')
                    ->label('المناطق المستهدفة')
                    ->limit(30)
                    ->placeholder('جميع المناطق')
                    ->toggleable(isToggledHiddenByDefault: true),
                
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('alert_level')
                    ->label('مستوى التنبيه')
                    ->options([
                        'low' => 'منخفض',
                        'medium' => 'متوسط',
                        'high' => 'عالي',
                        'critical' => 'حرج',
                    ]),
                
                Tables\Filters\SelectFilter::make('content_type')
                    ->label('نوع المحتوى')
                    ->options([
                        'video' => 'فيديو',
                        'infographic' => 'رسم بياني',
                        'both' => 'فيديو ورسم بياني',
                    ]),
                
                Tables\Filters\SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'active' => 'نشط',
                        'inactive' => 'غير نشط',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('تعديل')
                    ->color('info'),
                Tables\Actions\DeleteAction::make()
                    ->label('حذف')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('حذف المحدد'),
                ]),
            ])
            ->defaultSort('alert_date', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100])
            ->poll('30s');
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
            'index' => Pages\ListPandemicAlerts::route('/'),
            'create' => Pages\CreatePandemicAlert::route('/create'),
            'edit' => Pages\EditPandemicAlert::route('/{record}/edit'),
        ];
    }
}
