@extends('Template.Main')

@section('content')
    <div class="bg-white rounded-lg">
        <div class="p-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-700 hover:text-gray-600">
                    {{ __('Tambah Laporan') }}</h2>
            </div>
            <div class="divider"></div>
            <form action="{{ route('pengaduan.store') }}" method="post">
                @csrf
                <div class="gap-2 flex flex-col">
                    <div class="w-full">
                        <label for="name">Judul Laporan</label>
                        <input type="text" placeholder="Judul laporan" id="name" name="name"
                            class="input input-bordered w-full" />
                        @error('name')
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
                    <div class="w-full">
                        <label class="label" for="category_id">Kategori</label>
                        <select class="select select-bordered w-full " id="category_id" name="category_id">
                            <option disabled selected>-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="isi">Isi Laporan</label>
                        <textarea id="isi" name="isi" class="h-48 resize-none textarea textarea-bordered w-full"
                            placeholder="Silahkan tulis laporan anda disini"></textarea>
                        @error('isi')
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
