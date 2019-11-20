<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Identifikasi Dini Mahasiswa DO</title>
    <link rel="icon" href="frontend/img/akakom.png">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('frontend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'
        rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('frontend/css/grayscale.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Identifikasi Dini Mahasiswa DO</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#projects">Isi Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Identifikasi Dini Mahasiswa DO</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Menggunkan Metode Dempster Shafer</h2>
                <a href="#projects" class="btn btn-primary js-scroll-trigger">Get Started</a>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="about-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">Identifikasi Dini Mahasiswa DO</h2>
                    <p class="text-white-50">Aplikasi digunakan untuk mengetahui mahasiswa yang akan DO.
                        {{-- <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a> --}}
                    </p>
                </div>
            </div>
            <img src="img/ipad.png" class="img-fluid" alt="">
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
        <div class="container">
            <h1 class="text-uppercase"><strong>
                    <p class="text-center">Masukkan Data</p>
                </strong></h1><br />
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success')}}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="/" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa"
                                name="nama_mahasiswa">
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" class="form-control" required placeholder="Nomor Mahasiswa" name="nim">
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" required placeholder="Jurusan" name="jurusan">
                        </div>
                        <div class="form-group">
                            <label>Jenjang</label>
                            <select class="form-control" name="jenjang"> required
                                <option value="">Pilih Jurusan</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Perguruan Tinggi</label>
                            <input type="text" class="form-control" required placeholder="Perguruan Tinggi"
                                name="perguruan_tinggi">
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" required placeholder="Tempat Lahir"
                                name="tempat_lahir">
                        </div>
                        <td>Tanggal Lahir</td>
                        <td><select name="tanggal_lahir" size="1" id="tgl">
                                <?
		     for ($i=1;$i<=31;$i++)
			 {
			   echo "<option value=".$i.">".$i."</option>";
			 }
		  ?>
                            </select>
                            <select name="bln" size="1" id="bln">
                                <?
		     $bulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		     for ($i=1;$i<=12;$i++)
			 {
			   echo "<option value=".$i.">".$bulan[$i]."</option>";
			 }
		  ?>
                            </select>
                            <select name="thn" size="1" id="thn">
                                <?
		     for ($i=1985;$i<=2000;$i++)
			 {
			   echo "<option value=".$i.">".$i."</option>";
			 }
		  ?>
                            </select></td>
                        <div class="form-group">
                            <label>IPK Terakhir</label>
                            <input type="text" class="form-control" required placeholder="IPK Terakhir" name="ipk">
                        </div>
                        <div class="form-group">
                            <label>Jurusan Saat SMA</label>
                            <input type="text" class="form-control" required placeholder="Jurusan Saat SMA"
                                name="asal_sekolah">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!-- Contact Section -->
    <section id="signup" class="contact-section bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">STMIK AKAKOM Yogyakarta</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">
                                <a href="#">hello@yourdomain.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="social d-flex justify-content-center">
                <a href="#" class="mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-github"></i>
                </a>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
        <div class="container">
            Copyright &copy; Sistem Pakar 2019
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('frontend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('frontend/js/grayscale.min.js')}}"></script>

</body>

</html>
