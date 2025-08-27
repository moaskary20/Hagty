<?php

namespace App\Providers\Filament;

use App\Models\Setting;
use App\Services\ColorService;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // الحصول على الإعدادات الديناميكية مع التعامل مع عدم وجود الجدول
        try {
            $siteName = Setting::get('site_name', 'منصة HAGTY');
            $logoPath = Setting::get('site_logo', 'images/hagty-logo.png');
            $primaryColor = Setting::get('primary_color', '#eb6fab');
        } catch (\Exception $e) {
            // القيم الافتراضية في حالة عدم وجود جدول settings
            $siteName = 'منصة HAGTY';
            $logoPath = 'images/hagty-logo.png';
            $primaryColor = '#eb6fab';
        }
        
        // تحويل اللون إلى مصفوفة تدرجات
        try {
            $colorShades = $this->generateColorShades($primaryColor);
            // التأكد من أن النتيجة مصفوفة صالحة
            if (!is_array($colorShades) || empty($colorShades)) {
                $colorShades = $this->generateColorShades('#eb6fab');
            }
        } catch (\Exception $e) {
            // في حالة حدوث خطأ، استخدام ألوان افتراضية
            $colorShades = [
                50 => '#fdf2f8',
                100 => '#fce7f3',
                200 => '#fbcfe8',
                300 => '#f9a8d4',
                400 => '#f472b6',
                500 => '#eb6fab',
                600 => '#db2777',
                700 => '#be185d',
                800 => '#9d174d',
                900 => '#831843',
            ];
        }
        
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => $colorShades,
            ])
            ->brandName($siteName)
            ->brandLogo(asset($logoPath))
            ->brandLogoHeight('3rem')
            ->favicon(asset($logoPath))
            ->darkMode(false)
            ->sidebarCollapsibleOnDesktop()
            ->renderHook(
                'panels::styles.before',
                function () use ($primaryColor) {
                    // التحقق من صحة اللون قبل المعالجة
                    if (!is_string($primaryColor) || empty($primaryColor)) {
                        $primaryColor = '#eb6fab';
                    }
                    return $this->getCustomStyles($primaryColor);
                }
            )
            ->renderHook(
                'panels::body.start',
                fn () => '<script>
                    document.documentElement.setAttribute("dir", "rtl"); 
                    document.documentElement.setAttribute("lang", "ar");
                    
                    // إخفاء عناصر التوثيق بعد تحميل الصفحة
                    document.addEventListener("DOMContentLoaded", function() {
                        // إخفاء روابط GitHub والوثائق
                        const elementsToHide = document.querySelectorAll(\'[href*="github"], [href*="filament"], [title*="GitHub"], [title*="Documentation"]\');
                        elementsToHide.forEach(element => {
                            element.style.display = "none";
                            if (element.parentElement) {
                                element.parentElement.style.display = "none";
                            }
                        });
                        
                        // إخفاء العناصر في شريط التنقل العلوي
                        const topbarItems = document.querySelectorAll(\'.fi-topbar-item\');
                        topbarItems.forEach(item => {
                            const links = item.querySelectorAll(\'a[href*="github"], a[href*="filament"]\');
                            if (links.length > 0) {
                                item.style.display = "none";
                            }
                        });
                    });
                </script>'
            )
            ->navigationGroups([
                'إدارة النظام',
                'المحتوى', 
                'التقارير',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
    
    /**
     * توليد تدرجات الألوان من لون أساسي
     */
    private function generateColorShades($hex)
    {
        // التأكد من صحة المدخلات
        if (!is_string($hex) || empty($hex)) {
            $hex = '#eb6fab';
        }
        
        // إزالة الهاش إذا كان موجوداً
        $hex = ltrim($hex, '#');
        
        // التأكد من أن الهكس صالح
        if (!preg_match('/^[a-fA-F0-9]{6}$/', $hex)) {
            $hex = 'eb6fab'; // لون افتراضي
        }
        
        // تحويل إلى RGB
        $hexArray = str_split($hex, 2);
        if (!is_array($hexArray) || count($hexArray) !== 3) {
            $hexArray = ['eb', '6f', 'ab']; // RGB افتراضي
        }
        
        $rgb = array_map('hexdec', $hexArray);
        if (!is_array($rgb) || count($rgb) !== 3) {
            $rgb = [235, 111, 171]; // RGB افتراضي
        }
        
        // إنشاء مصفوفة التدرجات
        $shades = [];
        
        try {
            $shades[50] = $this->lighten($rgb, 0.95);
            $shades[100] = $this->lighten($rgb, 0.90);
            $shades[200] = $this->lighten($rgb, 0.75);
            $shades[300] = $this->lighten($rgb, 0.60);
            $shades[400] = $this->lighten($rgb, 0.30);
            $shades[500] = '#' . $hex; // اللون الأساسي
            $shades[600] = $this->darken($rgb, 0.20);
            $shades[700] = $this->darken($rgb, 0.35);
            $shades[800] = $this->darken($rgb, 0.50);
            $shades[900] = $this->darken($rgb, 0.65);
        } catch (\Exception $e) {
            // في حالة حدوث خطأ، استخدام ألوان افتراضية
            $shades = [
                50 => '#fdf2f8',
                100 => '#fce7f3',
                200 => '#fbcfe8',
                300 => '#f9a8d4',
                400 => '#f472b6',
                500 => '#eb6fab',
                600 => '#db2777',
                700 => '#be185d',
                800 => '#9d174d',
                900 => '#831843',
            ];
        }
        
        return $shades;
    }
    
    /**
     * تفتيح اللون
     */
    private function lighten($rgb, $percent)
    {
        // التأكد من أن المصفوفة تحتوي على 3 عناصر
        if (!is_array($rgb) || count($rgb) < 3) {
            $rgb = [235, 111, 171]; // قيم افتراضية
        }
        
        $r = min(255, $rgb[0] + (255 - $rgb[0]) * $percent);
        $g = min(255, $rgb[1] + (255 - $rgb[1]) * $percent);
        $b = min(255, $rgb[2] + (255 - $rgb[2]) * $percent);
        
        return sprintf('#%02x%02x%02x', (int)$r, (int)$g, (int)$b);
    }
    
    /**
     * تغميق اللون
     */
    private function darken($rgb, $percent)
    {
        // التأكد من أن المصفوفة تحتوي على 3 عناصر
        if (!is_array($rgb) || count($rgb) < 3) {
            $rgb = [235, 111, 171]; // قيم افتراضية
        }
        
        $r = max(0, $rgb[0] * (1 - $percent));
        $g = max(0, $rgb[1] * (1 - $percent));
        $b = max(0, $rgb[2] * (1 - $percent));
        
        return sprintf('#%02x%02x%02x', (int)$r, (int)$g, (int)$b);
    }
    
    /**
     * إنشاء CSS مخصص مع اللون الديناميكي
     */
    private function getCustomStyles($primaryColor)
    {
        // التأكد من أن اللون صالح
        if (!is_string($primaryColor) || empty($primaryColor)) {
            $primaryColor = '#eb6fab';
        }
        
        try {
            $dynamicCSS = ColorService::generateDynamicCSS($primaryColor);
        } catch (\Exception $e) {
            // في حالة حدوث خطأ، استخدم CSS افتراضي
            $dynamicCSS = ColorService::generateDynamicCSS('#eb6fab');
        }
        
        return '<link rel="stylesheet" href="' . asset('css/arabic-rtl.css') . '">
        <style>' . $dynamicCSS . '</style>';
    }
}
