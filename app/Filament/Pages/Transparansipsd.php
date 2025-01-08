<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\PengolahansinyaldigitalExporter;
use App\Filament\Imports\PengolahansinyaldigitalImporter;

class Transparansipsd extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static string $view = 'filament.pages.transparansipsd';

    protected static ?string $navigationLabel = 'Nilai Pengolahan Sinyal Digital';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-pengolahan-sinyal-digital';

    protected static ?string $navigationGroup = 'Lab. Komputer';

    public $users;

    public function mount()
    {
        $this->users = User::with('Pengolahansinyaldigital')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(PengolahansinyaldigitalImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(PengolahansinyaldigitalExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
