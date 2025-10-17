@extends('layouts.private_app')

@section('title', 'Edit Publikasi')

@section('header')
    Edit Data Publikasi
@endsection

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    @include('components.notification')
    <form method="POST" action="{{ route('publikasi.update', $publikasi) }}" enctype="multipart/form-data" class="space-y-6" x-data="{ mahasiswa: {{ old('keterlibatan_mahasiswa', $publikasi->keterlibatan_mahasiswa) ? 'true' : 'false' }} }">
        @csrf
        @method('PUT')
        
        {{-- Judul --}}
        <div>
            <label for="judul" class="block font-medium text-sm text-gray-700">Judul Artikel/Makalah</label>
            <input id="judul" name="judul" type="text" value="{{ old('judul', $publikasi->judul) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        {{-- Nama Publikasi & Tahun --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nama_publikasi" class="block font-medium text-sm text-gray-700">Nama Jurnal / Proceeding</label>
                <input id="nama_publikasi" name="nama_publikasi" type="text" value="{{ old('nama_publikasi', $publikasi->nama_publikasi) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="tahun" class="block font-medium text-sm text-gray-700">Tahun</label>
                <input id="tahun" name="tahun" type="number" value="{{ old('tahun', $publikasi->tahun) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>

        {{-- Jenis & Kontribusi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="jenis" class="block font-medium text-sm text-gray-700">Jenis Publikasi</label>
                <select id="jenis" name="jenis" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="Internasional" {{ old('jenis', $publikasi->jenis) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                    <option value="Nasional" {{ old('jenis', $publikasi->jenis) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                </select>
            </div>
            <div>
                <label for="kontribusi" class="block font-medium text-sm text-gray-700">Kontribusi Penulis</label>
                <input id="kontribusi" name="kontribusi" type="text" value="{{ old('kontribusi', $publikasi->kontribusi) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: First Author">
            </div>
        </div>

        {{-- Pemeringkatan & Jumlah Sitasi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
             <div>
                <label for="pemeringkatan" class="block font-medium text-sm text-gray-700">Pemeringkatan</label>
                <input id="pemeringkatan" name="pemeringkatan" type="text" value="{{ old('pemeringkatan', $publikasi->pemeringkatan) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: Scopus Q1, Sinta 2">
            </div>
            <div>
                <label for="jumlah_sitasi" class="block font-medium text-sm text-gray-700">Jumlah Sitasi</label>
                <input id="jumlah_sitasi" name="jumlah_sitasi" type="number" value="{{ old('jumlah_sitasi', $publikasi->jumlah_sitasi) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>
        
        {{-- Keterlibatan Mahasiswa --}}
        <div class="space-y-2 border-t pt-4">
            <div class="flex items-center space-x-2">
                <input id="keterlibatan_mahasiswa" name="keterlibatan_mahasiswa" type="checkbox" value="1" class="rounded border-gray-300" x-model="mahasiswa" {{ old('keterlibatan_mahasiswa', $publikasi->keterlibatan_mahasiswa) ? 'checked' : '' }}>
                <label for="keterlibatan_mahasiswa" class="text-sm text-gray-700">Melibatkan Mahasiswa</label>
            </div>
            <div x-show="mahasiswa" x-transition>
                <label for="nama_mahasiswa" class="block font-medium text-sm text-gray-700">Nama Mahasiswa</label>
                <input id="nama_mahasiswa" name="nama_mahasiswa" type="text" value="{{ old('nama_mahasiswa', $publikasi->nama_mahasiswa) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>

        {{-- Checkbox Lainnya --}}
        <div class="space-y-2 border-t pt-4">
             <div class="flex items-center space-x-2">
                <input id="kesesuaian_roadmap" name="kesesuaian_roadmap" type="checkbox" value="1" class="rounded border-gray-300" {{ old('kesesuaian_roadmap', $publikasi->kesesuaian_roadmap) ? 'checked' : '' }}>
                <label for="kesesuaian_roadmap" class="text-sm text-gray-700">Sesuai Roadmap Penelitian</label>
            </div>
             <div class="flex items-center space-x-2">
                <input id="kesesuaian_topik_infokom" name="kesesuaian_topik_infokom" type="checkbox" value="1" class="rounded border-gray-300" {{ old('kesesuaian_topik_infokom', $publikasi->kesesuaian_topik_infokom) ? 'checked' : '' }}>
                <label for="kesesuaian_topik_infokom" class="text-sm text-gray-700">Sesuai Topik Infokom</label>
            </div>
        </div>
        
        {{-- URL & File --}}
        <div class="border-t pt-4 space-y-4">
            <div>
                <label for="url_doi" class="block font-medium text-sm text-gray-700">URL DOI</label>
                <input id="url_doi" name="url_doi" type="url" value="{{ old('url_doi', $publikasi->url_doi) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="file_path" class="block font-medium text-sm text-gray-700">Unggah File PDF Baru (Opsional)</label>
                <input id="file_path" name="file_path" type="file" class="mt-1 block w-full">
                 @if($publikasi->file_path)
                <p class="mt-2 text-sm text-gray-500">
                    File saat ini: <a href="{{ asset('storage/' . $publikasi->file_path) }}" target="_blank" class="text-indigo-600 hover:underline">Lihat/Unduh</a>
                </p>
                @endif
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">Update</button>
        </div>
    </form>
</div>
@endsection