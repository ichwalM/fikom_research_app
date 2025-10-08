@extends('layouts.private_app')

@section('title', 'Manajemen Publikasi')

@section('header')
    Manajemen Publikasi
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        @if (session('success'))
            <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('publikasi.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">
                Tambah Publikasi
            </a>
        </div>
        
        <div class="border border-gray-200 rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tahun</th>
                        @if(Auth::user()->role->name === 'Admin Fakultas')
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Penulis</th>
                        @endif
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($publikasi as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ Str::limit($item->judul, 50) }}</td>
                        <td class="px-6 py-4">{{ $item->jenis }}</td>
                        <td class="px-6 py-4">{{ $item->tahun }}</td>
                        @if(Auth::user()->role->name === 'Admin Fakultas')
                            <td class="px-6 py-4">{{ $item->user->name }}</td>
                        @endif
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            @if($item->file_path)
                                <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="text-green-600 hover:text-green-900" download>Unduh</a>
                            @endif
                            <a href="{{ route('publikasi.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900 ml-2">Edit</a>
                            <form class="inline-block" action="{{ route('publikasi.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data publikasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection