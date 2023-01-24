<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::all();
        return response()->json(
            [
                'status' => true,
                'data' => $pengembalian
            ]
        );
    }

    public function show($id)
    {
        $pengembalian = Pengembalian::find($id);
        $peminjaman = Peminjaman::find($pengembalian->peminjaman_id);
        $anggota = Anggota::find($pengembalian->anggota_id);
        $petugas = Petugas::find($pengembalian->petugas_id);
        return response()->json(
            [
                'stastus' => true,
                'data' => $pengembalian,
                'peminjaman' => $peminjaman->tanggal_peminjaman,
                'anggota' => $anggota->nama,
                'petugas' => $petugas->nama
            ]
        );
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'denda' => 'required',
            'peminjaman_id' => 'required',
            'anggota_id' => 'required',
            'petugas_id' => 'required'
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

        $date = date('Y-m-d');

        $peminjaman = Peminjaman::find($input['peminjaman_id'])->update(
            [
                'tanggal_kembali' => $date
            ]
        );
        if (!$peminjaman) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'peminjaman not found'
                ],
                404
            );
        }

        $anggota = Anggota::find($input['anggota_id']);
        if (!$anggota) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'anggota not found'
                ],
                404
            );
        }

        $petugas = Petugas::find($input['petugas_id']);
        if (!$petugas) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'petugas not found'
                ],
                404
            );
        }

        $pengembalian = Pengembalian::create(
            [
                'tanggal_pengembalian' => $date,
                'denda' => $input['denda'],
                'peminjaman_id' => $input['peminjaman_id'],
                'anggota_id' => $input['anggota_id'],
                'petugas_id' => $input['petugas_id']

            ]
        );

        return response()->json(
            [
                'status' => true,
                'data' => $pengembalian
            ]
        );
    }
}
