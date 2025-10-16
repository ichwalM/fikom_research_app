<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkemaPenelitian;
use Illuminate\Http\Request;

class SkemaPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skemas = SkemaPenelitian::latest()->get();
        return view('admin.skema.index', compact('skemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skema.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nama_skema' => 'required|string|max:255|unique:skema_penelitian,nama_skema']);
        SkemaPenelitian::create($request->all());
        return redirect()->route('admin.skema-penelitian.index')->with('success', 'Skema berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SkemaPenelitian $skemaPenelitian)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SkemaPenelitian $skemaPenelitian)
    {
        return view('admin.skema.edit', compact('skemaPenelitian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkemaPenelitian $skemaPenelitian)
    {
        $request->validate(['nama_skema' => 'required|string|max:255|unique:skema_penelitian,nama_skema,' . $skemaPenelitian->id]);
        $skemaPenelitian->update($request->all());
        return redirect()->route('admin.skema-penelitian.index')->with('success', 'Skema berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkemaPenelitian $skemaPenelitian)
    {
        $skemaPenelitian->delete();
        return redirect()->route('admin.skema-penelitian.index')->with('success', 'Skema berhasil dihapus.');
    }
}
