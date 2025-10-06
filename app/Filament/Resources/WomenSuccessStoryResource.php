<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WomenSuccessStoryResource\Pages;
use App\Filament\Resources\WomenSuccessStoryResource\RelationManagers;
use App\Models\WomenSuccessStory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WomenSuccessStoryResource extends BaseResource
{
    protected static ?string $model = WomenSuccessStory::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy'; protected static ?string $navigationLabel = 'قصص نجاح'; protected static ?string $navigationGroup = 'نساء الغد'; protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات قصة النجاح')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان القصة')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('woman_name')
                            ->label('اسم السيدة')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('achievement')
                            ->label('الإنجاز')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('story')
                            ->label('القصة')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('field')
                            ->label('المجال')
                            ->options([
                                'تكنولوجيا' => 'تكنولوجيا',
                                'إدارة' => 'إدارة',
                                'ريادة أعمال' => 'ريادة أعمال',
                                'علوم' => 'علوم',
                                'فن وثقافة' => 'فن وثقافة',
                                'طب' => 'طب',
                                'تعليم' => 'تعليم',
                                'عام' => 'عام',
                            ])
                            ->searchable(),
                        
                        Forms\Components\Textarea::make('key_lessons')
                            ->label('الدروس الرئيسية')
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('women-success-stories')
                            ->columnSpanFull(),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('قصة مميزة'),
                        
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
                    ->circular(),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('woman_name')
                    ->label('الاسم')
                    ->searchable()
                    ->weight('medium'),
                
                Tables\Columns\TextColumn::make('achievement')
                    ->label('الإنجاز')
                    ->searchable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('field')
                    ->label('المجال')
                    ->badge()
                    ->color('success')
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('مميز')
                    ->boolean(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('field')
                    ->label('المجال'),
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
            'index' => Pages\ListWomenSuccessStories::route('/'),
            'create' => Pages\CreateWomenSuccessStory::route('/create'),
            'edit' => Pages\EditWomenSuccessStory::route('/{record}/edit'),
        ];
    }
}
