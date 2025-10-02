<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiadatyBannerResource\Pages;
use App\Filament\Resources\RiadatyBannerResource\RelationManagers;
use App\Models\RiadatyBanner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiadatyBannerResource extends Resource
{
    protected static ?string $model = RiadatyBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'إعلانات البانر';
    protected static ?string $navigationGroup = 'رياضتي';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات البانر')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان البانر')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('banner_image')
                            ->label('صورة البانر')
                            ->image()
                            ->required()
                            ->directory('riadaty-banners')
                            ->imageEditor()
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('link_url')
                            ->label('رابط البانر')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://...')
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('display_order')
                            ->label('ترتيب العرض')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('الرقم الأصغر يظهر أولاً'),
                        
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
                Tables\Columns\ImageColumn::make('banner_image')
                    ->label('الصورة')
                    ->square()
                    ->size(80),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('display_order')
                    ->label('الترتيب')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                
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
            ->defaultSort('display_order', 'asc');
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
            'index' => Pages\ListRiadatyBanners::route('/'),
            'create' => Pages\CreateRiadatyBanner::route('/create'),
            'edit' => Pages\EditRiadatyBanner::route('/{record}/edit'),
        ];
    }
}
