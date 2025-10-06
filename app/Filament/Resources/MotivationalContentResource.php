<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MotivationalContentResource\Pages;
use App\Filament\Resources\MotivationalContentResource\RelationManagers;
use App\Models\MotivationalContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MotivationalContentResource extends BaseResource
{
    protected static ?string $model = MotivationalContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles'; protected static ?string $navigationLabel = 'محتوى تحفيزي'; protected static ?string $navigationGroup = 'مستمعي'; protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المحتوى التحفيزي')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('العنوان')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('content')
                            ->label('المحتوى')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('content_type')
                            ->label('نوع المحتوى')
                            ->options([
                                'مقال' => 'مقال',
                                'اقتباس' => 'اقتباس',
                                'قصة' => 'قصة',
                                'نصيحة' => 'نصيحة',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('author')
                            ->label('الكاتب/المؤلف')
                            ->maxLength(255),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('motivational-content')
                            ->columnSpanFull(),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('مميز'),
                        
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
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('content_type')
                    ->label('النوع')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('author')
                    ->label('الكاتب')
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('مميز')
                    ->boolean(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('content_type')
                    ->label('نوع المحتوى'),
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
            'index' => Pages\ListMotivationalContents::route('/'),
            'create' => Pages\CreateMotivationalContent::route('/create'),
            'edit' => Pages\EditMotivationalContent::route('/{record}/edit'),
        ];
    }
}
