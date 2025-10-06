<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiadatyExerciseVideoResource\Pages;
use App\Filament\Resources\RiadatyExerciseVideoResource\RelationManagers;
use App\Models\RiadatyExerciseVideo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiadatyExerciseVideoResource extends BaseResource
{
    protected static ?string $model = RiadatyExerciseVideo::class;

    protected static ?string $navigationIcon = 'heroicon-o-play-circle';
    protected static ?string $navigationLabel = 'فيديوهات التمارين';
    protected static ?string $navigationGroup = 'رياضتي';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الفيديو')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان الفيديو')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('وصف الفيديو')
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('video_url')
                            ->label('رابط الفيديو (YouTube, Vimeo)')
                            ->url()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('exercise_type')
                            ->label('نوع التمرين')
                            ->options([
                                'بطن' => 'بطن',
                                'أرداف' => 'أرداف',
                                'أرجل' => 'أرجل',
                                'ذراعين' => 'ذراعين',
                                'ظهر' => 'ظهر',
                                'صدر' => 'صدر',
                                'كامل الجسم' => 'كامل الجسم',
                                'يوغا' => 'يوغا',
                                'كارديو' => 'كارديو',
                                'إطالة' => 'إطالة',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\Select::make('difficulty_level')
                            ->label('مستوى الصعوبة')
                            ->options([
                                'مبتدئ' => 'مبتدئ',
                                'متوسط' => 'متوسط',
                                'متقدم' => 'متقدم',
                                'محترف' => 'محترف',
                            ])
                            ->required(),
                        
                        Forms\Components\TextInput::make('duration_minutes')
                            ->label('مدة الفيديو (بالدقائق)')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(120)
                            ->suffix('دقيقة'),
                        
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('صورة مصغرة (اختياري)')
                            ->image()
                            ->directory('exercise-videos')
                            ->imageEditor()
                            ->columnSpanFull(),
                        
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
                    ->label('الصورة المصغرة')
                    ->square()
                    ->size(60)
                    ->defaultImageUrl(url('/images/no-image.svg')),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('exercise_type')
                    ->label('نوع التمرين')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('difficulty_level')
                    ->label('المستوى')
                    ->badge()
                    ->colors([
                        'success' => 'مبتدئ',
                        'warning' => 'متوسط',
                        'danger' => 'متقدم',
                        'primary' => 'محترف',
                    ]),
                
                Tables\Columns\TextColumn::make('duration_minutes')
                    ->label('المدة')
                    ->suffix(' دقيقة')
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
                Tables\Filters\SelectFilter::make('exercise_type')
                    ->label('نوع التمرين')
                    ->options([
                        'بطن' => 'بطن',
                        'أرداف' => 'أرداف',
                        'أرجل' => 'أرجل',
                        'ذراعين' => 'ذراعين',
                        'ظهر' => 'ظهر',
                        'صدر' => 'صدر',
                        'كامل الجسم' => 'كامل الجسم',
                        'يوغا' => 'يوغا',
                        'كارديو' => 'كارديو',
                        'إطالة' => 'إطالة',
                    ]),
                
                Tables\Filters\SelectFilter::make('difficulty_level')
                    ->label('مستوى الصعوبة')
                    ->options([
                        'مبتدئ' => 'مبتدئ',
                        'متوسط' => 'متوسط',
                        'متقدم' => 'متقدم',
                        'محترف' => 'محترف',
                    ]),
                
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
            'index' => Pages\ListRiadatyExerciseVideos::route('/'),
            'create' => Pages\CreateRiadatyExerciseVideo::route('/create'),
            'edit' => Pages\EditRiadatyExerciseVideo::route('/{record}/edit'),
        ];
    }
}
