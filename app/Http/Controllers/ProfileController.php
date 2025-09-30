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

        $profileData = $request->only([
            'nidn_nip', 'nomor_telepon', 'tempat_lahir', 'tanggal_lahir', 
            'alamat_domisili', 'npwp', 'nama_wajib_pajak', 'sinta_id', 'google_scholar_id'
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($user->dosenProfile?->foto_profil) {
                Storage::disk('public')->delete($user->dosenProfile->foto_profil);
            }
            $path = $request->file('foto_profil')->store('avatars', 'public');
            $profileData['foto_profil'] = $path;
        }

        $user->dosenProfile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );

        return Redirect::route('profile.edit')->with('status', 'dosen-profile-updated');
    }

    // untuk statistic google scholar dan sinta di update dari command
    public function updateStatistic(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Pastikan dosen sudah punya profil sebelum menyimpan statistik
        if (!$user->dosenProfile) {
            return Redirect::route('profile.edit')->with('error', 'Harap lengkapi profil dosen terlebih dahulu.');
        }

        $request->validate([
            'total_sitasi' => ['nullable', 'integer', 'min:0'],
            'h_index' => ['nullable', 'integer', 'min:0'],
            'i10_index' => ['nullable', 'integer', 'min:0'],
        ]);

        $user->dosenProfile->statistic()->updateOrCreate(
            ['dosen_profile_id' => $user->dosenProfile->id],
            [
                'total_sitasi' => $request->total_sitasi,
                'h_index' => $request->h_index,
                'i10_index' => $request->i10_index,
            ]
        );

        return Redirect::route('profile.edit')->with('status', 'statistic-updated');
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
