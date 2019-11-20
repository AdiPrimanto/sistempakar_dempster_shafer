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
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Tanda DO</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:center">Kode Tanda DO</th>
                            <th style="text-align:center">Dosen</th>
                            <th style="text-align:center">Kelas</th>
                            <th style="text-align:center">Semester</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($a as $aka) --}}
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td><a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target=""><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <!-- Peringatan Hapus Tanda DO-->
                        <div class="modal" id="" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin menghapus data ?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="" class="btn btn-primary">Ya</a>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"
                                            aria-label="Close">Batal</button>
                                    </div>
                                </div>
                            </div>
                            {{-- @endforeach --}}
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
                    <form action="/tandaDO/create" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="text">Kode Tanda DO:</label>
                            <select class="form-control" name="kode">
                                    <input type="text" name="kode"
                                    class="form-control" value="">
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="text">Nama Tanda DO:</label>
                                <input type="text" name="nama_tandado"
                                    class="form-control"value="">
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
