@extends('layouts.private_app')

@section('title', 'Laporan Publikasi')
@section('header', 'Laporan Publikasi Dosen')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <form method="GET" action="{{ route('admin.laporan.publikasi') }}" class="mb-6">
        <div class="flex flex-col md:flex-row md:items-end md:space-x-4 space-y-4 md:space-y-0">
            
            {{-- Filter Jenis --}}
            <div>
                <label for="jenis" class="block font-medium text-sm text-gray-700">Filter Berdasarkan Jenis</label>
                <select name="jenis" id="jenis" class="mt-1 block w-full md:w-64 border-gray-300 rounded-md shadow-sm">
                    <option value="">Semua Jenis</option>
                    @foreach($jenisOptions as $jenis)
                        <option value="{{ $jenis }}" {{ request('jenis') == $jenis ? 'selected' : '' }}>
                            {{ $jenis }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Tahun --}}
            <div>
                <label for="tahun" class="block font-medium text-sm text-gray-700">Filter Berdasarkan Tahun</label>
                <select name="tahun" id="tahun" class="mt-1 block w-full md:w-48 border-gray-300 rounded-md shadow-sm">
                    <option value="">Semua Tahun</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol Filter --}}
            <div class="flex items-center space-x-2">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">Filter</button>
                <a href="{{ route('admin.laporan.publikasi') }}" class="ml-2 text-sm text-gray-600 hover:underline">Reset</a>
                <a href="{{ route('admin.laporan.publikasi.export', request()->query()) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-green-700">
                    Export ke Excel
                </a>
            </div>
        </div>
    </form>

    <div class="border border-gray-200 rounded-lg overflow-x-auto">
        @php
            $selectedYear = request('tahun');
        @endphp

        <div class="p-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">
            Rekapitulasi {{ $selectedYear ? 'Tahun '.$selectedYear : 'Semua Tahun' }}
            </h2>
        </div>
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIDN</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kontribusi</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Jurnal/Proceeding</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pemeringkatan</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mhs Terlibat</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Mahasiswa</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sesuai Roadmap</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sesuai Topik Infokom</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Sitasi</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Link Publikasi (DOI)</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($publikasi as $index => $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">{{ $item->user?->name ?? 'Pengguna Dihapus' }}</td>
                    <td class="px-4 py-3">{{ $item->user?->dosenProfile?->nidn_nip ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $item->judul }}</td>
                    <td class="px-4 py-3">{{ $item->kontribusi ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $item->nama_publikasi }}</td>
                    <td class="px-4 py-3">{{ $item->pemeringkatan ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $item->keterlibatan_mahasiswa ? 'Ya' : 'Tidak' }}</td>
                    <td class="px-4 py-3">{{ $item->nama_mahasiswa ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $item->kesesuaian_roadmap ? 'Ya' : 'Tidak' }}</td>
                    <td class="px-4 py-3">{{ $item->kesesuaian_topik_infokom ? 'Ya' : 'Tidak' }}</td>
                    <td class="px-4 py-3">{{ $item->jumlah_sitasi ?? 0 }}</td>
                    <td class="px-4 py-3">
                        @if($item->url_doi)
                            <a href="{{ $item->url_doi }}" target="_blank" class="text-indigo-600 hover:underline">Link</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="13" class="px-6 py-4 text-center text-gray-500">Tidak ada data publikasi yang cocok dengan filter.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection