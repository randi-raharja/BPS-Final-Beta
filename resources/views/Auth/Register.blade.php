@extends('Auth.Template.Main')

@section('content')
    <div class="hero min-h-screen">
        <form action="{{ route('register.store') }}" method="post">
            @csrf

            <div class="card w-full shadow-2xl bg-base-100">
                <div class="text-center pt-5">
                    <h1 class="font-bold text-2xl">SIGN UP</h1>
                </div>

                <div class="card-body">
                    <div class="flex justify-between gap-4">
                        <div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Nama Lengkap</span>
                                </label>
                                <input type="text" name="name" placeholder="Nama Lengkap" class="input input-bordered"
                                    value="{{ old('name') }}" />
                            </div>
                            @error('name')
                                <div class="alert alert-error shadow-lg pt-2">
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
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input type="text" name="email" placeholder="Email" class="input input-bordered"
                                    value="{{ old('email') }}" />
                            </div>
                            @error('email')
                                <div class="alert alert-error shadow-lg pt-2">
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
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Password</span>
                                </label>
                                <input type="password" placeholder="Password" name="password" class="input input-bordered"
                                    value="{{ old('password') }}" />
                            </div>
                            @error('password')
                                <div class="alert alert-error shadow-lg pt-2">
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
                        <div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Confirm Password</span>
                                </label>
                                <input type="password" placeholder="Confirm Password" name="password_confirmation"
                                    class="input input-bordered" value="{{ old('password_confirmation') }}" />
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-error shadow-lg pt-2">
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
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">No. HP</span>
                                </label>
                                <input type="text" name="no_hp" placeholder="No. HP" class="input input-bordered"
                                    value="{{ old('no_hp') }}" />
                            </div>
                            @error('no_hp')
                                <div class="alert alert-error shadow-lg pt-2">
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
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Alamat</span>
                                </label>
                                <textarea class="textarea resize-none input-bordered" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}"></textarea>
                            </div>
                            @error('alamat')
                                <div class="alert alert-error shadow-lg pt-2">
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
                    <label class="label">
                        <a href="/login" class="label-text-alt link link-hover">Have account? Login</a>
                    </label>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Register</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
