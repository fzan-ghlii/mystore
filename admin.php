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
    <!-- ====== FAVICONS ====== -->
<link rel="icon" type="image/png" sizes="16x16" href="img/logo/favicon-16x16.png" />
<link rel="icon" type="image/png" sizes="32x32" href="img/logo/favicon-32x32.png" />
<link rel="icon" type="image/x-icon" href="img/logo/favicon.ico" />

<!-- ====== APPLE TOUCH ICON ====== -->
<link rel="apple-touch-icon" href="img/logo/apple-touch-icon.png" />

<!-- ====== ANDROID / CHROME ICONS ====== -->
<link rel="icon" type="image/png" sizes="192x192" href="img/logo/android-chrome-192x192.png" />
<link rel="icon" type="image/png" sizes="512x512" href="img/logo/android-chrome-512x512.png" />

<!-- ====== WEB MANIFEST ====== -->
<link rel="manifest" href="img/logo/site.webmanifest" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: { dark: '#0B0C10', card: '#1F2833', neon: '#66FCF1' }
                }
            }
        }
    </script>
    <style>
        /* Hide Scrollbar for Sidebar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Iframe adjustments */
        iframe { width: 100%; height: 100%; border: none; }
    </style>
</head>
<body class="bg-dark text-gray-300 font-sans overflow-hidden">

    <div class="flex h-screen">
        
        <!-- SIDEBAR -->
        <aside class="w-64 h-full bg-[#141619] border-r border-white/10 flex flex-col justify-between flex-shrink-0 z-50">
            <div>
                <!-- Brand -->
                <div class="h-20 flex items-center justify-center border-b border-white/5">
                    <h1 class="text-xl font-bold text-white tracking-wider flex items-center gap-2">
                        <img src="img/logo.png" alt="Logo Chemika" class="w-10 h-10 rounded-full object-cover border-2 border-[#66FCF1]"> CHEMIKA<span class="text-neon">LAB</span>
                    </h1>
                </div>

                <!-- Menu Items -->
                <nav class="p-4 space-y-2 mt-4">
                    <p class="text-xs font-bold text-gray-500 uppercase px-3 mb-2 tracking-widest">Main Menu</p>
                    
                    <a href="?page=home" class="flex items-center gap-3 px-3 py-3 rounded-lg <?php echo (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'bg-neon/10 text-neon border-l-2 border-neon' : 'text-gray-400 hover:bg-white/5 hover:text-white'; ?> transition-all duration-200">
                        <i class="fa-solid fa-house w-5 text-center"></i> Dashboard
                    </a>
                    
                    <a href="?page=jenis" class="flex items-center gap-3 px-3 py-3 rounded-lg <?php echo (isset($_GET['page']) && $_GET['page'] == 'jenis') ? 'bg-neon/10 text-neon border-l-2 border-neon' : 'text-gray-400 hover:bg-white/5 hover:text-white'; ?> transition-all duration-200">
                        <i class="fa-solid fa-tags w-5 text-center"></i> Kategori Menu
                    </a>
                    
                    <a href="?page=produk" class="flex items-center gap-3 px-3 py-3 rounded-lg <?php echo (isset($_GET['page']) && $_GET['page'] == 'produk') ? 'bg-neon/10 text-neon border-l-2 border-neon' : 'text-gray-400 hover:bg-white/5 hover:text-white'; ?> transition-all duration-200">
                        <i class="fa-solid fa-box-open w-5 text-center"></i> Produk Menu
                    </a>

                    <div class="pt-4 mt-4 border-t border-white/5">
                        <a href="index.php" target="_blank" class="flex items-center gap-3 px-3 py-3 rounded-lg text-yellow-500 hover:bg-yellow-500/10 transition-all duration-200">
                            <i class="fa-solid fa-external-link-alt w-5 text-center"></i> Lihat Website
                        </a>
                    </div>
                </nav>
            </div>

            <!-- User Profile & Logout -->
            <div class="p-4 border-t border-white/5 bg-[#0f1114]">
                <div class="flex items-center gap-3 mb-4 px-2">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-neon to-blue-500 flex items-center justify-center text-dark font-bold text-lg">
                        <?php echo substr($_SESSION['nama_lengkap'] ?? 'A', 0, 1); ?>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white"><?php echo $_SESSION['nama_lengkap'] ?? 'Admin'; ?></p>
                        <p class="text-xs text-green-400">● Online</p>
                    </div>
                </div>
                <a href="logout.php" onclick="konfirmasiLogout(event, this.href)" class="block w-full text-center bg-red-500/10 text-red-400 border border-red-500/20 py-2 rounded-lg hover:bg-red-500 hover:text-white transition-all text-sm font-semibold">
                    <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT (IFRAME) -->
        <main class="flex-1 h-full bg-[#0B0C10] relative">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            
            switch ($page) {
                case 'jenis':
                    $source = "jenismenu/index.php"; // Pastikan path folder benar
                    break;
                case 'produk':
                    $source = "namamenu/index.php"; // Pastikan path folder benar
                    break;
                default:
                    $source = "dashboard_home.php";
                    break;
            }
            ?>
            <iframe src="<?php echo $source; ?>" name="contentFrame"></iframe>
        </main>
    </div>

    <!-- Script SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function konfirmasiLogout(event, urlLink) {
        event.preventDefault();
        Swal.fire({
            title: 'Logout?',
            text: "Sesi Anda akan diakhiri.",
            icon: 'warning',
            background: '#1F2833',
            color: '#fff',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#374151',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = urlLink;
            }
        })
    }
    </script>
</body>
</html>