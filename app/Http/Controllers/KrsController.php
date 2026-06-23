<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class KrsController extends Controller
{

    public function adminIndex()
{
    $krs = Krs::all();

    return view('krs.admin', compact('krs'));
}

    public function index()
{
        $krs = Krs::where('npm', auth()->user()->npm)->get();

        return view('krs.index', compact('krs'));
}

    public function create()
{
    $matakuliah = Matakuliah::all();

    return view('krs.create', compact(
        'matakuliah'
    ));
}

   public function store(Request $request)
{
    $request->validate([
        'kode_matakuliah' => 'required'
    ]);

    Krs::create([
        'npm' => auth()->user()->npm,
        'kode_matakuliah' => $request->kode_matakuliah
    ]);

    return redirect()->route('krs.index')
        ->with('success', 'KRS berhasil ditambahkan');
}

    public function show(string $id)
    {
        $krs = Krs::findOrFail($id);

        return view('krs.show', compact('krs'));
    }

    public function edit(string $id)
    {
        $krs = Krs::findOrFail($id);

        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();

        return view('krs.edit', compact(
            'krs',
            'mahasiswa',
            'matakuliah'
        ));
    }

    public function update(Request $request, string $id)
    {
        $krs = Krs::findOrFail($id);

        $krs->update([
            'npm' => $request->npm,
            'kode_matakuliah' => $request->kode_matakuliah
        ]);

        return redirect()->route('krs.index')
            ->with('success', 'KRS berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $krs = Krs::findOrFail($id);

        $krs->delete();

        return redirect()->route('krs.index')
            ->with('success', 'KRS berhasil dihapus');
    }

    public function print()
    {
        $krs = Krs::where('npm', auth()->user()->npm)->get();

        $pdf = Pdf::loadView('krs.print', compact('krs'));

        return $pdf->download('KRS-'.auth()->user()->name.'.pdf');
    }
}