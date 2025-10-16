@extends('layouts.private_app')
@section('title', 'Tambah Skema')
@section('header', 'Tambah Skema Penelitian Baru')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto">
    <form method="POST" action="{{ route('admin.skema-penelitian.store') }}" class="space-y-6">
        @csrf
        
        <div>
            <label for="nama_skema" class="block font-medium text-sm text-gray-700">Nama Skema</label>
            <input id="nama_skema" name="nama_skema" type="text" value="{{ old('nama_skema') }}" required autofocus class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('nama_skema') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">Simpan</button>
        </div>
    </form>
</div>
@endsection