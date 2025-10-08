<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data jumlah jurnal per tahun
        $publicationsPerYear = Publikasi::select(DB::raw('tahun as year'), DB::raw('count(*) as count'))
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // Siapkan data untuk dikirim ke view
        $labels = $publicationsPerYear->pluck('year');
        $data = $publicationsPerYear->pluck('count');

        return view('dashboard', compact('labels', 'data'));
    }
}
