<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://192.168.129.62/api/ruang";
        $response =$client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        return view('pinjam.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $nama_pinjam = $request->nama_pinjam;
        $tanggal_pinjam = $request->tanggal_pinjam;
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;
        $ruang = $request->ruang;
        $tanggal_pengajuan = $request->tanggal_pengajuan;
        $kontak_peminjam = $request->kontak_peminjam;



        $parameterAPI = [
            'nama_pinjam'=>$nama_pinjam,
            'tanggal_pinjam'=>$tanggal_pinjam,
            'jam_mulai'=>$jam_mulai,
            'jam_selesai'=>$jam_selesai,
            'ruang'=>$ruang,
            'tanggal_pengajuan'=>$tanggal_pengajuan,
            'kontak_peminjam'=>$kontak_peminjam
        ];


        $client = new Client();
        $url = 'http://192.168.129.62/api/ruang';
        $response =$client->request('POST',$url,[
            'headers' => ['Content-type'=>'application/json'],
            'body'=> json_encode($parameterAPI)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] != true) {
           $error = $contentArray['data'];
           return redirect()->to('ruang')->withErrors($error)->withInput();
        }  else {
            return redirect()->to('ruang')->with('success','Berhasil Menambah Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $client = new Client();
        $url = "http://192.168.129.62/api/ruang/$id";
        $response =$client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        if ($contentArray['status'] != true) {
            $error = $contentArray['message'];
            return redirect()->to('ruang')->withErrors($error);
        } else{
            $data = $contentArray['data'];
            return view('pinjam.index',['data'=>$data]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama_pinjam = $request->nama_pinjam;
        $tanggal_pinjam = $request->tanggal_pinjam;
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;
        $ruang = $request->ruang;
        $tanggal_pengajuan = $request->tanggal_pengajuan;
        $kontak_peminjam = $request->kontak_peminjam;


        $parameterAPI = [
            'nama_pinjam'=>$nama_pinjam,
            'tanggal_pinjam'=>$tanggal_pinjam,
            'jam_mulai'=>$jam_mulai,
            'jam_selesai'=>$jam_selesai,
            'ruang'=>$ruang,
            'tanggal_pengajuan'=>$tanggal_pengajuan,
            'kontak_peminjam'=>$kontak_peminjam
        ];


        $client = new Client();
        $url = "http://192.168.129.62/api/ruang/$id";
        $response =$client->request('PUT',$url,[
            'headers' => ['Content-type'=>'application/json'],
            'body'=> json_encode($parameterAPI)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] != true) {
           $error = $contentArray['data'];
           return redirect()->to('ruang')->withErrors($error)->withInput();
        }  else {
            return redirect()->to('ruang')->with('success','Berhasil Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://192.168.129.62/api/ruang/$id";
        $response =$client->request('DELETE',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        if ($contentArray['status'] != true) {
           $error = $contentArray['data'];
           return redirect()->to('ruang')->withErrors($error)->withInput();
        }  else {
            return redirect()->to('ruang')->with('success','Berhasil Menghapus Data');
        }
    }
}
