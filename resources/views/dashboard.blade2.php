@extends('layouts.private_app')

@section('title', 'Dashboard')

@section('header')
    Dashboard
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Grafik Publikasi per Tahun</h3>
        <div>
            <canvas id="publicationsChart"></canvas>
        </div>
    </div>

    {{-- Script untuk Chart.js --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('publicationsChart');
            
            // Ambil data dari controller yang dikirim via Blade
            const labels = @json($labels);
            const data = @json($data);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Publikasi',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    @endpush
@endsection