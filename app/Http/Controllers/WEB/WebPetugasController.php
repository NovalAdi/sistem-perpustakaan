<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;

class WebPetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::oldest()->paginate(10);
        $title = 'Petugas';

        return view('petugas.index', compact('petugas', 'title'))->with('i', (request()->query('page', 1)-1)*10);
    }

    public function create()
    {
        $title = "Tambah Petugas";
        return view('petugas.create', compact('title'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ]);

        Petugas::create($request->all());
        return redirect()->route('petugas.index')->with('success', 'petugas berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->all());
        return redirect()->route('petugas.index')->with('success', 'petugas berhasil diupdate');
    }

    public function edit($id)
    {
        $title = 'Edit Petugas';
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas', 'title'));
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'petugas berhasil dihapus');
    }
}
