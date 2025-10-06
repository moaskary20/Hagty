<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiadatyPlanResource\Pages;
use App\Filament\Resources\RiadatyPlanResource\RelationManagers;
use App\Models\RiadatyPlan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiadatyPlanResource extends BaseResource
{
    protected static ?string $model = RiadatyPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'خطط التدريب';
    protected static ?string $navigationGroup = 'رياضتي';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الخطة')
                    ->schema([
                        Forms\Components\TextInput::make('plan_name')
                            ->label('اسم الخطة')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('وصف الخطة')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('plan_type')
                            ->label('نوع الخطة')
                            ->options([
                                'لياقة عامة' => 'لياقة عامة',
                                'خسارة وزن' => 'خسارة وزن',
                                'بناء عضلات' => 'بناء عضلات',
                                'تحسين القوة' => 'تحسين القوة',
                                'زيادة المرونة' => 'زيادة المرونة',
                                'تحمل وقدرة' => 'تحمل وقدرة',
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
                        
                        Forms\Components\TextInput::make('duration_weeks')
                            ->label('مدة الخطة (بالأسابيع)')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->maxValue(52)
                            ->suffix('أسبوع'),
                        
                        Forms\Components\Textarea::make('schedule_details')
                            ->label('تفاصيل الجدول الأسبوعي')
                            ->rows(6)
                            ->columnSpanFull()
                            ->placeholder('مثال:
الأحد: كارديو 30 دقيقة
الاثنين: تمارين قوة
الثلاثاء: راحة
...'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('الإعدادات')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('خطة مميزة')
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
                Tables\Columns\TextColumn::make('plan_name')
                    ->label('اسم الخطة')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('plan_type')
                    ->label('النوع')
                    ->badge()
                    ->color('info')
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
                
                Tables\Columns\TextColumn::make('duration_weeks')
                    ->label('المدة')
                    ->suffix(' أسبوع')
                    ->sortable()
                    ->alignCenter(),
                
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
                Tables\Filters\SelectFilter::make('plan_type')
                    ->label('نوع الخطة')
                    ->options([
                        'لياقة عامة' => 'لياقة عامة',
                        'خسارة وزن' => 'خسارة وزن',
                        'بناء عضلات' => 'بناء عضلات',
                        'تحسين القوة' => 'تحسين القوة',
                        'زيادة المرونة' => 'زيادة المرونة',
                        'تحمل وقدرة' => 'تحمل وقدرة',
                    ]),
                
                Tables\Filters\SelectFilter::make('difficulty_level')
                    ->label('مستوى الصعوبة')
                    ->options([
                        'مبتدئ' => 'مبتدئ',
                        'متوسط' => 'متوسط',
                        'متقدم' => 'متقدم',
                        'محترف' => 'محترف',
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
            'index' => Pages\ListRiadatyPlans::route('/'),
            'create' => Pages\CreateRiadatyPlan::route('/create'),
            'edit' => Pages\EditRiadatyPlan::route('/{record}/edit'),
        ];
    }
}
