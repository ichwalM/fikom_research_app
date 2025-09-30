<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user()->load('dosenProfile'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // app/Http/Controllers/ProfileController.php

    public function updateDosenProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        $request->validate([
            'nidn_nip' => ['nullable', 'string', 'max:255', Rule::unique('dosen_profiles')->ignore($user->dosenProfile?->id)],
            'nomor_telepon' => ['nullable', 'string', 'max:20'],
            'tempat_lahir' => ['nullable', 'string', 'max:255'],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat_domisili' => ['nullable', 'string'],
            'npwp' => ['nullable', 'string', 'max:255'],
            'nama_wajib_pajak' => ['nullable', 'string', 'max:255'],
            'sinta_id' => ['nullable', 'string', 'max:255'],
            'google_scholar_id' => ['nullable', 'string', 'max:255'],
            'foto_profil' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // 1. Siapkan semua data dari form ke dalam satu array.
        $profileData = $request->only([
            'nidn_nip', 'nomor_telepon', 'tempat_lahir', 'tanggal_lahir', 
            'alamat_domisili', 'npwp', 'nama_wajib_pajak', 'sinta_id', 'google_scholar_id'
        ]);

        // 2. Cek jika ada file foto baru yang diunggah.
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada.
            if ($user->dosenProfile?->foto_profil) {
                Storage::disk('public')->delete($user->dosenProfile->foto_profil);
            }
            // Simpan foto baru dan tambahkan path-nya ke array data.
            $path = $request->file('foto_profil')->store('avatars', 'public');
            $profileData['foto_profil'] = $path;
        }

        // 3. Jalankan updateOrCreate dengan format yang benar (2 argumen).
        $user->dosenProfile()->updateOrCreate(
            ['user_id' => $user->id], // Argumen 1: Kondisi pencarian
            $profileData               // Argumen 2: Semua data untuk disimpan/diupdate
        );

        return Redirect::route('profile.edit')->with('status', 'dosen-profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
