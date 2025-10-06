@extends('layouts.public_app')

@section('title', $dosen->name)

@section('content')
    <div class="pt-24 bg-gray-100"> {{-- Memberi jarak dari navigasi --}}
        <section class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                {{-- KOP PROFIL --}}
                <div class="flex flex-col md:flex-row items-center bg-white p-8 rounded-lg shadow-md">
                    <img class="h-48 w-48 rounded-full object-cover ring-4 ring-white shadow-lg mb-6 md:mb-0 md:mr-8" 
                        src="{{ $dosen->dosenProfile?->foto_profil ? asset('storage/' . $dosen->dosenProfile->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($dosen->name) . '&background=random&color=fff&size=192' }}" 
                        alt="Foto {{ $dosen->name }}">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-800">{{ $dosen->name }}</h1>
                        <p class="text-xl text-gray-500 mt-1">Dosen Fakultas Ilmu Komputer</p>
                        
                        <div class="mt-4 flex space-x-6 text-gray-600">
                            @if($dosen->dosenProfile?->sinta_id)
                                <a href="https://sinta.kemdikbud.go.id/authors/detail?id={{ $dosen->dosenProfile->sinta_id }}" target="_blank" class="hover:text-indigo-600">Sinta ID: {{ $dosen->dosenProfile->sinta_id }}</a>
                            @endif
                            @if($dosen->dosenProfile?->google_scholar_id)
                                <a href="https://scholar.google.com/citations?user={{ $dosen->dosenProfile->google_scholar_id }}" target="_blank" class="hover:text-indigo-600">Google Scholar</a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- STATISTIK & DETAIL --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
                    {{-- Kolom Statistik --}}
                    <div class="lg:col-span-1">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold text-gray-900 border-b pb-3">Statistik</h3>
                            <div class="space-y-4 mt-4 text-gray-700">
                                <div class="flex justify-between"><span>Total Sitasi:</span> <span class="font-bold">{{ $dosen->dosenProfile?->statistic?->total_sitasi ?? 0 }}</span></div>
                                <div class="flex justify-between"><span>H-Index:</span> <span class="font-bold">{{ $dosen->dosenProfile?->statistic?->h_index ?? 0 }}</span></div>
                                <div class="flex justify-between"><span>i10-Index:</span> <span class="font-bold">{{ $dosen->dosenProfile?->statistic?->i10_index ?? 0 }}</span></div>
                            </div>
                        </div>
                    </div>

                    {{-- Kolom Publikasi --}}
                    <div class="lg:col-span-2">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold text-gray-900 border-b pb-3 mb-4">Publikasi Jurnal</h3>
                            <div class="space-y-4">
                            @forelse($dosen->jurnals as $jurnal)
                                <div>
                                    <a href="{{ $jurnal->url_publikasi ?? '#' }}" target="_blank" class="text-indigo-600 hover:underline font-semibold">{{ $jurnal->judul_artikel }}</a>
                                    <p class="text-sm text-gray-600">{{ $jurnal->nama_jurnal }}, {{ $jurnal->tahun_terbit }}</p>
                                    @if($jurnal->file_path)
                                        <a href="{{ asset('storage/' . $jurnal->file_path) }}" download class="text-sm text-green-600 hover:underline">Unduh PDF</a>
                                    @endif
                                </div>
                            @empty
                                <p class="text-gray-500">       Belum ada data publikasi.</p>
                            @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection