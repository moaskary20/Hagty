<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SelfDevelopmentSkillResource\Pages;
use App\Filament\Resources\SelfDevelopmentSkillResource\RelationManagers;
use App\Models\SelfDevelopmentSkill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SelfDevelopmentSkillResource extends BaseResource
{
    protected static ?string $model = SelfDevelopmentSkill::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap'; protected static ?string $navigationLabel = 'مهارات تطوير الذات'; protected static ?string $navigationGroup = 'مستمعي'; protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات مهارة التطوير')
                    ->schema([
                        Forms\Components\TextInput::make('skill_name')
                            ->label('اسم المهارة')
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
                                'إدارة الوقت' => 'إدارة الوقت',
                                'الثقة بالنفس' => 'الثقة بالنفس',
                                'التواصل' => 'التواصل',
                                'القيادة' => 'القيادة',
                                'الإبداع' => 'الإبداع',
                                'التوازن الحياتي' => 'التوازن الحياتي',
                                'عام' => 'عام',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\Select::make('difficulty_level')
                            ->label('مستوى الصعوبة')
                            ->options([
                                'مبتدئ' => 'مبتدئ',
                                'متوسط' => 'متوسط',
                                'متقدم' => 'متقدم',
                            ]),
                        
                        Forms\Components\Textarea::make('key_points')
                            ->label('النقاط الرئيسية')
                            ->rows(4)
                            ->placeholder('نقطة 1\nنقطة 2\nنقطة 3')
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('self-development-skills')
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
                    ->square()
                    ->size(60),
                
                Tables\Columns\TextColumn::make('skill_name')
                    ->label('اسم المهارة')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->badge()
                    ->color('info')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('difficulty_level')
                    ->label('المستوى')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'مبتدئ' => 'success',
                        'متوسط' => 'warning',
                        'متقدم' => 'danger',
                        default => 'gray',
                    }),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف'),
                Tables\Filters\SelectFilter::make('difficulty_level')
                    ->label('المستوى'),
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
            'index' => Pages\ListSelfDevelopmentSkills::route('/'),
            'create' => Pages\CreateSelfDevelopmentSkill::route('/create'),
            'edit' => Pages\EditSelfDevelopmentSkill::route('/{record}/edit'),
        ];
    }
}
