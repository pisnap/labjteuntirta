<x-filament-panels::page>
    <div class="grid grid-cols-3 gap-6">
        @php
            $user = \App\Models\Pengukuranlistrik::where('nim', auth()->user()->nim)->first();
        @endphp

        @if ($user)
            <!-- Card pertama: Informasi NIM, Nama, Kelompok -->
            <div class="grid grid-cols-3 gap-4">
                <!-- Card untuk NIM -->
                <x-filament::card class="w-full max-w-xs">
                    <p class="text-sm font-bold text-center uppercase sm:text-base md:text-xl lg:text-2xl" style="text-transform:uppercase">{{ $user->name }}</p>
                    <p class="text-sm font-bold text-center uppercase sm:text-base md:text-xl lg:text-2xl">{{ $user->nim }}</p>
                    <p class="text-sm font-bold text-center uppercase sm:text-base md:text-xl lg:text-2xl">{{ $user->pract_group ?? '-' }}</p>
                </x-filament::card>
            </div>

            <!-- Card kedua: Nilai Laporan, Praktikum, Total -->
            <x-filament::card class="max-w-4xl mx-auto col-span-full">
                <table class="w-full text-sm border-separate table-auto sm:text-sm md:text-lg lg:text-xl border-spacing-0">
                    <thead class="border-b-2 border-gray-300">
                        <tr>
                            <th class="p-2 font-bold text-center">Unit</th>
                            <th class="p-2 font-bold text-center">Laporan</th>
                            <th class="p-2 font-bold text-center">Praktikum</th>
                            <th class="p-2 font-bold text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 8; $i++)
                            <tr class="border-b border-gray-200">
                                <td class="p-2 text-center">{{ $i }}</td>
                                <td class="p-2 text-center">{{ $user->{'report_' . $i} ?? '-' }}</td>
                                <td class="p-2 text-center">{{ $user->{'pract_' . $i} ?? '-' }}</td>
                                <td class="p-2 text-center">{{ $user->{'total_' . $i} ?? '-' }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>

                <p class="mt-2 text-sm text-center"><em>* Persentase laporan dan praktikum adalah 30% sehingga persentase total adalah 60%</em></p>
            </x-filament::card>

            <!-- Card ketiga: Menampilkan total_score, resp, attend_sos, dan final_score -->
            <x-filament::card class="max-w-4xl mx-auto mt-6 col-span-full">
                <table class="w-full text-sm border-separate table-auto sm:text-sm md:text-lg lg:text-xl border-spacing-0">
                    <thead class="border-b-2 border-gray-300">
                        <tr>
                            <th class="p-2 font-bold text-center">Komponen</th>
                            <th class="p-2 font-bold text-center">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200">
                            <td class="p-2 text-center">Avg. Total</td>
                            <td class="p-2 text-center">{{ $user->total_score ?? '-' }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="p-2 text-center">Responsi</td>
                            <td class="p-2 text-center">{{ $user->resp ?? '-' }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="p-2 text-center">Sosialisasi</td>
                            <td class="p-2 text-center">{{ $user->attend_sos ?? '-' }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="p-2 font-bold text-center">Final Score</td>
                            <td class="p-2 font-bold text-center">{{ $user->final_score ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="mt-2 text-sm text-center"><em>* Avg. Total adalah nilai rata rata dari Total Unit 1 sampai 8</em></p>
                <p class="mt-2 text-sm text-center"><em>* Persentase responsi adalah 35% dan kehadiran sosialisasi adalah 5%</em></p>
                <p class="mt-2 text-sm text-center"><em>* Avg. Total + Responsi + Sosialisasi = Final Score 100%</em></p>
            </x-filament::card>

            <!-- Card keempat: Menampilkan Grade dengan Font Besar -->
            <x-filament::card class="max-w-xs mx-auto mt-6 col-span-full">
                <div class="text-center">
                    <p class="text-4xl font-bold">Grade</p>
                    <p class="mt-2" style="font-size: 4rem; font-weight: 800; color:
                        @if($user->grade == 'A') green;
                        @elseif($user->grade == 'A-') green;
                        @elseif($user->grade == 'B+') green;
                        @elseif($user->grade == 'B') yellow;
                        @elseif($user->grade == 'B-') yellow;
                        @elseif($user->grade == 'C+') yellow;
                        @elseif($user->grade == 'C') orange;
                        @elseif($user->grade == 'D') red;
                        @elseif($user->grade == 'E') red;
                        @endif
                    ">
                        {{ $user->grade ?? 'N/A' }}
                    </p>
                </div>
            </x-filament::card>
        @else
            <!-- Card N/A jika tidak ada data -->
            <x-filament::card class="max-w-xs mx-auto mt-6 col-span-full">
                <div class="text-center">
                    <p class="mt-2" style="font-size: 1.5rem; font-weight: 800;">N/A</p>
                </div>
            </x-filament::card>
        @endif
    </div>
</x-filament-panels::page>
