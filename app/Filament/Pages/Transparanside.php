<?php

namespace App\Filament\Pages;

use App\Filament\Exports\DasarelektronikaExporter;
use App\Filament\Imports\DasarelektronikaImporter;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;

class Transparanside extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.transparanside';

    protected static ?string $navigationLabel = 'Nilai Dasar Elektronika';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-dasar-elektronika';

    protected static ?string $navigationGroup = 'Lab. Dasar Elektro';

    public $users;

    public function mount()
    {
        $this->users = User::with('Dasarelektronika')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(DasarelektronikaImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(DasarelektronikaExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
