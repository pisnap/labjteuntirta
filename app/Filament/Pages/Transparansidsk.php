<?php

namespace App\Filament\Pages;

use App\Filament\Exports\DasarsistemkendaliExporter;
use App\Filament\Imports\DasarsistemkendaliImporter;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;

class Transparansidsk extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.transparansidsk';

    protected static ?string $navigationLabel = 'Nilai Dasar Sistem Kendali';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-dasar-sistem-kendali';

    protected static ?string $navigationGroup = 'Lab. Kendali';

    public $users;

    public function mount()
    {
        $this->users = User::with('Dasarsistemkendali')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(DasarsistemkendaliImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(DasarsistemkendaliExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
