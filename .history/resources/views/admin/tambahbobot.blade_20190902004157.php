<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Identifikasi Dini Mahasiswa DO</title>
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
                    <div class="card-header">Tambah Kaidah Kategori</div>
                    <div class="card-body">
                        @csrf
                        <form action="/tambahbobot" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="text">Nama Kategori DO:</label>
                                <input type="text" name="nama_kategori" class="form-control" value="" readonly
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="text">Pilih Tanda DO:</label>
                                <select class="form-control" name="nama_tanda" id="dropdown">
                                    <option value="">Pilih Tanda DO:</option>
                                    @foreach ($tanda as $tnd)
                                    <option value="">{{$tnd->nama_tanda}}</option>
                                    @endforeach
                                </select>
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
</body>

</html>
