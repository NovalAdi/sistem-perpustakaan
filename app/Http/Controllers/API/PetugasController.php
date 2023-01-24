<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'username' =>'required',
            'password' =>'required',
            'nama' =>'required',
            'telp' =>'required',
            'alamat' => 'required'
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

        $petugas = Petugas::create($input);
        return response()->json(
            [
                'status' => true,
                'data' => $petugas
            ]
        );
    }
}
