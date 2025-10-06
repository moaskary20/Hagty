<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends BaseResource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationLabel = 'إعدادات اللوجو';
    
    protected static ?string $navigationGroup = 'إدارة النظام';
    
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('تغيير لوجو الموقع')
                    ->description('ارفع لوجو جديد للموقع')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Forms\Components\Hidden::make('key')
                            ->default('site_logo'),
                        
                        Forms\Components\Hidden::make('type')
                            ->default('image'),
                        
                        Forms\Components\Hidden::make('group')
                            ->default('branding'),
                        
                        Forms\Components\FileUpload::make('value')
                            ->label('اللوجو الجديد')
                            ->image()
                            ->directory('logos')
                            ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg'])
                            ->maxSize(2048) // 2MB
                            ->helperText('حجم الملف الأقصى: 2 ميجابايت. الصيغ المدعومة: PNG, JPG, JPEG')
                            ->imagePreviewHeight('4rem')
                            ->extraAttributes(['style' => 'height: 4rem;'])
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('key', 'site_logo'))
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('نوع الإعداد')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(fn (string $state): string => 'لوجو الموقع'),
                
                Tables\Columns\ImageColumn::make('value')
                    ->label('اللوجو الحالي')
                    ->height(64) // 4rem = 64px
                    ->extraAttributes(['style' => 'height: 4rem; max-height: 4rem;'])
                    ->defaultImageUrl(asset('images/no-image.svg'))
                    ->getStateUsing(function ($record) {
                        if ($record && $record->value) {
                            // إرجاع المسار الكامل
                            return asset($record->value);
                        }
                        return asset('images/no-image.svg');
                    }),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->color('white'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('تغيير اللوجو')
                    ->color('primary')
                    ->icon('heroicon-o-pencil'),
            ])
            ->bulkActions([
                // لا توجد bulk actions لمنع الحذف
            ])
            ->emptyStateHeading('لا يوجد لوجو')
            ->emptyStateDescription('ابدأ برفع لوجو للموقع')
            ->emptyStateIcon('heroicon-o-photo')
            ->paginated(false);
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
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
            'branding' => Pages\BrandingSettings::route('/branding'),
        ];
    }

    // دالة مخصصة للحفظ
    public static function handleRecordUpdate($record, array $data): Setting
    {
        // إذا تم رفع ملف جديد
        if (isset($data['value']) && !empty($data['value'])) {
            // إضافة storage/ للمسار
            $data['value'] = 'storage/' . $data['value'];
        }
        
        $record->update($data);
        
        return $record;
    }
}