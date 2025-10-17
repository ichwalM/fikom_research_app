<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\SkemaPenelitian;
use App\Models\Publikasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Laporan Penelitian
    public function penelitian(Request $request)
    {
        $skemas = SkemaPenelitian::orderBy('nama_skema')->get();
        $years = Penelitian::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');
        // Memulai query dengan kondisi tambahan
        $query = Penelitian::whereHas('user', function ($query) {
            $query->whereNull('deleted_at');
        })->with(['user.dosenProfile', 'skemaPenelitian']);
        if ($request->filled('skema_id')) {
            $query->where('skema_penelitian_id', $request->skema_id);
        }
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }
        $penelitian = $query->latest('tahun')->get();
        return view('admin.laporan.penelitian', compact('penelitian', 'skemas', 'years'));
    }
    // Laporan Publikasi
    public function publikasi(Request $request)
    {
        $years = Publikasi::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');
        $jenisOptions = ['Internasional', 'Nasional'];
        // Memulai query dengan kondisi tambahan
        $query = Publikasi::whereHas('user', function ($query) {
            $query->whereNull('deleted_at');
        })->with(['user.dosenProfile']);
        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }
        $publikasi = $query->latest()->get();
        return view('admin.laporan.publikasi', compact('publikasi', 'years', 'jenisOptions'));
    }
}
