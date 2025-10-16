@extends('layouts.private_app')
@section('title', 'Tambah Data Penelitian')
@section('header', 'Tambah Data Penelitian Baru')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    
    <form method="POST" action="{{ route('penelitian.store') }}" class="space-y-6" x-data="{ mahasiswa: false }">
        @csrf
        
        <div>
            <label for="judul" class="block font-medium text-sm text-gray-700">Judul Penelitian</label>
            <input id="judul" name="judul" type="text" value="{{ old('judul') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('judul')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="skema_penelitian_id" class="block font-medium text-sm text-gray-700">Skema Penelitian</label>
                <select id="skema_penelitian_id" name="skema_penelitian_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">Pilih Skema</option>
                    @foreach($skemas as $skema)
                        <option value="{{ $skema->id }}">{{ $skema->nama_skema }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="status_peneliti" class="block font-medium text-sm text-gray-700">Status Peneliti</label>
                <select id="status_peneliti" name="status_peneliti" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">Pilih Status</option>
                    <option value="Ketua">Ketua</option>
                    <option value="Anggota">Anggota</option>
                </select>
            </div>
            <div>
                <label for="tahun" class="block font-medium text-sm text-gray-700">Tahun Pelaksanaan</label>
                <input id="tahun" name="tahun" type="number" value="{{ old('tahun', date('Y')) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="sumber_dana" class="block font-medium text-sm text-gray-700">Sumber Dana</label>
                <input id="sumber_dana" name="sumber_dana" type="text" value="{{ old('sumber_dana') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="jumlah_dana" class="block font-medium text-sm text-gray-700">Jumlah Dana</label>
                <input id="jumlah_dana" name="jumlah_dana" type="number" value="{{ old('jumlah_dana') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>

        <div class="space-y-2 border-t pt-4">
            <div class="flex items-center space-x-2">
                <input id="keterlibatan_mahasiswa" name="keterlibatan_mahasiswa" type="checkbox" value="1" class="rounded border-gray-300" x-model="mahasiswa">
                <label for="keterlibatan_mahasiswa" class="text-sm text-gray-700">Melibatkan Mahasiswa</label>
            </div>
            <div x-show="mahasiswa" x-transition>
                <label for="nama_mahasiswa" class="block font-medium text-sm text-gray-700">Nama Mahasiswa</label>
                <input id="nama_mahasiswa" name="nama_mahasiswa" type="text" value="{{ old('nama_mahasiswa') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>

        <div class="space-y-2 border-t pt-4">
             <div class="flex items-center space-x-2">
                <input id="kesesuaian_roadmap" name="kesesuaian_roadmap" type="checkbox" value="1" class="rounded border-gray-300">
                <label for="kesesuaian_roadmap" class="text-sm text-gray-700">Sesuai Roadmap Penelitian</label>
            </div>
             <div class="flex items-center space-x-2">
                <input id="kesesuaian_topik_infokom" name="kesesuaian_topik_infokom" type="checkbox" value="1" class="rounded border-gray-300">
                <label for="kesesuaian_topik_infokom" class="text-sm text-gray-700">Sesuai Topik Infokom</label>
            </div>
             <div class="flex items-center space-x-2">
                <input id="mendapatkan_hki" name="mendapatkan_hki" type="checkbox" value="1" class="rounded border-gray-300">
                <label for="mendapatkan_hki" class="text-sm text-gray-700">Mendapatkan HKI</label>
            </div>
        </div>
        
        <div class="border-t pt-4 space-y-4">
             <div>
                <label for="link_kontrak_penelitian" class="block font-medium text-sm text-gray-700">Link Kontrak Penelitian (Opsional)</label>
                <input id="link_kontrak_penelitian" name="link_kontrak_penelitian" type="url" value="{{ old('link_kontrak_penelitian') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="matakuliah" class="block font-medium text-sm text-gray-700">Dihasilkan untuk Matakuliah (Opsional)</label>
                <input id="matakuliah" name="matakuliah" type="text" value="{{ old('matakuliah') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="keterangan" class="block font-medium text-sm text-gray-700">Keterangan (Opsional)</label>
                <textarea id="keterangan" name="keterangan" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('keterangan') }}</textarea>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">Simpan</button>
        </div>
    </form>
</div>
@endsection