@extends('layouts.private_app')

@section('title', 'Tambah Pengguna Baru')

@section('header')
    Tambah Pengguna Baru
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                @error('name')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                @error('email')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                @error('password')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="role_id" class="block font-medium text-sm text-gray-700">Role</label>
                <select name="role_id" id="role_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection