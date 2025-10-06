<?php

namespace App\Providers\Filament;

use App\Models\Setting;
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
            $primaryColor = Setting::get('primary_color', '#A15DBF');
        } catch (\Exception $e) {
            // القيم الافتراضية في حالة عدم وجود جدول settings
            $siteName = 'منصة HAGTY';
            $logoPath = 'images/hagty-logo.png';
            $primaryColor = '#A15DBF';
        }

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => [
                    50 => '#FAD6E0',
                    100 => '#E6A0C3',
                    200 => '#B17DC0',
                    300 => '#A15DBF',
                    400 => '#A15DBF',
                    500 => '#A15DBF',
                    600 => '#A15DBF',
                    700 => '#A15DBF',
                    800 => '#A15DBF',
                    900 => '#A15DBF',
                    950 => '#A15DBF',
                ],
            ])
            ->brandName($siteName)
            ->brandLogo(asset($logoPath))
            ->brandLogoHeight('3rem')
            ->favicon(asset($logoPath))
            ->darkMode(false)
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth('full')
        ->renderHook(
            'panels::styles.before',
            fn () => '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;600;700&display=swap">
            <link rel="stylesheet" href="' . asset('css/arabic-rtl.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-full-viewport.css') . '">
            <link rel="stylesheet" href="' . asset('css/filament-custom.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-custom.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-final-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-modern-design.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-animations.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-advanced-ui.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-final-enhancements.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-design.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-enhancements.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-final.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-final-design.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-final-design-ultimate.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-final-design-ultimate-final.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-final-design-ultimate-final-ultimate.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-final-design-ultimate-final-ultimate-final.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-final-design-ultimate-final-ultimate-final-ultimate.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-ultimate-final-design-ultimate-final-ultimate-final-ultimate-final.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-title-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-title-spacing-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-font-clarity-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-title-specific-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-title-ultimate-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-title-final-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-title-super-final-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-title-ultra-final-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-title-complete-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-sidebar-enhancements.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-sidebar-hover-colors.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-sidebar-force-hover-colors.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-sidebar-remove-white-hover.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-sidebar-active-hover-color.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-sidebar-remove-active-white-bar.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-full-width.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-delete-buttons-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-delete-buttons-ultimate-fix.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-sidebar-force-remove-white-bar.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-sidebar-ultimate-remove-white.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-sidebar-full-width.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-disable-animations.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-login-design.css') . '">
            <link rel="stylesheet" href="' . asset('css/admin-login-enhancements.css') . '">'
        )
            ->renderHook(
                'panels::body.end',
                fn () => '<script src="' . asset('js/admin-delete-buttons-fix.js') . '"></script>
                <script src="' . asset('js/admin-delete-buttons-ultimate-fix.js') . '"></script>'
            )
            ->renderHook(
                'panels::head.end',
                fn () => '<meta http-equiv="Content-Security-Policy" content="default-src \'self\'; script-src \'self\' \'unsafe-inline\' \'unsafe-eval\' https:; style-src \'self\' \'unsafe-inline\' https:; img-src \'self\' data: https:; font-src \'self\' https:; connect-src \'self\' https:; frame-src \'self\' https:;">'
            )
            ->renderHook(
                'panels::body.start',
                fn () => '<script>
                    document.documentElement.setAttribute("dir", "rtl"); 
                    document.documentElement.setAttribute("lang", "ar");
                    document.documentElement.classList.add("admin-panel-disable-animations");
                    
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
        ->renderHook(
            'panels::body.end',
            fn () => '<script src="' . asset('js/admin-enhancements.js') . '"></script>
            <script src="' . asset('js/admin-advanced-interactions.js') . '"></script>
            <script src="' . asset('js/admin-ultimate-interactions.js') . '"></script>
            <script src="' . asset('js/admin-ultimate-final.js') . '"></script>
            <script src="' . asset('js/admin-ultimate-final-interactions.js') . '"></script>
            <script src="' . asset('js/admin-ultimate-final-design.js') . '"></script>
            <script src="' . asset('js/admin-ultimate-final-design-ultimate.js') . '"></script>
            <script src="' . asset('js/admin-ultimate-final-design-ultimate-final.js') . '"></script>
            <script src="' . asset('js/admin-ultimate-final-design-ultimate-final-ultimate.js') . '"></script>
            <script src="' . asset('js/admin-ultimate-final-design-ultimate-final-ultimate-final.js') . '"></script>
            <script src="' . asset('js/admin-ultimate-final-design-ultimate-final-ultimate-final-ultimate.js') . '"></script>
            <script src="' . asset('js/admin-sidebar-interactions.js') . '"></script>
            <script src="' . asset('js/admin-sidebar-remove-white-bar.js') . '"></script>'
        )
            ->navigationGroups([
                'إدارة النظام',
                'المحتوى', 
                'التقارير',
                'صحتي',
                'اكسسوراتي',
                'عالم الموضة',
                'جمالي',
                'فرحي',
                'رحلتي',
                'أومومتي',
                'عائلتى',
                'مطبخي',
                'بزاراتي',
                'ايفينتاتى',
                'فورصى',
                'هديتي',
                'بيتي',
                'حساباتى',
                'رياضتي',
                'مشروعي',
                'مستشاري',
                'مستمعي',
                'نساء الغد',
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
}
