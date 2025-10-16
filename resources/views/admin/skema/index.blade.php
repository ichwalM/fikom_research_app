@extends('layouts.private_app')

@section('title', 'Master Skema Penelitian')

@section('header')
    Master Skema Penelitian
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        {{-- @if (session('success'))
            <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif --}}
        @include('components.notification')

        <div class="mb-4">
            <a href="{{ route('admin.skema-penelitian.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">
                Tambah Skema Baru
            </a>
        </div>
        
        <div class="border border-gray-200 rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Skema</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($skemas as $skema)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $skema->nama_skema }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.skema-penelitian.edit', $skema) }}" class="text-indigo-600 hover:text-indigo-900 ml-2">Edit</a>
                            <form class="inline-block" action="{{ route('admin.skema-penelitian.destroy', $skema) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus skema ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center text-gray-500">Belum ada data skema penelitian.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection