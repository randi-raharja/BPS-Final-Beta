@extends('Template.Main')

@section('content')
    {{-- Chart --}}
    @can(App\Constants\Permissions::UPDATE_VERIFIKASI)
        <div class="flex flex-col  gap-2 mb-2">
            <div class="gap-4 flex flex-col">
                <div class="flex gap-4">
                    <div class="bg-white rounded-lg flex-1">
                        <h2 class="text-xl ml-4 mt-4 font-bold text-gray-700 hover:text-gray-600">
                            Data Mitigasi berdasarkan fungsi</h2>
                        <div class="divider"></div>
                        <div class="p-8 gap-2 items-center">
                            <div class="w-11/12 h-1/2">
                                <canvas id="fungsi"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg">
                        <h2 class="text-xl ml-4 mt-4 font-bold text-gray-700 hover:text-gray-600">
                            Data Mitigasi berdasarkan fungsi (Doughnut Chart)</h2>
                        <div class="divider"></div>
                        <div class="p-8 gap-2 items-center">
                            <div class="w-full h-1/4">
                                <canvas id="fungsi_dn"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4 w-full">
                    <div class="bg-white rounded-lg flex-1">
                        <h2 class="text-xl ml-4 mt-4 font-bold text-gray-700 hover:text-gray-600">
                            Data Mitigasi 6 Bulan Terakhir</h2>
                        <div class="divider"></div>
                        <div class="p-8 gap-2 items-center">
                            <div class="w-11/12 h-1/2">
                                <canvas id="mitigasi"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg flex-1">
                        <h2 class="text-xl ml-4 mt-4 font-bold text-gray-700 hover:text-gray-600">
                            Data Mitigasi 3 Bulan Terakhir</h2>
                        <div class="divider"></div>
                        <div class="p-8 gap-2 items-center">
                            <div class="w-full h-1/2">
                                <canvas id="mb"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap-4 flex w-full justify-between">
                <div class="bg-white rounded-lg w-full">
                    <div class="p-8">
                        <h2>Data yang sudah terverifikasi :</h2>
                        <span class="text-3xl font-bold"><i
                                class="mr-2 text-green-500 fa-solid fa-square-check"></i>{{ $verif_on }}</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg w-full">
                    <div class="p-8">
                        <h2>Data yang belum terverifikasi :</h2>
                        <span class="text-3xl font-bold"><i
                                class="mr-2 text-red-500 fa-solid fa-square-xmark"></i>{{ $verif_off }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    {{-- Data --}}
    <livewire:mitigasi />
@endsection
@push('js')
    {{-- Mitigasi Masuk --}}
    <script>
        const lc = document.getElementById('mitigasi');

        new Chart(lc, {
            type: 'line',
            data: {
                labels: [
                    '{{ $enam }}',
                    '{{ $lima }}',
                    '{{ $empat }}',
                    '{{ $tiga }}',
                    '{{ $dua }}',
                    '{{ $satu }}',
                ],
                datasets: [{
                    label: 'Data mitigasi 6 bulan terakhir',
                    data: [
                        {{ $bulan6 }},
                        {{ $bulan5 }},
                        {{ $bulan4 }},
                        {{ $bulan3 }},
                        {{ $bulan2 }},
                        {{ $bulan1 }},
                    ],
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

        const mb = document.getElementById('mb');

        new Chart(mb, {
            type: 'bar',
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
    </script>
    {{-- By Fungsi --}}
    <script>
        const ctx = document.getElementById('fungsi');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Umum',
                    'IPDS',
                    'Nerwilis',
                    'Distribusi',
                    'Sosial',
                    'Produksi',
                ],
                datasets: [{
                    label: 'Mitigasi berdasarkan Fungsi',
                    data: [
                        {{ $fungsi1 }},
                        {{ $fungsi2 }},
                        {{ $fungsi3 }},
                        {{ $fungsi4 }},
                        {{ $fungsi5 }},
                        {{ $fungsi6 }},
                    ]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        const rtx = document.getElementById('fungsi_dn');

        new Chart(rtx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Umum',
                    'IPDS',
                    'Nerwilis',
                    'Distribusi',
                    'Sosial',
                    'Produksi',
                ],
                datasets: [{
                    label: 'Fungsi',
                    data: [
                        {{ $fungsi1 }},
                        {{ $fungsi2 }},
                        {{ $fungsi3 }},
                        {{ $fungsi4 }},
                        {{ $fungsi5 }},
                        {{ $fungsi6 }},
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
