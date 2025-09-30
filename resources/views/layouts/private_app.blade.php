<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <title>@yield('title', 'Research Fikom App')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="{{ asset('css/private/style.css') }}">
    </head>
    <body class="bg-gray-100 font-sans">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <asside class="w-64 bg-dark-charcoal text-white shadow-lg overflow-y-auto custom-scroll">
                <div class="p-4 border-b border-medium-gray sticky top-0 bg-dark-charcoal z-10">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-golden-orange to-yellow-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-lg"></i>
                        </div>
                        <a href={{route('dashboard')}} class="text-lg font-semibold text-white hover:text-golden-orange">
                            <h1 class="text-xl font-bold">Fikom Research</h1>
                        </a>
                    </div>
                    
                    <div class="bg-white text-dark-charcoal px-3 py-2 rounded text-sm font-medium text-center mb-4">
                        <span id="currentDate">Memuat waktu...</span>
                    </div>
                    
                    <div class="text-sm">
                        <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong></p>
                        @if (Auth::user()->role->name === 'Admin Fakultas')
                            <p class="text-blue-200">Admin Fakultas Ilmu Komputer</p>
                        @elseif (Auth::user()->role->name === 'Dosen')
                            <p class="text-blue-200">Dosen</p>
                        @endif
                        <p class="text-blue-200">Teknik Informatika</p>
                    </div>
                </div>

                <nav class="mt-2 pb-4">
                    
                    <div class="px-4 py-1">
                        <button class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200" onclick="toggleSubmenu('profile')">
                            <i class="fas fa-user text-lg w-5 text-center"></i>
                            <span class="flex-1 text-left">Profil</span>
                            <i class="fas fa-chevron-down text-sm transition-transform duration-200" id="profile-arrow"></i>
                        </button>
                        
                        <div class="ml-6 mt-1 space-y-1 hidden" id="profile-submenu">
                            <a href={{route('profile.edit')}} class="block px-3 py-2 text-sm text-blue-200 hover:text-white hover:bg-blue-700 rounded transition-colors duration-200">Data pribadi</a>
                            <a href="#" class="block px-3 py-2 text-sm text-blue-200 hover:text-white hover:bg-blue-700 rounded transition-colors duration-200">Inpassing</a>
                            <a href="#" class="block px-3 py-2 text-sm text-blue-200 hover:text-white hover:bg-blue-700 rounded transition-colors duration-200">Jabatan fungsional</a>
                            <a href="#" class="block px-3 py-2 text-sm text-blue-200 hover:text-white hover:bg-blue-700 rounded transition-colors duration-200">Kepangkatan</a>
                            <a href="#" class="block px-3 py-2 text-sm text-blue-200 hover:text-white hover:bg-blue-700 rounded transition-colors duration-200">Penempatan</a>
                        </div>
                    </div>

                    @if (Auth::user()->role->name === 'Admin Fakultas')
                        <div class="px-4 py-1">
                            <a href="{{ route('admin.users.index') }}" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-users"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap">Users Management</span>
                            </a>
                        </div>
                    @endif

                    <div class="px-4 py-1">
                        <a href="#" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                            <i class="fas fa-certificate text-lg w-5 text-center"></i>
                            <span class="flex-1 text-left">Kualifikasi</span>
                        </a>
                    </div>

                    <div class="px-4 py-1">
                        <a href="#" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                            <i class="fas fa-star text-lg w-5 text-center"></i>
                            <span class="flex-1 text-left">Kompetensi</span>
                        </a>
                    </div>

                    <div class="px-4 py-1">
                        <button class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200" onclick="toggleSubmenu('pendidikan')">
                            <i class="fas fa-book text-lg w-5 text-center"></i>
                            <span class="flex-1 text-left">Pelaks. pendidikan</span>
                            <i class="fas fa-chevron-down text-sm transition-transform duration-200" id="pendidikan-arrow"></i>
                        </button>
                        
                        <div class="ml-6 mt-1 space-y-1 hidden" id="pendidikan-submenu">
                            <a href="#" class="block px-3 py-2 text-sm text-blue-200 hover:text-white hover:bg-blue-700 rounded transition-colors duration-200">Data Mata Kuliah</a>
                            <a href="#" class="block px-3 py-2 text-sm text-blue-200 hover:text-white hover:bg-blue-700 rounded transition-colors duration-200">Bimbingan</a>
                            </div>
                    </div>

                    <div class="space-y-1">
                        <div class="px-4 py-1">
                            <a href="{{ route('jurnals.index') }}" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-flask text-lg w-5 text-center"></i>
                                <span class="flex-1 text-left">Pelaks. penelitian</span>
                            </a>
                        </div>
                        <div class="px-4 py-1">
                            <a href="#" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-hands-helping text-lg w-5 text-center"></i>
                                <span class="flex-1 text-left">Pelaks. pengabdian</span>
                            </a>
                        </div>
                        <div class="px-4 py-1">
                            <a href="#" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-cogs text-lg w-5 text-center"></i>
                                <span class="flex-1 text-left">Penunjang</span>
                            </a>
                        </div>
                        <div class="px-4 py-1">
                            <a href="#" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-trophy text-lg w-5 text-center"></i>
                                <span class="flex-1 text-left">Reward</span>
                            </a>
                        </div>
                        <div class="px-4 py-1">
                            <a href="#" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-file-alt text-lg w-5 text-center"></i>
                                <span class="flex-1 text-left">Layanan BKD</span>
                            </a>
                        </div>
                        <div class="px-4 py-1">
                            <a href="#" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-clipboard-check text-lg w-5 text-center"></i>
                                <span class="flex-1 text-left">Layanan PAK</span>
                            </a>
                        </div>
                        <div class="px-4 py-1">
                            <a href="#" class="menu-button w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-award text-lg w-5 text-center"></i>
                                <span class="flex-1 text-left">Layanan Serdos</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </asside>

            <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header Konten -->
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                                    @yield('title', 'Dashboard')
                                </h2>
                                <div class="text-sm text-gray-500 mt-1">
                                    Beranda / @yield('title', 'Dashboard')
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 text-sm font-medium text-gray-600">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:text-gray-900 flex items-center space-x-1">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Keluar</span>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Area Konten Utama -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        <script src={{ asset('js/private/main.js') }}></script>
        @stack('scripts')
    </body>
</html>