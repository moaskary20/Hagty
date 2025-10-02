<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessAdviceResource\Pages;
use App\Filament\Resources\BusinessAdviceResource\RelationManagers;
use App\Models\BusinessAdvice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BusinessAdviceResource extends Resource
{
    protected static ?string $model = BusinessAdvice::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'نصائح ريادة الأعمال';
    protected static ?string $navigationGroup = 'مشروعي';
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
                        
                        Forms\Components\Textarea::make('content')
                            ->label('محتوى النصيحة')
                            ->required()
                            ->rows(10)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'البداية' => 'البداية',
                                'تسويق' => 'تسويق',
                                'إدارة' => 'إدارة',
                                'مالية' => 'مالية',
                                'قانونية' => 'قانونية',
                                'تطوير منتج' => 'تطوير منتج',
                                'خدمة العملاء' => 'خدمة العملاء',
                                'نمو وتوسع' => 'نمو وتوسع',
                                'تمويل' => 'تمويل',
                                'عامة' => 'عامة',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('author')
                            ->label('الكاتب/الخبير')
                            ->maxLength(255)
                            ->placeholder('د. سارة محمد'),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة النصيحة')
                            ->image()
                            ->directory('business-advice')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('الإعدادات')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('نصيحة مميزة')
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
                    ->color('primary')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('author')
                    ->label('الكاتب')
                    ->searchable()
                    ->limit(30),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('مميز')
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
                        'البداية' => 'البداية',
                        'تسويق' => 'تسويق',
                        'إدارة' => 'إدارة',
                        'مالية' => 'مالية',
                        'قانونية' => 'قانونية',
                        'تطوير منتج' => 'تطوير منتج',
                        'خدمة العملاء' => 'خدمة العملاء',
                        'نمو وتوسع' => 'نمو وتوسع',
                        'تمويل' => 'تمويل',
                        'عامة' => 'عامة',
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('مميز'),
                
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
            'index' => Pages\ListBusinessAdvice::route('/'),
            'create' => Pages\CreateBusinessAdvice::route('/create'),
            'edit' => Pages\EditBusinessAdvice::route('/{record}/edit'),
        ];
    }
}
