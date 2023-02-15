<div class="drawer">
    {{-- Toggle --}}
    <input type="checkbox" id="sidebar" class="drawer-toggle">

    {{-- COntent --}}
    <div class="drawer-content flex flex-col">
        <div class="navbar z-40 bg-base-100">
            {{-- Toggle --}}
            <div class="flex-none sm:hidden">
                <label for="sidebar" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-6 h-6 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </label>
            </div>
            <div class="flex-1">
                <a href="/dashboard" class="btn btn-ghost normal-case text-xl">BPS Banjarmasin</a>
            </div>
            <div class="flex-none sm:flex hidden">
                <ul class="menu menu-horizontal px-1">
                    <li tabindex="0">
                        <a>
                            Pengaduan
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                            </svg>
                        </a>
                        <ul class="p-2 bg-base-100">
                            <li><a href="{{ route('pengaduan.create') }}">Buat Pengaduan</a></li>
                            <li><a href="{{ route('pengaduan.index') }}">Daftar Pengaduan</a></li>
                        </ul>
                    </li>
                    @can(App\Constants\Permissions::READ_MITIGASI)
                        <li tabindex="0">
                            <a>
                                Mitigasi
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                                </svg>
                            </a>
                            <ul class="p-2 bg-base-100">
                                @can(App\Constants\Permissions::CREATE_MITIGASI)
                                    <li><a href="{{ route('mitigasi.create') }}">Buat Mitigasi</a></li>
                                @endcan
                                @can(App\Constants\Permissions::READ_MITIGASI)
                                    <li><a href="{{ route('mitigasi.index') }}">Data Mitigasi</a></li>
                                @endcan
                                @can(App\Constants\Permissions::UPDATE_VERIFIKASI)
                                    <li><a href="{{ route('mitigasi.verif_index') }}">Verifikasi Mitigasi</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can(App\Constants\Permissions::READ_IKM)
                        <li tabindex="0">
                            <a>
                                IKM
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                                </svg>
                            </a>
                            <ul class="p-2 bg-base-100">
                                <li><a href="{{ route('feedback.index') }}">Data IKM</a></li>
                            </ul>
                        </li>
                    @endcan
                    @can(App\Constants\Permissions::READ_USER)
                        <li tabindex="0" class="">
                            <a>
                                User Management
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                                </svg>
                            </a>
                            <ul class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 p-2 ">
                                @can(App\Constants\Permissions::READ_USER)
                                    <li><a href="{{ route('users.index') }}">User</a></li>
                                @endcan
                                @can(App\Constants\Permissions::READ_ROLE)
                                    <li><a href="{{ route('users.role.index') }}">Roles</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                </ul>
            </div>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-8 rounded-full">
                        <img src="https://placeimg.com/80/80/people" />
                    </div>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-40">
                    <li class="menu-title "><a class="">{{ auth()->user()->name }}</a></li>
                    <div class="divider m-0"></div>
                    <li>
                        <a href="{{ route('profile.index') }}" class="justify-between">
                            Profile
                        </a>
                    </li>
                    <li class=""></li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="w-full btn btn-sm btn-accent" type="submit">Log out <i
                                class="ri-logout-box-line pl-2 ri-fw"></i></button>
                    </form>
                </ul>
            </div>
        </div>

        {{-- Content --}}
        <div class="p-6">
            @yield('content')
        </div>
    </div>

    {{-- Sidebar --}}
    <div class="drawer-side">
        <label for="sidebar" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 bg-base-100">
            <li class="menu-title"><span>Mitigasi</span></li>
            <li><a>Dashboard</a></li>
            <li class=""></li>
            <li class="menu-title"><span>Mitigasi</span></li>
            <li><a>Buat Pengaduan</a></li>
            <li><a>Daftar Pengaduan</a></li>
            <li><a>Pengaduan Masuk</a></li>
            <li class=""></li>
            <li class="menu-title"><span>Mitigasi</span></li>
            <li><a>Buat Pengaduan</a></li>
            <li><a>Daftar Pengaduan</a></li>
            <li><a>Pengaduan Masuk</a></li>
            <li class=""></li>
            <li class="menu-title"><span>Mitigasi</span></li>
            <li><a>Buat Pengaduan</a></li>
            <li><a>Daftar Pengaduan</a></li>
            <li><a>Pengaduan Masuk</a></li>
            <li class=""></li>
            <form action="/logout" method="POST">
                @csrf
                <button class="w-full btn btn-accent" type="submit">Log out <i
                        class="ri-logout-box-line pl-2 ri-fw"></i></button>
            </form>
        </ul>
    </div>
</div>
