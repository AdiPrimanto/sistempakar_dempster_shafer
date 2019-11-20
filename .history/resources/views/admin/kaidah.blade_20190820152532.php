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
                                        <div class="modal-body">
                                            <form action="" method="post">
                                              <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                  <thead>
                                                    <tr>
                                                      <th>Nama Gejala</th>
                                                      <th>Nilai</th>
                                                      <th>Operasi</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                        <td>
                                                          <input type="hidden" value="<?php echo $row2['id_pengetahuan']?>" name="id" />
                                                          <?php
                                                            include "../../proses-login/koneksi.php";
                                                            $sql2 = "SELECT nama_gejala FROM gejala WHERE kode_gejala='".$row2['kode_gejala']."'";
                                                            $nama = mysqli_query($konek, $sql2);
                                                            $tampil = mysqli_fetch_assoc($nama);
                                                            echo $tampil['nama_gejala'];
                                                          ?>
                                                        </td>
                                                        <td><?php echo $row2['nilai_belief'] ?></td>
                                                        <td>
                                                          <a href=../process/update/edit-kaidah.php?idpengetahuan=<?php echo $row2['id_pengetahuan'] ?> class="btn btn-info btn-sm">Ubah</a>&nbsp;&nbsp;
                                                          <a href=../process/delete/hapus-kaidah-gejala.php?idpengetahuan=<?php echo $row2['id_pengetahuan'] ?> class="btn btn-danger btn-sm">Hapus</a>
                                                        </td>
                                                      </tr>
                                                    <?php } ?>
                                                  </tbody>
                                                </table>
                                              </div>
                                            </form>
                                            <form action="../process/add/tambah-kaidah.php" method="post">
                                              <?php
                                                include "../../proses-login/koneksi.php";
                                                $sql2 = "SELECT nama_penyakit FROM penyakit WHERE kode_penyakit='".$row['kode_penyakit']."'";
                                                $nama = mysqli_query($konek, $sql2);
                                                $tampil = mysqli_fetch_assoc($nama);
                                              ?>
                                            <input type="hidden" value="<?php echo $tampil['nama_penyakit']?>" name="sel1" />
                                            <button class="btn btn-primary" type="submit">Tambah</button>
                                            <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Kembali</button>
                                            </form>
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
