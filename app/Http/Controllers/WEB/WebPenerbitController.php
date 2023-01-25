<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class WebPenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::oldest()->paginate(10);
        $title = 'Penerbit';

        return view('penerbit.index', compact('penerbit', 'title'))->with('i', (request()->query('page', 1)-1)*10);
    }

    public function create()
    {
        $title = "Tambah Penerbit";
        return view('penerbit.create', compact('title'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ]);

        Penerbit::create($request->all());
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil diupdate');
    }

    public function edit($id)
    {
        $title = 'Edit Penerbit';
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit', 'title'));
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil dihapus');
    }
}
