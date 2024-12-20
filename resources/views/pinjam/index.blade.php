<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Peminjam Ruang & Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="bg-light">
    <main class="container">
        
        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $siswa )
                            <li>{{ $siswa }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (@session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endsession
                
            <form action='' method='post' class="mt-20">
            @csrf 

            @if (Route::current()->uri == 'ruang/{id}')
            @method('put')
            @endif
                <div class="mb-3 row">
                    <label for="nama_pinjam" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama_pinjam' id="nama_pinjam" value="{{ isset($data['nama_pinjam'])?$data['nama_pinjam']:old('nama_pinjam') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name='tanggal_pinjam' id="tanggal_pinjam" value="{{ isset($data['tanggal_pinjam'])?$data['tanggal_pinjam']:old('tanggal_pinjam') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name='jam_mulai' id="jam_mulai" value="{{ isset($data['jam_mulai'])?$data['jam_mulai']:old('jam_mulai') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name='jam_selesai' id="jam_selesai" value="{{ isset($data['jam_selesai'])?$data['jam_selesai']:old('jam_selesai') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ruang" class="col-sm-2 col-form-label">ruang</label>
                    <div class="col-sm-10">
                        <select name="ruang"  class="form-control"id="ruang">
                            <option value="" hidden>Choose</option>
                            <option value="GKM LANTAI 4">GKM LANTAI 4</option>
                            <option value="GKM LANTAI 3">GKM LANTAI 3</option>
                            <option value="Auditorium G2">Auditorium G2</option>
                            <option value="Lab Komputer G1">Lab Komputer G1</option>
                            <option value="Lapangan Basket">Lapangan Basket</option>
                            <option value="Gedung F2.14">Gedung F2.14</option>
                            <option value="Gedung F3.14">Gedung F3.14</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">status</label>
                    <div class="col-sm-10">
                        <select name="status"  class="form-control"id="status">
                            <option value="" hidden>Choose</option>
                            <option value="Menunggu Persetujuan">Menunggu Persetujuan</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tanggal_pengajuan" class="col-sm-2 col-form-label">Tanggal Pengajuan</label >
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name='tanggal_pengajuan' id="tanggal_pengajuan" value="{{ isset($data['tanggal_pengajuan']) ? $data ['tanggal_pengajuan'] : old('tanggal_pengajuan') }}">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="kontak_peminjam" class="col-sm-2 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='kontak_peminjam' id="kontak_peminjam" value="{{ isset($data['kontak_peminjam']) ? $data['kontak_peminjam'] : old('kontak_peminjam') }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->

        @if (Route::current()->uri == 'ruang')

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <table class="table table-striped align-content-center justify-content-center">
                <thead>
                    <tr class="text-center">
                        <th class="col-md">No</th>
                        <th class="col-md-1">Nama</th>
                        <th class="col-md-2">Tanggal Pinjam</th>
                        <th class="col-md-3">Waktu</th>
                        <th class="col-md-2">Ruangan</th>
                        <th class="col-md-2">Tanggal Pengajuan</th>
                        <th class="col-md-2">Status</th>
                        <th class="col-md-2">Nomor Handphone</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $data as $ruang )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ruang['nama_pinjam'] }}</td>
                        <td>{{ $ruang['tanggal_pinjam'] }}</td>
                        <td>{{ $ruang['jam_mulai'] }} s/d {{ $ruang['jam_selesai'] }}</td>
                        <td>{{ $ruang['ruang'] }}</td>
                        <td>{{ $ruang['tanggal_pengajuan'] }}</td>
                        <td>{{ $ruang['status'] }}</td>
                        <td>{{ $ruang['kontak_peminjam'] }}</td>
                        <td>
                            <a href="{{ url('ruang/'.$ruang['id']) }}" class="btn btn-outline-success btn-sm">Edit</a>
                                <form action="{{ url('ruang/'. $ruang['id']) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin melakukan penghapusan data ?')" class="d-inline">
                                    @csrf
                                    @method('delete')
                                <button type="submit" name  ="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- AKHIR DATA -->
        @endif
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>