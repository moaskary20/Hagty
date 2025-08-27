<?php

namespace App\Filament\Resources\Sehati;

use App\Filament\Resources\Sehati\GovInitiativeResource\Pages;
use App\Models\GovInitiative;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\Alignment;

class GovInitiativeResource extends Resource
{
    protected static ?string $model = GovInitiative::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    
    protected static ?string $navigationLabel = 'مبادرات الحكومة الصحية';
    
    protected static ?string $modelLabel = 'مبادرة';
    
    protected static ?string $pluralModelLabel = 'المبادرات الحكومية';
    
    protected static ?string $navigationGroup = 'صحتي';
    
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات المبادرة')
                    ->schema([
                        TextInput::make('title')
                            ->label('عنوان المبادرة')
                            ->required()
                            ->maxLength(255),
                        
                        Textarea::make('description')
                            ->label('وصف المبادرة')
                            ->required()
                            ->rows(4),
                        
                        Select::make('content_type')
                            ->label('نوع المحتوى')
                            ->options([
                                'video' => 'فيديو',
                                'infographic' => 'إنفوجرافيك',
                                'both' => 'فيديو وإنفوجرافيك',
                            ])
                            ->required()
                            ->default('video')
                            ->live(),
                        
                        TextInput::make('video_url')
                            ->label('رابط الفيديو')
                            ->url()
                            ->placeholder('https://youtube.com/watch?v=...')
                            ->visible(fn (Forms\Get $get) => in_array($get('content_type'), ['video', 'both'])),
                        
                        FileUpload::make('infographic_image')
                            ->label('صورة الإنفوجرافيك')
                            ->image()
                            ->imageEditor()
                            ->directory('gov-initiatives/infographics')
                            ->visibility('public')
                            ->visible(fn (Forms\Get $get) => in_array($get('content_type'), ['infographic', 'both'])),
                        
                        FileUpload::make('thumbnail')
                            ->label('صورة مصغرة')
                            ->image()
                            ->imageEditor()
                            ->directory('gov-initiatives/thumbnails')
                            ->visibility('public'),
                    ])
                    ->columns(2),
                
                Section::make('تفاصيل إضافية')
                    ->schema([
                        TextInput::make('government_entity')
                            ->label('الجهة الحكومية المسؤولة')
                            ->placeholder('مثال: وزارة الصحة والسكان'),
                        
                        DatePicker::make('launch_date')
                            ->label('تاريخ الإطلاق')
                            ->format('Y-m-d'),
                        
                        Textarea::make('target_audience')
                            ->label('الفئة المستهدفة')
                            ->placeholder('مثال: جميع المواطنين، الأطفال، كبار السن...')
                            ->rows(2),
                        
                        Select::make('status')
                            ->label('حالة المبادرة')
                            ->options([
                                'active' => 'نشطة',
                                'inactive' => 'غير نشطة',
                            ])
                            ->required()
                            ->default('active'),
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
                    ->view('filament.tables.columns.gov-initiative-thumbnail')
                    ->width('80px')
                    ->alignCenter(),
                
                TextColumn::make('title')
                    ->label('عنوان المبادرة')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->limit(50),
                
                TextColumn::make('content_type_arabic')
                    ->label('نوع المحتوى')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'فيديو' => 'info',
                        'إنفوجرافيك' => 'success',
                        'فيديو وإنفوجرافيك' => 'warning',
                        default => 'gray',
                    }),
                
                TextColumn::make('government_entity')
                    ->label('الجهة المسؤولة')
                    ->searchable()
                    ->limit(30)
                    ->placeholder('غير محدد'),
                
                TextColumn::make('launch_date')
                    ->label('تاريخ الإطلاق')
                    ->date('Y-m-d')
                    ->sortable()
                    ->placeholder('غير محدد'),
                
                TextColumn::make('status_arabic')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'نشطة' => 'success',
                        'غير نشطة' => 'danger',
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
                
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('content_type')
                    ->label('نوع المحتوى')
                    ->options([
                        'video' => 'فيديو',
                        'infographic' => 'إنفوجرافيك',
                        'both' => 'فيديو وإنفوجرافيك',
                    ]),
                
                Tables\Filters\SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'active' => 'نشطة',
                        'inactive' => 'غير نشطة',
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
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListGovInitiatives::route('/'),
            'create' => Pages\CreateGovInitiative::route('/create'),
            'edit' => Pages\EditGovInitiative::route('/{record}/edit'),
        ];
    }
}
