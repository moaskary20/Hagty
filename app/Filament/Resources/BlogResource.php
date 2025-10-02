<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationLabel = 'المدونة';
    
    protected static ?string $navigationGroup = 'المدونة';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المقال الأساسية')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان المقال')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation !== 'create') {
                                    return;
                                }
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }),
                        
                        Forms\Components\TextInput::make('slug')
                            ->label('الرابط المختصر (Slug)')
                            ->required()
                            ->maxLength(255)
                            ->unique(Blog::class, 'slug', ignoreRecord: true)
                            ->rules(['alpha_dash']),
                        
                        Forms\Components\Textarea::make('excerpt')
                            ->label('ملخص المقال')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('content')
                            ->label('محتوى المقال')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('الصورة والتصنيف')
                    ->schema([
                        Forms\Components\FileUpload::make('featured_image')
                            ->label('الصورة المميزة')
                            ->image()
                            ->directory('blog-images')
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('section')
                            ->label('القسم المرتبط')
                            ->options([
                                'eventaty' => 'ايفينتاتى',
                                'hadiety' => 'هديتي',
                                'beity' => 'بيتي',
                                'hesabaty' => 'حساباتى',
                                'riadaty' => 'رياضتي',
                                'mashroay' => 'مشروعي',
                                'mostashary' => 'مستشاري',
                                'mostamay' => 'مستمعي',
                                'nesaa-alghad' => 'نساء الغد',
                                'accessoraty' => 'أكسسوراتى',
                                'courses' => 'الكورسات التعليمية',
                                'accessory-stores' => 'متاجر الإكسسوارات',
                                'health' => 'الصحة',
                                'babies' => 'الأطفال',
                                'wedding' => 'الزفاف',
                                'beauty' => 'الجمال',
                                'umomty' => 'أومومتي',
                                'fashion' => 'الموضة',
                                'general' => 'عام',
                            ])
                            ->searchable()
                            ->placeholder('اختر القسم المرتبط بالمقال'),
                        
                        Forms\Components\TagsInput::make('tags')
                            ->label('العلامات (Tags)')
                            ->placeholder('أضف علامات للمقال')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('معلومات المؤلف')
                    ->schema([
                        Forms\Components\TextInput::make('author_name')
                            ->label('اسم المؤلف')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('author_email')
                            ->label('بريد المؤلف الإلكتروني')
                            ->email()
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->collapsed(),
                
                Forms\Components\Section::make('إعدادات النشر')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('نشر المقال')
                            ->default(false),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('مقال مميز')
                            ->default(false),
                        
                        Forms\Components\Toggle::make('allow_comments')
                            ->label('السماح بالتعليقات')
                            ->default(true),
                        
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('تاريخ النشر')
                            ->default(now())
                            ->displayFormat('d/m/Y H:i')
                            ->native(false),
                    ])
                    ->columns(2)
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('الصورة')
                    ->square()
                    ->size(60),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('section')
                    ->label('القسم')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'eventaty' => 'success',
                        'hadiety' => 'warning',
                        'beity' => 'info',
                        'hesabaty' => 'danger',
                        'riadaty' => 'success',
                        'mashroay' => 'warning',
                        'mostashary' => 'info',
                        'mostamay' => 'danger',
                        'nesaa-alghad' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'eventaty' => 'ايفينتاتى',
                        'hadiety' => 'هديتي',
                        'beity' => 'بيتي',
                        'hesabaty' => 'حساباتى',
                        'riadaty' => 'رياضتي',
                        'mashroay' => 'مشروعي',
                        'mostashary' => 'مستشاري',
                        'mostamay' => 'مستمعي',
                        'nesaa-alghad' => 'نساء الغد',
                        'accessoraty' => 'أكسسوراتى',
                        'courses' => 'الكورسات التعليمية',
                        'accessory-stores' => 'متاجر الإكسسوارات',
                        'health' => 'الصحة',
                        'babies' => 'الأطفال',
                        'wedding' => 'الزفاف',
                        'beauty' => 'الجمال',
                        'umomty' => 'أومومتي',
                        'fashion' => 'الموضة',
                        'general' => 'عام',
                        default => $state,
                    }),
                
                Tables\Columns\TextColumn::make('author_name')
                    ->label('المؤلف')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_published')
                    ->label('منشور')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('مميز')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('views_count')
                    ->label('المشاهدات')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('published_at')
                    ->label('تاريخ النشر')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('section')
                    ->label('القسم')
                    ->options([
                        'eventaty' => 'ايفينتاتى',
                        'hadiety' => 'هديتي',
                        'beity' => 'بيتي',
                        'hesabaty' => 'حساباتى',
                        'riadaty' => 'رياضتي',
                        'mashroay' => 'مشروعي',
                        'mostashary' => 'مستشاري',
                        'mostamay' => 'مستمعي',
                        'nesaa-alghad' => 'نساء الغد',
                        'accessoraty' => 'أكسسوراتى',
                        'courses' => 'الكورسات التعليمية',
                        'accessory-stores' => 'متاجر الإكسسوارات',
                        'health' => 'الصحة',
                        'babies' => 'الأطفال',
                        'wedding' => 'الزفاف',
                        'beauty' => 'الجمال',
                        'umomty' => 'أومومتي',
                        'fashion' => 'الموضة',
                        'general' => 'عام',
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('حالة النشر')
                    ->placeholder('جميع المقالات')
                    ->trueLabel('منشور فقط')
                    ->falseLabel('غير منشور فقط'),
                
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('المقالات المميزة')
                    ->placeholder('جميع المقالات')
                    ->trueLabel('مميز فقط')
                    ->falseLabel('غير مميز فقط'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}