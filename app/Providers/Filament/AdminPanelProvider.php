<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use App\Filament\Pages\Auth\Login;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\URL;
use App\Filament\Pages\Auth\EditProfile;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // URL::forceScheme('https');
        return $panel
            ->default()
            ->profile(EditProfile::class)
            ->brandName('ELECTRO LAB UNTRITA')
            ->favicon(asset('/logolab.png'))
            ->breadcrumbs(false)
            ->id('admin')
            ->path('')
            ->login(Login::class)
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
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
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Lab. Dasar Elektro')
                    ->icon('heroicon-o-bolt'),
                NavigationGroup::make()
                    ->label('Lab. Kendali')
                    ->icon('heroicon-o-bolt'),
                NavigationGroup::make()
                    ->label('Lab. Komputer')
                    ->icon('heroicon-o-bolt'),
                NavigationGroup::make()
                    ->label('Lab. Telekomunikasi')
                    ->icon('heroicon-o-bolt'),
                NavigationGroup::make()
                    ->label('Lab. Tenaga')
                    ->icon('heroicon-o-bolt'),
                NavigationGroup::make()
                    ->label('Plagiarisme (Copas)')
                    ->icon('heroicon-o-exclamation-triangle'),
            ])
            ->renderHook(
                'panels::body.end',
                fn() => view('footer'),
            );
    }
}

