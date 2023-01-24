<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukusController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return response()->json(
            [
                'stastus' => true,
                'data' => $buku
            ]
        );
    }

    public function show($id)
    {
        $buku = Buku::find($id);
        $penerbit = Penerbit::find($buku->penerbit_id);
        $pengarang = Pengarang::find($buku->pengarang_id);
        $rak = Rak::find($buku->rak_id);
        return response()->json(
            [
                'stastus' => true,
                'data' => $buku,
                'penerbit' => $penerbit->nama,
                'pengarang' => $pengarang->nama,
                'rak' => $rak->kode_rak
            ]
        );
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'judul' =>'required',
            'tahun_terbit' => 'required',
            'jumlah' =>'required',
            'isbn' =>'required',
            'pengarang_id' =>'required',
            'penerbit_id' =>'required',
            'rak_id' =>'required'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->errors()
                ],
                400
            );
        }

        $pengarang = Pengarang::find($input['pengarang_id']);
        if (!$pengarang) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'pengarang not found'
                ],
                404
            );
        }

        $penerbit = Penerbit::find($input['penerbit_id']);
        if (!$penerbit) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'penerbit not found'
                ],
                404
            );
        }

        $rak = Rak::find($input['rak_id']);
        if (!$rak) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'rak not found'
                ],
                404
            );
        }

        // $buku = new Buku();
        // $buku->judul = $input['judul'];
        // $buku->tahun_terbit = $input['tahun_terbit'];
        // $buku->jumlah = $input['jumlah'];
        // $buku->isbn = $input['isbn'];

        // $pengarang->bukus()->save($buku);
        // $penerbit->bukus()->save($buku);
        // $rak->bukus()->save($buku);

        $buku = Buku::create($input);
        return response()->json(
            [
                'status' => true,
                'data' => $buku,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'buku not found'
                ],
                404
            );
        }

        $pengarang = Pengarang::find($buku->pengarang_id);
        if (!$pengarang) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'pengarang not found'
                ],
                404
            );
        }

        $penerbit = Penerbit::find($buku->penerbit_id);
        if (!$penerbit) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'penerbit not found'
                ],
                404
            );
        }

        $rak = Rak::find($buku->rak_id);
        if (!$rak) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'rak not found'
                ],
                404
            );
        }

        $buku->update($input);
        return response()->json(
            [
                'status' => true,
                'data' => $buku
            ]
        );
    }

    public function delete($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'buku not found'
                ],
                404
            );
        }

        $buku->delete();
        return response()->json(
            [
                'status' => true,
                'data' => 'data succcessfully deleted'
            ]
        );
    }

}
