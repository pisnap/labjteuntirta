<?php

namespace App\Filament\Imports;

use App\Models\Sistemkendalidigital;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class SistemkendalidigitalImporter extends Importer
{
    protected static ?string $model = Sistemkendalidigital::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nim')
                ->label('NIM')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('name')
                ->label('Nama')
                ->requiredMapping()
                ->rules(['required', 'max:50']),
            ImportColumn::make('pract_group')
                ->label('Kelompok')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('report_1')
                ->label('laporan Unit 1')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('pract_1')
                ->label('Praktikum Unit 1')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('total_1')
                ->label('Total Unit 1')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('report_2')
                ->label('laporan Unit 2')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('pract_2')
                ->label('Praktikum Unit 2')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('total_2')
                ->label('Total Unit 2')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('report_3')
                ->label('laporan Unit 3')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('pract_3')
                ->label('Praktikum Unit 3')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('total_3')
                ->label('Total Unit 3')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('report_4')
                ->label('laporan Unit 4')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('pract_4')
                ->label('Praktikum Unit 4')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('total_4')
                ->label('Total Unit 4')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('report_5')
                ->label('laporan Unit 5')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('pract_5')
                ->label('Praktikum Unit 5')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('total_5')
                ->label('Total Unit 5')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('report_6')
                ->label('laporan Unit 6')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('pract_6')
                ->label('Praktikum Unit 6')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('total_6')
                ->label('Total Unit 6')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('report_7')
                ->label('laporan Unit 7')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('pract_7')
                ->label('Praktikum Unit 7')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('total_7')
                ->label('Total Unit 7')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('report_8')
                ->label('laporan Unit 8')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('pract_8')
                ->label('Praktikum Unit 8')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('total_8')
                ->label('Total Unit 8')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('total_score')
                ->label('Total')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('resp')
                ->label('Responsi')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('final_score')
                ->label('Nilai Akhir')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('grade')
                ->label('Grade')
                ->rules(['max:3']),
            ImportColumn::make('attend_sos')
                ->label('Sosialisasi')
                ->numeric()
                ->rules(['integer']),
        ];
    }

    public function resolveRecord(): ?Sistemkendalidigital
    {
        return Sistemkendalidigital::firstOrNew([
            // Update existing records, matching them by `$this->data['column_name']`
            'nim' => $this->data['nim'],
        ]);

        return new Sistemkendalidigital();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
