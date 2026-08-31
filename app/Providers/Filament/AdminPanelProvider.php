<?php

namespace App\Providers\Filament;

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
use Filament\Navigation\NavigationGroup;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            
            // 🎨 ألوان عصرية - تدرج أنيق
            ->colors([
                'primary' => Color::hex('#6366f1'), // بنفسجي أنيق
                'secondary' => Color::hex('#8b5cf6'),
                'gray' => Color::hex('#64748b'),
                'success' => Color::hex('#22c55e'),
                'warning' => Color::hex('#f59e0b'),
                'danger' => Color::hex('#ef4444'),
                'info' => Color::hex('#3b82f6'),
            ])
            
            // ✨ شعار مخصص ونص جانبي
            ->brandName('لوحة التحكم')
            ->brandLogo(asset('images/logo.svg'))
            ->brandLogoHeight('2.5rem')
            
            // 🎯 أيقونات جانبية حديثة
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('16rem')
            
            // 🌙 الوضع المظلم تلقائي
            ->darkMode(true)
            
            // 🔍 شريط بحث عام
            ->globalSearch(true)
            ->globalSearchKeyBindings(['ctrl+k', 'command+k'])
            
            // 📦 اكتشاف الموارد والصفحات
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
            
            // 🧩 ترتيب القوائم في مجموعات
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('الإدارة الرئيسية')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->collapsible(false),
                NavigationGroup::make()
                    ->label('المحتوى')
                    ->icon('heroicon-o-document-text'),
                NavigationGroup::make()
                    ->label('التقارير')
                    ->icon('heroicon-o-chart-bar'),
                NavigationGroup::make()
                    ->label('الإعدادات')
                    ->icon('heroicon-o-wrench-screwdriver'),
            ])
            
            // 🚀 وسائط مخصصة
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
            ])
            
            // 📱 استجابة كاملة للجوال
            ->viteTheme('resources/css/filament/admin/theme.css')
            
            // 🖨️ تخصيص الخطوط
            ->font('Tajawal')
            
            // 💡 إشعارات توست
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            
            // 🔒 تسجيل دخول مخصص
            ->loginRouteSlug('login')
            ->registration(false)
            ->passwordReset()
            ->emailVerification();
    }
}