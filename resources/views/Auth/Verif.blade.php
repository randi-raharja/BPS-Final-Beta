@extends('Auth.Template.Main')

@section('content')
    <div class="hero min-h-screen">
        <div class="card bg-base-100 shadow-xl items-center justify-center ">
            <div class="card-body w-full">
                <div class="alert alert-success shadow-lg">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>User create succesfully! Check your email for verification</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
