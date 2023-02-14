@extends('Template.Main')
@section('content')
    Ini Dashboard
    <h2>{{ auth()->user()->name }}</h2>
    <h2>{{ auth()->user()->role_id }}</h2>
    <div class="w-40">
        <canvas id="testChart"></canvas>
    </div>
@endsection
@push('js')
    <script>
        const ctx = document.getElementById('testChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Mitigasi', 'Laporan', 'User'],
                datasets: [{
                    label: '# of Data',
                    data: [1, 12, 19],
                    boderWidth: 1
                }]
            },
            option: {
                scale: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
