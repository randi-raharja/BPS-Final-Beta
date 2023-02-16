<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form IKM</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            daisyui: {
                themes: ["light"],
                darkTheme: "light"
            },
            theme: {
                extend: {},
            },
        }
    </script>
</head>
<body class="bg-gray-300 min-h-screen">
    <div class="p-6">
        <div class="bg-white rounded-lg">
            <div class="p-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-700 hover:text-gray-600">
                        {{ __('Mitigasi') }}</h2>
                </div>
                <div class="divider"></div>
                @if (session('status'))
                <div
                    class="w-full mb-2 select-none border-l-4 border-green-400 bg-green-100 p-4 font-medium hover:border-green-500">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="pl-2">{{ session('status') }}</span>
                    </div>
                </div>
            @endif
            @if (session('delete'))
                <div
                    class="hover:red-yellow-500 w-full mb-2 select-none border-l-4 border-red-400 bg-red-100 p-4 font-medium">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="pl-2">{{ session('delete') }}</span>
                    </div>
                </div>
            @endif
                <form action="{{ route('feedback.store') }}" method="post">
                    @csrf
                    <div class=" gap-2 md:flex-row flex flex-col">
                        <div class="flex-1">
                            
                            <div class="w-full">
                                <label class="label" for="kritik">Kritik</label>
                                <textarea id="kritik" name="kritik" class="h-48 resize-none textarea textarea-bordered w-full"
                                    placeholder="Masukan kritik anda disini"></textarea>
                                @error('kritik')
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
                                <label class="label" for="saran">Saran</label>
                                <textarea id="saran" name="saran" class="h-48 resize-none textarea textarea-bordered w-full"
                                    placeholder="Masukan saran anda disini"></textarea>
                                @error('saran')
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
                            <div class="w-full text-center">
                                <div class="rating rating-lg items-center">
                                    <input type="radio" name="rating" value="1" class="mask mask-star" />
                                    <input type="radio" name="rating" value="2" class="mask mask-star" />
                                    <input type="radio" name="rating" value="3" class="mask mask-star" />
                                    <input type="radio" name="rating" value="4" class="mask mask-star" />
                                    <input type="radio" name="rating" value="5" class="mask mask-star" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="flex justify-end">
                        <button class="btn gap-2 w-full">
                            Submit
                            <i class="fa-solid fa-floppy-disk"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>