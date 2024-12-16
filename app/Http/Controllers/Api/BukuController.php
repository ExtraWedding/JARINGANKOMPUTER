<?php

namespace App\Http\Controllers\Api;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::orderBy('judul','asc')->get();
        return response()->json([
            'status'=> true,
            'message'=>'Data ditemukan',
            'data'=>$data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataSiswa = new Buku();

        $rules =[
            'judul'=>'required',
            'pengarang'=>'required',
            'tanggal_publikasi'=>'required|date',
            'kategori'=>'required',
            'deskripsi'=>'required',
            'bahasa'=>'required',
            'penerbit'=>'required',
        ];

        $validator = Validator::make($request->all() ,$rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal Menambahkan Data',
                'data'=>$validator->errors()
            ]);
        }

        $dataSiswa->judul = $request->judul;
        $dataSiswa->pengarang = $request->pengarang;
        $dataSiswa->tanggal_publikasi = $request->tanggal_publikasi;
        $dataSiswa->kategori = $request->kategori;
        $dataSiswa->deskripsi = $request->deskripsi;
        $dataSiswa->bahasa = $request->bahasa;
        $dataSiswa->penerbit = $request->penerbit;
        
        $post = $dataSiswa->save();

        return response()->json([
            'status'=> true,
            'message'=>'Berhasil Menambahkan Data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $data = Buku::find($id);
        if($data){
            return response()->json([
                'status'=> true,
                'message'=>'Data ditemukan',
                'data'=>$data
            ],200);
        } else{
            return response()->json([
                'status'=> false,
                'message'=>'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buku::find($id);
        if($data){
            $data->delete();
            return response()->json([
                'status'=> true,
                'message'=>'Data berhasil dihapus',
                'data'=>$data
            ],200);
        } else{
            return response()->json([
                'status'=> false,
                'message'=>'Data tidak ditemukan'
            ]);
        }
    }
}
