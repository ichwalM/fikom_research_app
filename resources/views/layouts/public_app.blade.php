<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fikom Research - Pusat Penelitian Fakultas Ilmu Komunikasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero-bg {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-image 1s ease-in-out;
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(0); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .hover-lift {
            transition: transform 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
        }

        /* Hamburger Menu Animation */
        .hamburger {
            cursor: pointer;
            width: 24px;
            height: 24px;
            transition: all 0.25s;
            position: relative;
        }

        .hamburger-top,
        .hamburger-middle,
        .hamburger-bottom {
            position: absolute;
            top: 0;
            left: 0;
            width: 24px;
            height: 2px;
            background: currentColor;
            transform: rotate(0);
            transition: all 0.5s;
        }

        .hamburger-middle {
            transform: translateY(7px);
        }

        .hamburger-bottom {
            transform: translateY(14px);
        }

        .open .hamburger-top {
            transform: rotate(45deg) translateY(6px) translateX(6px);
        }

        .open .hamburger-middle {
            display: none;
        }

        .open .hamburger-bottom {
            transform: rotate(-45deg) translateY(6px) translateX(-6px);
        }

        /* Mobile Menu Slide Animation */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        /* Backdrop for mobile menu */
        .menu-backdrop {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }

        .menu-backdrop.open {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-dark-charcoal text-off-white font-sans">
    <!-- Menu Backdrop -->
    <div id="menuBackdrop" class="menu-backdrop fixed inset-0 bg-black/50 z-40 md:hidden"></div>
    
    <nav class="bg-dark-charcoal/95 backdrop-blur-sm fixed w-full z-50 border-b border-medium-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <img class="h-10 w-auto" src="https://fikom.umi.ac.id/wp-content/uploads/2023/01/LogoFikom_Putih.png" alt="Fikom Logo">
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#home" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Beranda</a>
                        <a href="#research" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Penelitian</a>
                        <a href="#faculty" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Dosen</a>
                        <a href="#publications" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Publikasi</a>
                        <a href="#contact" class="text-off-white hover:text-golden-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Kontak</a>
                        <a href="#" class="bg-golden-orange text-dark-charcoal px-4 py-2 rounded-lg text-sm font-semibold hover:bg-golden-orange/90 transition-all hover-lift">
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
            <div class="px-6 py-8 space-y-6 bg-black">
                <!-- Mobile Navigation Links -->
                <div class="space-y-4">
                    <a href="#home" class="mobile-menu-link block text-off-white hover:text-golden-orange py-3 text-lg font-medium transition-colors border-b border-medium-gray/30">
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
                    <a href="#" class="w-full bg-golden-orange text-dark-charcoal py-3 px-6 rounded-lg text-lg font-semibold hover:bg-golden-orange/90 transition-all">
                        <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                    </a>
                </div>
                
                <!-- Additional Mobile Menu Info -->
                <div class="pt-6 border-t border-medium-gray/30">
                    <div class="text-center">
                        <p class="text-off-white/70 text-sm">Fakultas Ilmu Komunikasi</p>
                        <p class="text-golden-orange text-sm font-medium">Universitas Muslim Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        // Mobile Menu Toggle
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuBackdrop = document.getElementById('menuBackdrop');
        const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

        function toggleMobileMenu() {
            hamburgerBtn.classList.toggle('open');
            mobileMenu.classList.toggle('open');
            menuBackdrop.classList.toggle('open');
            
            // Prevent body scroll when menu is open
            if (mobileMenu.classList.contains('open')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }

        function closeMobileMenu() {
            hamburgerBtn.classList.remove('open');
            mobileMenu.classList.remove('open');
            menuBackdrop.classList.remove('open');
            document.body.style.overflow = 'auto';
        }

        // Event Listeners
        hamburgerBtn.addEventListener('click', toggleMobileMenu);
        menuBackdrop.addEventListener('click', closeMobileMenu);

        // Close menu when clicking on menu links
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Close menu on window resize if desktop view
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                closeMobileMenu();
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    
    @yield('content')
</body>
</html>