@extends('Template.Main')
@section('content')
    <div class="grid grid-cols-4 gap-4">
        <div class="card w-full bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Buat Pengadun</h2>
                <p>Silahkan sampaikan laporan anda</p>
                <div class="card-actions justify-end">
                    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary" role="button">Click it!</a>
                </div>
            </div>
        </div>
        <div class="card w-full bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Data Pengaduan</h2>
                <p>Lihat laporan yang sudah diinputkan</p>
                <div class="card-actions justify-end">
                    <a href="{{ route('pengaduan.index') }}" class="btn btn-primary" role="button">Click it!</a>
                </div>
            </div>
        </div>
        @can(App\Constants\Permissions::READ_MITIGASI)
            <div class="card w-full bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Buat Mitigasi</h2>
                    <p>Silahkan masukan data mitigasi</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('mitigasi.create') }}" class="btn btn-primary" role="button">Click it!</a>
                    </div>
                </div>
            </div>
            <div class="card w-full bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Data Mitigasi</h2>
                    <p>Lihat Data mitigasi yang sudah diinputkan</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('mitigasi.index') }}" class="btn btn-primary" role="button">Click it!</a>
                    </div>
                </div>
            </div>
        @endcan
        @can(App\Constants\Permissions::READ_IKM)
            <div class="card w-full bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Data IKM</h2>
                    <p>Lihat data Indexs Kepuasan Masyarakat</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('feedback.index') }}" class="btn btn-primary" role="button">Click it!</a>
                    </div>
                </div>
            </div>
        @endcan
        @can(App\Constants\Permissions::READ_USER)
            <div class="card w-full bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Data User</h2>
                    <p>All data user</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('users.index') }}" class="btn btn-primary" role="button">Click it!</a>
                    </div>
                </div>
            </div>
        @endcan
        @can(App\Constants\Permissions::READ_ROLE)
            <div class="card w-full bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Data Role</h2>
                    <p>Silahkan penambahan ataupun perubahan pada role</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('users.role.index') }}" class="btn btn-primary" role="button">Click it!</a>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
