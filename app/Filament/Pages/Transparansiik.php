<?php

namespace App\Filament\Pages;

use App\Filament\Exports\InstrumenkendaliExporter;
use App\Filament\Imports\InstrumenkendaliImporter;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;

class Transparansiik extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.transparansiik';

    protected static ?string $navigationLabel = 'Nilai Instrumen Kendali';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-instrumen-kendali';

    protected static ?string $navigationGroup = 'Lab. Kendali';

    public $users;

    public function mount()
    {
        $this->users = User::with('Instrumenkendali')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(InstrumenkendaliImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(InstrumenkendaliExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
