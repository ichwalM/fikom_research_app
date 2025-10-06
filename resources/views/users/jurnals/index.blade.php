@extends('layouts.private_app')
@section('title', 'Manajemen Jurnal')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Jurnal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if (session('success'))
                        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('jurnals.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            Tambah Jurnal
                        </a>
                    </div>
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul Artikel</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Jurnal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tahun</th>
                                @if(Auth::user()->role->name === 'Admin Fakultas')
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                                @endif
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($jurnals as $jurnal)
                            <tr>
                                <td class="px-6 py-4">{{ $jurnal->judul_artikel }}</td>
                                <td class="px-6 py-4">{{ $jurnal->nama_jurnal }}</td>
                                <td class="px-6 py-4">{{ $jurnal->tahun_terbit }}</td>
                                @if(Auth::user()->role->name === 'Admin Fakultas')
                                    <td class="px-6 py-4">{{ $jurnal->user->name }}</td>
                                @endif
                                <td class="px-6 py-4 text-sm font-medium">
                                    {{-- @if($jurnal->file_path) --}}
                                        <a href="{{ asset('storage/' . $jurnal->file_path) }}" target="_blank" class="text-green-600 hover:text-green-900" download>
                                            Unduh
                                        </a>
                                    {{-- @endif --}}
                                    <a href="{{ route('jurnals.edit', $jurnal) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form class="inline-block" action="{{ route('jurnals.destroy', $jurnal) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurnal ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ms-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    Belum ada data jurnal.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection