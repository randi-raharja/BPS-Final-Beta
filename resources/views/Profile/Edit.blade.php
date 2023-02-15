@extends('Template.Main')

@section('content')
    <h2>Ini profile page</h2>
    <div class="bg-white rounded-lg">
        <div class="p-8">

            <div class="divider m-0"></div>
            <div class="grid grid-rows-2 grid-flow-col md:grid-rows-1 ">
                <div class=" justify-self-center self-center">
                    <div class="avatar relative ">
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
                                <input type="text" id="name" name="name" placeholder="Nama"
                                    class="input input-bordered w-full" value="{{ old('name', $user->name) }}" />
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
                                <label class="label" for="password">New Password</label>
                                <input type="password" id="password" name="password" placeholder="Type your password"
                                    class="input input-bordered w-full" />
                                @error('password')
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
                                <label class="label" for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Re-type your password" class="input input-bordered w-full" />
                                @error('password_confirmation')
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
                                <input type="number" id="no_hp" name="no_hp" placeholder="08xxxxxx"
                                    class="input input-bordered w-full" value="{{ old('no_hp', $user->no_hp) }}" />
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
                                <label class="label" for="nidn">NIDN</label>
                                <input type="number" id="nidn" name="nidn" placeholder="xxxx"
                                    class="input input-bordered w-full" value="{{ old('nidn', $user->nidn) }}" />
                                @error('nidn')
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
                                <label class="label" for="ttd">Tanda tangan</label>
                                <input type="file" id="ttd" name="ttd" placeholder="Upload tanda tangan"
                                    class="file-input w-full" value="{{ old('ttd', $user->ttd) }}" />
                                @error('ttd')
                                    <div class="alert mt-2 alert-error shadow-lg">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                                viewBox="0 0 24 24">
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
                                <textarea id="alamat" name="alamat" class="h-48 resize-none textarea textarea-bordered w-full"
                                    placeholder="Masukan alamat anda disini">{{ old('name', $user->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="alert mt-2 alert-error shadow-lg">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <a href="{{ route('profile.edit', ['id' => $user->id]) }}" role="button"
                                    class="w-full text-white btn btn-success">Save Profile<i class="pl-2 fa-solid fa-check"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
