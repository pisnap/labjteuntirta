<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\SistemkendalidigitalExporter;
use App\Filament\Imports\SistemkendalidigitalImporter;

class Transparansiskd extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.transparansiskd';

    protected static ?string $navigationLabel = 'Nilai Sistem Kendali Digital';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-sistem-kendali-digital';

    protected static ?string $navigationGroup = 'Lab. Kendali';

    public $users;

    public function mount()
    {
        $this->users = User::with('Sistemkendalidigital')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(SistemkendalidigitalImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(SistemkendalidigitalExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
