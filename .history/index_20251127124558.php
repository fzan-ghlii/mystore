<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Chemika Nusantara</title>
<meta name="description" content="Toko Bahan Kimia Terlengkap">
<meta name="author" content="">

<!-- Favicons -->
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,400,500,600,700|Open+Sans:300,400,600,700" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Include Koneksi Database -->
<?php 
// Pastikan path ini benar. Jika file koneksi ada di folder root, gunakan:
include 'koneksi.php'; 
// Jika belum ada file koneksi di root, Anda bisa copy dari 'namamenu/db.php'
?>

<!-- Navigation -->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">Chemika Nusantara</a> </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">Tentang</a></li>
        <li><a href="#restaurant-menu" class="page-scroll">Produk</a></li>
        <li><a href="#portfolio" class="page-scroll">Kategori</a></li>
        <li><a href="#team" class="page-scroll">Tim Ahli</a></li>
        <li><a href="#contact" class="page-scroll">Kontak</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
           <img src="img/logo.png" 
                alt="Logo Chemika Nusantara" 
                style="width: 150px; 
                       height: 150px; 
                       border-radius: 50%; 
                       object-fit: cover; 
                       border: 3px solid #fff; 
                       display: block; 
                       margin-left: auto; 
                       margin-right: auto; 
                       margin-bottom: 20px;">
            <h1>Chemika Nusantara</h1>
            <p>Solusi Bahan Kimia Industri & Laboratorium</p>
            <a href="#restaurant-menu" class="btn btn-custom btn-lg page-scroll">Lihat Katalog</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 ">
        <div class="about-img"><img src="img/about.jpg" class="img-responsive" alt=""></div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2>Tentang Toko Kami</h2>
          <hr>
          <p>Selamat datang di Chemika Nusantara. Sejak didirikan pada tahun 2010, kami berdedikasi untuk menyediakan bahan kimia berkualitas tinggi (Technical & Pro Analysis Grade) untuk kebutuhan industri, pendidikan, dan rumah tangga.</p>
          <h3>Visi Kami</h3>
          <p>Menjadi mitra strategis yang menjamin ketersediaan bahan kimia berkualitas tinggi dengan standar keamanan yang ketat dan pelayanan profesional.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Restaurant Menu Section (List Harga) -->
<div id="restaurant-menu">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Daftar Produk</h2>
      <hr>
      <p>Bahan kimia murni dengan harga kompetitif.</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      
      <?php
      // Ambil data Kategori untuk loop kolom
      $queryKategori = mysqli_query($conn, "SELECT * FROM tbjenismenu");
      while ($kategori = mysqli_fetch_assoc($queryKategori)) {
          $id_jenis = $kategori['id_jenis'];
      ?>
      
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title"><?php echo $kategori['nama_jenis']; ?></h2>
          <hr>
          
          <?php
          // Ambil Produk berdasarkan kategori saat ini
          $queryProduk = mysqli_query($conn, "SELECT * FROM tbnamamenu WHERE id_jenis = '$id_jenis'");
          while ($produk = mysqli_fetch_assoc($queryProduk)) {
          ?>
          
          <div class="menu-item">
            <div class="menu-item-name"> 
                <?php echo $produk['nama_menu']; ?> 
            </div>
            <div class="menu-item-price"> 
                Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?> 
            </div>
            <div class="menu-item-description"> 
                <?php echo $produk['deskripsi']; ?> 
            </div>
          </div>
          
          <?php } // End Loop Produk ?>
          
        </div>
      </div>
      
      <?php } // End Loop Kategori ?>

    </div>
  </div>
</div>

<!-- Portfolio Section (Galeri Gambar Dinamis) -->
<div id="portfolio">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Klasifikasi Bahan</h2>
      <hr>
      <p>Telusuri produk berdasarkan kegunaan dan jenisnya.</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="categories">
        <ul class="cat">
          <li>
            <ol class="type">
              <!-- Tombol Filter "Semua" -->
              <li><a href="#" data-filter="*" class="active">Semua</a></li>
              
              <?php
              // --- LOGIC FILTER DINAMIS ---
              // Mengambil kategori dari database untuk jadi tombol filter
              $filterKat = mysqli_query($conn, "SELECT * FROM tbjenismenu");
              while($fk = mysqli_fetch_assoc($filterKat)){
                  // Kita gunakan id_jenis sebagai class filter (contoh: .cat-1, .cat-2)
                  echo '<li><a href="#" data-filter=".cat-'.$fk['id_jenis'].'">'.$fk['nama_jenis'].'</a></li>';
              }
              ?>
            </ol>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>
    
    <div class="row">
      <div class="portfolio-items">
        
        <?php
        // --- LOGIC ITEM GAMBAR DINAMIS ---
        // Mengambil semua produk yang memiliki gambar
        $queryGaleri = mysqli_query($conn, "SELECT * FROM tbnamamenu WHERE image != ''");
        
        while($imgItem = mysqli_fetch_assoc($queryGaleri)){
            // Class wrapper harus sesuai dengan ID Kategori (cat-1, cat-2, dst)
            $classFilter = "cat-" . $imgItem['id_jenis'];
            $imagePath   = "img/portfolio/" . $imgItem['image'];
        ?>
        
        <div class="col-sm-6 col-md-4 col-lg-4 <?php echo $classFilter; ?>">
          <div class="portfolio-item">
            <div class="hover-bg"> 
              <a href="<?php echo $imagePath; ?>" title="<?php echo $imgItem['nama_menu']; ?>" data-lightbox-gallery="gallery1">
                <div class="hover-text">
                  <h4><?php echo $imgItem['nama_menu']; ?></h4>
                </div>
                <!-- Menampilkan Gambar -->
                <img src="<?php echo $imagePath; ?>" class="img-responsive" alt="<?php echo $imgItem['nama_menu']; ?>"> 
              </a> 
            </div>
          </div>
        </div>

        <?php } // End Loop Galeri ?>
        
      </div>
    </div>
  </div>
</div>

<!-- Team Section -->
<div id="team" class="text-center">
  <div class="overlay">
    <div class="container">
      <div class="col-md-10 col-md-offset-1 section-title">
        <h2>Tim Ahli Kami</h2>
        <hr>
        <p>Didukung oleh tenaga profesional di bidang kimia dan farmasi.</p>
      </div>
      <div id="row">
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team/01.jpg" alt="..."></div>
            <div class="caption">
              <h3>Dr. Hendra</h3>
              <p>Kepala Laboratorium</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team/02.jpg" alt="..."></div>
            <div class="caption">
              <h3>Siti Aminah, Apt</h3>
              <p>Apoteker</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team/03.jpg" alt="..."></div>
            <div class="caption">
              <h3>Budi Santoso</h3>
              <p>Konsultan Industri</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Call Reservation Section -->
<div id="call-reservation" class="text-center">
  <div class="container">
    <h2>Butuh Penawaran Khusus?</h2>
    <p>Hubungi kami untuk pembelian partai besar (Grosir/Drum)</p>
  </div>
</div>

<!-- Contact Section -->
<div id="contact">
  <div class="container">
    <div class="col-md-8">
      <h3>Kirim Pesan</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Nama" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Tulis kebutuhan bahan kimia Anda disini..." required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-custom btn-lg">Kirim Pesan</button>
      </form>
    </div>
    <div class="col-md-4">
      <h3>Jam Operasional</h3>
      <div class="contact-item">
        <p>Senin-Jumat: 08:00 - 17:00</p>
        <p>Sabtu: 08:00 - 14:00</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Info Kontak</h3>
      <div class="contact-item">
        <p>Telepon: +62 21 555 1234</p>
        <p>Email: sales@chemikanusantara.com</p>
      </div>
    </div>
  </div>
  <div class="container-fluid text-center copyrights">
    <div class="col-md-8 col-md-offset-2">
      <div class="social">
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
        </ul>
      </div>
      <p>&copy; 2024 Chemika Nusantara. All rights reserved.</p>
    </div>
  </div>
</div>

<!-- Scripts -->
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>