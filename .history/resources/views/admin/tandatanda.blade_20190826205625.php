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
                    <div class="card-header">hahaha</div>

                    <div class="card-body">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Kode Tanda DO</th>
                                        <th style="text-align:center">Nama Tanda DO</th>
                                        <th style="text-align:center">Operasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tandado as $tnd)
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td style="text-align:center"></td>
                                        <td style="text-align:center">
                                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target=""><i
                                                    class="fa fa-edit"></i>
                                                Edit</a>
                                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target=""><i class="fa fa-trash-o"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <button class="btn btn-info" type="submit">Lanjutkan</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"
                                aria-label="Close">Batal</button>
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
