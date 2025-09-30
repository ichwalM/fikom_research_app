@extends('layouts.private_app')

@section('title', 'Profile')

@section('content')
    <div class="flex flex-col lg:flex-row gap-6">

        {{-- KARTU KIRI: UPDATE INFORMASI PROFIL & AKUN --}}
        <div class="w-full lg:w-1/3 flex flex-col gap-6">
            {{-- Bagian Update Info Profil --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Informasi Profil</h2>
                    <p class="mt-1 text-sm text-gray-600">Perbarui nama dan alamat email akun Anda.</p>
                </header>

                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div>
                        <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                        <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $user->name) }}" required autofocus>
                        @error('name') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                        <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email', $user->email) }}" required>
                        @error('email') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex items-center gap-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">Simpan</button>
                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">Tersimpan.</p>
                        @endif
                    </div>
                </form>
            </div>
            {{-- Bagian Kanan Statistic Scholar Account --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Statistik Google Scholar</h2>
                    <p class="mt-1 text-sm text-gray-600">Isi data statistik Anda dari Google Scholar secara manual.</p>
                </header>

                <form method="post" action="{{ route('profile.update.statistic') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="total_sitasi" class="block font-medium text-sm text-gray-700">Total Sitasi</label>
                            <input id="total_sitasi" name="total_sitasi" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('total_sitasi', $user->dosenProfile?->statistic?->total_sitasi) }}">
                        </div>
                        <div>
                            <label for="h_index" class="block font-medium text-sm text-gray-700">H-Index</label>
                            <input id="h_index" name="h_index" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('h_index', $user->dosenProfile?->statistic?->h_index) }}">
                        </div>
                        <div>
                            <label for="i10_index" class="block font-medium text-sm text-gray-700">i10-Index</label>
                            <input id="i10_index" name="i10_index" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('i10_index', $user->dosenProfile?->statistic?->i10_index) }}">
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">Simpan Statistik</button>
                        @if (session('status') === 'statistic-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">Tersimpan.</p>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Bagian Update Password --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Update Password</h2>
                </header>
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div>
                        <label for="current_password" class="block font-medium text-sm text-gray-700">Password Saat Ini</label>
                        <input id="current_password" name="current_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('current_password', 'updatePassword') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="password" class="block font-medium text-sm text-gray-700">Password Baru</label>
                        <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('password', 'updatePassword') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Konfirmasi Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="flex items-center gap-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">Simpan</button>
                        @if (session('status') === 'password-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">Tersimpan.</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- KARTU KANAN: UPDATE PROFIL DOSEN --}}
        <div class="w-full lg:w-2/3">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Profil Dosen</h2>
                    <p class="mt-1 text-sm text-gray-600">Lengkapi informasi detail Anda sebagai Dosen.</p>
                </header>

                <form method="post" action="{{ route('profile.update.dosen') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Foto Profil</label>
                        
                        {{-- Tampilkan foto saat ini --}}
                        <div class="mt-2 flex justify-center">
                            @if ($user->dosenProfile?->foto_profil)
                                <img src="{{ asset('storage/' . $user->dosenProfile->foto_profil) }}" alt="Foto Profil" class="rounded-lg object-cover shadow-md border border-gray-200 w-34 h-42">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" alt="Foto Profil" class="rounded-full h-20 w-20">
                            @endif
                        </div>

                        {{-- Input untuk unggah foto baru --}}
                        <input id="foto_profil" name="foto_profil" type="file" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <p class="mt-1 text-xs text-gray-500">JPG, JPEG, PNG. Maks 2MB.</p>
                        @error('foto_profil') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>


                    {{-- NIDN/NIP --}}
                    <div>
                        <label for="nidn_nip" class="block font-medium text-sm text-gray-700">NIDN/NIP</label>
                        <input id="nidn_nip" name="nidn_nip" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nidn_nip', $user->dosenProfile?->nidn_nip) }}">
                        @error('nidn_nip') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>

                    {{-- Nomor Telepon --}}
                    <div>
                        <label for="nomor_telepon" class="block font-medium text-sm text-gray-700">Nomor Telepon</label>
                        <input id="nomor_telepon" name="nomor_telepon" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nomor_telepon', $user->dosenProfile?->nomor_telepon) }}">
                        @error('nomor_telepon') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tempat & Tanggal Lahir --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="tempat_lahir" class="block font-medium text-sm text-gray-700">Tempat Lahir</label>
                            <input id="tempat_lahir" name="tempat_lahir" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('tempat_lahir', $user->dosenProfile?->tempat_lahir) }}">
                            @error('tempat_lahir') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block font-medium text-sm text-gray-700">Tanggal Lahir</label>
                            <input id="tanggal_lahir" name="tanggal_lahir" type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('tanggal_lahir', $user->dosenProfile?->tanggal_lahir) }}">
                            @error('tanggal_lahir') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    
                    {{-- Alamat Domisili --}}
                    <div>
                        <label for="alamat_domisili" class="block font-medium text-sm text-gray-700">Alamat Domisili</label>
                        <textarea id="alamat_domisili" name="alamat_domisili" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('alamat_domisili', $user->dosenProfile?->alamat_domisili) }}</textarea>
                        @error('alamat_domisili') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>

                    {{-- NPWP & Nama Wajib Pajak --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="npwp" class="block font-medium text-sm text-gray-700">NPWP</label>
                            <input id="npwp" name="npwp" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('npwp', $user->dosenProfile?->npwp) }}">
                            @error('npwp') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="nama_wajib_pajak" class="block font-medium text-sm text-gray-700">Nama Wajib Pajak</label>
                            <input id="nama_wajib_pajak" name="nama_wajib_pajak" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nama_wajib_pajak', $user->dosenProfile?->nama_wajib_pajak) }}">
                            @error('nama_wajib_pajak') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Sinta ID --}}
                    <div>
                        <label for="sinta_id" class="block font-medium text-sm text-gray-700">Sinta ID</label>
                        <input id="sinta_id" name="sinta_id" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('sinta_id', $user->dosenProfile?->sinta_id) }}">
                        @error('sinta_id') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="google_scholar_id" class="block font-medium text-sm text-gray-700">Google Scholar ID</label>
                        <input id="google_scholar_id" name="google_scholar_id" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('google_scholar_id', $user->dosenProfile?->google_scholar_id) }}">
                        @error('google_scholar_id') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">Simpan Detail Dosen</button>
                        @if (session('status') === 'dosen-profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">Tersimpan.</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection