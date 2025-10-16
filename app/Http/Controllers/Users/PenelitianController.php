<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\SkemaPenelitian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function index()
    {
        $user = Auth::user();
        if ($user->role->name === 'Admin Fakultas') {
            $penelitian = Penelitian::with('user')->latest()->get();
        } else {
            $penelitian = $user->penelitian()->latest()->get();
        }
        return view('users.penelitian.index', compact('penelitian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skemas = SkemaPenelitian::all();
        return view('users.penelitian.create', compact('skemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => ['required',
                        'string',
                        'max:255',
                        Rule::unique('penelitian')->where('user_id', Auth::id())],
            'status_peneliti' => 'required|string|in:Ketua,Anggota',
            'sumber_dana' => 'nullable|string|max:255',
            'jumlah_dana' => 'nullable|numeric',
            'tahun' => 'required|digits:4',
            'nama_mahasiswa' => 'nullable|string|max:255',
            'link_kontrak_penelitian' => 'nullable|url',
            'matakuliah' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        // Atasi semua checkbox secara manual
        $validatedData['keterlibatan_mahasiswa'] = $request->has('keterlibatan_mahasiswa');
        $validatedData['kesesuaian_roadmap'] = $request->has('kesesuaian_roadmap');
        $validatedData['kesesuaian_topik_infokom'] = $request->has('kesesuaian_topik_infokom');
        $validatedData['mendapatkan_hki'] = $request->has('mendapatkan_hki');

        Auth::user()->penelitian()->create($validatedData);

        return redirect()->route('penelitian.index')->with('success', 'Data penelitian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penelitian $penelitian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penelitian $penelitian)
    {
        $this->authorize('update', $penelitian);
        $skemas = SkemaPenelitian::all();
        return view('users.penelitian.edit', compact('penelitian', 'skemas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penelitian $penelitian)
    {
        $this->authorize('update', $penelitian);

        $validatedData = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
                Rule::unique('penelitian')->ignore($penelitian->id)->where('user_id', Auth::id())
            ],
            'skema_penelitian_id' => 'nullable|exists:skema_penelitian,id',
            'status_peneliti' => 'required|string|in:Ketua,Anggota',
            'sumber_dana' => 'nullable|string|max:255',
            'jumlah_dana' => 'nullable|numeric',
            'tahun' => 'required|digits:4',
            'nama_mahasiswa' => 'nullable|string|max:255',
            'link_kontrak_penelitian' => 'nullable|url',
            'matakuliah' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        // Atasi semua checkbox secara manual
        $validatedData['keterlibatan_mahasiswa'] = $request->has('keterlibatan_mahasiswa');
        $validatedData['kesesuaian_roadmap'] = $request->has('kesesuaian_roadmap');
        $validatedData['kesesuaian_topik_infokom'] = $request->has('kesesuaian_topik_infokom');
        $validatedData['mendapatkan_hki'] = $request->has('mendapatkan_hki');

        $penelitian->update($validatedData);

        return redirect()->route('penelitian.index')->with('success', 'Data penelitian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penelitian $penelitian)
    {
        $this->authorize('delete', $penelitian);
        $penelitian->delete();
        return redirect()->route('penelitian.index')->with('success', 'Data penelitian berhasil dihapus.');
    }
}
