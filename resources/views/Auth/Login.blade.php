@extends('Auth.Template.Main')
@section('content')
    <div class="hero min-h-screen">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if (session('status'))
                <div class="alert alert-success shadow-lg">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            @endif
            <div class="card flex-shrink-0 w-96 max-w-sm shadow-2xl bg-base-100">
                <div class="text-center pt-5">
                    <h1 class="font-bold text-2xl">LOGIN</h1>
                </div>
                <div class="card-body">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="text" name="email" placeholder="Email" class="input input-bordered" />
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
                        <input type="password" placeholder="Password" name="password" class="input input-bordered" />
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
                    <label class="label">
                        <a href="/register" class="label-text-alt link link-hover">Dont have account? Register</a>
                    </label>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                    @if (session('loginError'))
                        <div class="alert alert-error shadow-lg">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ session('loginError') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
