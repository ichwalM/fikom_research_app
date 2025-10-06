<section id="faculty" class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Researchers Profile Highlights</h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-8">
            @forelse($dosenUnggulan as $dosen)
                <div class="text-center">
                    <a href="{{ route('dosen.show', $dosen) }}" class="inline-block group">
                        <img class="h-32 w-32 rounded-full mx-auto object-cover ring-4 ring-white shadow-lg group-hover:ring-golden-orange transition-all duration-300" 
                            src="{{ $dosen->dosenProfile?->foto_profil ? asset('storage/' . $dosen->dosenProfile->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($dosen->name) . '&background=random&color=fff' }}" 
                            alt="Foto {{ $dosen->name }}">
                        <div class="mt-4">
                            <h4 class="text-lg font-semibold text-gray-800">{{ $dosen->name }}</h4>
                            <p class="text-gray-500 text-sm mt-1">Teknik Informatika</p>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-4">Belum ada data dosen untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>
</section>