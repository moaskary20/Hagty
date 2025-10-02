<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HealthConsultationResource\Pages;
use App\Filament\Resources\HealthConsultationResource\RelationManagers;
use App\Models\HealthConsultation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HealthConsultationResource extends Resource
{
    protected static ?string $model = HealthConsultation::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'استشارات صحية';
    protected static ?string $navigationGroup = 'مستشاري';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الاستشارة الصحية')
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
                                'تغذية' => 'تغذية',
                                'لياقة بدنية' => 'لياقة بدنية',
                                'صحة نفسية' => 'صحة نفسية',
                                'صحة الأم والطفل' => 'صحة الأم والطفل',
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
                            ->directory('health-consultations')
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
                    ->color('success')
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
            'index' => Pages\ListHealthConsultations::route('/'),
            'create' => Pages\CreateHealthConsultation::route('/create'),
            'edit' => Pages\EditHealthConsultation::route('/{record}/edit'),
        ];
    }
}
