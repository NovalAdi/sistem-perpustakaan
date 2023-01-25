<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Pengarang;
use Illuminate\Http\Request;

class WebPengarangController extends Controller
{
    public function index()
    {
        $pengarang = Pengarang::oldest()->paginate(10);
        $title = 'Pengarang';

        return view('pengarang.index', compact('pengarang', 'title'))->with('i', (request()->query('page', 1)-1)*10);
    }

    public function create()
    {
        $title = "Tambah Pengarang";
        return view('pengarang.create', compact('title'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ]);

        Pengarang::create($request->all());
        return redirect()->route('pengarang.index')->with('success', 'pengarang berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->update($request->all());
        return redirect()->route('pengarang.index')->with('success', 'pengarang berhasil diupdate');
    }

    public function edit($id)
    {
        $title = 'Edit Pengarang';
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.edit', compact('pengarang', 'title'));
    }

    public function destroy($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();
        return redirect()->route('pengarang.index')->with('success', 'pengarang berhasil dihapus');
    }
}
