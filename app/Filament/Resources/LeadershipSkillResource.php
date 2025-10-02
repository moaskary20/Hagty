<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadershipSkillResource\Pages;
use App\Filament\Resources\LeadershipSkillResource\RelationManagers;
use App\Models\LeadershipSkill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeadershipSkillResource extends Resource
{
    protected static ?string $model = LeadershipSkill::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group'; protected static ?string $navigationLabel = 'مهارات القيادة'; protected static ?string $navigationGroup = 'نساء الغد'; protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات مهارة القيادة')
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
                                'قيادة' => 'قيادة',
                                'إدارة' => 'إدارة',
                                'تواصل' => 'تواصل',
                                'اتخاذ القرار' => 'اتخاذ القرار',
                                'حل المشكلات' => 'حل المشكلات',
                                'بناء الفريق' => 'بناء الفريق',
                                'عام' => 'عام',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\Textarea::make('learning_points')
                            ->label('نقاط التعلم')
                            ->rows(4)
                            ->placeholder('نقطة 1 - نقطة 2 - نقطة 3')
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('practical_tips')
                            ->label('نصائح عملية')
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('leadership-skills')
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
            'index' => Pages\ListLeadershipSkills::route('/'),
            'create' => Pages\CreateLeadershipSkill::route('/create'),
            'edit' => Pages\EditLeadershipSkill::route('/{record}/edit'),
        ];
    }
}
