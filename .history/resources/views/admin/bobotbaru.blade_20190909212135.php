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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:center">Kode Tanda DO</th>
                            <th style="text-align:center">Nama Tanda DO</th>
                            <th style="text-align:center">Nilai Bobot</th>
                            <th style="text-align:center">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bobotbaru as $tnd)
                        <tr>
                            <td style="text-align:center">{{$tnd->kode_tanda}}</td>
                            <td style="text-align:center">{{$tnd->nama_tanda}}</td>
                            <td style="text-align:center">{{$tnd->bobot}}</td>
                            <td style="text-align:center">
                                <a href="/bobot/{{$tnd->id_tanda}}/show" class="btn btn-info btn-sm"><i
                                        class="fa fa-edit"></i>
                                    Lihat Tanda</a>
                                    {{-- {{$ktgr->id_tanda}} --}}
                                <a href="" class="btn btn-danger btn-sm"
                                    data-toggle="modal" data-target="#hapus{{$tnd->id_tanda}}"><i
                                        class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>

                        <!-- Lihat Tanda DO-->
                        

                        <!-- Peringatan Hapus Kaidah DO-->
                        <div class="modal" id="hapus{{$tnd->id_kategori}}" tabindex="-1" role="dialog"
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
                                        Yakin ingin menghapus data {{$tnd->nama_kategori}} ?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/kaidah/{{$tnd->id_kategori}}/delete" class="btn btn-primary">Ya</a>
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

</div>

</div>
@endsection
