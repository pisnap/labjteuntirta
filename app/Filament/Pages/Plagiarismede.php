<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Plagiarismede as PlagiarismedeModel;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use Filament\Pages\Actions\ButtonAction;
use App\Filament\Imports\PlagiarismeplImporter;

class Plagiarismede extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.plagiarismede';

    protected static ?string $navigationLabel = 'Plagiarisme Dasar Elektronika';

    protected static ?string $title = 'Daftar Plagiarisme';

    protected static ?string $slug = 'transparansi-plagiarisme-de';

    protected static ?string $navigationGroup = 'Plagiarisme (Copas)';

    protected function getHeaderActions(): array
    {
        return [
            ButtonAction::make('deleteAll')
                ->label('Delete All Data')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->action(function () {
                    // Menghapus semua data dari tabel plagiarisme
                    PlagiarismedeModel::query()->delete();

                    // Menampilkan pesan sukses
                    session()->flash('message', 'All plagiarism data has been deleted.');
                })
                ->requiresConfirmation() // Meminta konfirmasi sebelum penghapusan
                ->modalHeading('Are you sure you want to delete all data?')
                ->modalButton('Delete All Data')
                ->modalDescription('This action will permanently delete all plagiarism data from the system.')
                ->visible(fn() => Auth::user()->role == 'Admin'),
            ImportAction::make()
                ->color('primary')
                ->label('Import Data')
                ->modalHeading('Import Data Plagiarism')
                ->icon('heroicon-o-arrow-up-tray')
                ->importer(PlagiarismeplImporter::class)
                ->visible(fn() => Auth::user()->role == 'Admin'),
        ];
    }
}
