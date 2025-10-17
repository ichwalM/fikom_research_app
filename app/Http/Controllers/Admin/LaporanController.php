<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\SkemaPenelitian;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; // <-- Import
use App\Exports\PenelitianExport;

class LaporanController extends Controller
{
    // Laporan Penelitian
    public function penelitian(Request $request)
    {
        $skemas = SkemaPenelitian::orderBy('nama_skema')->get();
        $years = Penelitian::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');
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

    // Export Laporan Penelitian ke Excel
    public function exportPenelitian(Request $request)
    {
        $skema_id = $request->query('skema_id');
        $tahun = $request->query('tahun');

        // Tentukan nama file
        $fileName = 'laporan-penelitian-' . date('Y-m-d') . '.xlsx';

        return Excel::download(new PenelitianExport($skema_id, $tahun), $fileName);
    }
}
