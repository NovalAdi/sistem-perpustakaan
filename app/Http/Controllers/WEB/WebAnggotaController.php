<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class WebAnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::oldest()->paginate(10);
        $title = 'Anggota';

        return view('anggota.index', compact('anggotas', 'title'))->with('i', (request()->query('page', 1)-1)*10);
    }

    public function create()
    {
        $title = "Tambah Anggota";
        return view('anggota.create', compact('title'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ]);

        Anggota::create($request->all());
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diupdate');
    }

    public function edit($id)
    {
        $title = 'Edit Anggota';
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota', 'title'));
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus');
    }
}
