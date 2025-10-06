<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommunityPostResource\Pages;
use App\Filament\Resources\CommunityPostResource\RelationManagers;
use App\Models\CommunityPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommunityPostResource extends BaseResource
{
    protected static ?string $model = CommunityPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right'; protected static ?string $navigationLabel = 'منشورات المجتمع'; protected static ?string $navigationGroup = 'مستمعي'; protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المنشور')
                    ->schema([
                        Forms\Components\TextInput::make('author_name')
                            ->label('اسم الكاتب')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان المنشور')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('content')
                            ->label('محتوى المنشور')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('post_type')
                            ->label('نوع المنشور')
                            ->options([
                                'تجربة شخصية' => 'تجربة شخصية',
                                'نصيحة' => 'نصيحة',
                                'سؤال' => 'سؤال',
                                'مشاركة إنجاز' => 'مشاركة إنجاز',
                                'عام' => 'عام',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('likes_count')
                            ->label('عدد الإعجابات')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        
                        Forms\Components\TextInput::make('comments_count')
                            ->label('عدد التعليقات')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('community-posts')
                            ->columnSpanFull(),
                        
                        Forms\Components\Toggle::make('is_pinned')
                            ->label('منشور مثبت'),
                        
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
                
                Tables\Columns\TextColumn::make('author_name')
                    ->label('الكاتب')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('post_type')
                    ->label('النوع')
                    ->badge()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('likes_count')
                    ->label('❤️')
                    ->alignCenter()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_pinned')
                    ->label('مثبت')
                    ->boolean(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('post_type')
                    ->label('نوع المنشور'),
                Tables\Filters\TernaryFilter::make('is_pinned')
                    ->label('مثبت'),
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
            'index' => Pages\ListCommunityPosts::route('/'),
            'create' => Pages\CreateCommunityPost::route('/create'),
            'edit' => Pages\EditCommunityPost::route('/{record}/edit'),
        ];
    }
}
