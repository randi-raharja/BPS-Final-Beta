@extends('Template.Main')

@section('content')
    <div class="flex flex-col gap-2">
        <div class="grid md:grid-cols-2 justify-items-stretch gap-2">
            <div class="bg-white rounded-lg">
                <div class="p-8">
                    <canvas id="barchart_div"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg">
                <div class="p-8">
                    <canvas id="donutchart"></canvas>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg">
            <div class="p-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-700 hover:text-gray-600">
                        Daftar Pengaduan</h2>
                </div>
                <div class="divider"></div>
                @can(App\Constants\Permissions::EXPORT_IKM)
                    <a role="button" class="btn btn-success text-white mb-2" href="{{ route('feedback.export') }}">Export<i
                            class="fa-solid fa-file-export pl-2"></i></a>
                @endcan
                <div class="overflow-x-auto">
                    <table class="table w-full border-red-300">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>Kritik</th>
                                <th>Saran</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>
                                        <div class="break-normal whitespace-normal">
                                            {{ $feedback->kritik }}
                                    </td>
                                    <td>
                                        <div class="break-normal whitespace-normal">
                                            {{ $feedback->saran }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rating  items-center">
                                            <input disabled type="radio" {{ $feedback->rating == 1 ? 'checked' : '' }}
                                                name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                            <input disabled type="radio" {{ $feedback->rating == 2 ? 'checked' : '' }}
                                                name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                            <input disabled type="radio" {{ $feedback->rating == 3 ? 'checked' : '' }}
                                                name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                            <input disabled type="radio" {{ $feedback->rating == 4 ? 'checked' : '' }}
                                                name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                            <input disabled type="radio" {{ $feedback->rating == 5 ? 'checked' : '' }}
                                                name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    @endsection
    @push('js')
        <script>
            const ctx = document.getElementById('barchart_div');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['{{ $pertama }}', '{{ $kedua }}', '{{ $ketiga }}'],
                    datasets: [{
                        label: 'Data reponden 3 bulan terakhir',
                        data: [
                            {{ $bulan1 }},
                            {{ $bulan2 }},
                            {{ $bulan3 }},
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
            const rtx = document.getElementById('donutchart');

            new Chart(rtx, {
                type: 'doughnut',
                data: {
                    labels: ['Bintang 1', 'Bintang 2', 'Bintang 3', 'Bintang 4', 'Bintang 5', ],
                    datasets: [{
                        label: 'Penilaian berdasarkan responden',
                        data: [
                            {{ $rating1 }},
                            {{ $rating2 }},
                            {{ $rating3 }},
                            {{ $rating4 }},
                            {{ $rating5 }},
                        ],
                        hoverOffset: 4
                    }]
                },
            });
        </script>
    @endpush
