@extends('Template.Main')

@section('content')
    @can(App\Constants\Permissions::UPDATE_ANSWER)
        <div class="grid md:grid-cols-3  gap-4 mb-2">
            <div class="bg-white rounded-lg col-span-2">
                <h2 class="text-xl ml-4 mt-4 font-bold text-gray-700 hover:text-gray-600">
                    Data Laporan masuk 3 bulan terakhir</h2>
                <div class="divider"></div>
                <div class="p-8 gap-2 items-center">
                    <div class="w-full h-1/4">
                        <canvas id="lpb"></canvas>
                    </div>
                </div>
            </div>
            <div class="bg-white w-full rounded-lg">
                <h2 class="text-xl ml-4 mt-4 font-bold text-gray-700 hover:text-gray-600">
                    Data Laporan berdasarkan Kategori</h2>
                <div class="divider"></div>
                <div class="p-8 gap-2 items-center">
                    <div class="w-full h-1/2">
                        <canvas id="jk"></canvas>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
    @endcan
    <livewire:pengaduan />
@endsection
@push('js')
    <script>
        const lpb = document.getElementById('lpb');

        new Chart(lpb, {
            type: 'line',
            data: {
                labels: [
                    '{{ $tiga }}',
                    '{{ $dua }}',
                    '{{ $satu }}',
                ],
                datasets: [{
                    label: 'Data Mitigasi 3 Bulan terakhir',
                    data: [
                        {{ $bulan3 }},
                        {{ $bulan2 }},
                        {{ $bulan1 }},
                    ]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

        const rtx = document.getElementById('jk');

        new Chart(rtx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Peraturan',
                    'Pelayanan terpadu',
                    'Pegawai',
                    'Birokrasi',
                    'Fasilitas',
                ],
                datasets: [{
                    label: 'Fungsi',
                    data: [
                        {{ $kate1 }},
                        {{ $kate2 }},
                        {{ $kate3 }},
                        {{ $kate4 }},
                        {{ $kate5 }},
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    </script>
@endpush
