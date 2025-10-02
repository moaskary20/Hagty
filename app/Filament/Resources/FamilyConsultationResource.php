<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamilyConsultationResource\Pages;
use App\Filament\Resources\FamilyConsultationResource\RelationManagers;
use App\Models\FamilyConsultation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyConsultationResource extends Resource
{
    protected static ?string $model = FamilyConsultation::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'استشارات عائلية';
    protected static ?string $navigationGroup = 'مستشاري';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الاستشارة العائلية')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان الاستشارة')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('content')
                            ->label('محتوى الاستشارة')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'علاقات زوجية' => 'علاقات زوجية',
                                'تربية الأطفال' => 'تربية الأطفال',
                                'علاقات الأسرة' => 'علاقات الأسرة',
                                'حل النزاعات' => 'حل النزاعات',
                                'عام' => 'عام',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('consultant_name')
                            ->label('اسم المستشار')
                            ->maxLength(255),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('family-consultations')
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
                    ->defaultImageUrl(url('/images/default-doctor.svg')),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('consultant_name')
                    ->label('المستشار')
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
            'index' => Pages\ListFamilyConsultations::route('/'),
            'create' => Pages\CreateFamilyConsultation::route('/create'),
            'edit' => Pages\EditFamilyConsultation::route('/{record}/edit'),
        ];
    }
}
