<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengarangController extends Controller
{
    public function index()
    {
        $pengarang = Pengarang::all();
        return response()->json(
            [
                'stastus' => true,
                'data' => $pengarang
            ]
        );
    }

    public function show($id)
    {
        $pengarang = Pengarang::with('bukus')->find($id);
        return response()->json(
            [
                'stastus' => true,
                'data' => $pengarang
            ]
        );
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'nama' =>'required',
            'alamat' => 'required',
            'telp' =>'required'
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

        $pengarang = Pengarang::create($input);
        return response()->json(
            [
                'status' => true,
                'data' => $pengarang
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $pengarang = Pengarang::find($id);
        if (!$pengarang) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'pengarang not found'
                ],
                404
            );
        }

        $pengarang->update($request->all());
        return response()->json(
            [
                'status' => true,
                'data' => $pengarang
            ]
        );
    }

    public function delete($id)
    {
        $pengarang = Pengarang::find($id);
        if (!$pengarang) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'pengarang not found'
                ],
                404
            );
        }

        $pengarang->delete();
        return response()->json(
            [
                'status' => true,
                'data' => 'data succcessfully deleted'
            ]
        );
    }
}
