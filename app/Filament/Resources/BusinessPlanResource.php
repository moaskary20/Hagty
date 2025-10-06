<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessPlanResource\Pages;
use App\Filament\Resources\BusinessPlanResource\RelationManagers;
use App\Models\BusinessPlan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BusinessPlanResource extends BaseResource
{
    protected static ?string $model = BusinessPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'خطط العمل';
    protected static ?string $navigationGroup = 'مشروعي';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات خطة العمل')
                    ->schema([
                        Forms\Components\TextInput::make('plan_name')
                            ->label('اسم الخطة')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('وصف الخطة')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'عام' => 'عام',
                                'تجارة إلكترونية' => 'تجارة إلكترونية',
                                'خدمات' => 'خدمات',
                                'صناعة' => 'صناعة',
                                'تكنولوجيا' => 'تكنولوجيا',
                                'مطاعم' => 'مطاعم',
                            ])
                            ->searchable(),
                        
                        Forms\Components\Textarea::make('steps')
                            ->label('خطوات التنفيذ')
                            ->rows(6)
                            ->placeholder('مثال:
1. تحليل السوق
2. الخطة المالية
3. استراتيجية التسويق
4. خطة التشغيل')
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('template_file')
                            ->label('ملف النموذج (PDF, DOC)')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->directory('business-plan-templates')
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
                Tables\Columns\TextColumn::make('plan_name')
                    ->label('اسم الخطة')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->badge()
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('template_file')
                    ->label('يحتوي ملف')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-check')
                    ->falseIcon('heroicon-o-x-mark'),
                
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
                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف'),
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
            'index' => Pages\ListBusinessPlans::route('/'),
            'create' => Pages\CreateBusinessPlan::route('/create'),
            'edit' => Pages\EditBusinessPlan::route('/{record}/edit'),
        ];
    }
}
