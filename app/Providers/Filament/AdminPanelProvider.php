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
            $primaryColor = Setting::get('primary_color', '#eb6fab');
        } catch (\Exception $e) {
            // القيم الافتراضية في حالة عدم وجود جدول settings
            $siteName = 'منصة HAGTY';
            $logoPath = 'images/hagty-logo.png';
            $primaryColor = '#eb6fab';
        }

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Pink,
            ])
            ->brandName($siteName)
            ->brandLogo(asset($logoPath))
            ->brandLogoHeight('3rem')
            ->favicon(asset($logoPath))
            ->darkMode(false)
            ->sidebarCollapsibleOnDesktop()
            ->renderHook(
                'panels::styles.before',
                fn () => '<link rel="stylesheet" href="' . asset('css/arabic-rtl.css') . '">'
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
