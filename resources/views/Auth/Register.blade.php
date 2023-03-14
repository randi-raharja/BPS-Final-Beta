@extends('Auth.Template.Main')

@section('content')
    <div class="hero min-h-screen">
        <form action="{{ route('register.store') }}" method="post">
            @csrf

            <div class="card w-full shadow-2xl bg-base-100">
                <div class="card-body">
                    <div class="flex justify-center">
                        <h2 class="card-title items-center">Sign Up</h2>
                    </div>
                    <div class="flex gap-4">
                        <div>
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Nama Lengkap</span>
                                </label>
                                <input type="text" placeholder="Masukan nama lengkap" name="name"
                                    class="input input-bordered w-96" value="{{ old('name') }}" />
                                @error('name')
                                    <div class="alert alert-error rounded-md mt-2 shadow-lg">
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
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input type="text" placeholder="Masukan email" name="email"
                                    class="input input-bordered w-96" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="alert alert-error rounded-md mt-2 shadow-lg">
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
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Password</span>
                                </label>
                                <input type="password" placeholder="Password min. 8 Character" name="password"
                                    class="input input-bordered w-96" value="{{ old('password') }}" />
                                @error('password')
                                    <div class="alert alert-error rounded-md mt-2 shadow-lg">
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
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Confrim Password</span>
                                </label>
                                <input type="password" placeholder="Re-type your password" name="password_confirmation"
                                    class="input input-bordered w-96" value="{{ old('password_confirmation') }}" />
                                @error('password_confirmation')
                                    <div class="alert alert-error rounded-md mt-2 shadow-lg">
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
                        <div>
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">No. HP</span>
                                </label>
                                <input type="number" placeholder="Masukan No. Handphone" name="no_hp"
                                    class="input input-bordered w-96" id="no_hp" value="{{ old('no_hp') }}" />
                                @error('no_hp')
                                    <div class="alert alert-error rounded-md mt-2 shadow-lg">
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
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">No. WA</span>
                                </label>
                                <input type="number" placeholder="Masukan No. Whatsapp" name="wa"
                                    class="input input-bordered w-96" id="wa" value="{{ old('wa') }}" />
                                @error('wa')
                                    <div class="alert alert-error rounded-md mt-2 shadow-lg">
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
                                <label id="wa" class="cursor-pointer label flex">
                                    <span class="label-text">Sama dengan no.hp</span>
                                    <input type="checkbox" onclick="validate()" checked=""
                                        class="checkbox checkbox-primary" id="check" />
                                </label>
                            </div>
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Alamat</span>
                                </label>
                                <textarea class="textarea textarea-bordered h-24 resize-none" placeholder="Masukan alamat" name="alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="alert alert-error rounded-md mt-2 shadow-lg">
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
                        </div>
                    </div>
                    <div class="divider"></div>
                    <button class="btn btn-primary" type="submit">Register</button>
                    <label class="flex label justify-end text-sm">
                        <span>Do you have accout ? <a href="{{ route('login') }}" class="link">Login</a></span>
                    </label>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        var wa = document.getElementById('wa');
        var check = document.getElementById('check');

        function validate() {
            if (check.checked) {
                var hp = document.getElementById('no_hp').value;
                wa.value = hp;
            } else {
                wa.value = '';
            }
        }
    </script>
@endpush
