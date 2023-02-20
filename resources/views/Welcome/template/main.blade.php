{{-- Body --}}

<body>
    @include('Welcome.template.navbar')
    {{-- Content --}}
    @yield('content')
    @include('Welcome.template.footer')
