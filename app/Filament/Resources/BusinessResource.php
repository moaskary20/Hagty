<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessResource\Pages;
use App\Filament\Resources\BusinessResource\RelationManagers;
use App\Models\BusinessResource as BusinessResourceModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BusinessResource extends Resource
{
    protected static ?string $model = BusinessResourceModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'الموارد والأدوات';
    protected static ?string $navigationGroup = 'مشروعي';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المورد')
                    ->schema([
                        Forms\Components\TextInput::make('resource_name')
                            ->label('اسم المورد/الأداة')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('وصف المورد')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('resource_type')
                            ->label('نوع المورد')
                            ->options([
                                'أداة' => 'أداة',
                                'كتاب' => 'كتاب',
                                'قالب' => 'قالب',
                                'دليل' => 'دليل',
                                'فيديو تعليمي' => 'فيديو تعليمي',
                                'برنامج' => 'برنامج',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'تصميم' => 'تصميم',
                                'تحليلات' => 'تحليلات',
                                'تدريب' => 'تدريب',
                                'تسويق' => 'تسويق',
                                'إدارة' => 'إدارة',
                                'مالية' => 'مالية',
                                'قانونية' => 'قانونية',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('resource_url')
                            ->label('رابط المورد')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Toggle::make('is_free')
                            ->label('مجاني')
                            ->default(true),
                        
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
                Tables\Columns\TextColumn::make('resource_name')
                    ->label('اسم المورد')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('resource_type')
                    ->label('النوع')
                    ->badge()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->badge()
                    ->color('info')
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('is_free')
                    ->label('مجاني')
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
                Tables\Filters\SelectFilter::make('resource_type')
                    ->label('نوع المورد'),
                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف'),
                Tables\Filters\TernaryFilter::make('is_free')
                    ->label('مجاني'),
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
            'index' => Pages\ListBusinesses::route('/'),
            'create' => Pages\CreateBusiness::route('/create'),
            'edit' => Pages\EditBusiness::route('/{record}/edit'),
        ];
    }
}
