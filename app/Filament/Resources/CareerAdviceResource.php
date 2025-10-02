<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerAdviceResource\Pages;
use App\Filament\Resources\CareerAdviceResource\RelationManagers;
use App\Models\CareerAdvice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerAdviceResource extends Resource
{
    protected static ?string $model = CareerAdvice::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    
    protected static ?string $navigationLabel = 'النصائح المهنية';
    
    protected static ?string $modelLabel = 'نصيحة';
    
    protected static ?string $pluralModelLabel = 'النصائح المهنية';
    
    protected static ?string $navigationGroup = 'فورصى';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات النصيحة')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان النصيحة')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'السيرة الذاتية' => 'السيرة الذاتية',
                                'المقابلات' => 'المقابلات',
                                'التطوير الوظيفي' => 'التطوير الوظيفي',
                                'مهارات القيادة' => 'مهارات القيادة',
                                'التواصل الفعال' => 'التواصل الفعال',
                                'إدارة الوقت' => 'إدارة الوقت',
                                'العمل عن بعد' => 'العمل عن بعد',
                                'ريادة الأعمال' => 'ريادة الأعمال',
                                'أخرى' => 'أخرى',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('author')
                            ->label('الكاتب')
                            ->maxLength(255),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة النصيحة')
                            ->image()
                            ->directory('career-advices')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('المحتوى')
                    ->schema([
                        Forms\Components\Textarea::make('content')
                            ->label('محتوى النصيحة')
                            ->required()
                            ->rows(10)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('الإعدادات')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('نصيحة مميزة')
                            ->default(false),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                        
                        Forms\Components\TextInput::make('views')
                            ->label('عدد المشاهدات')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->dehydrated(),
                    ])
                    ->columns(3),
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
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('author')
                    ->label('الكاتب')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('views')
                    ->label('المشاهدات')
                    ->numeric()
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
                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف')
                    ->options([
                        'السيرة الذاتية' => 'السيرة الذاتية',
                        'المقابلات' => 'المقابلات',
                        'التطوير الوظيفي' => 'التطوير الوظيفي',
                        'مهارات القيادة' => 'مهارات القيادة',
                        'التواصل الفعال' => 'التواصل الفعال',
                        'إدارة الوقت' => 'إدارة الوقت',
                        'العمل عن بعد' => 'العمل عن بعد',
                        'ريادة الأعمال' => 'ريادة الأعمال',
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
            'index' => Pages\ListCareerAdvice::route('/'),
            'create' => Pages\CreateCareerAdvice::route('/create'),
            'edit' => Pages\EditCareerAdvice::route('/{record}/edit'),
        ];
    }
}
