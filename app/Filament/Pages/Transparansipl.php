<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\PengukuranlistrikExporter;
use App\Filament\Imports\PengukuranlistrikImporter;

class Transparansipl extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.transparansipl';

    protected static ?string $navigationLabel = 'Nilai Pengukuran Listrik';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-pengukuran-listrik';

    protected static ?string $navigationGroup = 'Lab. Dasar Elektro';

    public $users;

    public function mount()
    {
        $this->users = User::with('Pengukuranlistrik')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(PengukuranlistrikImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(PengukuranlistrikExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
