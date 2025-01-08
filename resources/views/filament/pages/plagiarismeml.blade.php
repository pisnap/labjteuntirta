<x-filament::page>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-2">
        @for ($unit = 1; $unit <= 8; $unit++)
            <x-filament::card>
                <h2 class="text-xl font-bold">Unit {{ $unit }}</h2>
                @php
                    $students = \App\Models\Plagiarismeml::where('unit', $unit)->get(['name', 'nim']);
                @endphp
                @if ($students->isEmpty())
                    <p class="text-gray-500">Tidak ada data plagiarisme.</p>
                @else
                    <ul>
                        @foreach ($students as $list)
                            <li>
                                <strong>{{ $list->nim }} - {{ $list->name }}</strong>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </x-filament::card>
        @endfor
    </div>
</x-filament::page>
