<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PopupNotificationResource\Pages;
use App\Filament\Resources\PopupNotificationResource\RelationManagers;
use App\Models\PopupNotification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PopupNotificationResource extends BaseResource
{
    protected static ?string $model = PopupNotification::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    
    protected static ?string $navigationLabel = 'الإشعارات ';
    
    protected static ?string $modelLabel = 'إشعار متبث';
    
    protected static ?string $pluralModelLabel = 'الإشعارات ';
    
    protected static ?string $navigationGroup = 'إدارة النظام';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الإشعار الأساسية')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان الإشعار')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\Textarea::make('content')
                            ->label('محتوى الإشعار')
                            ->columnSpanFull()
                            ->rows(4),
                        Forms\Components\Select::make('type')
                            ->label('نوع الوسائط')
                            ->required()
                            ->options([
                                'image' => 'صورة',
                                'video' => 'فيديو',
                            ])
                            ->default('image'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('الوسائط والروابط')
                    ->schema([
                        Forms\Components\FileUpload::make('media_url')
                            ->label('صورة/فيديو الإشعار')
                            ->directory('popup-notifications')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/*', 'video/*'])
                            ->maxSize(10240), // 10MB
                        Forms\Components\TextInput::make('button_text')
                            ->label('نص الزر')
                            ->maxLength(255)
                            ->placeholder('مثال: ابدأ الآن'),
                        Forms\Components\TextInput::make('button_url')
                            ->label('رابط الزر')
                            ->url()
                            ->placeholder('https://...'),
                        Forms\Components\Toggle::make('show_button')
                            ->label('إظهار الزر')
                            ->default(true),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('الإعدادات والجدولة')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                        Forms\Components\DateTimePicker::make('start_date')
                            ->label('تاريخ البداية')
                            ->displayFormat('Y-m-d H:i'),
                        Forms\Components\DateTimePicker::make('end_date')
                            ->label('تاريخ الانتهاء')
                            ->displayFormat('Y-m-d H:i'),
                        Forms\Components\TextInput::make('display_delay')
                            ->label('تأخير العرض (ثواني)')
                            ->required()
                            ->numeric()
                            ->default(3)
                            ->minValue(0)
                            ->maxValue(60),
                        Forms\Components\TextInput::make('display_duration')
                            ->label('مدة العرض (ثواني)')
                            ->required()
                            ->numeric()
                            ->default(10)
                            ->minValue(0)
                            ->maxValue(300),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('media_url')
                    ->label('الصورة/الفيديو')
                    ->size(60)
                    ->defaultImageUrl('/images/no-image.svg'),
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('type')
                    ->label('النوع')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'image' => 'success',
                        'video' => 'warning',
                    }),
                Tables\Columns\TextColumn::make('button_text')
                    ->label('نص الزر')
                    ->searchable()
                    ->limit(20),
                Tables\Columns\IconColumn::make('show_button')
                    ->label('إظهار الزر')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('display_delay')
                    ->label('التأخير (ث)')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('display_duration')
                    ->label('المدة (ث)')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('تاريخ البداية')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('تاريخ الانتهاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->color(fn ($record) => $record->end_date && $record->end_date->isPast() ? 'danger' : 'success'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
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
                    ->label('الإشعارات النشطة')
                    ->placeholder('جميع الإشعارات')
                    ->trueLabel('نشطة فقط')
                    ->falseLabel('غير نشطة'),
                Tables\Filters\TernaryFilter::make('show_button')
                    ->label('الإشعارات مع أزرار')
                    ->placeholder('جميع الإشعارات')
                    ->trueLabel('مع أزرار')
                    ->falseLabel('بدون أزرار'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation(false)
                    ->action(function ($record) {
                        try {
                            $record->delete();
                            \Filament\Notifications\Notification::make()
                                ->title('تم الحذف بنجاح')
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            \Filament\Notifications\Notification::make()
                                ->title('خطأ في الحذف: ' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(false)
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->delete();
                            }
                        }),
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
            'view' => Pages\ViewPopupNotification::route('/{record}'),
            'edit' => Pages\EditPopupNotification::route('/{record}/edit'),
        ];
    }
}
