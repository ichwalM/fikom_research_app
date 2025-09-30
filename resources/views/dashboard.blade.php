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
                
                <div class="bg-gradient-to-br from-green-500 to-green-700 text-white p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold">Layanan</h3>
                            <p class="text-sm opacity-90">BKD, PAK, Serdos</p>
                        </div>
                        <i class="fas fa-clipboard-check text-2xl opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
