<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Identifikasi Dini Mahasiswa DO</title>
    <link rel="icon" href="frontend/img/akakom.png">
    <!-- Bootstrap core CSS-->
    <link href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mx-auto mt-5">
                    <div class="card-header">Tabel Kategori</div>
                    <div class="card-body">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Nama Kategori DO</th>
                                        <th style="text-align:center">Operasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tampilkategori as $tnd)
                                    <tr>
                                        <td style="text-align:center">{{$tnd->nama_kategori}}</td>
                                        <td style="text-align:center">
                                            <a href="/tambahkategori/{{$tnd->id_tanda}}/hapus" class="btn btn-danger btn-sm"
                                                data-toggle="modal" data-target="#hapus{{$tnd->id_tanda}}"><i
                                                    class="fa fa-trash-o"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <!-- Peringatan Hapus Kategori DO-->
                                    <div class="modal" id="hapus{{$tnd->id_tanda}}" tabindex="-1" role="dialog"
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
                                                    Yakin ingin menghapus data {{$tnd->nama_kategori}} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="/tampilkategori/{{$tnd->id_tanda}}/delete"
                                                        class="btn btn-primary">Ya</a>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal"
                                                        aria-label="Close">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                </tbody>
                            </table>
                            <a href="/tambahkategori/{{$idTanda}}/show" class="btn btn-info btn-sm">
                                Tambah</a>
                            <a href="/bobotbaru" class="btn btn-danger btn-sm"> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
</body>

</html>
