{{-- Navbar --}}

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <a href="/" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="Logo">
                <span>BPS Banjarmasin</span>
            </a>
            <!-- End Logo -->

            <!-- Nav -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{ $tittle == '| Home' ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <li><a class="nav-link scrollto {{ $tittle == '| Sign Up' ? 'active' : '' }}"
                                href="{{ route('register') }}">Sign
                                Up</a></li>

                        @if (Route::has('login'))
                            <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                        @endif
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- End Nav -->

        </div>
    </header>
    {{-- End Navbar --}}
