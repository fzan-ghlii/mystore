<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Chemika Nusantara - Modern Lab</title>
<meta name="description" content="Toko Bahan Kimia Terlengkap">

<!-- Favicons -->
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

<!-- TAILWIND CSS (CDN) -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Nivo Lightbox -->
<link rel="stylesheet" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo-lightbox/default.css">

<!-- Custom Styles -->
<style>
    /* Font Settings */
    body { font-family: 'Outfit', sans-serif; }
    h1, h2, h3, h4, .font-heading { font-family: 'Space Grotesk', sans-serif; }

    /* Custom Scrollbar */
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-track { background: #0B0C10; }
    ::-webkit-scrollbar-thumb { background: #66FCF1; border-radius: 5px; }
    ::-webkit-scrollbar-thumb:hover { background: #45a29e; }
    
    /* === BACKGROUND HEADER BANNERS === */
    .bg-hero { 
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/intro-bg.jpg'); 
        background-size: cover; 
        background-position: center; 
        background-attachment: fixed;
    }
    
    .bg-header-menu {
        background: linear-gradient(rgba(11, 12, 16, 0.7), rgba(11, 12, 16, 0.7)), url('img/menu-bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; 
    }
    .bg-header-gallery {
        background: linear-gradient(rgba(11, 12, 16, 0.7), rgba(11, 12, 16, 0.7)), url('img/gallery-bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; 
    }
    .bg-header-team {
        background: linear-gradient(rgba(11, 12, 16, 0.7), rgba(11, 12, 16, 0.7)), url('img/team-bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; 
    }

    /* Nav Active State styling */
    .nav-link.active { color: #66FCF1; border-bottom: 2px solid #66FCF1; }
    
    /* Animations */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
</style>
</head>

<body class="bg-[#0B0C10] text-[#C5C6C7] antialiased selection:bg-[#66FCF1] selection:text-[#0B0C10]">

<!-- PHP Connection -->
<?php include 'koneksi.php'; ?>

<!-- NAVIGATION -->
<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-[#0B0C10]/90 backdrop-blur-md border-b border-white/10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
      <div class="flex-shrink-0">
        <a href="#page-top" class="text-2xl font-heading font-bold text-white tracking-wider flex items-center gap-3">
          <img src="img/logo.png" alt="Logo Chemika" class="w-10 h-10 rounded-full object-cover border-2 border-[#66FCF1]">
          CHEMIKA NUSANTARA
        </a>
      </div>
      <div class="hidden md:block">
        <div class="ml-10 flex items-baseline space-x-8">
          <a href="#about" class="nav-link text-gray-300 hover:text-[#66FCF1] px-3 py-2 rounded-md text-sm font-medium transition-colors">Tentang</a>
          <a href="#products" class="nav-link text-gray-300 hover:text-[#66FCF1] px-3 py-2 rounded-md text-sm font-medium transition-colors">Produk</a>
          <a href="#portfolio" class="nav-link text-gray-300 hover:text-[#66FCF1] px-3 py-2 rounded-md text-sm font-medium transition-colors">Galeri</a>
          <a href="#team" class="nav-link text-gray-300 hover:text-[#66FCF1] px-3 py-2 rounded-md text-sm font-medium transition-colors">Tim</a>
          <a href="#contact" class="nav-link text-gray-300 hover:text-[#66FCF1] px-3 py-2 rounded-md text-sm font-medium transition-colors">Kontak</a>
        </div>
      </div>
      <div class="-mr-2 flex md:hidden">
        <button id="mobile-menu-btn" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none">
          <i class="fa-solid fa-bars text-xl"></i>
        </button>
      </div>
    </div>
  </div>
  <div id="mobile-menu" class="hidden md:hidden bg-[#0B0C10] border-t border-gray-800">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-[#66FCF1]">TENANF</a>
      <a href="#products" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-[#66FCF1]">Produk</a>
      <a href="#portfolio" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-[#66FCF1]">Galeri</a>
      <a href="#team" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-[#66FCF1]">Tim</a>
      <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-[#66FCF1]">Kontak</a>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<header id="page-top" class="bg-hero h-screen flex items-center justify-center text-center px-4 relative">
  <div class="max-w-4xl mx-auto z-10 pt-16">
    <div class="mb-8 flex justify-center">
       <img src="img/logo.png" alt="Logo" class="w-40 h-40 object-cover rounded-full border-4 border-white/20 shadow-[0_0_30px_rgba(102,252,241,0.5)] animate-float">
    </div>
    <h1 class="text-5xl md:text-7xl font-heading font-bold text-white mb-6 tracking-tight drop-shadow-lg">
      Chemika <span class="text-[#66FCF1]">Nusantara</span>
    </h1>
    <p class="text-xl md:text-2xl text-white/90 mb-10 font-light drop-shadow-md">
      Solusi Terpercaya Bahan Kimia Industri & Laboratorium
    </p>
    <a href="#products" class="inline-block px-8 py-4 border-2 border-[#66FCF1] text-[#66FCF1] font-bold rounded-full hover:bg-[#66FCF1] hover:text-[#0B0C10] transition-all duration-300 shadow-[0_0_15px_rgba(102,252,241,0.3)]">
      LIHAT KATALOG
    </a>
  </div>
</header>

<!-- ABOUT SECTION -->
<section id="about" class="bg-[#0B0C10] scroll-mt-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
      <div class="relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-[#66FCF1] to-blue-600 rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
        <img src="img/about.jpg" alt="About Us" class="relative rounded-lg shadow-2xl w-full object-cover h-[500px]">
      </div>
      <div>
        <h2 class="text-3xl font-heading font-bold text-white mb-6 border-l-4 border-[#66FCF1] pl-4">Tentang Kami</h2>
        <p class="mb-6 text-lg leading-relaxed text-gray-300">
          Selamat datang di <span class="text-[#66FCF1] font-semibold">Chemika Nusantara</span>. Sejak 2010, kami berdedikasi menyediakan bahan kimia kualitas terbaik (Technical & Pro Analysis Grade) untuk menunjang industri dan pendidikan Indonesia.
        </p>
        
        <div class="bg-[#141619] p-6 rounded-xl border border-white/10 mb-6 hover:border-[#66FCF1]/50 transition-colors">
          <h3 class="text-[#66FCF1] font-bold text-xl mb-3 flex items-center">
            <i class="fa-solid fa-bullseye mr-3 bg-[#66FCF1]/10 p-2 rounded-lg"></i> Visi Kami
          </h3>
          <p class="text-sm text-gray-400 leading-relaxed">Menjadi mitra strategis yang menjamin ketersediaan bahan kimia berkualitas tinggi dengan standar keamanan ketat dan pelayanan profesional.</p>
        </div>

        <div class="bg-[#141619] p-6 rounded-xl border border-white/10 hover:border-[#66FCF1]/50 transition-colors">
          <h3 class="text-[#66FCF1] font-bold text-xl mb-3 flex items-center">
            <i class="fa-solid fa-list-check mr-3 bg-[#66FCF1]/10 p-2 rounded-lg"></i> Misi Kami
          </h3>
          <ul class="text-sm text-gray-400 list-none space-y-2">
            <li class="flex items-start">
                <i class="fa-solid fa-check text-[#66FCF1] mt-1 mr-2 text-xs"></i>
                <span>Menyediakan ragam bahan kimia industri & laboratorium terlengkap dengan standar mutu internasional.</span>
            </li>
            <li class="flex items-start">
                <i class="fa-solid fa-check text-[#66FCF1] mt-1 mr-2 text-xs"></i>
                <span>Memberikan solusi teknis dan layanan konsultasi ahli demi kepuasan mitra kerja.</span>
            </li>
            <li class="flex items-start">
                <i class="fa-solid fa-check text-[#66FCF1] mt-1 mr-2 text-xs"></i>
                <span>Menerapkan standar keselamatan (K3) dan keberlanjutan lingkungan dalam setiap rantai distribusi.</span>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- PRODUCTS SECTION -->
<section id="products" class="scroll-mt-0">
  <div class="bg-header-menu py-20 border-t border-white/5">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <h2 class="text-4xl font-heading font-bold text-white mb-4 drop-shadow-md">Katalog Produk</h2>
      <div class="w-24 h-1 bg-[#66FCF1] mx-auto rounded-full"></div>
      <p class="mt-4 text-gray-200 font-medium">Bahan kimia murni dengan harga kompetitif.</p>
    </div>
  </div>

  <div class="bg-[#141619] py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <?php
        $queryKategori = mysqli_query($conn, "SELECT * FROM tbjenismenu");
        while ($kategori = mysqli_fetch_assoc($queryKategori)) {
            $id_jenis = $kategori['id_jenis'];
        ?>
        
        <div class="bg-[#0B0C10] p-8 rounded-2xl border border-white/5 shadow-lg hover:border-[#66FCF1]/30 transition-colors">
          <h3 class="text-2xl font-bold text-[#66FCF1] mb-6 flex items-center gap-3 border-b border-gray-800 pb-3">
            <i class="fa-solid fa-layer-group"></i> <?php echo $kategori['nama_jenis']; ?>
          </h3>
          <div class="space-y-6">
            <?php 
            $queryProduk = mysqli_query($conn, "SELECT * FROM tbnamamenu WHERE id_jenis = '$id_jenis'");
            while ($produk = mysqli_fetch_assoc($queryProduk)) {
            ?>
            <div class="group flex flex-col sm:flex-row justify-between items-start gap-4 border-b border-gray-800 pb-4 hover:border-[#66FCF1]/50 transition-colors duration-300">
              <div class="flex-1 pr-2">
                <h4 class="text-lg font-semibold text-white group-hover:text-[#66FCF1] transition-colors">
                    <?php echo $produk['nama_menu']; ?>
                </h4>
                <p class="text-sm text-gray-400 italic mt-1 leading-snug">
                    <?php echo $produk['deskripsi']; ?>
                </p>
              </div>
              <span class="shrink-0 text-[#66FCF1] font-bold whitespace-nowrap bg-[#66FCF1]/10 px-4 py-1 rounded-full text-sm border border-[#66FCF1]/20">
                Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?>
              </span>
            </div>
            <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<!-- PORTFOLIO SECTION (DIPERBAIKI: SPACING & BORDER) -->
<section id="portfolio" class="scroll-mt-0">
  <div class="bg-header-gallery py-20 border-t border-white/5">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <h2 class="text-4xl font-heading font-bold text-white mb-4 drop-shadow-md">Galeri Visual</h2>
      <div class="w-24 h-1 bg-[#66FCF1] mx-auto rounded-full"></div>
      <p class="mt-4 text-gray-200 font-medium">Dokumentasi aktivitas dan produk kami.</p>
    </div>
  </div>

  <div class="bg-[#0B0C10] py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-12" id="portfolio-filters">
            <button data-filter="*" class="filter-btn active px-6 py-2 rounded-full border border-gray-700 text-white bg-[#141619] hover:bg-[#66FCF1] hover:text-[#0B0C10] hover:border-[#66FCF1] transition-all duration-300 font-medium">Semua</button>
            <?php 
            $filterKat = mysqli_query($conn, "SELECT * FROM tbjenismenu");
            while($fk = mysqli_fetch_assoc($filterKat)){
                echo '<button data-filter=".cat-'.$fk['id_jenis'].'" class="filter-btn px-6 py-2 rounded-full border border-gray-700 text-white bg-[#141619] hover:bg-[#66FCF1] hover:text-[#0B0C10] hover:border-[#66FCF1] transition-all duration-300 font-medium">'.$fk['nama_jenis'].'</button>';
            }
            ?>
        </div>

        <!-- Gallery Grid (Menggunakan Data Database) -->
        <!-- HAPUS 'flex' dan 'flex-wrap' agar Isotope bisa melakukan animasi absolute positioning -->
        <div class="portfolio-container -mx-4">
            <?php 
            // Query untuk mengambil semua produk yang memiliki gambar
            $queryGaleri = mysqli_query($conn, "SELECT * FROM tbnamamenu WHERE image != ''");
            while($imgItem = mysqli_fetch_assoc($queryGaleri)){
                $classFilter = "cat-" . $imgItem['id_jenis'];
                $imagePath   = "img/portfolio/" . $imgItem['image'];
            ?>
            
            <!-- Item Wrapper: Gunakan padding (px-4) untuk membuat JARAK antar gambar -->
            <div class="portfolio-item w-full md:w-1/2 lg:w-1/3 px-4 mb-8 <?php echo $classFilter; ?>">
                
                <!-- Card Content: Border dan styling ada di sini -->
                <div class="relative overflow-hidden rounded-xl border-2 border-gray-700 hover:border-[#66FCF1] transition-all duration-300 shadow-lg group">
                    <a href="<?php echo $imagePath; ?>" title="<?php echo $imgItem['nama_menu']; ?>" data-lightbox-gallery="gallery1">
                        <!-- Menggunakan onError untuk fallback image jika file gambar tidak ditemukan -->
                        <img src="<?php echo $imagePath; ?>" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500" alt="<?php echo $imgItem['nama_menu']; ?>" onerror="this.src='https://placehold.co/600x400/141619/66FCF1?text=Chemika'">
                        <div class="absolute inset-0 bg-[#66FCF1]/90 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <h4 class="text-[#0B0C10] font-bold text-xl translate-y-4 group-hover:translate-y-0 transition duration-300 px-4 text-center">
                                <?php echo $imgItem['nama_menu']; ?>
                            </h4>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
  </div>
</section>

<!-- TEAM SECTION -->
<section id="team" class="scroll-mt-0">
  <div class="bg-header-team py-20 border-t border-white/5">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <h2 class="text-4xl font-heading font-bold text-white mb-4 drop-shadow-md">Tim Ahli</h2>
      <div class="w-24 h-1 bg-[#66FCF1] mx-auto rounded-full"></div>
      <p class="mt-4 text-gray-200 font-medium">Profesional berpengalaman di bidangnya.</p>
    </div>
  </div>

  <div class="bg-[#141619] py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-[#0B0C10] p-8 rounded-2xl border border-white/5 hover:border-[#66FCF1] hover:-translate-y-2 transition duration-300 group shadow-lg">
                <div class="mb-6 flex justify-center">
                    <img src="img/team/01.jpg" alt="Team 1" class="w-32 h-32 rounded-full object-cover border-4 border-gray-700 group-hover:border-[#66FCF1] transition duration-300">
                </div>
                <div class="text-center">
                <h3 class="text-xl font-bold text-white mb-1">Dr. Hendra</h3>
                <p class="text-[#66FCF1] text-sm font-medium tracking-wide">KEPALA LAB</p>
                </div>
            </div>
            
            <div class="bg-[#0B0C10] p-8 rounded-2xl border border-white/5 hover:border-[#66FCF1] hover:-translate-y-2 transition duration-300 group shadow-lg">
                <div class="mb-6 flex justify-center">
                    <img src="img/team/02.jpg" alt="Team 2" class="w-32 h-32 rounded-full object-cover border-4 border-gray-700 group-hover:border-[#66FCF1] transition duration-300">
                </div>
                <div class="text-center">
                <h3 class="text-xl font-bold text-white mb-1">Siti Aminah, Apt</h3>
                <p class="text-[#66FCF1] text-sm font-medium tracking-wide">QUALITY CONTROL</p>
                </div>
            </div>

            <div class="bg-[#0B0C10] p-8 rounded-2xl border border-white/5 hover:border-[#66FCF1] hover:-translate-y-2 transition duration-300 group shadow-lg">
                <div class="mb-6 flex justify-center">
                    <img src="img/team/03.jpg" alt="Team 3" class="w-32 h-32 rounded-full object-cover border-4 border-gray-700 group-hover:border-[#66FCF1] transition duration-300">
                </div>
                <div class="text-center">
                <h3 class="text-xl font-bold text-white mb-1">Budi Santoso</h3>
                <p class="text-[#66FCF1] text-sm font-medium tracking-wide">TECHNICAL SUPPORT</p>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<!-- CALL TO ACTION -->
<section class="py-16 bg-gradient-to-r from-gray-900 to-blue-900 border-t border-b border-white/10">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-white mb-4">Butuh Pasokan Skala Besar?</h2>
        <p class="text-gray-300 mb-8">Kami melayani pembelian Grosir, Drum, dan Kebutuhan Pabrik dengan harga spesial.</p>
        <a href="#contact" class="inline-block px-8 py-3 bg-[#66FCF1] text-[#0B0C10] font-bold rounded-full hover:bg-white transition duration-300 shadow-lg hover:shadow-[#66FCF1]/50">
            Hubungi Sales
        </a>
    </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact" class="py-24 bg-[#0B0C10] scroll-mt-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
      <div class="lg:col-span-2">
        <h3 class="text-2xl font-bold text-white mb-6 border-b-2 border-[#66FCF1] inline-block pb-2">Kirim Pesan</h3>
        <form name="sentMessage" id="contactForm" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <input type="text" id="name" class="w-full bg-[#141619] border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#66FCF1] transition" placeholder="Nama Lengkap" required>
            <input type="email" id="email" class="w-full bg-[#141619] border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#66FCF1] transition" placeholder="Email Anda" required>
          </div>
          <textarea id="message" rows="5" class="w-full bg-[#141619] border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#66FCF1] transition" placeholder="Tulis kebutuhan Anda..." required></textarea>
          <button type="submit" class="bg-transparent border-2 border-[#66FCF1] text-[#66FCF1] px-8 py-3 rounded-full font-bold hover:bg-[#66FCF1] hover:text-[#0B0C10] transition duration-300">
            KIRIM PESAN
          </button>
        </form>
      </div>

      <div class="bg-[#141619] p-8 rounded-2xl border border-gray-800">
        <h3 class="text-xl font-bold text-white mb-6">Informasi Kontak</h3>
        <div class="space-y-6">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-[#66FCF1] shrink-0 border border-gray-700">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div>
                    <h4 class="text-white font-semibold">Jam Operasional</h4>
                    <p class="text-sm text-gray-400">Senin - Jumat: 08:00 - 17:00</p>
                    <p class="text-sm text-gray-400">Sabtu: 08:00 - 14:00</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-[#66FCF1] shrink-0 border border-gray-700">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div>
                    <h4 class="text-white font-semibold">Telepon</h4>
                    <p class="text-sm text-gray-400">+62 21 555 1234</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-[#66FCF1] shrink-0 border border-gray-700">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div>
                    <h4 class="text-white font-semibold">Email</h4>
                    <p class="text-sm text-gray-400">sales@chemikanusantara.com</p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="bg-black py-12 border-t border-gray-900">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <div class="flex justify-center items-center gap-8 mb-8">
        <a href="#" class="w-20 h-20 flex items-center justify-center rounded-full bg-gray-900 text-white text-3xl border border-gray-800 hover:bg-[#66FCF1] hover:text-[#0B0C10] hover:-translate-y-2 hover:shadow-[0_0_20px_rgba(102,252,241,0.5)] transition-all duration-300">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="#" class="w-20 h-20 flex items-center justify-center rounded-full bg-gray-900 text-white text-3xl border border-gray-800 hover:bg-[#66FCF1] hover:text-[#0B0C10] hover:-translate-y-2 hover:shadow-[0_0_20px_rgba(102,252,241,0.5)] transition-all duration-300">
            <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="#" class="w-20 h-20 flex items-center justify-center rounded-full bg-gray-900 text-white text-3xl border border-gray-800 hover:bg-[#66FCF1] hover:text-[#0B0C10] hover:-translate-y-2 hover:shadow-[0_0_20px_rgba(102,252,241,0.5)] transition-all duration-300">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>
    <p class="text-gray-500">&copy; 2024 <span class="text-[#66FCF1]">Chemika Nusantara</span>. Built with passion for Science.</p>
  </div>
</footer>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/nivo-lightbox.js"></script>
<script src="js/jquery.isotope.js"></script>

<!-- Logic JS -->
<script>
$(document).ready(function() {
    $('#mobile-menu-btn').click(function() {
        $('#mobile-menu').toggleClass('hidden');
    });

    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this.hash);
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 800);
            $('#mobile-menu').addClass('hidden');
        }
    });

    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            $('#navbar').addClass('bg-[#0B0C10]/95 shadow-lg').removeClass('bg-[#0B0C10]/90');
        } else {
            $('#navbar').removeClass('bg-[#0B0C10]/95 shadow-lg').addClass('bg-[#0B0C10]/90');
        }

        var scrollDistance = $(window).scrollTop() + 150;
        $('section').each(function(i) {
            if ($(this).position().top <= scrollDistance) {
                $('.nav-link').removeClass('active text-[#66FCF1]').addClass('text-gray-300');
                $('.nav-link').eq(i).addClass('active text-[#66FCF1]').removeClass('text-gray-300');
            }
        });
    });

    // Inisialisasi Isotope
    var $grid = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
    });

    // Event Filter dengan Animasi Smooth
    $('.filter-btn').on('click', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
        
        // Ganti style tombol aktif
        $('.filter-btn').removeClass('bg-[#66FCF1] text-[#0B0C10] border-[#66FCF1]').addClass('border-gray-700 text-white bg-[#141619]');
        $(this).removeClass('border-gray-700 text-white bg-[#141619]').addClass('bg-[#66FCF1] text-[#0B0C10] border-[#66FCF1]');
    });

    $('a[data-lightbox-gallery]').nivoLightbox({
        effect: 'slideDown',
        keyboardNav: true,
    });
});
</script>

</body>
</html>