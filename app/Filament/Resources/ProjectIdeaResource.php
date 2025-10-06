<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectIdeaResource\Pages;
use App\Filament\Resources\ProjectIdeaResource\RelationManagers;
use App\Models\ProjectIdea;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectIdeaResource extends BaseResource
{
    protected static ?string $model = ProjectIdea::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $navigationLabel = 'أفكار المشاريع';
    protected static ?string $navigationGroup = 'مشروعي';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المشروع')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان المشروع')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('وصف المشروع')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'تجارة إلكترونية' => 'تجارة إلكترونية',
                                'خدمات' => 'خدمات',
                                'طعام ومشروبات' => 'طعام ومشروبات',
                                'تكنولوجيا' => 'تكنولوجيا',
                                'تعليم' => 'تعليم',
                                'صحة وجمال' => 'صحة وجمال',
                                'حرف يدوية' => 'حرف يدوية',
                                'أزياء وموضة' => 'أزياء وموضة',
                                'استشارات' => 'استشارات',
                                'أخرى' => 'أخرى',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('budget_range')
                            ->label('نطاق الميزانية')
                            ->placeholder('مثال: 5,000 - 15,000 جنيه')
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('target_audience')
                            ->label('الفئة المستهدفة')
                            ->rows(3)
                            ->placeholder('مثال: النساء من 25-45 سنة، الأمهات، المهتمات بالجمال')
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('key_features')
                            ->label('المميزات الرئيسية')
                            ->rows(4)
                            ->placeholder('أهم مميزات وفوائد المشروع')
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة المشروع')
                            ->image()
                            ->directory('project-ideas')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('الإعدادات')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('مشروع مميز')
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
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->badge()
                    ->color('info')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('budget_range')
                    ->label('الميزانية')
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
                        'تجارة إلكترونية' => 'تجارة إلكترونية',
                        'خدمات' => 'خدمات',
                        'طعام ومشروبات' => 'طعام ومشروبات',
                        'تكنولوجيا' => 'تكنولوجيا',
                        'تعليم' => 'تعليم',
                        'صحة وجمال' => 'صحة وجمال',
                        'حرف يدوية' => 'حرف يدوية',
                        'أزياء وموضة' => 'أزياء وموضة',
                        'استشارات' => 'استشارات',
                        'أخرى' => 'أخرى',
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
            'index' => Pages\ListProjectIdeas::route('/'),
            'create' => Pages\CreateProjectIdea::route('/create'),
            'edit' => Pages\EditProjectIdea::route('/{record}/edit'),
        ];
    }
}
