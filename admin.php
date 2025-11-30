<?php
session_start();
// Cek Login
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
    <link rel="apple-touch-icon" href="img/logo/apple-touch-icon.png" />

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
        /* Sembunyikan Scrollbar Sidebar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        iframe { width: 100%; height: 100%; border: none; }

        /* Transisi Sidebar Mobile */
        .sidebar-transition { transition: transform 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-dark text-gray-300 font-sans overflow-hidden">

    <div class="flex h-screen relative">
        
        <!-- OVERLAY (Hanya Muncul di Mobile saat Menu Terbuka) -->
        <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden glass"></div>

        <!-- SIDEBAR -->
        <!-- Perbaikan Layout: Menggunakan flex-col dengan pembagian ruang flex-1 untuk menu -->
        <aside id="sidebar" class="sidebar-transition absolute md:relative z-50 w-64 h-full bg-[#141619] border-r border-white/10 flex flex-col transform -translate-x-full md:translate-x-0">
            
            <!-- 1. HEADER (Fixed Height) -->
            <div class="h-16 md:h-20 flex items-center justify-between px-6 border-b border-white/5 flex-shrink-0">
                <h1 class="text-xl font-bold text-white tracking-wider flex items-center gap-2">
                    <img src="img/logo.png" alt="Logo" class="w-8 h-8 rounded-full object-cover border border-[#66FCF1]"> CHEMIKA<span class="text-neon">LAB</span>
                </h1>
                <!-- Tombol Tutup (Hanya di Mobile) -->
                <button onclick="toggleSidebar()" class="md:hidden text-gray-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- 2. MENU ITEMS (Flexible Height - Scrollable) -->
            <!-- flex-1 membuatnya mengisi sisa ruang yang ada, overflow-y-auto membuatnya bisa discroll jika menu panjang -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto no-scrollbar">
                <p class="text-xs font-bold text-gray-500 uppercase px-3 mb-2 tracking-widest">Main Menu</p>
                
                <a href="?page=home" onclick="closeSidebarOnMobile()" class="flex items-center gap-3 px-3 py-3 rounded-lg <?php echo (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'bg-neon/10 text-neon border-l-2 border-neon' : 'text-gray-400 hover:bg-white/5 hover:text-white'; ?> transition-all duration-200">
                    <i class="fa-solid fa-house w-5 text-center"></i> Dashboard
                </a>
                
                <a href="?page=jenis" onclick="closeSidebarOnMobile()" class="flex items-center gap-3 px-3 py-3 rounded-lg <?php echo (isset($_GET['page']) && $_GET['page'] == 'jenis') ? 'bg-neon/10 text-neon border-l-2 border-neon' : 'text-gray-400 hover:bg-white/5 hover:text-white'; ?> transition-all duration-200">
                    <i class="fa-solid fa-tags w-5 text-center"></i> Kategori Menu
                </a>
                
                <a href="?page=produk" onclick="closeSidebarOnMobile()" class="flex items-center gap-3 px-3 py-3 rounded-lg <?php echo (isset($_GET['page']) && $_GET['page'] == 'produk') ? 'bg-neon/10 text-neon border-l-2 border-neon' : 'text-gray-400 hover:bg-white/5 hover:text-white'; ?> transition-all duration-200">
                    <i class="fa-solid fa-box-open w-5 text-center"></i> Produk Menu
                </a>

                <div class="pt-4 mt-4 border-t border-white/5">
                    <a href="index.php" target="_blank" class="flex items-center gap-3 px-3 py-3 rounded-lg text-yellow-500 hover:bg-yellow-500/10 transition-all duration-200">
                        <i class="fa-solid fa-external-link-alt w-5 text-center"></i> Lihat Website
                    </a>
                </div>
            </nav>

            <!-- 3. FOOTER PROFILE & LOGOUT (Fixed Height at Bottom) -->
            <div class="p-4 border-t border-white/5 bg-[#0f1114] flex-shrink-0">
                <div class="flex items-center gap-3 mb-4 px-2">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-neon to-blue-500 flex items-center justify-center text-dark font-bold text-lg shrink-0">
                        <?php echo substr($_SESSION['nama_lengkap'] ?? 'A', 0, 1); ?>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-white truncate"><?php echo $_SESSION['nama_lengkap'] ?? 'Admin'; ?></p>
                        <p class="text-xs text-green-400 flex items-center gap-1">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span> Online
                        </p>
                    </div>
                </div>
                <a href="logout.php" onclick="konfirmasiLogout(event, this.href)" class="block w-full text-center bg-red-500/10 text-red-400 border border-red-500/20 py-2 rounded-lg hover:bg-red-500 hover:text-white transition-all text-sm font-semibold group">
                    <i class="fa-solid fa-right-from-bracket mr-1 group-hover:rotate-180 transition-transform"></i> Logout
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="flex-1 flex flex-col h-full bg-[#0B0C10] w-full relative">
            
            <!-- MOBILE HEADER (Hanya muncul di Mobile) -->
            <header class="md:hidden h-16 bg-[#141619] border-b border-white/10 flex items-center justify-between px-4 flex-shrink-0">
                <button onclick="toggleSidebar()" class="text-white hover:text-neon p-2">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <span class="text-lg font-bold text-white tracking-wider">CHEMIKA<span class="text-neon">LAB</span></span>
                <div class="w-8"></div> <!-- Spacer penyeimbang -->
            </header>

            <!-- IFRAME CONTAINER -->
            <div class="flex-1 w-full h-full overflow-hidden relative">
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
                <iframe src="<?php echo $source; ?>" name="contentFrame" class="w-full h-full"></iframe>
            </div>
        </main>
    </div>

    <!-- Script SweetAlert & Toggle Sidebar -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        sidebar.classList.toggle('-translate-x-full');
        
        if (overlay.classList.contains('hidden')) {
            overlay.classList.remove('hidden');
        } else {
            overlay.classList.add('hidden');
        }
    }

    function closeSidebarOnMobile() {
        if (window.innerWidth < 768) { 
            toggleSidebar();
        }
    }

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