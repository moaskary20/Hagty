<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiadatyNutritionResource\Pages;
use App\Filament\Resources\RiadatyNutritionResource\RelationManagers;
use App\Models\RiadatyNutrition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiadatyNutritionResource extends Resource
{
    protected static ?string $model = RiadatyNutrition::class;

    protected static ?string $navigationIcon = 'heroicon-o-cake';
    protected static ?string $navigationLabel = 'النصائح الغذائية';
    protected static ?string $navigationGroup = 'رياضتي';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات النصيحة الغذائية')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان النصيحة')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('content')
                            ->label('محتوى النصيحة')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'قبل التمرين' => 'قبل التمرين',
                                'بعد التمرين' => 'بعد التمرين',
                                'وجبات صحية' => 'وجبات صحية',
                                'مكملات غذائية' => 'مكملات غذائية',
                                'فقدان الوزن' => 'فقدان الوزن',
                                'بناء العضلات' => 'بناء العضلات',
                                'طاقة وتحمل' => 'طاقة وتحمل',
                                'ترطيب' => 'ترطيب',
                                'نصائح عامة' => 'نصائح عامة',
                            ])
                            ->searchable(),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة النصيحة')
                            ->image()
                            ->directory('nutrition-tips')
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
                    ->weight('bold')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->badge()
                    ->color('success')
                    ->searchable(),
                
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
                    ->label('التصنيف')
                    ->options([
                        'قبل التمرين' => 'قبل التمرين',
                        'بعد التمرين' => 'بعد التمرين',
                        'وجبات صحية' => 'وجبات صحية',
                        'مكملات غذائية' => 'مكملات غذائية',
                        'فقدان الوزن' => 'فقدان الوزن',
                        'بناء العضلات' => 'بناء العضلات',
                        'طاقة وتحمل' => 'طاقة وتحمل',
                        'ترطيب' => 'ترطيب',
                        'نصائح عامة' => 'نصائح عامة',
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
            'index' => Pages\ListRiadatyNutrition::route('/'),
            'create' => Pages\CreateRiadatyNutrition::route('/create'),
            'edit' => Pages\EditRiadatyNutrition::route('/{record}/edit'),
        ];
    }
}
