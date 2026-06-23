<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();

        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|unique:matakuliah,kode_matakuliah',
            'nama_matakuliah' => 'required|min:3|max:100',
            'sks' => 'required|integer|min:1|max:6'
        ]);

        Matakuliah::create([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks
        ]);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);

        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);

        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_matakuliah' => 'required|min:3|max:100',
            'sks' => 'required|integer|min:1|max:6'
        ]);

        $matakuliah = Matakuliah::findOrFail($id);

        $matakuliah->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks
        ]);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);

        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil dihapus');
    }
}