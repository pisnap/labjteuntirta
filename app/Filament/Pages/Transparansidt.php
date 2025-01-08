<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\DasartelekomunikasiExporter;
use App\Filament\Imports\DasartelekomunikasiImporter;

class Transparansidt extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static string $view = 'filament.pages.transparansidt';

    protected static ?string $navigationLabel = 'Nilai Dasar Telekomunikasi';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-dasar-telekomunikasi';

    protected static ?string $navigationGroup = 'Lab. Telekomunikasi';

    public $users;

    public function mount()
    {
        $this->users = User::with('Dasartelekomunikasi')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(DasartelekomunikasiImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(DasartelekomunikasiExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
