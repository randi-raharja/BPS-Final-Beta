@extends('Template.Main')

@section('content')
    <div class="flex flex-col gap-2">
        <div class="bg-white rounded-lg">
            <div class="p-8">
                <div class="w-40">
                    <div class="grid grid-rows-2 grid-flow-col md:grid-rows-1">
                        <div id="donutchart" class="bg-transparent" style="width: 400px; height: 500px;"></div>
                        <div id="barchart_div" style="width: 900px; height: 500px;"></div>
                    </div>
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
                                <th>Nama Kegiatan</th>
                                <th>Fungsi</th>
                                <th>Pembuat</th>
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
                </div>
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
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(bulan3);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Penilaian', 'Jumlah'],
                ['Bintang 1', {{ $rating1 }}],
                ['Bintang 2', {{ $rating2 }}],
                ['Bintang 3', {{ $rating3 }}],
                ['Bintang 4', {{ $rating4 }}],
                ['Bintang 5', {{ $rating5 }}]
            ]);

            var options = {
                title: 'Kepuasan Masyarakat',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }

        function bulan3() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'value', {
                    role: 'style'
                }],
                ['{{ $pertama }}', {{ $bulan1 }}, 'blue'],
                ['{{ $kedua }}', {{ $bulan2 }}, 'green'],
                ['{{ $ketiga }}', {{ $bulan3 }}, 'red'],
            ]);

            var options = {
                chart: {
                    title: '3Bulan',
                    subtitle: '3 Bulan',
                },
                bars: 'horizontal',
                width: 600,
                height: 500,
            };

            var chart = new google.visualization.BarChart(document.getElementById('barchart_div'));
            chart.draw(data, options);
        }

    </script>
@endpush
