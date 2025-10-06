<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventVideoResource\Pages;
use App\Models\EventVideo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;

class EventVideoResource extends BaseResource
{
    protected static ?string $model = EventVideo::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    
    protected static ?string $navigationLabel = 'إعلانات الفيديو';
    
    protected static ?string $modelLabel = 'فيديو';
    
    protected static ?string $pluralModelLabel = 'إعلانات الفيديو';
    
    protected static ?string $navigationGroup = 'ايفينتاتى';
    
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات الفيديو')
                    ->schema([
                        Forms\Components\Select::make('event_id')
                            ->label('الفعالية (اختياري)')
                            ->relationship('event', 'title')
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان الفيديو')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('video_url')
                            ->label('رابط الفيديو (YouTube, Vimeo)')
                            ->url()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('صورة مصغرة (اختياري)')
                            ->image()
                            ->directory('event-videos')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ]),

                Section::make('إعدادات العرض')
                    ->schema([
                        Forms\Components\TextInput::make('skip_after_seconds')
                            ->label('تخطي بعد (ثوانٍ)')
                            ->numeric()
                            ->default(5)
                            ->minValue(0)
                            ->maxValue(30),
                        Forms\Components\TextInput::make('display_order')
                            ->label('ترتيب العرض')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        Forms\Components\Toggle::make('is_sponsored')
                            ->label('فيديو دعائي')
                            ->default(false),
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
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('الصورة')
                    ->square()
                    ->size(60)
                    ->defaultImageUrl(url('/images/no-image.svg')),
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('event.title')
                    ->label('الفعالية')
                    ->searchable()
                    ->default('فيديو عام')
                    ->limit(30),
                Tables\Columns\TextColumn::make('skip_after_seconds')
                    ->label('تخطي بعد')
                    ->suffix(' ث')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('display_order')
                    ->label('الترتيب')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\IconColumn::make('is_sponsored')
                    ->label('دعائي')
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
                Tables\Filters\TernaryFilter::make('is_sponsored')
                    ->label('فيديو دعائي'),
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
            'index' => Pages\ListEventVideos::route('/'),
            'create' => Pages\CreateEventVideo::route('/create'),
            'edit' => Pages\EditEventVideo::route('/{record}/edit'),
        ];
    }
}
