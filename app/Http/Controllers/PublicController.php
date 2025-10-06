<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\User;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function index()
    {
        $jumlahPublikasi = Jurnal::count();
        $jumlahPeneliti = User::whereHas('role', function ($query) {
            $query->where('name', 'Dosen');
        })->count();
        $dosenUnggulan = User::whereHas('role', fn($q) => $q->where('name', 'Dosen'))
            ->with('dosenProfile')
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('public.home', [
            'jumlahPublikasi' => $jumlahPublikasi,
            'jumlahPeneliti' => $jumlahPeneliti,
            'dosenUnggulan' => $dosenUnggulan,
        ]);
    }
    public function show(User $user)
    {
        $user->load(['dosenProfile.statistic', 'jurnals']);
        return view('public.dosen_detail', [
            'dosen' => $user,
        ]);
    }
}
