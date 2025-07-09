<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Storage;

class BrandingSettings extends Page
{
    protected static string $resource = SettingResource::class;

    protected static string $view = 'filament.resources.setting-resource.pages.branding-settings';
    
    protected static ?string $navigationLabel = 'العلامة التجارية';
    
    protected static ?string $title = 'إعدادات العلامة التجارية';
    
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill([
            'site_logo' => Setting::get('site_logo'),
        ]);
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('لوجو الموقع')
                    ->description('قم برفع وتغيير لوجو الموقع')
                    ->schema([
                        FileUpload::make('site_logo')
                            ->label('لوجو الموقع')
                            ->image()
                            ->directory('logos')
                            ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])
                            ->maxSize(2048)
                            ->helperText('PNG, JPG, JPEG أو GIF - حد أقصى 2MB')
                            ->imagePreviewHeight(200)
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }
    
    public function save(): void
    {
        $data = $this->form->getState();
        
        if (!empty($data['site_logo'])) {
            // البحث عن إعداد اللوجو أو إنشاؤه
            $logoSetting = Setting::where('key', 'site_logo')->first();
            
            if (!$logoSetting) {
                // إنشاء إعداد جديد
                $logoSetting = Setting::create([
                    'key' => 'site_logo',
                    'type' => 'image',
                    'group' => 'branding',
                    'value' => 'storage/' . $data['site_logo']
                ]);
            } else {
                // تحديث الإعداد الموجود
                $logoSetting->update([
                    'value' => 'storage/' . $data['site_logo']
                ]);
            }
            
            Notification::make()
                ->title('تم حفظ اللوجو بنجاح')
                ->body('سيظهر اللوجو الجديد في جميع صفحات الموقع.')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('خطأ')
                ->body('يرجى اختيار ملف لوجو أولاً.')
                ->danger()
                ->send();
        }
            
        // إعادة تحميل البيانات
        $this->mount();
    }
    
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('حفظ اللوجو')
                ->action('save')
                ->color('primary'),
        ];
    }
}
