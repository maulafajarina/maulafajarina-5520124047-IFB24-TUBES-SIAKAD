<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matakuliah;

class JadwalController extends Controller
{
    // ADMIN
    public function index()
    {
        $jadwal = Jadwal::with(['dosen','matakuliah'])->get();

        return view('jadwal.index', compact('jadwal'));
    }

    // MAHASISWA
    public function jadwalMahasiswa()
    {
        $jadwal = Jadwal::with(['dosen','matakuliah'])->get();

        return view('jadwal.mahasiswa', compact('jadwal'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();

        return view('jadwal.create', compact('dosen', 'matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required',
            'nidn' => 'required',
            'kelas' => 'required',
            'hari' => 'required',
            'jam' => 'required'
        ]);

        Jadwal::create([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nidn' => $request->nidn,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'jam' => $request->jam
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Data jadwal berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $jadwal = Jadwal::with(['dosen','matakuliah'])
                    ->findOrFail($id);

        return view('jadwal.show', compact('jadwal'));
    }

    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();

        return view('jadwal.edit', compact(
            'jadwal',
            'dosen',
            'matakuliah'
        ));
    }

    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nidn' => $request->nidn,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'jam' => $request->jam
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Data jadwal berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Data jadwal berhasil dihapus');
    }
}