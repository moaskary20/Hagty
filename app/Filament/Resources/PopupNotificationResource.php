<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PopupNotificationResource\Pages;
use App\Filament\Resources\PopupNotificationResource\RelationManagers;
use App\Models\PopupNotification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PopupNotificationResource extends Resource
{
    protected static ?string $model = PopupNotification::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?string $navigationLabel = 'تعديل Popup Notification';
    protected static ?string $navigationGroup = 'إدارة النظام';
    protected static ?int $navigationSort = 999;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الإشعار')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('العنوان')
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('content')
                            ->label('المحتوى')
                            ->rows(3)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('type')
                            ->label('نوع الوسائط')
                            ->options([
                                'image' => 'صورة',
                                'video' => 'فيديو',
                            ])
                            ->default('image')
                            ->required()
                            ->reactive(),
                        
                        Forms\Components\FileUpload::make('media_url')
                            ->label('الملف')
                            ->image(fn ($get) => $get('type') === 'image')
                            ->acceptedFileTypes(fn ($get) => $get('type') === 'video' ? ['video/*'] : ['image/*'])
                            ->directory('popup-notifications')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('إعدادات الزر')
                    ->schema([
                        Forms\Components\Toggle::make('show_button')
                            ->label('إظهار الزر')
                            ->default(true)
                            ->reactive(),
                        
                        Forms\Components\TextInput::make('button_text')
                            ->label('نص الزر')
                            ->maxLength(255)
                            ->visible(fn ($get) => $get('show_button')),
                        
                        Forms\Components\TextInput::make('button_url')
                            ->label('رابط الزر')
                            ->url()
                            ->maxLength(255)
                            ->visible(fn ($get) => $get('show_button')),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('إعدادات التوقيت')
                    ->schema([
                        Forms\Components\DateTimePicker::make('start_date')
                            ->label('تاريخ البداية')
                            ->nullable(),
                        
                        Forms\Components\DateTimePicker::make('end_date')
                            ->label('تاريخ النهاية')
                            ->nullable(),
                        
                        Forms\Components\TextInput::make('display_delay')
                            ->label('تأخير العرض (ثواني)')
                            ->numeric()
                            ->default(3)
                            ->minValue(0),
                        
                        Forms\Components\TextInput::make('display_duration')
                            ->label('مدة العرض (ثواني)')
                            ->numeric()
                            ->default(10)
                            ->minValue(1),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('الحالة')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('media_url')
                    ->label('الوسائط')
                    ->square()
                    ->size(60),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('type')
                    ->label('النوع')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'image' => 'success',
                        'video' => 'warning',
                        default => 'gray',
                    }),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('start_date')
                    ->label('تاريخ البداية')
                    ->dateTime()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('end_date')
                    ->label('تاريخ النهاية')
                    ->dateTime()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('النوع')
                    ->options([
                        'image' => 'صورة',
                        'video' => 'فيديو',
                    ]),
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
            'index' => Pages\ListPopupNotifications::route('/'),
            'create' => Pages\CreatePopupNotification::route('/create'),
            'edit' => Pages\EditPopupNotification::route('/{record}/edit'),
        ];
    }
}
