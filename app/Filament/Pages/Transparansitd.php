<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\TeknikdigitalExporter;
use App\Filament\Imports\TeknikdigitalImporter;

class Transparansitd extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static string $view = 'filament.pages.transparansitd';

    protected static ?string $navigationLabel = 'Nilai Teknik Digital';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-teknik-digital';

    protected static ?string $navigationGroup = 'Lab. Dasar Elektro';

    public $users;

    public function mount()
    {
        $this->users = User::with('Teknikdigital')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(TeknikdigitalImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(TeknikdigitalExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
