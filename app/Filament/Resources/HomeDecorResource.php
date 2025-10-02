<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeDecorResource\Pages;
use App\Filament\Resources\HomeDecorResource\RelationManagers;
use App\Models\HomeDecor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeDecorResource extends Resource
{
    protected static ?string $model = HomeDecor::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'ديكورات المنزل';
    protected static ?string $navigationGroup = 'بيتي';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المنتج')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان المنتج')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'لوحات فنية' => 'لوحات فنية',
                                'إكسسوارات' => 'إكسسوارات',
                                'مرايا' => 'مرايا',
                                'ساعات' => 'ساعات',
                                'مزهريات' => 'مزهريات',
                                'شموع' => 'شموع',
                                'إضاءة' => 'إضاءة',
                                'نباتات' => 'نباتات',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('price')
                            ->label('السعر (جنيه)')
                            ->numeric()
                            ->prefix('جنيه'),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('الصورة الرئيسية')
                            ->image()
                            ->directory('home-decors')
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('shop_url')
                            ->label('رابط المتجر')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('مميز')
                            ->default(false),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('معلومات البائع')
                    ->description('أدخلي معلومات البائع للتواصل (ستظهر في popup عند الضغط على "تسوق الآن")')
                    ->schema([
                        Forms\Components\TextInput::make('seller_name')
                            ->label('اسم البائع/المتجر')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('seller_phone')
                            ->label('رقم الهاتف')
                            ->tel()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('seller_whatsapp')
                            ->label('رقم واتساب')
                            ->tel()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('seller_email')
                            ->label('البريد الإلكتروني')
                            ->email()
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('seller_address')
                            ->label('العنوان')
                            ->rows(2)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('seller_description')
                            ->label('وصف البائع/المتجر')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('shop_url')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListHomeDecors::route('/'),
            'create' => Pages\CreateHomeDecor::route('/create'),
            'edit' => Pages\EditHomeDecor::route('/{record}/edit'),
        ];
    }
}
