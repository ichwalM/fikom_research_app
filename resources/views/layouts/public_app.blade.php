<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Fikom Research - Pusat Penelitian Fakultas Ilmu Komputer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/public_index.css') }}">
</head>
<body class="bg-dark-charcoal text-off-white font-sans">
    <!-- Menu Backdrop -->
    <div id="menuBackdrop" class="menu-backdrop fixed inset-0 bg-black/50 z-40 md:hidden"></div>
    
    <nav class="bg-dark-charcoal/95 backdrop-blur-sm fixed w-full z-50 border-b border-medium-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a class="flex items-center" href="{{request()->routeIs('home') ? '#home' : route('home') }}">
                    <img class="h-10 w-auto" src="https://fikom.umi.ac.id/wp-content/uploads/2023/01/LogoFikom_Putih.png" alt="Fikom Logo">
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{request()->routeIs('home') ? '#home' : route('home') }}" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Beranda</a>
                        <a href="#research" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Penelitian</a>
                        <a href="#faculty" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Dosen</a>
                        <a href="#publications" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Publikasi</a>
                        <a href="#contact" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Kontak</a>
                        <a href={{route('login')}} class="bg-golden-orange text-dark-charcoal px-4 py-2 rounded-lg text-sm font-semibold hover:bg-golden-orange/90 transition-all hover-lift">
                            Sign In
                        </a>
                    </div>
                </div>
                
                <!-- Mobile Hamburger Button -->
                <div class="md:hidden">
                    <button id="hamburgerBtn" class="hamburger text-off-white hover:text-golden-orange p-2">
                        <div class="hamburger-top"></div>
                        <div class="hamburger-middle"></div>
                        <div class="hamburger-bottom"></div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu fixed top-16 left-0 w-80 h-full bg-dark-charcoal shadow-xl md:hidden z-50">
            <div class="px-6 py-8 space-y-6 bg-black h-screen">
                <!-- Mobile Navigation Links -->
                <div class="space-y-4">
                    <a href="{{request()->routeIs('home') ? '#home' : route('home') }}" class="mobile-menu-link block text-off-white hover:text-golden-orange py-3 text-lg font-medium transition-colors border-b border-medium-gray/30">
                        <i class="fas fa-home mr-3"></i>Beranda
                    </a>
                    <a href="#research" class="mobile-menu-link block text-off-white hover:text-golden-orange py-3 text-lg font-medium transition-colors border-b border-medium-gray/30">
                        <i class="fas fa-flask mr-3"></i>Penelitian
                    </a>
                    <a href="#faculty" class="mobile-menu-link block text-off-white hover:text-golden-orange py-3 text-lg font-medium transition-colors border-b border-medium-gray/30">
                        <i class="fas fa-users mr-3"></i>Dosen
                    </a>
                    <a href="#publications" class="mobile-menu-link block text-off-white hover:text-golden-orange py-3 text-lg font-medium transition-colors border-b border-medium-gray/30">
                        <i class="fas fa-book mr-3"></i>Publikasi
                    </a>
                    <a href="#contact" class="mobile-menu-link block text-off-white hover:text-golden-orange py-3 text-lg font-medium transition-colors border-b border-medium-gray/30">
                        <i class="fas fa-envelope mr-3"></i>Kontak
                    </a>
                </div>
                
                <!-- Mobile Sign In Button -->
                <div class="pt-6">
                    <a href="{{route('login')}}" class="w-full bg-golden-orange text-dark-charcoal py-3 px-6 rounded-lg text-lg font-semibold hover:bg-golden-orange/90 transition-all">
                        <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                    </a>
                </div>
                
                <!-- Additional Mobile Menu Info -->
                <div class=" pt-6 border-t border-medium-gray/30">
                    <div class="text-center">
                        <p class="text-off-white/70 text-sm">Fakultas Ilmu Komputer</p>
                        <p class="text-golden-orange text-sm font-medium">Universitas Muslim Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="{{asset('js/public_index.js')}}"></script>

    @yield('content')
    @include('public.components.footerSection')
</body>
</html>