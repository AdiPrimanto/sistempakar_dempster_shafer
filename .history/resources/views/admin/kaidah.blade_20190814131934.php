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
                            <th style="text-align:center">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategorido as $ktgr)
                        <tr>
                            <td style="text-align:center">{{$ktgr->kode_kategori}}</td>
                            <td style="text-align:center">{{$ktgr->nama_kategori}}</td>
                            <td style="text-align:center">
                                <a href="/kategorido/{{$ktgr->id_kategori}}/edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$ktgr->id_kategori}}"><i
                                        class="fa fa-edit"></i>
                                    Edit</a>
                                <a href="/kategorido/{{$ktgr->id_kategori}}/hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{$ktgr->id_kategori}}"><i
                                        class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>

                        <!-- Edit Kategori DO-->
                        <div class="modal" id="edit{{$ktgr->id_kategori}}" tabindex="-1" role="dialog"
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
                                            <form action="/kategorido/{{$ktgr->id_kategori}}/update"
                                                method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="text">Kode Kategori:</label>
                                                    <input type="text" name="kode_kategori" class="form-control"
                                                        readonly value="{{$ktgr->kode_kategori}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Nama Kategori:</label>
                                                    <input type="text" name="nama_kategori"
                                                        class="form-control"
                                                        value="{{$ktgr->nama_kategori}}">
                                                </div>
                                                <button class="btn btn-info" type="submit">Simpan</button>
                                                <button class="btn btn-danger" type="button"
                                                    data-dismiss="modal" aria-label="Close">Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!-- Peringatan Hapus Kategori DO-->
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
                                        <a href="/kategorido/{{$ktgr->id_kategori}}/delete" class="btn btn-primary">Ya</a>
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

    <!-- Tambah Kategori DO-->
    <div class="modal" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori DO</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/kategorido/store" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="text">Kode Kategori DO:</label>
                            <input type="text" name="kode_kategori" class="form-control" value="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="text">Nama Kategori DO:</label>
                            <input type="text" name="nama_kategori" class="form-control" value="" autocomplete="off">
                        </div>
                        <button class="btn btn-info" type="submit">Simpan</button>
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
