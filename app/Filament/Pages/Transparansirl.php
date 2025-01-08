<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\RangkaianlistrikExporter;
use App\Filament\Imports\RangkaianlistrikImporter;

class Transparansirl extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static string $view = 'filament.pages.transparansirl';

    protected static ?string $navigationLabel = 'Nilai Rangkaian Listrik';

    protected static ?string $title = 'Transparansi Nilai';

    protected static ?string $slug = 'transparansi-rangkaian-listrik';

    protected static ?string $navigationGroup = 'Lab. Tenaga';

    public $users;

    public function mount()
    {
        $this->users = User::with('Rangkaianlistrik')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->color('primary')
                ->label('Import Nilai')
                ->modalHeading('Import Nilai')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(RangkaianlistrikImporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
            ExportAction::make()
                ->color('primary')
                ->label('Export Nilai')
                ->modalHeading('Export Nilai')
                ->icon('heroicon-o-arrow-down-tray')
                ->exporter(RangkaianlistrikExporter::class)
                ->visible(fn () => Auth::user()->role == 'Admin'),
        ];
    }
}
