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
            <i class="fa fa-table"></i> Tabel Tanda DO</div>
        <div class="" align="right" style="padding:15px;">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Kategori DO</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:center">Kode Tanda DO</th>
                            <th style="text-align:center">Nama Tanda DO</th>
                            <th style="text-align:center">Nilai </th>
                            <th style="text-align:center">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tandado as $tnd)
                        <tr>
                            <td style="text-align:center">{{$tnd->kode_tanda}}</td>
                            <td style="text-align:center">{{$tnd->nama_tanda}}</td>
                            <td style="text-align:center">
                                <a href="/tandado/{{$tnd->id_tanda}}/edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$tnd->id_tanda}}"><i
                                        class="fa fa-edit"></i>
                                    Edit</a>
                                <a href="/tandado/{{$tnd->id_tanda}}/hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{$tnd->id_tanda}}"><i
                                        class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>

                        <!-- Edit Tanda DO-->
                        <div class="modal" id="edit{{$tnd->id_tanda}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tanda DO</h5>
                                            <button class="close" type="button" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/tandado/{{$tnd->id_tanda}}/update"
                                                method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="text">Kode Tanda:</label>
                                                    <input type="text" name="kode_tanda" class="form-control"
                                                        readonly value="{{$tnd->kode_tanda}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Nama Tanda:</label>
                                                    <input type="text" name="nama_tanda"
                                                        class="form-control"
                                                        value="{{$tnd->nama_tanda}}">
                                                </div>
                                                <button class="btn btn-info" type="submit">Simpan</button>
                                                <button class="btn btn-danger" type="button"
                                                    data-dismiss="modal" aria-label="Close">Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!-- Peringatan Hapus Tanda DO-->
                        <div class="modal" id="hapus{{$tnd->id_tanda}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                        Yakin ingin menghapus data {{$tnd->nama_tanda}} ?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/tandado/{{$tnd->id_tanda}}/delete" class="btn btn-primary">Ya</a>
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

    <!-- Tambah Tanda DO-->
    <div class="modal" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Tanda DO</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tandado/store" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="text">Kode Tanda DO:</label>
                            <input type="text" name="kode_tanda" class="form-control" value="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="text">Nama Tanda DO:</label>
                            <input type="text" name="nama_tanda" class="form-control" value="" autocomplete="off">
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
