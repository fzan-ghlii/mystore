<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Chemika Nusantara</title>
    <!-- Bootstrap 5 & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            overflow: hidden; /* Hilangkan scroll di body utama agar iframe yang scroll */
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }
        
        /* SIDEBAR FIXED */
        .sidebar {
            height: 100vh;
            background: linear-gradient(to bottom, #1E90FF, #104e8b);
            color: white;
            padding-top: 20px;
            position: fixed; /* Mengambang di kiri */
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s;
        }
        
        .sidebar h4 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 20px;
        }
        .sidebar a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            display: block;
            padding: 15px 25px;
            font-size: 16px;
            border-left: 4px solid transparent;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
            border-left-color: #779936; /* Hijau Chemika */
        }
        .sidebar i {
            width: 30px;
        }
        
        /* MAIN CONTENT - BLOCK LAYOUT */
        /* Karena sidebar fixed, kita cukup kasih margin-left */
        .main-content {
            margin-left: 250px; /* Geser konten ke kanan sebesar lebar sidebar */
            height: 100vh;      /* Tinggi full layar */
            width: calc(100% - 250px); /* Lebar sisa layar */
            display: block;     /* Pastikan display block, bukan flex */
        }
        
        /* IFRAME FULL */
        iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block; /* Menghilangkan gap bawah default iframe */
        }
    </style>
</head>
<body>

    <!-- HAPUS CLASS d-flex DI SINI -->
    <div>
        <!-- Sidebar Kiri -->
        <div class="sidebar">
            <h4><i class="fas fa-flask"></i> Admin Panel</h4>
            
            <a href="?page=home" class="<?php echo (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'active' : ''; ?>">
                <i class="fas fa-home"></i> Dashboard
            </a>
            
            <a href="?page=jenis" class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'jenis') ? 'active' : ''; ?>">
                <i class="fas fa-tags"></i> Kategori Menu
            </a>
            
            <a href="?page=produk" class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'produk') ? 'active' : ''; ?>">
                <i class="fas fa-box-open"></i> Produk Menu
            </a>

            <a href="index.php" target="_blank" class="mt-5 text-warning">
                <i class="fas fa-external-link-alt"></i> Lihat Website
            </a>
        </div>

        <!-- Konten Kanan -->
        <div class="main-content">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            
            switch ($page) {
                case 'jenis':
                    $source = "jenismenu/index.php";
                    break;
                case 'produk':
                    $source = "namamenu/index.php";
                    break;
                default:
                    $source = "dashboard_home.php";
                    break;
            }
            ?>
            
            <!-- Iframe memuat halaman target -->
            <iframe src="<?php echo $source; ?>" name="contentFrame"></iframe>
        </div>
    </div>

</body>
</html>