<?php

namespace App\Http\Controllers\Api;
use App\Models\Absens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absens= Absens::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' =>true,
            'message' =>'Daftar absen teman',
            'data' => $absens
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
            'nama' => 'required|unique:friends|max:225',
            'no_tlp' =>'required|numeric',
            'alamat' =>'required',
        ]);

        $absens = absens::create([
            'nama' => $request ->nama,
            'no_tlp' => $request -> no_tlp,
            'alamat' => $request ->alamat
        ]);

        if($absens)
        {
            return response()->json([
            'success' =>true,
            'message' =>'Teman berhasil di tambahkan',
            'data' => $absens
        ],200);
        }else{
            return response()->json([
                'success' =>false,
                'message' =>'Teman gagal di tambahkan',
                'data' => $absens
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
        $absens = Absens::where('id', $id) ->first();

        return response()->json([
            'success' =>true,
            'message' =>'Detail Data Teman',
            'data' => $absens
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
            'nama' => 'required|unique:friends|max:225',
            'no_tlp' =>'required|numeric',
            'alamat' =>'required',
        ]);

       $a = Absens::find($id)->update([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat
        ]);

        return response()->json([
            'success' =>true,
            'message' =>'Post Updated',
            'data' => $a
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
        $cek = Absens::find($id)->delete();

        return response()->json([
            'success' =>true,
            'message' =>'Post Updated',
            'data' => $cek
        ],200);
    }
}
