<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return response()->json(
            [
                'status' => true,
                'data' => $anggota
            ]
        );
    }

    public function show($id)
    {
        $anggota = Anggota::find($id);
        if (!$anggota) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'anggota not found'
                ],
                404
            );
        }

        return response()->json(
            [
                'status' => true,
                'data' => $anggota
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $anggota = Anggota::find($id);
        if (!$anggota) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'anggota not found'
                ],
                404
            );
        }

        $anggota->update($request->all());
        return response()->json(
            [
                'status' => true,
                'data' => $anggota
            ]
        );
    }

    public function delete($id)
    {
        $anggota = Anggota::find($id);
        if (!$anggota) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'anggota not found'
                ],
                404
            );
        }

        $anggota->delete();
        return response()->json(
            [
                'status' => true,
                'data' => 'data succcessfully deleted'
            ]
        );
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telp' => 'required'
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

        $anggota = Anggota::create($input);
        return response()->json(
            [
                'status' => true,
                'data' => $anggota,
            ]
        );
    }
}
