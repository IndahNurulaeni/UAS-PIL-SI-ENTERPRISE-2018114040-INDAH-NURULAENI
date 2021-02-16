<?php

namespace App\Http\Controllers\Api;
use App\Models\Matakuliahs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatakuliahsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkuliahs = Matakuliahs::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' =>true,
            'message' =>'Daftar Mata Kuliah',
            'data' => $matakuliahs
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_matakuliah' => 'required|unique:friends|max:225',
            'sks' =>'required|numeric'
        ]);

        $matakuliahs = Matakuliahs::create([
            'nama_matakuliah' => $request ->nama,
            'sks' => $request ->no_tlp
        ]);

        if($matakuliahs)
        {
            return response()->json([
            'success' =>true,
            'message' =>'MataKuliah berhasil di tambahkan',
            'data' => $matakuliahs
        ],200);
        }else{
            return response()->json([
                'success' =>false,
                'message' =>'MataKuliah gagal di tambahkan',
                'data' => $matakuliahs
            ],409);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matakuliahs = Matakuliahs::where('id', $id) ->first();

        return response()->json([
            'success' =>true,
            'message' =>'Detail Mata Kuliah',
            'data' => $matakuliahs
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matakuliah' => 'required|unique:friends|max:225',
            'sks' =>'required|numeric'
        ]);

       $m = Matakuliahs::find($id)->update([
            'nama_matakuliah' => $request->nama,
            'sks' => $request->no_tlp
        ]);

        return response()->json([
            'success' =>true,
            'message' =>'Post Updated',
            'data' => $m
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Matakuliahs::find($id)->delete();

        return response()->json([
            'success' =>true,
            'message' =>'Post Updated',
            'data' => $cek
        ],200);
    }
}
