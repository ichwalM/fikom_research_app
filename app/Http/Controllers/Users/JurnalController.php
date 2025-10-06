<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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

            $jurnals = Jurnal::with('user')->latest()->get();
        } else {

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
        $validatedData = $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'nama_jurnal' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4',
            'url_publikasi' => 'nullable|url',
            'file_path' => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
        ]);
        if ($request->hasFile('file_path')) {
        $file = $request->file('file_path');
        $extension = $file->getClientOriginalExtension();
        $slug = Str::slug($request->judul_artikel);
        $fileName = $slug . '-' . time() . '.' . $extension;

        // 3. Simpan file dengan nama baru menggunakan storeAs()
        $path = $file->storeAs('jurnals', $fileName, 'public');
        $validatedData['file_path'] = $path;
    }
        Auth::user()->jurnals()->create($validatedData);
        return redirect()->route('jurnals.index')->with('success', 'Data jurnal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal) {}

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

        $validatedData = $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'nama_jurnal' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4',
            'url_publikasi' => 'nullable|url',
            'file_path' => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
        ]);
        if ($request->hasFile('file_path')) {
            if ($jurnal->file_path) {
                Storage::disk('public')->delete($jurnal->file_path);
            }
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $slug = Str::slug($request->judul_artikel);
            $fileName = $slug . '-' . time() . '.' . $extension;
            $path = $file->storeAs('jurnals', $fileName, 'public');
            $validatedData['file_path'] = $path;
        }
        $jurnal->update($validatedData);
        return redirect()->route('jurnals.index')->with('success', 'Data jurnal berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurnal $jurnal)
    {
        $this->authorize('delete', $jurnal);
        $jurnal->delete();
        return redirect()->route('jurnals.index')->with('success', 'Data jurnal berhasil dihapus.');
    }
}
