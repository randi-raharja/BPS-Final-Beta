<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        .container {
            max-width: 1000px;
            margin: 0 auto;
            box-sizing: border-box;
            padding-left: 50px;
            padding-right: 50px;
        }

        .flex {
            width: 300px;
        }

        #kop td.logo {
            width: 80px;
            height: 80px;
        }

        .logo-image {
            width: 100%;
        }

        .logo-left {
            display: flex;
            justify-content: start;
        }

        .logo-right {
            display: flex;
            justify-content: end;
        }

        .header {
            text-align: center;
        }

        .line {
            border-top: 2px solid black;
            margin-top: 12px;
            margin-bottom: 2px;
        }

        .hair-line {
            border-top: 1px solid black;
            margin-bottom: 5px;
        }

        #kop {
            width: 100%;
        }

        .table {
            width: 100%;
        }

        .table td,
        .table th {
            padding: 5px 10px;
        }

        .table-bordered {
            border-collapse: collapse;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid black;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            border: transparent;
            text-align: center;
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
        }
    </style>

    {{-- Google Chart --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(secondchart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Kategori', 'Value'],
                ['Peraturan', {{ $kate1 }}],
                ['Pelayanan Terpadu', {{ $kate2 }}],
                ['Pegawai', {{ $kate3 }}],
                ['Birokrasi', {{ $kate4 }}],
                ['Fasilitas', {{ $kate5 }}]
            ]);

            var options = {
                title: 'Laporan masuk 3 bulan terakhir berdasarkan kategori',
                pieHole: 0.4,
                height: 400,
            };

            var chart = new google.visualization.PieChart(document.getElementById('dpie'));
            // Wait for the chart to finish drawing before calling the getImageURI() method.
            google.visualization.events.addListener(chart, 'ready', function() {
                dpie.innerHTML = '<img src="' + chart.getImageURI() + '">';
                console.log(dpie.innerHTML);
            });
            chart.draw(data, options);
        }

        function secondchart() {
            var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Value', {
                    role: 'annotation'
                }],
                ['{{ $tiga }}', {{ $bulan3 }}, '{{ $bulan3 }}'],
                ['{{ $dua }}', {{ $bulan2 }}, '{{ $bulan2 }}'],
                ['{{ $satu }}', {{ $bulan1 }}, '{{ $bulan1 }}'],
            ]);

            var options = {
                title: 'Laporan masuk 3 bulan terakhir',
                height: 400,
            };

            var chart = new google.visualization.BarChart(document.getElementById('barlap'));
            // Wait for the chart to finish drawing before calling the getImageURI() method.
            google.visualization.events.addListener(chart, 'ready', function() {
                barlap.innerHTML = '<img src="' + chart.getImageURI() + '">';
                console.log(barlap.innerHTML);
            });
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div class="container">
        {{-- Kepala --}}
        <table id="kop">
            <tr>
                <td class="logo">
                    <div class="logo-left">
                        <img class="logo-image" src="{!! asset('/assets/img/logo-BPS.svg') !!}" alt="Logo">
                    </div>
                </td>
                <td>
                    <div class="header">
                        <div style="text-transform: uppercase;">
                            PEMERINTAH KOTA BANJARMASIN
                        </div>
                        <div style="font-weight: bold; text-transform: uppercase;">
                            BADAN PUSAT STATISTIK KOTA BANJARMASIN
                        </div>
                        <small style="font-size: 12px;">Jalan Gatot Subroto No. 5 Banjarmasin,Kota Banjarmasin,
                            Kalimantan Selatan
                            Indonesia, 70235</small>
                        <div style="font-size: 12px;">
                            Telp: (0511) 6773031, 6773932, Email: bps6371@bps.go.id, bps6371@gmail.com
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="line"></div>
                    <div class="hair-line"></div>
                </td>
            </tr>
        </table>

        <div style="padding-top: 2rem; padding-bottom: 2rem;">
            <div style="text-align: center; margin-bottom:3rem;">
                <h3>LAPORAN PENGADUAN</h3>
            </div>

            {{-- Top --}}
            <div>
                Berikut ini merupakan hasil laporan pengaduan dalam <b>3 bulan terakhir</b> dengan total laporan
                sebanyak
                <B>{{ $all }}</B> laporan masuk dengan data {{ $tiga }} sebanyak
                {{ $bulan3 }}.
                Berikut merupkan rincian laporan nya berdasarkan kategori :

            </div>

            {{-- Table Content --}}
            <div style="margin-bottom: 1rem; padding-left: 2rem; padding-right: 2rem">
                <table>
                    <tr>
                        <td>{{ $tiga }}</td>
                        <td>:</td>
                        <td>{{ $bulan3 }}</td>
                    </tr>
                    <tr>
                        <td>Peraturan </td>
                        <td>: </td>
                        <td>{{ $kate1 }}</td>
                    </tr>
                    <tr>
                        <td>Pelayanan Terpadu </td>
                        <td>: </td>
                        <td>{{ $kate2 }}</td>
                    </tr>
                    <tr>
                        <td>Pegawai </td>
                        <td>: </td>
                        <td>{{ $kate3 }}</td>
                    </tr>
                    <tr>
                        <td>Birokrasi </td>
                        <td>: </td>
                        <td>{{ $kate4 }}</td>
                    </tr>
                    <tr>
                        <td>Fasilitas </td>
                        <td>: </td>
                        <td>{{ $kate5 }}</td>
                    </tr>
                </table>
            </div>
        </div>
        {{-- Chart --}}
        <div id="dpie"></div>
        <div id="barlap"></div>
    </div>

    <script>
        // window.print()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"
        integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    label: 'Data Laporan 3 Bulan terakhir',
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
</body>

</html>
