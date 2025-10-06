<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MashroayVideoResource\Pages;
use App\Filament\Resources\MashroayVideoResource\RelationManagers;
use App\Models\MashroayVideo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MashroayVideoResource extends BaseResource
{
    protected static ?string $model = MashroayVideo::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationLabel = 'إعلانات الفيديو';
    protected static ?string $navigationGroup = 'مشروعي';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الفيديو الإعلاني')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان الفيديو')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('video_url')
                            ->label('رابط الفيديو (YouTube, Vimeo)')
                            ->url()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('https://www.youtube.com/watch?v=...')
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
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(60),
                
                Tables\Columns\TextColumn::make('video_url')
                    ->label('رابط الفيديو')
                    ->limit(50)
                    ->copyable()
                    ->tooltip('انقر للنسخ'),
                
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
            'index' => Pages\ListMashroayVideos::route('/'),
            'create' => Pages\CreateMashroayVideo::route('/create'),
            'edit' => Pages\EditMashroayVideo::route('/{record}/edit'),
        ];
    }
}
