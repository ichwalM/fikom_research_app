
    
    <x-slot name="header">
        <h1 class="text-3xl font-extrabold text-dark-charcoal">Edit Profil Dosen</h1>
    </x-slot>

    <x-slot name="header">
        <h1 class="text-3xl font-extrabold text-dark-charcoal">Edit Profil Dosen</h1>
    </x-slot>

    {{-- === TEMPAT PESAN STATUS DI SINI === --}}

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Gagal!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="bg-white p-8 rounded-xl shadow-lg max-w-4xl mx-auto">
        
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            
            <h2 class="text-2xl font-semibold text-dark-charcoal mb-6 border-b pb-2">Data Akun & Kontak</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Nama --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <h2 class="text-2xl font-semibold text-dark-charcoal mb-6 mt-8 border-b pb-2">Detail Dosen</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- NIDN/NIP --}}
                <div class="mb-4">
                    <label for="nidn_nip" class="block text-sm font-medium text-gray-700">NIDN/NIP</label>
                    <input type="text" id="nidn_nip" name="nidn_nip" value="{{ old('nidn_nip', $profile->nidn_nip) }}" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                    @error('nidn_nip')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Nomor Telepon --}}
                <div class="mb-4">
                    <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $profile->nomor_telepon) }}" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                    @error('nomor_telepon')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Tempat Lahir --}}
                <div class="mb-4">
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $profile->tempat_lahir) }}" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                    @error('tempat_lahir')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Tanggal Lahir --}}
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $profile->tanggal_lahir) }}" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                    @error('tanggal_lahir')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                
                {{-- SINTA ID --}}
                <div class="mb-4">
                    <label for="sinta_id" class="block text-sm font-medium text-gray-700">SINTA ID</label>
                    <input type="text" id="sinta_id" name="sinta_id" value="{{ old('sinta_id', $profile->sinta_id) }}" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                    @error('sinta_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- NPWP --}}
                <div class="mb-4">
                    <label for="npwp" class="block text-sm font-medium text-gray-700">NPWP</label>
                    <input type="text" id="npwp" name="npwp" value="{{ old('npwp', $profile->npwp) }}" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                    @error('npwp')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Nama Wajib Pajak --}}
                <div class="mb-4">
                    <label for="nama_wajib_pajak" class="block text-sm font-medium text-gray-700">Nama Wajib Pajak</label>
                    <input type="text" id="nama_wajib_pajak" name="nama_wajib_pajak" value="{{ old('nama_wajib_pajak', $profile->nama_wajib_pajak) }}" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                    @error('nama_wajib_pajak')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                
                {{-- Alamat Domisili --}}
                <div class="mb-4 md:col-span-2">
                    <label for="alamat_domisili" class="block text-sm font-medium text-gray-700">Alamat Domisili</label>
                    <textarea id="alamat_domisili" name="alamat_domisili" rows="3" class="mt-1 w-full p-2 border border-gray-300 rounded-md">{{ old('alamat_domisili', $profile->alamat_domisili) }}</textarea>
                    @error('alamat_domisili')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="mt-8 pt-4 border-t flex justify-end">
                <button type="submit" class="bg-golden-orange text-dark-charcoal font-semibold px-6 py-2 rounded-md hover:bg-yellow-600 transition duration-200">
                    Simpan Perubahan Profil
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
        </div>
    </div>