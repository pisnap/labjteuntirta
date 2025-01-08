<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use Filament\Pages\Actions\ButtonAction;
use App\Filament\Imports\PlagiarismetdImporter;
use App\Models\Plagiarismeskd as PlagiarismeskdModel;

class Plagiarismeskd extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.plagiarismeskd';

    protected static ?string $navigationLabel = 'Plagiarisme Sistem Kendali Digital';

    protected static ?string $title = 'Daftar Plagiarisme';

    protected static ?string $slug = 'transparansi-plagiarisme-skd';

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
                    PlagiarismeskdModel::query()->delete();

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
                ->importer(PlagiarismetdImporter::class)
                ->visible(fn() => Auth::user()->role == 'Admin'),
        ];
    }
}
