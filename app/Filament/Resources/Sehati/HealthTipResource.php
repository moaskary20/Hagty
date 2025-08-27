<?php

namespace App\Filament\Resources\Sehati;

use App\Filament\Resources\Sehati\HealthTipResource\Pages;
use App\Models\HealthTip;
use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class HealthTipResource extends Resource
{
    protected static ?string $model = HealthTip::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    
    protected static ?string $navigationLabel = 'نصائح صحية';
    
    protected static ?string $modelLabel = 'نصيحة صحية';
    
    protected static ?string $pluralModelLabel = 'النصائح الصحية';
    
    protected static ?string $navigationGroup = 'صحتي';
    
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات النصيحة')
                    ->schema([
                        TextInput::make('title')
                            ->label('عنوان النصيحة')
                            ->required()
                            ->maxLength(255),
                        
                        Textarea::make('description')
                            ->label('وصف مختصر')
                            ->rows(3)
                            ->maxLength(500),
                        
                        Select::make('type')
                            ->label('نوع النصيحة')
                            ->options([
                                'generic' => 'عامة',
                                'doctor_sponsored' => 'مدعومة من طبيب',
                            ])
                            ->required()
                            ->live(),
                        
                        Select::make('doctor_id')
                            ->label('الطبيب المرتبط')
                            ->relationship('doctor', 'name')
                            ->searchable()
                            ->preload()
                            ->visible(fn (callable $get) => $get('type') === 'doctor_sponsored'),
                        
                        Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                        
                        FileUpload::make('image')
                            ->label('صورة مصغرة')
                            ->image()
                            ->imageEditor()
                            ->directory('health-tips')
                            ->visibility('public'),
                    ])
                    ->columns(2),
                
                Section::make('المحتوى')
                    ->schema([
                        Select::make('content_type')
                            ->label('نوع المحتوى')
                            ->options([
                                'text' => 'نص',
                                'video' => 'فيديو',
                                'youtube_link' => 'رابط يوتيوب',
                            ])
                            ->required()
                            ->live(),
                        
                        RichEditor::make('content')
                            ->label('المحتوى')
                            ->required()
                            ->visible(fn (callable $get) => $get('content_type') === 'text'),
                        
                        TextInput::make('content')
                            ->label('رابط الفيديو')
                            ->url()
                            ->required()
                            ->visible(fn (callable $get) => $get('content_type') === 'video'),
                        
                        TextInput::make('youtube_video_id')
                            ->label('معرف فيديو اليوتيوب')
                            ->placeholder('مثال: dQw4w9WgXcQ')
                            ->helperText('يمكنك نسخ المعرف من رابط اليوتيوب')
                            ->visible(fn (callable $get) => $get('content_type') === 'youtube_link'),
                        
                        TextInput::make('content')
                            ->label('رابط اليوتيوب الكامل')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->visible(fn (callable $get) => $get('content_type') === 'youtube_link'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ViewColumn::make('image')
                    ->label('الصورة')
                    ->view('filament.tables.columns.health-tip-image')
                    ->width('80px')
                    ->alignCenter(),
                
                TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->limit(50),
                
                TextColumn::make('type')
                    ->label('النوع')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'doctor_sponsored' => 'success',
                        'generic' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'doctor_sponsored' => 'مدعومة من طبيب',
                        'generic' => 'عامة',
                        default => 'غير محدد',
                    }),
                
                TextColumn::make('doctor.name')
                    ->label('الطبيب')
                    ->searchable()
                    ->sortable()
                    ->placeholder('غير محدد'),
                
                TextColumn::make('content_type')
                    ->label('نوع المحتوى')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'text' => 'gray',
                        'video' => 'warning',
                        'youtube_link' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'text' => 'نص',
                        'video' => 'فيديو',
                        'youtube_link' => 'يوتيوب',
                        default => 'غير محدد',
                    }),
                
                TextColumn::make('views_count')
                    ->label('المشاهدات')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                
                ToggleColumn::make('is_active')
                    ->label('نشط')
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('نوع النصيحة')
                    ->options([
                        'generic' => 'عامة',
                        'doctor_sponsored' => 'مدعومة من طبيب',
                    ]),
                
                SelectFilter::make('content_type')
                    ->label('نوع المحتوى')
                    ->options([
                        'text' => 'نص',
                        'video' => 'فيديو',
                        'youtube_link' => 'رابط يوتيوب',
                    ]),
                
                TernaryFilter::make('is_active')
                    ->label('الحالة')
                    ->trueLabel('نشط')
                    ->falseLabel('غير نشط'),
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
            'index' => Pages\ListHealthTips::route('/'),
            'create' => Pages\CreateHealthTip::route('/create'),
            'edit' => Pages\EditHealthTip::route('/{record}/edit'),
        ];
    }
}
