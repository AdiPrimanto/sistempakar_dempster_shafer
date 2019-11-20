@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/dashboard">Dashboard</a>
        </li>
    </ol>

    <!-- Menampilkan Tabel Mahasiswa-->
    <div class="card mb-3">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div>
        @endif
        <div class="card-header">
            <i class="fa fa-table"></i> Tabel Mahasiswa</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama Mahasiswa</th>
                            <th style="text-align:center">NIM</th>
                            <th style="text-align:center">Jurusan</th>
                            <th style="text-align:center">Jenjang</th>
                            <th style="text-align:center">Perguruan Tinggi</th>
                            <th style="text-align:center">IPK Terakhir</th>
                            <th style="text-align:center">Tempat Lahir</th>
                            {{-- <th style="text-align:center">Tanggal Lahir</th> --}}
                            <th style="text-align:center">Jurusan Saat SMA</th>
                            <th style="text-align:center">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $mhs)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$mhs->nama_mahasiswa}}</td>
                            <td>{{$mhs->nim}}</td>
                            <td>{{$mhs->jurusan}}</td>
                            <td>{{$mhs->jenjang}}</td>
                            <td>{{$mhs->perguruan_tinggi}}</td>
                            <td>{{$mhs->ipk}}</td>
                            <td>{{$mhs->tempat_lahir}}</td>
                            {{-- <td style="text-align:center"></td> --}}
                            <td>{{$mhs->asal_sekolah}}</td>
                            <td><a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target=""><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <!-- Peringatan Hapus Mahasiswa-->
                        <div class="modal" id="hapus{{$mhs->id_mahasiswa}}" tabindex="-1" role="dialog"
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
                                        Yakin ingin menghapus data  ?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="" class="btn btn-primary">Ya</a>
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
