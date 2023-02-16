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
    </style>
</head>

<body>
    <div class="container">
        {{-- Kepala --}}
        <table id="kop">
            <tr>
                <td class="logo">
                    <div class="logo-left">
                        <img class="logo-image" src="https://ruangdeveloper.000webhostapp.com/assets/img/kapuas.png"
                            alt="Logo">
                    </div>
                </td>
                <td>
                    <div class="header">
                        <div style="text-transform: uppercase;">
                            PEMERINTAH KABUPATEN KAPUAS
                        </div>
                        <div style="font-weight: bold; text-transform: uppercase;">
                            BADAN PENGELOLA KEUANGAN DAN ASET DAERAH
                        </div>
                        <small style="font-size: 12px;">Jl. Pemuda Km 5,5 Telp. (0513) 21007 Kuala Kapuas</small>
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
                <h3>LAPORAN MITIGASI</h3>
            </div>

            <div>
                ini teks atas
            </div>

            <div style="margin-bottom: 1rem;">
                <table>
                    <tr>
                        <td>Nama Kegiatan</td>
                        <td>:</td>
                        <td>
                            {{ $mitigasi->kegiatan }}
                        </td>
                    </tr>
                    <tr>
                        <td>Dibuat oleh</td>
                        <td>:</td>
                        <td>
                            {{ $mitigasi->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pembuatan</td>
                        <td>:</td>
                        <td>
                            {{ $mitigasi->created_at->isoFormat('DD MMMM Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>Fungsi</td>
                        <td>:</td>
                        <td>{{ $mitigasi->fungsi->name }}</td>
                    </tr>
                    <tr>
                        <td>Risk</td>
                        <td>:</td>
                        <td>{{ $mitigasi->risk }}</td>
                    </tr>
                    <tr>
                        <td>Sebab</td>
                        <td>:</td>
                        <td>{{ $mitigasi->sebab }}</td>
                    </tr>
                    <tr>
                        <td>Sumber Resiko</td>
                        <td>:</td>
                        <td>{{ $mitigasi->sumber->name }}</td>
                    </tr>
                    <tr>
                        <td>Solusi</td>
                        <td>:</td>
                        <td>{{ $mitigasi->solusi }}</td>
                    </tr>
                </table>
            </div>

            <div>
                ini teks atas
            </div>

            {{-- TTD --}}
            <div style="display: flex; justify-content: end">
                <div style="width: 300px; font-weight: bold; text-align: center;">
                    <div>Banjarmasin, {{ now()->isoFormat('DD MMMM Y') }}</div>
                    <div>{{ $mitigasi->verif_by_user->role->name }}</d>
                        <br>
                        <img src="{{ route('userttd', ['id' => $mitigasi->verif_by_user->id]) }}" alt="">
                        <div style="text-decoration: underline; margin-bottom: 0; padding-bottom: 0;">
                            {{ $mitigasi->verif_by_user->name }}
                        </div>
                        <div>NIP. 000000000000000000</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // window.print()
    </script>
</body>

</html>
