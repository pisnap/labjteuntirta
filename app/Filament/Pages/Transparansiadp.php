<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\AntenadanpropagasiExporter;
use App\Filament\Imports\AntenadanpropagasiImporter;

class Transparansiadp extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static string $view = 'filament.pages.transparansiadp';

    protected static ?string $navigationLabel = 'Nilai Antena dan Propagasi';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-antena-dan-propagasi';

    protected static ?string $navigationGroup = 'Lab. Telekomunikasi';

    public $users;

    public function mount()
    {
        $this->users = User::with('Antenadanpropagasi')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(AntenadanpropagasiImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(AntenadanpropagasiExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
