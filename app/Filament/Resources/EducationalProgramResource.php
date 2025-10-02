<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationalProgramResource\Pages;
use App\Filament\Resources\EducationalProgramResource\RelationManagers;
use App\Models\EducationalProgram;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationalProgramResource extends Resource
{
    protected static ?string $model = EducationalProgram::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap'; protected static ?string $navigationLabel = 'برامج تعليمية'; protected static ?string $navigationGroup = 'نساء الغد'; protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات البرنامج التعليمي')
                    ->schema([
                        Forms\Components\TextInput::make('program_name')
                            ->label('اسم البرنامج')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'قيادة' => 'قيادة',
                                'ريادة أعمال' => 'ريادة أعمال',
                                'مهارات تقنية' => 'مهارات تقنية',
                                'تطوير ذاتي' => 'تطوير ذاتي',
                                'تسويق' => 'تسويق',
                                'إدارة' => 'إدارة',
                                'عام' => 'عام',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\Select::make('level')
                            ->label('المستوى')
                            ->options([
                                'مبتدئ' => 'مبتدئ',
                                'متوسط' => 'متوسط',
                                'متقدم' => 'متقدم',
                            ]),
                        
                        Forms\Components\TextInput::make('duration_hours')
                            ->label('المدة (بالساعات)')
                            ->numeric()
                            ->minValue(0),
                        
                        Forms\Components\TextInput::make('price')
                            ->label('السعر (جنيه)')
                            ->numeric()
                            ->minValue(0)
                            ->prefix('جنيه'),
                        
                        Forms\Components\TextInput::make('instructor')
                            ->label('المدرب/المحاضر')
                            ->maxLength(255),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('educational-programs')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('website_url')
                            ->label('رابط الحجز/الموقع')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://example.com')
                            ->columnSpanFull(),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('برنامج مميز'),
                        
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
                    ->square()
                    ->size(60),
                
                Tables\Columns\TextColumn::make('program_name')
                    ->label('اسم البرنامج')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->badge()
                    ->color('primary')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('level')
                    ->label('المستوى')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'مبتدئ' => 'success',
                        'متوسط' => 'warning',
                        'متقدم' => 'danger',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('duration_hours')
                    ->label('المدة (ساعة)')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('price')
                    ->label('السعر')
                    ->money('EGP')
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('مميز')
                    ->boolean(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف'),
                Tables\Filters\SelectFilter::make('level')
                    ->label('المستوى'),
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
            'index' => Pages\ListEducationalPrograms::route('/'),
            'create' => Pages\CreateEducationalProgram::route('/create'),
            'edit' => Pages\EditEducationalProgram::route('/{record}/edit'),
        ];
    }
}
