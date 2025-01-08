<?php

namespace App\Filament\Pages;

use App\Filament\Exports\KomputasinumerikExporter;
use App\Filament\Imports\KomputasinumerikImporter;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;

class Transparansikn extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.transparansikn';

    protected static ?string $navigationLabel = 'Nilai Komputasi Numerik';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-komputasi-numerik';

    protected static ?string $navigationGroup = 'Lab. Komputer';

    public $users;

    public function mount()
    {
        $this->users = User::with('Komputasinumerik')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(KomputasinumerikImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(KomputasinumerikExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
