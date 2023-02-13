@extends('Template.Main')

@section('content')
    <div class="bg-white rounded-lg">
        <div class="p-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-700 hover:text-gray-600">
                    {{ __('Tanggapan Pengaduan') }}</h2>
            </div>
            <div class="divider"></div>
            <h3 class="text-lg text-gray-700 hover:text-gray-600">Judul Pengaduan : {{ $pengaduan->name }}</h3>
            <h3 class="text-lg text-gray-700 hover:text-gray-600">Kategori : {{ $pengaduan->category->name }}</h3>
            <div class="gap-2 flex flex-col">
                <div class="w-full">
                    <label for="isi">Isi Laporan</label>
                    <textarea id="isi" name="isi" class="h-48 disabled resize-none textarea textarea-bordered w-full" readonly>{{ $pengaduan->isi }}</textarea>
                </div>
                <div class="w-full">
                    <label for="answer">Tanggapan</label>
                    <textarea id="answer" name="answer" class="h-48 disabled resize-none textarea textarea-bordered w-full" readonly>{{ $pengaduan->answer->answer }}</textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
