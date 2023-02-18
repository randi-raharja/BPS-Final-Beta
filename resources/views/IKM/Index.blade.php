@extends('Template.Main')

@section('content')
    <div class="flex flex-col gap-2">
        <div class="bg-white rounded-lg">
            <div class="p-8">
                <div class="grid grid-cols-2 place-items-center">
                    <div id="barchart_div" style="height: 600px; width: 600px"></div>
                    <div id="donutchart" style="height: 600px; width: 600;"></div>
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
                pieHole: 0.4,
                legend: {
                    position: 'bottom',
                    maxLines: 3
                },
                width: 800,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            google.visualization.events.addListener(chart, 'ready', function() {
                donutchart.innerHTML = '<img src="' + chart.getImageURI() + '">';
                console.log(donutchart.innerHTML);
            });
            chart.draw(data, options);
        }

        function bulan3() {
            var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Banyaknya Respone'],
                ['{{ $pertama }}', {{ $bulan1 }}],
                ['{{ $kedua }}', {{ $bulan2 }}],
                ['{{ $ketiga }}', {{ $bulan3 }}],
            ]);

            var options = {
                bars: 'vertical',
                legend: {
                    position: 'top',
                    maxLines: 3
                },
                axes: {
                    y: {
                        0: {
                            side: 'left'
                        }
                    }
                },
                width: 600,
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('barchart_div'));
            google.visualization.events.addListener(chart, 'ready', function() {
                barchart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                console.log(barchart_div.innerHTML);
            });
            chart.draw(data, options);
        }
    </script>
@endpush
