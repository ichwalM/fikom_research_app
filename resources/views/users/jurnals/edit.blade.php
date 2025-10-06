@extends('layouts.private_app')
@section('content')    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Jurnal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('jurnals.update', $jurnal) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        {{-- Judul Artikel --}}
                        <div>
                            <x-input-label for="judul_artikel" :value="__('Judul Artikel')" />
                            <x-text-input id="judul_artikel" class="block mt-1 w-full" type="text" name="judul_artikel" :value="old('judul_artikel', $jurnal->judul_artikel)" required autofocus />
                        </div>

                        {{-- Nama Jurnal --}}
                        <div class="mt-4">
                            <x-input-label for="nama_jurnal" :value="__('Nama Jurnal/Konferensi')" />
                            <x-text-input id="nama_jurnal" class="block mt-1 w-full" type="text" name="nama_jurnal" :value="old('nama_jurnal', $jurnal->nama_jurnal)" required />
                        </div>
                        
                        {{-- Tahun Terbit --}}
                        <div class="mt-4">
                            <x-input-label for="tahun_terbit" :value="__('Tahun Terbit')" />
                            <x-text-input id="tahun_terbit" class="block mt-1 w-full" type="number" name="tahun_terbit" :value="old('tahun_terbit', $jurnal->tahun_terbit)" required />
                        </div>
                        
                        {{-- URL Publikasi --}}
                        <div class="mt-4">
                            <x-input-label for="url_publikasi" :value="__('URL Publikasi (Contoh: Link Google Scholar)')" />
                            <x-text-input id="url_publikasi" class="block mt-1 w-full" type="url" name="url_publikasi" :value="old('url_publikasi', $jurnal->url_publikasi)" />
                        </div>

                        {{-- File PDF --}}
                        <div class="mt-4">
                            <label for="file_path" class="block font-medium text-sm text-gray-700">Unggah File PDF Baru (Opsional)</label>
                            <input id="file_path" name="file_path" type="file"  class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @if($jurnal->file_path)
                            <p class="mt-2 text-sm text-gray-500">
                                File saat ini: <a href="{{ asset('storage/' . $jurnal->file_path) }}" target="_blank" class="text-indigo-600 hover:underline">Lihat/Unduh</a>
                            </p>
                            @endif
                            @error('file_path')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection