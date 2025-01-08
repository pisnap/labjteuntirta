<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Mesinlistrik;
use App\Models\Teknikdigital;
use App\Models\Elektronikadaya;
use App\Models\Dasarelektronika;
use App\Models\Instrumenkendali;
use App\Models\Komputasinumerik;
use App\Models\Rangkaianlistrik;
use App\Models\Pengukuranlistrik;
use App\Models\Antenadanpropagasi;
use App\Models\Dasarsistemkendali;
use App\Models\Dasartelekomunikasi;
use App\Models\Sistemkendalidigital;
use App\Models\Pengolahansinyaldigital;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsMahasiswaDashboard extends BaseWidget
{
    protected static ?int $sort = -2;

    protected function getStats(): array
    {
        $totalPraktikan = User::where('role', 'User')->count();
        $totalAsisten = User::where('role', 'Admin')->count();
        $totalMahasiswaEachLab =
            Teknikdigital::count() +
            Dasarelektronika::count() +
            Pengukuranlistrik::count() +
            Instrumenkendali::count() +
            Sistemkendalidigital::count() +
            Dasarsistemkendali::count() +
            Dasartelekomunikasi::count() +
            Antenadanpropagasi::count() +
            Pengolahansinyaldigital::count() +
            Komputasinumerik::count() +
            Mesinlistrik::count() +
            Elektronikadaya::count() +
            Rangkaianlistrik::count();

        return [
            Stat::make('Total Asisten', $totalAsisten)
                ->description('Seluruh asisten pada sistem')
                ->descriptionIcon('heroicon-m-heart')
                ->color('primary'),
            Stat::make('Total Praktikan', $totalMahasiswaEachLab)
                ->description('Seluruh praktikan dari setiap lab ')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
            Stat::make('Total Mahasiswa', $totalPraktikan)
                ->description('Seluruh mahasiswa pada sistem')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('warning'),
        ];
    }
}
