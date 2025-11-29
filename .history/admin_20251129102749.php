<?php
session_start();
// Cek Login khusus untuk halaman root (admin.php)
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Chemika Nusantara</title>
    <!-- Bootstrap 5 & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- SweetAlert2 CSS (WAJIB ADA) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        body {
            overflow: hidden; 
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
            position: fixed; 
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar h4 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 20px;
        }
        
        .menu-items {
            flex-grow: 1; /* Agar menu mengisi ruang */
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
            border-left-color: #779936; 
        }
        .sidebar i {
            width: 30px;
        }

        /* Tombol Logout */
        .logout-btn {
            background-color: rgba(220, 53, 69, 0.2);
            color: #ffcccc !important;
            margin-bottom: 20px;
            cursor: pointer; /* Ubah cursor jadi tangan */
        }
        .logout-btn:hover {
            background-color: #dc3545 !important;
            color: white !important;
        }
        
        /* MAIN CONTENT */
        .main-content {
            margin-left: 250px; 
            height: 100vh;      
            width: calc(100% - 250px); 
            display: block;     
        }
        
        iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
        }
    </style>
</head>
<body>

    <div>
        <!-- Sidebar Kiri -->
        <div class="sidebar">
            <h4><i class="fas fa-flask"></i></h4>
            
            <div class="menu-items">
                <a href="?page=home" class="<?php echo (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'active' : ''; ?>">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                
                <a href="?page=jenis" class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'jenis') ? 'active' : ''; ?>">
                    <i class="fas fa-tags"></i> Kategori Menu
                </a>
                
                <a href="?page=produk" class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'produk') ? 'active' : ''; ?>">
                    <i class="fas fa-box-open"></i> Produk Menu
                </a>

                <a href="index.php" target="_blank" class="mt-4 text-warning">
                    <i class="fas fa-external-link-alt"></i> Lihat Website
                </a>
            </div>

            <!-- TOMBOL LOGOUT DENGAN SWEETALERT -->
            <!-- Pemicu JavaScript konfirmasiLogout -->
            <a href="logout.php" class="logout-btn" onclick="konfirmasiLogout(event, this.href)">
                <i class="fas fa-sign-out-alt"></i> Keluar
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
            <iframe src="<?php echo $source; ?>" name="contentFrame"></iframe>
        </div>
    </div>

    <!-- SCRIPT SWEETALERT LOGOUT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    function konfirmasiLogout(event, urlLink) {
        event.preventDefault(); // Mencegah link langsung jalan
        
        Swal.fire({
            title: 'Yakin ingin keluar?',
            text: "Sesi admin Anda akan diakhiri.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33', // Warna Merah untuk tombol Keluar
            cancelButtonColor: '#3085d6', // Warna Biru untuk tombol Batal
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Efek loading sukses sebentar sebelum redirect
                let timerInterval
                Swal.fire({
                    title: 'Sampai Jumpa!',
                    html: 'Sedang keluar...',
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    willClose: () => {
                        // Setelah loading selesai, pindah ke logout.php
                        window.location.href = urlLink;
                    }
                })
            }
        })
    }
    </script>

</body>
</html>