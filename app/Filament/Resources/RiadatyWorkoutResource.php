<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiadatyWorkoutResource\Pages;
use App\Filament\Resources\RiadatyWorkoutResource\RelationManagers;
use App\Models\RiadatyWorkout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiadatyWorkoutResource extends Resource
{
    protected static ?string $model = RiadatyWorkout::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static ?string $navigationLabel = 'جداول التمارين';
    protected static ?string $navigationGroup = 'رياضتي';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات التمرين')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان التمرين')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('وصف التمرين')
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('workout_type')
                            ->label('نوع التمرين')
                            ->options([
                                'يوغا' => 'يوغا',
                                'كارديو' => 'كارديو',
                                'قوة' => 'قوة',
                                'شد الجسم' => 'شد الجسم',
                                'تمارين هوائية' => 'تمارين هوائية',
                                'بيلاتس' => 'بيلاتس',
                                'زومبا' => 'زومبا',
                                'تمارين منزلية' => 'تمارين منزلية',
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
                            ->label('المدة (بالدقائق)')
                            ->numeric()
                            ->required()
                            ->minValue(5)
                            ->maxValue(120)
                            ->suffix('دقيقة'),
                        
                        Forms\Components\TextInput::make('calories_burned')
                            ->label('السعرات الحرارية المحروقة')
                            ->numeric()
                            ->minValue(0)
                            ->suffix('سعرة'),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة التمرين')
                            ->image()
                            ->directory('workouts')
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
                Tables\Columns\ImageColumn::make('image')
                    ->label('الصورة')
                    ->circular()
                    ->defaultImageUrl(url('/images/no-image.svg')),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('workout_type')
                    ->label('النوع')
                    ->badge()
                    ->color('success')
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
                
                Tables\Columns\TextColumn::make('calories_burned')
                    ->label('السعرات المحروقة')
                    ->suffix(' سعرة')
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
                Tables\Filters\SelectFilter::make('workout_type')
                    ->label('نوع التمرين')
                    ->options([
                        'يوغا' => 'يوغا',
                        'كارديو' => 'كارديو',
                        'قوة' => 'قوة',
                        'شد الجسم' => 'شد الجسم',
                        'تمارين هوائية' => 'تمارين هوائية',
                        'بيلاتس' => 'بيلاتس',
                        'زومبا' => 'زومبا',
                        'تمارين منزلية' => 'تمارين منزلية',
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
            'index' => Pages\ListRiadatyWorkouts::route('/'),
            'create' => Pages\CreateRiadatyWorkout::route('/create'),
            'edit' => Pages\EditRiadatyWorkout::route('/{record}/edit'),
        ];
    }
}
