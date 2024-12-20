<?php

namespace App\Http\Controllers\Api;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pinjam;
use Illuminate\Support\Facades\Validator;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pinjam::orderBy('id','asc')->get();
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
        $dataRuang = new Pinjam();

        $rules =[
            'nama_pinjam'=>'required',
            'tanggal_pinjam'=>'required',
            'jam_mulai'=>'required',
            'jam_selesai'=>'required',
            'ruang'=>'required',
            'tanggal_pengajuan'=>'required',
            'kontak_peminjam'=>'required|numeric',
            
        ];

        $validator = Validator::make($request->all() ,$rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal Menambahkan Data',
                'data'=>$validator->errors()
            ]);
        }

        $dataRuang->nama_pinjam = $request->nama_pinjam;
        $dataRuang->tanggal_pinjam = $request->tanggal_pinjam ;
        $dataRuang->jam_mulai = $request->jam_mulai;
        $dataRuang->jam_selesai = $request->jam_selesai;
        $dataRuang->ruang = $request->ruang;
        $dataRuang->tanggal_pengajuan = $request->tanggal_pengajuan;
        $dataRuang->kontak_peminjam = $request->kontak_peminjam;
        
        $post = $dataRuang->save();

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
         $data = Pinjam::find($id);
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
        $dataRuang = Pinjam::find($id);
        if(empty($dataRuang)){
            return response()->json([
                'status'=>false,
                'message'=>'Data Tidak Ditemukan'
            ],404);
        }

        $rules =[
            'nama_pinjam'=>'required',
            'tanggal_pinjam'=>'required',
            'jam_mulai'=>'required',
            'jam_selesai'=>'required',
            'ruang'=>'required',
            'tanggal_pengajuan'=>'required',
            'kontak_peminjam'=>'required|numeric',
            
        ];

        $validator = Validator::make($request->all() ,$rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal Mengubah Data',
                'data'=>$validator->errors()
            ]);
        }

        $dataRuang->nama_pinjam = $request->nama_pinjam;
        $dataRuang->tanggal_pinjam = $request->tanggal_pinjam ;
        $dataRuang->jam_mulai = $request->jam_mulai;
        $dataRuang->jam_selesai = $request->jam_selesai;
        $dataRuang->ruang = $request->ruang;
        $dataRuang->tanggal_pengajuan = $request->tanggal_pengajuan;
        $dataRuang->kontak_peminjam = $request->kontak_peminjam;
        
        $post = $dataRuang->save();

        return response()->json([
            'status'=> true,
            'message'=>'Berhasil Mengubah Data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pinjam::find($id);
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
