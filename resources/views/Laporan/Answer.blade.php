@extends('Template.Main')

@section('content')
    <div class="bg-white rounded-lg">
        <div class="p-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-700 hover:text-gray-600">
                    {{ __('Tanggapan Pengaduan') }}</h2>
            </div>
            <div class="divider"></div>
            <form action="{{ route('pengaduan.answer', ['id' => $pengaduan->id]) }}" method="post">
                @csrf
                <h3 class="text-lg text-gray-700 hover:text-gray-600">Judul Pengaduan : {{ $pengaduan->name }}</h3>
                <h3 class="text-lg text-gray-700 hover:text-gray-600">Kategori : {{ $pengaduan->category->name }}</h3>
                <div class="gap-2 flex flex-col">
                    <div class="w-full">
                        <label for="isi">Isi Laporan</label>
                        <textarea id="isi" name="isi" class="h-48 disabled resize-none textarea textarea-bordered w-full" readonly>{{ $pengaduan->isi }}</textarea>
                    </div>
                </div>
                <div class="gap-2 flex flex-col">
                    <div class="w-full">
                        <label for="answer">Tanggapan</label>
                        <textarea id="answer" name="answer" class="h-48 resize-none textarea textarea-bordered w-full"
                            placeholder="silahkan isi tanggapan"></textarea>
                        @error('answer')
                            <div class="alert mt-2 alert-error shadow-lg">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="divider"></div>
                <div class="flex justify-end">
                    <button class="btn gap-2 w-full md:w-1/5">
                        Submit
                        <i class="fa-solid fa-floppy-disk"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
