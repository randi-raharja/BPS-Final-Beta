@extends('Template.Main')
@section('content')
    <div class="bg-white rounded-lg">
        <div class="p-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-700 hover:text-gray-600">
                    {{ __('Add User') }}</h2>
            </div>
            <div class="divider"></div>
            <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class=" gap-2 flex flex-col">
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
                        <label class="label" for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="example@example.id"
                            class="input input-bordered w-full" value="{{ old('email', $user->email) }}" />
                        @error('email')
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
                        <input type="text" id="no_hp" name="no_hp" placeholder="08xxxxxx"
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
                        <label class="label" for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Your address"
                            class="input input-bordered w-full" value="{{ old('alamat', $user->alamat) }}" />
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
                        <label class="label" for="role_id">Role</label>
                        <select class="select select-bordered w-full" name="role_id">
                            <option value="">-- Pilih Role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
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
