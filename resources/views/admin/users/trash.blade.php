<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tong Sampah Pengguna') }}
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

                    <a href="{{ route('admin.users.index') }}" class="text-indigo-600 hover:text-indigo-900 mb-4 inline-block">&larr; Kembali ke Daftar Pengguna</a>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left ...">Nama</th>
                                <th class="px-6 py-3 text-left ...">Email</th>
                                <th class="px-6 py-3 text-left ...">Tanggal Dihapus</th>
                                <th class="px-6 py-3 text-left ...">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($users as $user)
                            <tr>
                                <td class="px-6 py-4">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">{{ $user->deleted_at->format('d M Y, H:i') }}</td>
                                <td class="px-6 py-4 text-sm font-medium">
                                    <form class="inline-block" action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-indigo-600 hover:text-indigo-900">Restore</button>
                                    </form>

                                    <form class="inline-block" action="{{ route('admin.users.forceDelete', $user->id) }}" method="POST" onsubmit="return confirm('Tindakan ini tidak dapat dibatalkan. Apakah Anda yakin ingin menghapus pengguna ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ms-2">Hapus Permanen</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    Tong sampah kosong.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>