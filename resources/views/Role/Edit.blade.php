@extends('Template.Main')
@section('content')
    <div class="bg-white rounded-lg">
        <div class="p-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-700 hover:text-gray-600">
                    {{ __('Add Role') }}</h2>
            </div>
            <div class="divider"></div>
            <form action="{{ route('users.role.update', ['id' => $role->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="gap-2 flex flex-col">
                    <div class="w-full">
                        <label class="label" for="name">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Nama Role"
                            class="input input-bordered w-full" value="{{ old('name', $role->name) }}" />
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
                        <label class="label" for="desc">Deskripsi</label>
                        <input type="text" id="desc" name="desc" placeholder="Deskripsi dari role"
                            class="input input-bordered w-full" value="{{ old('desc', $role->desc) }}" />
                        @error('desc')
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
                        <label class="label">Pilih Ability : </label>
                        <div class="flex flex-wrap gap-4">
                            @foreach ($permissions as $permission)
                                <div class="flex gap-2">
                                    <input type="checkbox"
                                        {{ old('permission_id',$role->permissions->pluck('id')->contains($permission->id))? 'checked="checked"': '' }}
                                        name="permission_id[]" value="{{ $permission->id }}"
                                        class="checkbox checkbox-success" id="{{ $permission->id }}" />
                                    <label class="cursor-pointer"
                                        for="{{ $permission->id }}">{{ $permission->desc }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('permsission_id[]')
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
