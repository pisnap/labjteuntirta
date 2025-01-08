<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\MesinlistrikExporter;
use App\Filament\Imports\MesinlistrikImporter;

class Transparansiml extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.transparansiml';

    protected static ?string $navigationLabel = 'Nilai Mesin Listrik';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-mesin-listrik';

    protected static ?string $navigationGroup = 'Lab. Tenaga';

    public $users;

    public function mount()
    {
        $this->users = User::with('Mesinlistrik')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(MesinlistrikImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(MesinlistrikExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
