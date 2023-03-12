@extends('Template.Main')

@section('content')
    <div class="bg-white rounded-lg">
        <div class="p-2">
            <h2 class="text-xl ml-4 mt-4 font-bold text-gray-700 hover:text-gray-600">Profile</h2>
        </div>
        <div class="divider"></div>
        <div class="p-8">
            <div class="grid grid-rows-2 grid-flow-col md:grid-rows-1 ">
                <div class=" justify-self-center self-center">
                    <div class="flex "></div>
                    <div class="avatar">
                        <div class="w-96 md:w-64 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                            <img width="128" src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                        </div>
                    </div>
                </div>
                <div class="">
                    <div>
                        <div class="gap-2 flex flex-col">
                            <div class="w-full">
                                <label class="label" for="name">Nama</label>
                                <input disabled type="text" id="name" name="name" placeholder="Nama"
                                    class="input input-bordered w-full" value="{{ old('name', auth()->user()->name) }}" />
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
                                <label class="label" for="no_hp">No. HP</label>
                                <input disabled type="text" id="no_hp" name="no_hp" placeholder="08xxxxxx"
                                    class="input input-bordered w-full" value="{{ old('no_hp', auth()->user()->no_hp) }}" />
                                @error('no_hp')
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
                                <label class="label" for="alamat">Alamat</label>
                                <textarea disabled id="alamat" name="alamat" class="h-48 resize-none textarea textarea-bordered w-full"
                                    placeholder="Masukan alamat anda disini">{{ old('name', auth()->user()->alamat) }}</textarea>
                                @error('alamat')
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
                                <a href="{{ route('profile.edit', ['id' => auth()->user()->id]) }}" role="button"
                                    class="w-full text-white btn btn-success">Update Profile<i
                                        class="fa-solid fa-pen-to-square pl-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
