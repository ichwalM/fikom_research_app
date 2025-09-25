@extends('layouts.public_app')
@section('content')
    <section id="home" class="hero-bg h-screen flex items-center justify-center relative">
        <div class="absolute inset-0 bg-dark-charcoal/70"></div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 fade-in">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                <span class="text-golden-orange">Fikom</span>
                <span class="text-off-white">Research</span>
            </h1>
            <p class="text-xl md:text-2xl text-off-white mb-8 max-w-3xl mx-auto">
                Pusat Keunggulan Penelitian Fakultas Ilmu Komputer
                <br>
                <span class="text-golden-orange">Inovasi • Kolaborasi • Transformasi Digital</span>
            </p>
            <div class="space-x-4 space-y-2 md:space-y-0 flex flex-col md:flex-row justify-center gap-4">
                <button class="bg-golden-orange text-dark-charcoal px-8 py-3 rounded-lg text-lg font-semibold hover:bg-golden-orange/90 transition-all hover-lift">
                    Jelajahi Penelitian
                </button>
                <button class="border-2 border-golden-orange text-golden-orange px-8 py-3 rounded-lg text-lg font-semibold hover:bg-golden-orange hover:text-dark-charcoal transition-all hover-lift">
                    Bergabung
                </button>
            </div>
        </div>
    </section>

    <!-- Research Areas -->
    <section id="research" class="py-20 bg-medium-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-off-white mb-4">Area Penelitian</h2>
                <p class="text-xl text-off-white/80">Fokus penelitian unggulan kami</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-dark-charcoal p-8 rounded-xl hover-lift">
                    <div class="w-16 h-16 bg-golden-orange rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-dark-charcoal" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12a2 2 0 002-2 2 2 0 002-2 2 2 0 002-2V6a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-golden-orange mb-4">Artificial Intelligence</h3>
                    <p class="text-off-white/80">Machine Learning, Deep Learning, Natural Language Processing, dan Computer Vision</p>
                </div>
                
                <div class="bg-dark-charcoal p-8 rounded-xl hover-lift">
                    <div class="w-16 h-16 bg-golden-orange rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-dark-charcoal" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-golden-orange mb-4">Data Science</h3>
                    <p class="text-off-white/80">Big Data Analytics, Data Mining, Business Intelligence, dan Predictive Analytics</p>
                </div>
                
                <div class="bg-dark-charcoal p-8 rounded-xl hover-lift">
                    <div class="w-16 h-16 bg-golden-orange rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-dark-charcoal" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 12.846 4.632 15 6.414 15H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 5H6.28l-.31-1.243A1 1 0 005 3H4zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-golden-orange mb-4">Cyber Security</h3>
                    <p class="text-off-white/80">Network Security, Cryptography, Digital Forensics, dan Information Security</p>
                </div>
                
                <div class="bg-dark-charcoal p-8 rounded-xl hover-lift">
                    <div class="w-16 h-16 bg-golden-orange rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-dark-charcoal" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-golden-orange mb-4">Human-Computer Interaction</h3>
                    <p class="text-off-white/80">UI/UX Design, Usability Engineering, Mobile Computing, dan Web Technologies</p>
                </div>
                
                <div class="bg-dark-charcoal p-8 rounded-xl hover-lift">
                    <div class="w-16 h-16 bg-golden-orange rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-dark-charcoal" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-golden-orange mb-4">Software Engineering</h3>
                    <p class="text-off-white/80">Software Development, System Architecture, DevOps, dan Quality Assurance</p>
                </div>
                
                <div class="bg-dark-charcoal p-8 rounded-xl hover-lift">
                    <div class="w-16 h-16 bg-golden-orange rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-dark-charcoal" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-golden-orange mb-4">Internet of Things</h3>
                    <p class="text-off-white/80">Smart Systems, Sensor Networks, Edge Computing, dan Embedded Systems</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="py-20 bg-dark-charcoal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div class="fade-in">
                    <div class="text-5xl font-bold text-golden-orange mb-2">150+</div>
                    <div class="text-xl text-off-white">Penelitian Aktif</div>
                </div>
                <div class="fade-in">
                    <div class="text-5xl font-bold text-golden-orange mb-2">75+</div>
                    <div class="text-xl text-off-white">Publikasi Ilmiah</div>
                </div>
                <div class="fade-in">
                    <div class="text-5xl font-bold text-golden-orange mb-2">45+</div>
                    <div class="text-xl text-off-white">Peneliti</div>
                </div>
                <div class="fade-in">
                    <div class="text-5xl font-bold text-golden-orange mb-2">25+</div>
                    <div class="text-xl text-off-white">Mitra Industri</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-medium-gray">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-off-white mb-4">Hubungi Kami</h2>
                <p class="text-xl text-off-white/80">Mari berkolaborasi dalam penelitian</p>
            </div>
            
            <div class="bg-dark-charcoal p-8 rounded-xl">
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-off-white mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full px-4 py-3 bg-medium-gray border border-medium-gray rounded-lg text-off-white focus:border-golden-orange focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-off-white mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-3 bg-medium-gray border border-medium-gray rounded-lg text-off-white focus:border-golden-orange focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-off-white mb-2">Subjek</label>
                        <input type="text" class="w-full px-4 py-3 bg-medium-gray border border-medium-gray rounded-lg text-off-white focus:border-golden-orange focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-off-white mb-2">Pesan</label>
                        <textarea rows="5" class="w-full px-4 py-3 bg-medium-gray border border-medium-gray rounded-lg text-off-white focus:border-golden-orange focus:outline-none resize-none"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-golden-orange text-dark-charcoal px-8 py-3 rounded-lg text-lg font-semibold hover:bg-golden-orange/90 transition-all hover-lift">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark-charcoal py-12 border-t border-medium-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="text-3xl font-bold text-golden-orange mb-4">Fikom-Research</div>
                <p class="text-off-white/80 mb-6">Fakultas Ilmu Komputer - Universitas</p>
                <div class="flex justify-center space-x-6">
                    <a href="#" class="text-off-white hover:text-golden-orange transition-colors">Facebook</a>
                    <a href="#" class="text-off-white hover:text-golden-orange transition-colors">Twitter</a>
                    <a href="#" class="text-off-white hover:text-golden-orange transition-colors">LinkedIn</a>
                    <a href="#" class="text-off-white hover:text-golden-orange transition-colors">Instagram</a>
                </div>
                <div class="mt-8 pt-8 border-t border-medium-gray text-off-white/60">
                    <p>&copy; 2025 Fikom-Research. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Background images for hero section
        const backgroundImages = [
            'https://fikom.umi.ac.id/wp-content/uploads/2025/09/ICEEIE-2025-1-2048x1223.webp',
            'https://fikom.umi.ac.id/wp-content/uploads/2025/08/Workshop-Nvidia-1-2048x1223.webp',
            '{{ asset('images/hero1.jpg') }}',
            '{{ asset('images/hero2.jpg') }}',
        ];

        let currentImageIndex = 0;
        const heroSection = document.querySelector('.hero-bg');

        function changeBackground() {
            heroSection.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;
            currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
        }

        // Set initial background
        changeBackground();

        // Change background every 5 seconds
        setInterval(changeBackground, 3000);

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

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 100) {
                navbar.classList.add('bg-dark-charcoal/98');
            } else {
                navbar.classList.remove('bg-dark-charcoal/98');
            }
        });
    </script>
@endsection