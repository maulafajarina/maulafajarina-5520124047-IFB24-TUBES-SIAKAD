<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::all();

        return view('dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn',
            'nama' => 'required'
        ]);

        Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama
        ]);

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosen = Dosen::findOrFail($id);

        return view('dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);

        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $dosen = Dosen::findOrFail($id);

        $dosen->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);

        $dosen->delete();

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus');
    }
}