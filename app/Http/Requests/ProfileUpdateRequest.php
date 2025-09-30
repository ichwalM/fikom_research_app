<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        // Hanya pengguna yang sudah login yang bisa melakukan update.
        return Auth::check();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = Auth::id();

        // Ambil ID profil dosen yang sedang diedit
        $profileId = Auth::user()->profile->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'nidn_nip' => ['nullable', 'string', 'max:50', Rule::unique('dosen_profiles')->ignore($profileId)],
            'tempat_lahir' => ['nullable', 'string', 'max:100'],
            'tanggal_lahir' => ['nullable', 'date'],
            'nomor_telepon' => ['nullable', 'string', 'max:20'],
            'alamat_domisili' => ['nullable', 'string'],
            'npwp' => ['nullable', 'string', 'max:30'], 
            'nama_wajib_pajak' => ['nullable', 'string', 'max:255'],
            'sinta_id' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function attributes(): array
    {
        return [
            'nidn_nip' => 'NIDN/NIP',
            'nomor_telepon' => 'Nomor Telepon',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat_domisili' => 'Alamat Domisili',
            'npwp' => 'NPWP',
            'sinta_id' => 'SINTA ID',
            'nama_wajib_pajak' => 'Nama Wajib Pajak',
        ];
    }
}
