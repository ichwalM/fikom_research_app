@extends('layouts.private_app')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex-1 bg-off-white p-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-dark-charcoal mb-4">Dashboard</h2>
            <p class="text-medium-gray">Selamat datang di sistem Research Fikom App. Pilih menu di sidebar untuk mengakses berbagai fitur.</p>
            
            <!-- Sample Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-gradient-to-br from-golden-orange to-yellow-500 text-white p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold">Profil</h3>
                            <p class="text-sm opacity-90">Kelola data pribadi</p>
                        </div>
                        <i class="fas fa-user text-2xl opacity-75"></i>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold">Penelitian</h3>
                            <p class="text-sm opacity-90">Data penelitian</p>
                        </div>
                        <i class="fas fa-flask text-2xl opacity-75"></i>
                    </div>
                </div>
                
                <div class="p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold">Statistic Publikasi</h3>
                            <div class=" p-6 rounded-lg shadow-md">
                                <canvas id="publicationsChart"></canvas>
                            </div>
                        </div>
                        <i class="fas fa-clipboard-check text-2xl opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
