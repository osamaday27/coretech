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
            
            // ✅ إضافة عنوان للوحة التحكم
            ->brandName('Core Tech')
            ->brandLogoHeight('2.5rem')
            
            // 🎨 ألوان عصرية
            ->colors([
                'primary' => Color::Amber,
                'secondary' => Color::Blue,
            ])
            
            // ✅ تعطيل الوضع المظلم إذا كان يسبب مشاكل
            ->darkMode(false)
            
            // 📊 اكتشاف الموارد
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
            
            // ✅ إضافة مجموعات القوائم
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('الإدارة')
                    ->icon('heroicon-o-cog'),
                NavigationGroup::make()
                    ->label('المحتوى')
                    ->icon('heroicon-o-document'),
            ])
            
            // ✅ تعطيل الإشعارات إذا كانت تسبب مشاكل
            // ->databaseNotifications()
            
            // ✅ وسائط مخصصة
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