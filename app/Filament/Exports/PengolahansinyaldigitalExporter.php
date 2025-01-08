<?php

namespace App\Filament\Exports;

use App\Models\Pengolahansinyaldigital;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class PengolahansinyaldigitalExporter extends Exporter
{
    protected static ?string $model = Pengolahansinyaldigital::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nim')
                ->label('NIM'),
            ExportColumn::make('name')
                ->label('Nama'),
            ExportColumn::make('pract_group')
                ->label('Kelompok'),
            ExportColumn::make('report_1')
                ->label('laporan Unit 1'),
            ExportColumn::make('pract_1')
                ->label('Praktikum Unit 1'),
            ExportColumn::make('total_1')
                ->label('Total Unit 1'),
            ExportColumn::make('report_2')
                ->label('laporan Unit 2'),
            ExportColumn::make('pract_2')
                ->label('Praktikum Unit 2'),
            ExportColumn::make('total_2')
                ->label('Total Unit 2'),
            ExportColumn::make('report_3')
                ->label('laporan Unit 3'),
            ExportColumn::make('pract_3')
                ->label('Praktikum Unit 3'),
            ExportColumn::make('total_3')
                ->label('Total Unit 3'),
            ExportColumn::make('report_4')
                ->label('laporan Unit 4'),
            ExportColumn::make('pract_4')
                ->label('Praktikum Unit 4'),
            ExportColumn::make('total_4')
                ->label('Total Unit 4'),
            ExportColumn::make('report_5')
                ->label('laporan Unit 5'),
            ExportColumn::make('pract_5')
                ->label('Praktikum Unit 5'),
            ExportColumn::make('total_5')
                ->label('Total Unit 5'),
            ExportColumn::make('report_6')
                ->label('laporan Unit 6'),
            ExportColumn::make('pract_6')
                ->label('Praktikum Unit 6'),
            ExportColumn::make('total_6')
                ->label('Total Unit 6'),
            ExportColumn::make('report_7')
                ->label('laporan Unit 7'),
            ExportColumn::make('pract_7')
                ->label('Praktikum Unit 7'),
            ExportColumn::make('total_7')
                ->label('Total Unit 7'),
            ExportColumn::make('report_8')
                ->label('laporan Unit 8'),
            ExportColumn::make('pract_8')
                ->label('Praktikum Unit 8'),
            ExportColumn::make('total_8')
                ->label('Total Unit 8'),
            ExportColumn::make('total_score')
                ->label('Total'),
            ExportColumn::make('resp')
                ->label('Responsi'),
            ExportColumn::make('final_score')
                ->label('Nilai Akhir'),
            ExportColumn::make('grade'),
            ExportColumn::make('attend_sos')
                ->label('Sosialisasi'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }

    public function getFileName(Export $export): string
    {
        return "Nilai-Pengolahan-Sinyal-Digital";
    }
}
