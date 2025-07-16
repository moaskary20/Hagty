<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionResource\Pages;
use App\Filament\Resources\PermissionResource\RelationManagers;
use Spatie\Permission\Models\Permission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'التصريحات';
    protected static ?string $pluralLabel = 'كل التصريحات';
    protected static ?string $label = 'تصريح';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('اسم التصريح البرمجي')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('guard_name')
                    ->label('نوع الحماية')
                    ->default('web')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        $arabicMap = [
            // General Section Permissions
            'nutrition-section.view' => 'عرض قسم التغذية',
            'spa-section.view' => 'عرض قسم السبا',
            'training-videos.view' => 'عرض قسم الفيديوهات التدريبية',
            'plastic-surgeons.view' => 'عرض قسم جراحي التجميل',
            'beauty-shops.view' => 'عرض قسم محلات التجميل',
            'hair-stylists.view' => 'عرض قسم مصففي الشعر',
            'nail-lash-specialists.view' => 'عرض قسم الأظافر والرموش',
            'accessoraty.view' => 'عرض قسم الإكسسوارات',
            // ... باقي التصريحات ...
            // Nutrition Doctors
            'nutrition-doctors.store' => 'إضافة دكتور تغذية',
            'nutrition-doctors.tips' => 'إضافة نصيحة تغذية',
            'nutrition-doctors.videos' => 'إضافة فيديو تغذية',
            // Spa Clinics
            'spa-clinics.store' => 'إضافة عيادة سبا',
            'spa-clinics.tips' => 'إضافة نصيحة سبا',
            'spa-clinics.videos' => 'إضافة فيديو سبا',
            // Training Videos
            'training-videos.store' => 'إضافة فيديو تدريبي',
            // Nail Lash Specialists
            'nail-lash-specialists.store' => 'إضافة أخصائي أظافر ورموش',
            'nail-lash-specialists.tips' => 'إضافة نصيحة أظافر ورموش',
            'nail-lash-specialists.videos' => 'إضافة فيديو أظافر ورموش',
            // Accessoraty
            'accessoraty.shops.store' => 'إضافة متجر إكسسوارات',
            'accessoraty.shops.destroy' => 'حذف متجر إكسسوارات',
            'accessoraty.banners.store' => 'إضافة بانر إكسسوارات',
            'accessoraty.banners.destroy' => 'حذف بانر إكسسوارات',
            'accessoraty.videos.store' => 'إضافة فيديو إكسسوارات',
            'accessoraty.videos.destroy' => 'حذف فيديو إكسسوارات',
            // Hair Stylists
            'hair-stylists.store' => 'إضافة مصفف شعر',
            'hair-stylists.video.store' => 'إضافة فيديو مصفف شعر',
            'hair-stylists.destroy' => 'حذف مصفف شعر',
            'hair-stylists.video.destroy' => 'حذف فيديو مصفف شعر',
            // Beauty Shops
            'beauty-shops.store' => 'إضافة محل تجميل',
            'beauty-shops.banner.store' => 'إضافة بانر محل تجميل',
            'beauty-shops.video.store' => 'إضافة فيديو محل تجميل',
            'beauty-shops.destroy' => 'حذف محل تجميل',
            'beauty-shops.banner.destroy' => 'حذف بانر محل تجميل',
            'beauty-shops.video.destroy' => 'حذف فيديو محل تجميل',
            // Plastic Surgeons
            'plastic-surgeons.index' => 'عرض جراحي التجميل',
            'plastic-surgeons.store' => 'إضافة جراح تجميل',
            'plastic-surgeons.destroy' => 'حذف جراح تجميل',
            'plastic-surgeons.tips' => 'إضافة نصيحة تجميل',
            'plastic-surgeons.videos' => 'إضافة فيديو تجميل',
            // ... أضف باقي الروتات بنفس النمط ...
        ];
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('الرقم')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('اسم التصريح البرمجي')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('arabic_label')
                    ->label('اسم الصفحة بالعربية')
                    ->getStateUsing(function($record) use ($arabicMap) {
                        $name = $record->name;
                        if (isset($arabicMap[$name])) {
                            return $arabicMap[$name];
                        }
                        $label = str_replace(['-', '_', '.'], ' ', $name);
                        $label = ucwords($label);
                        return $label;
                    }),
                Tables\Columns\TextColumn::make('guard_name')->label('نوع الحماية')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('حذف'),
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
            'index' => Pages\ListPermissions::route('/'),
            'create' => Pages\CreatePermission::route('/create'),
            'edit' => Pages\EditPermission::route('/{record}/edit'),
        ];
    }
}
