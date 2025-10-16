<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;

class PublikasiController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $user = Auth::user();
        if ($user->role->name === 'Admin Fakultas') {
            $publikasi = Publikasi::with('user')->latest()->get();
        } else {
            $publikasi = $user->publikasi()->latest()->get();
        }
        return view('users.publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        return view('users.publikasi.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => ['required', 'string', 'max:255', Rule::unique('publikasi')->where('user_id', Auth::id())],
            'nama_publikasi' => 'required|string|max:255',
            'tahun' => 'required|digits:4',
            'jenis' => 'required|in:Internasional,Nasional',
            'kontribusi' => 'nullable|string|max:255',
            'pemeringkatan' => 'nullable|string|max:255',
            'jumlah_sitasi' => 'nullable|integer',
            'nama_mahasiswa' => 'nullable|string|max:255',
            'url_doi' => 'nullable|url',
            'file_path' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        // Menangani unggahan file (jika ada)
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $slug = Str::slug(Str::limit($request->judul, 50, ''));
            $fileName = $slug . '-' . Str::random(6) . '.' . $extension;
            $path = $file->storeAs('publikasi', $fileName, 'public');
            $validatedData['file_path'] = $path;
        }

        // Menangani semua checkbox secara manual
        $validatedData['keterlibatan_mahasiswa'] = $request->has('keterlibatan_mahasiswa');
        $validatedData['kesesuaian_roadmap'] = $request->has('kesesuaian_roadmap');
        $validatedData['kesesuaian_topik_infokom'] = $request->has('kesesuaian_topik_infokom');

        Auth::user()->publikasi()->create($validatedData);
        
        return redirect()->route('publikasi.index')->with('success', 'Data publikasi berhasil ditambahkan.');
    }

    public function edit(Publikasi $publikasi)
    {
        $this->authorize('update', $publikasi);        
        return view('users.publikasi.edit', compact('publikasi'));
    }

    public function update(Request $request, Publikasi $publikasi)
    {
        $this->authorize('update', $publikasi);

        $validatedData = $request->validate([
            'judul' => ['required', 'string', 'max:255', Rule::unique('publikasi')->ignore($publikasi->id)->where('user_id', Auth::id())],
            'nama_publikasi' => 'required|string|max:255',
            'tahun' => 'required|digits:4',
            'jenis' => 'required|in:Internasional,Nasional',
            'kontribusi' => 'nullable|string|max:255',
            'pemeringkatan' => 'nullable|string|max:255',
            'jumlah_sitasi' => 'nullable|integer',
            'nama_mahasiswa' => 'nullable|string|max:255',
            'url_doi' => 'nullable|url',
            'file_path' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('file_path')) {
            if ($publikasi->file_path) {
                Storage::disk('public')->delete($publikasi->file_path);
            }
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $slug = Str::slug(Str::limit($request->judul, 50, ''));
            $fileName = $slug . '-' . Str::random(6) . '.' . $extension;
            $path = $file->storeAs('publikasi', $fileName, 'public');
            $validatedData['file_path'] = $path;
        }
        
        // Atasi checkbox
        $validatedData['keterlibatan_mahasiswa'] = $request->has('keterlibatan_mahasiswa');
        $validatedData['kesesuaian_roadmap'] = $request->has('kesesuaian_roadmap');
        $validatedData['kesesuaian_topik_infokom'] = $request->has('kesesuaian_topik_infokom');

        $publikasi->update($validatedData);
        return redirect()->route('publikasi.index')->with('success', 'Data publikasi berhasil diperbarui.');
    }

    public function destroy(Publikasi $publikasi)
    {
        $this->authorize('delete', $publikasi);
        if ($publikasi->file_path) {
            Storage::disk('public')->delete($publikasi->file_path);
        }
        $publikasi->delete();
        return redirect()->route('publikasi.index')->with('success', 'Data publikasi berhasil dihapus.');
    }
}