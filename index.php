<!-- Panggil Bootstrap -->
  <link href="bootstrap/bootstrap-5.3.2/css/bootstrap.css" rel="stylesheet">
  <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5" style="background-color:#609aff!important;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand text-white" href="#"><b>Rumah Sakit Medika</b></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="index.php?lihat=beranda">
                <span class="glyphicon glyphicon-home"></span> Beranda
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?lihat=kritik_saran">
                <span class="glyphicon glyphicon-envelope"></span> Kritik & Saran
            </a>
        </li>       
        <li class="nav-item">
            <a class="nav-link" href="login.php"><span class="badge text-bg-light">Login</span></a>
        </li>       
      </ul>
    </div>
  </div>
</nav>
    <center><img src="images/3.jpg" width="1200px" height="800"></center>
      <?php
      /*Skrip dibawah berfungsi memanggil perintah sesuai nama file*/
      if(!empty($_GET['lihat'])){
        include($_GET['lihat'].'.php');
      }

      else{
        include 'beranda.php';
      }
      ?>

    </div> <!-- .container -->
    
    <!-- Awal Jumbotron -->
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="jumbotron">
            <h3>Rumah Sakit Medika</h3>
            <p>Rumah sakit ini ditujukan kepada orang-orang yang kurang mampu namun sangat memerlukan pengobatan medis.Apabila tidak punya biaya namun sudah sangat parah,Segeralah datang kerumah sakit Medika.  </p>
  
        </div>
      </div>
    </div>
    </div><!-- Akhir Jumbotron -->
    
    <!-- Awal Page -->
    <div class="container">
    <!-- Awal Panel -->
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-body">
        <h2 style="text-muted"><span class="glyphicon glyphicon-list"></span> Fasilitas Rumah Sakit</h2>
        
        <p>Rumah Sakit Medika Jl Cinta No.767 Aek kenopan ,Labuhan batu utara, Sumatera Utara(061-735367)</p>
        
        <div class="row">
          <div class="col-md-3">
          <h3>RUANG OPERASI LENGKAP</h3>
            <img src="images/operasi.jpg" class="img-thumbnail img-responsive">
            <p>Walaupun ini adalah rumah sakit gratis,tetapi tetap mempunyai ruag operasi yang lengkap dan tetap memiliki peralatan yg terbilang mumpuni.<br/><a class="btn btn-danger btn-xs" href="ruang-kelas.html"role="button">Selengkapnya</a></p>
          </div>
          <div class="col-md-3">
          <h3>KURSI RODA SUPER</h3>
            <img src="images/kurod.jpg" class="img-thumbnail img-responsive">
            <p>Bagi pasien yang sudah tidak sanggup untuk jalan,Rumah sakit Medika juga menyediakan Kursi roda super yang dapat menghantarkan pasien keruang operasi menggunakan remote.<br/><a class="btn btn-info btn-xs" href="perpustakaan.php"role="button">Selengkapnya</a></p>
          </div>
          <div class="col-md-3">
          <h3>AMBULANCE RODA 6</h3>
            <img src="images/ambulan.jpg" class="img-thumbnail img-responsive">
            <p>Jika dalam keadaan mendesak atau mengharuskan pasien dijemput ke suatu tempat,Rumah sakit Medika juga bisa menggunakan fasilitas yg lainnya yaitu Ambulance roda 6 yang mampu berkendara dengan cepat dan aman.<br/><a class="btn btn-success btn-xs" href="laboratorium.php"role="button">Selengkapnya</a></p>
          </div>
          <div class="col-md-3">
          <h3>TANDU</h3>
            <img src="images/tandu.jpg" class="img-thumbnail img-responsive">
            <p>Ketika ada pasien yang naik ambulance maka akan langsung dikeluaran menggunakan tandu agar pasien tetap dalam keadaan baik pada saat sampai dirumah sakit.<br/><a class="btn btn-warning btn-xs" href="internet_cafe.php"role="button">Selengkapnya</a></p>
          </div>
        </div>
      
        </div>
      </div>
    </div><!-- Akhir Panel -->
  
        </div>
        </div>
      </div>
    </div><!-- Akhir Panel -->
    </div><!--  Akhir Page -->
<?php include "footer.php"; ?>