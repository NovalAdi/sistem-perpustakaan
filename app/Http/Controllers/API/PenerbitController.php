<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return response()->json(
            [
                'stastus' => true,
                'data' => $penerbit
            ]
        );
    }

    public function show($id)
    {
        $penerbit = Penerbit::with('bukus')->find($id);
        return response()->json(
            [
                'stastus' => true,
                'data' => $penerbit
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

        $penerbit = Penerbit::create($input);
        return response()->json(
            [
                'status' => true,
                'data' => $penerbit
            ]
        );
    }
}
