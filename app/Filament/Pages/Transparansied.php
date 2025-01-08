<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\ElektronikadayaExporter;
use App\Filament\Imports\ElektronikadayaImporter;

class Transparansied extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static string $view = 'filament.pages.transparansied';

    protected static ?string $navigationLabel = 'Nilai Elektronika Daya';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-elektronika-daya';

    protected static ?string $navigationGroup = 'Lab. Tenaga';

    public $users;

    public function mount()
    {
        $this->users = User::with('Elektronikadaya')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(ElektronikadayaImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(ElektronikadayaExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
