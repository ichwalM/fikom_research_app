@extends('layouts.public_app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="min-h-screen flex items-center justify-center pt-20 pb-8 px-4 sm:px-6 lg:px-8 login-bg">
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-dark-charcoal/60"></div>
    
    <!-- Login Form Container -->
    <div class="relative z-10 max-w-md w-full">
        <!-- Logo & Welcome Text -->
        
        <!-- Login Form -->
        <div class="glass-morphism rounded-2xl p-6 login-animation">
            <div class="text-center mb-8 login-animation">
                <div class="floating-animation inline-block mb-6">
                    <div class="w-20 h-20 bg-golden-orange rounded-full flex items-center justify-center mx-auto pulse-glow">
                        <i class="fas fa-user-graduate text-3xl text-dark-charcoal"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-golden-orange mb-2">Selamat Datang</h2>
            </div>
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-off-white mb-2">
                        <i class="fas fa-envelope mr-2 text-golden-orange"></i>Email
                    </label>
                    <div class="relative">
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required
                            class="input-focus w-full px-4 py-3 bg-medium-gray/50 border border-medium-gray rounded-lg text-off-white placeholder-off-white/60 focus:outline-none focus:border-golden-orange"
                            placeholder="nama@email.com"
                        >
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-at text-golden-orange/60"></i>
                        </div>
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-off-white mb-2">
                        <i class="fas fa-lock mr-2 text-golden-orange"></i>Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="input-focus w-full px-4 py-3 bg-medium-gray/50 border border-medium-gray rounded-lg text-off-white placeholder-off-white/60 focus:outline-none focus:border-golden-orange pr-12"
                            placeholder="Masukkan password"
                        >
                        <button 
                            type="button" 
                            id="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-golden-orange/60 hover:text-golden-orange transition duration-300"
                        >
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            id="remember" 
                            name="remember"
                            class="h-4 w-4 text-golden-orange bg-medium-gray border-medium-gray rounded focus:ring-golden-orange focus:ring-2"
                        >
                        <label for="remember" class="ml-2 text-sm text-off-white/80">
                            Ingat saya
                        </label>
                    </div>
                    <a href="/forgot-password" class="text-sm text-golden-orange hover:text-golden-orange/80 transition duration-300">
                        Lupa password?
                    </a>
                </div>

                <!-- Login Button -->
                <button 
                    type="submit"
                    class="w-full bg-golden-orange text-dark-charcoal py-3 px-4 rounded-lg font-semibold hover:bg-golden-orange/90 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-golden-orange focus:ring-offset-2 focus:ring-offset-dark-charcoal"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </button>
                <!-- Additional Info -->
        <div class="mt-8 text-center login-animation">
            <div class="bg-golden-orange/10 border border-golden-orange/30 rounded-lg p-4">
                <div class="flex items-center justify-center mb-2">
                    <i class="fas fa-info-circle text-golden-orange mr-2"></i>
                    <span class="text-sm font-medium text-golden-orange">Informasi</span>
                </div>
                <p class="text-xs text-off-white/70">
                    Akses terbatas hanya untuk civitas akademika Fakultas Ilmu Komputer. 
                    Hubungi administrator jika mengalami kendala.
                </p>
            </div>
        </div>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-medium-gray"></div>
                    </div>
                </div>
            </form>
        </div>

        
    </div>
</div>
<script src="{{ asset('js/login.js') }}"></script>
@endsection
