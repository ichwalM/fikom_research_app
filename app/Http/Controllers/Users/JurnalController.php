<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\User;



class JurnalController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role->name === 'Admin Fakultas') {
            // Jika admin, ambil semua jurnal beserta data penulisnya
            $jurnals = Jurnal::with('user')->latest()->get();
        } else {
            // Jika bukan admin (dosen), hanya ambil jurnal milik sendiri
            $jurnals = $user->jurnals()->latest()->get();
        }

        return view('users.jurnals.index', compact('jurnals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.jurnals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'nama_jurnal' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4',
            'volume' => 'nullable|string|max:50',
            'nomor' => 'nullable|string|max:50',
            'halaman' => 'nullable|string|max:50',
            'url_publikasi' => 'nullable|url',
        ]);

        $request->user()->jurnals()->create($request->all());

        return redirect()->route('jurnals.index')->with('success', 'Data jurnal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurnal $jurnal)
    {
        $this->authorize('update', $jurnal);

        return view('users.jurnals.edit', compact('jurnal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurnal $jurnal)
    {
        $this->authorize('update', $jurnal);

        $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'nama_jurnal' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4',
            'volume' => 'nullable|string|max:50',
            'nomor' => 'nullable|string|max:50',
            'halaman' => 'nullable|string|max:50',
            'url_publikasi' => 'nullable|url',
        ]);

        $jurnal->update($request->all());

        return redirect()->route('jurnals.index')->with('success', 'Data jurnal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurnal $jurnal)
    {
        $this->authorize('delete', $jurnal);
        
        // Kita belum menerapkan soft delete pada Jurnal, jadi ini akan hard delete.
        // Jika ingin soft delete, tambahkan trait SoftDeletes ke model Jurnal.
        $jurnal->delete();

        return redirect()->route('jurnals.index')->with('success', 'Data jurnal berhasil dihapus.');
    }
}
