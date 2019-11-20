@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/dashboard">Dashboard</a>
        </li>
    </ol>

    <!-- Menampilkan Tanda DO-->
    <div class="card mb-3">

        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div>
        @endif

        <div class="card-header">
            <i class="fa fa-table"></i> Tabel Kadiah</div>
        <div class="" align="right" style="padding:15px;">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Kadiah</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:center">Kode Kategori DO</th>
                            <th style="text-align:center">Nama Kategori DO</th>
                            <th style="text-align:center">Tanda DO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kaidah as $ktgr)
                        <tr>
                            <td style="text-align:center">{{$ktgr->kode_kategori}}</td>
                            <td style="text-align:center">{{$ktgr->nama_kategori}}</td>
                            <td style="text-align:center">
                                <a href="/kaidah/{{$ktgr->id_kategori}}/edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$ktgr->id_kategori}}"><i
                                        class="fa fa-edit"></i>
                                    Lihat Tanda</a>
                                <a href="/kaidah/{{$ktgr->id_kategori}}/hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{$ktgr->id_kategori}}"><i
                                        class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>

                        <!-- Lihat Tanda DO-->
                        <div class="modal" id="edit{{$ktgr->id_kategori}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tanda Mahasiswa {{$ktgr->nama_kategori}}</h5>
                                            <button class="close" type="button" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center">Tanda</th>
                                                        <th style="text-align:center">Nilai</th>
                                                        <th style="text-align:center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($matakuliah as $matkul) --}}
                                                    <tr>
                                                        <td style="text-align:center"></td>
                                                        <td style="text-align:center"></td>
                                                        <td style="text-align:center">
                                                            <a href=""
                                                                class="btn btn-info btn-sm" data-toggle="modal"
                                                                data-target="#edit{{$matkul->id_matakuliah}}"><i class="fa fa-edit"></i>
                                                                Edit</a>
                                                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                data-target="#hapus{{$matkul->id_matakuliah}}"><i
                                                                    class="fa fa-trash-o"></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <!-- Edit Matakuliah-->
                                                    <div class="modal" id="edit{{$matkul->id_matakuliah}}" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Matakuliah</h5>
                                                                    <button class="close" type="button" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/matakuliah/{{$matkul->id_matakuliah}}/update"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="text">Id:</label>
                                                                            <input type="text" name="id_matakuliah" class="form-control"
                                                                                readonly value="{{$matkul->id_matakuliah}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="text">Matakuliah:</label>
                                                                            <input type="text" name="nama_matakuliah"
                                                                                class="form-control"
                                                                                value="{{$matkul->nama_matakuliah}}">
                                                                        </div>
                                                                        <button class="btn btn-info" type="submit">Simpan</button>
                                                                        <button class="btn btn-danger" type="button"
                                                                            data-dismiss="modal" aria-label="Close">Batal</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                    <!-- Peringatan Hapus Matakuliah-->
                                                    <div class="modal" id="hapus{{$matkul->id_matakuliah}}" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                                                    <button class="close" type="button" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Yakin ingin menghapus data {{$matkul->nama_matakuliah}} ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="/matakuliah/{{$matkul->id_matakuliah}}/delete"
                                                                        class="btn btn-primary">Ya</a>
                                                                    <button class="btn btn-danger" type="button" data-dismiss="modal"
                                                                        aria-label="Close">Batal</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!-- Peringatan Hapus Kaidah DO-->
                        <div class="modal" id="hapus{{$ktgr->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin menghapus data {{$ktgr->nama_kategori}} ?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/kaidah/{{$ktgr->id_kategori}}/delete" class="btn btn-primary">Ya</a>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"
                                            aria-label="Close">Batal</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tambah Data Kaidah-->
    <div class="modal" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kaidah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="text">Pilih Kategori DO:</label>
                            <input type="text" name="nama_kategori" class="form-control" value="" autocomplete="off">
                        </div>
                        <button class="btn btn-info" type="submit">Lanjutkan</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"
                            aria-label="Close">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
