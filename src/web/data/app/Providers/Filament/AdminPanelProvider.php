<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Fatimah Project Mission')
            ->brandLogo(asset('assets/img/logos/logo.png'))
            ->brandLogoHeight('2.5rem')
            ->darkModeBrandLogo(asset('assets/img/logos/logo-white.png'))
            ->favicon(asset('assets/img/favicon.png'))
            ->darkMode()
            ->topNavigation()
            ->colors([
                'primary' => Color::Teal,
                'gray' => Color::Zinc,
                'danger' => Color::Rose,
                'info' => Color::Cyan,
                'success' => Color::Emerald,
                'warning' => Color::Amber,
            ])
            ->font('DM Sans')
            ->maxContentWidth(Width::Full)
            ->navigationItems([
                NavigationItem::make('Events')
                    ->icon('heroicon-o-calendar-days')
                    ->url('#')
                    ->sort(10)
                    ->badge('Soon', 'gray'),
                NavigationItem::make('Volunteers')
                    ->icon('heroicon-o-user-group')
                    ->url('#')
                    ->sort(11)
                    ->badge('Soon', 'gray'),
                NavigationItem::make('Donations')
                    ->icon('heroicon-o-currency-dollar')
                    ->url('#')
                    ->sort(12)
                    ->badge('Soon', 'gray'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([])
            ->renderHook(
                'panels::styles.after',
                fn () => '<style>
                    /* Button-style navigation */
                    .fi-topbar { border-bottom: none !important; background: rgb(var(--gray-100)) !important; padding-top: 0.75rem !important; padding-bottom: 0.75rem !important; }
                    .fi-topbar-nav-groups { gap: 0.5rem !important; align-items: center !important; }

                    /* All nav buttons — outlined pill style */
                    .fi-topbar-item-btn {
                        font-weight: 700 !important;
                        font-size: 0.85rem !important;
                        letter-spacing: 0.03em !important;
                        text-transform: uppercase !important;
                        padding: 0.6rem 1.5rem !important;
                        border: 2px solid rgb(var(--gray-300)) !important;
                        border-radius: 9999px !important;
                        background: white !important;
                        color: rgb(var(--gray-800)) !important;
                        box-shadow: 0 2px 4px rgb(0 0 0 / 0.08) !important;
                        transition: all 0.15s ease !important;
                    }
                    .fi-topbar-item-icon { color: rgb(var(--gray-600)) !important; }

                    /* Hover */
                    .fi-topbar-item:not(.fi-active) .fi-topbar-item-btn:hover {
                        background: rgb(var(--primary-50)) !important;
                        border-color: rgb(var(--primary-400)) !important;
                        color: rgb(var(--primary-600)) !important;
                        box-shadow: 0 3px 8px rgb(0 0 0 / 0.1) !important;
                        transform: translateY(-1px);
                    }
                    .fi-topbar-item:not(.fi-active) .fi-topbar-item-btn:hover .fi-topbar-item-icon {
                        color: rgb(var(--primary-500)) !important;
                    }

                    /* Active — outlined with color, white bg */
                    .fi-topbar-item.fi-active .fi-topbar-item-btn {
                        background: white !important;
                        border-color: rgb(var(--primary-500)) !important;
                        border-width: 2.5px !important;
                        color: rgb(var(--primary-700)) !important;
                        font-weight: 800 !important;
                        box-shadow: 0 4px 14px rgb(var(--primary-500) / 0.25) !important;
                        transform: scale(1.05);
                    }
                    .fi-topbar-item.fi-active .fi-topbar-item-icon { color: rgb(var(--primary-500)) !important; }

                    /* Disabled — dashed outline, faded */
                    .fi-topbar-item-btn[href="#"] {
                        opacity: 0.35 !important;
                        pointer-events: none !important;
                        cursor: default !important;
                        border-style: dashed !important;
                        border-color: rgb(var(--gray-300)) !important;
                        background: rgb(var(--gray-50)) !important;
                        box-shadow: none !important;
                    }

                    /* Dark mode */
                    .dark .fi-topbar { background: rgb(var(--gray-900)) !important; }
                    .dark .fi-topbar-item-btn {
                        background: rgb(var(--gray-800)) !important;
                        border-color: rgb(var(--gray-600)) !important;
                        color: rgb(var(--gray-400)) !important;
                        box-shadow: 0 1px 3px rgb(0 0 0 / 0.4) !important;
                    }
                    .dark .fi-topbar-item-icon { color: rgb(var(--gray-500)) !important; }
                    .dark .fi-topbar-item:not(.fi-active) .fi-topbar-item-btn:hover {
                        background: rgb(var(--gray-700)) !important;
                        border-color: rgb(var(--primary-500)) !important;
                        color: rgb(var(--primary-400)) !important;
                    }
                    .dark .fi-topbar-item.fi-active .fi-topbar-item-btn {
                        background: rgb(var(--gray-800)) !important;
                        border-color: rgb(var(--primary-400)) !important;
                        border-width: 2.5px !important;
                        color: rgb(var(--primary-300)) !important;
                    }
                    .dark .fi-topbar-item.fi-active .fi-topbar-item-icon { color: rgb(var(--primary-400)) !important; }
                    .dark .fi-topbar-item-btn[href="#"] {
                        background: rgb(var(--gray-800)) !important;
                        border-color: rgb(var(--gray-700)) !important;
                    }

                    /* Cards and sections */
                    .fi-ta { border-radius: 0.75rem; overflow: hidden; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.06); }
                    .fi-section { border-radius: 0.75rem; }
                    .fi-simple-main { border-radius: 1rem; }
                </style>',
            )
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
