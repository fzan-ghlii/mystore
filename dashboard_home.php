<?php
include 'koneksi.php'; // Sesuaikan path koneksi database Anda

// Hitung Total Data untuk Widget
$total_kategori = $conn->query("SELECT COUNT(*) as total FROM tbjenismenu")->fetch_assoc()['total'];
$total_produk = $conn->query("SELECT COUNT(*) as total FROM tbnamamenu")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { dark: '#0B0C10', card: '#1F2833', neon: '#66FCF1' } }
            }
        }
    </script>
</head>
<body class="bg-dark p-8 font-sans text-gray-300">

    <div class="max-w-6xl mx-auto">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-[#1F2833] to-[#141619] p-8 rounded-2xl border border-white/10 shadow-2xl mb-10 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Selamat Datang, Admin! 👋</h1>
                <p class="text-gray-400">Di Panel Kontrol <span class="text-neon font-bold">Chemika Nusantara</span>. Kelola data laboratorium Anda dengan mudah.</p>
            </div>
            <div class="hidden md:block">
                <i class="fa-solid fa-flask text-6xl text-neon/20 animate-pulse"></i>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Card Kategori -->
            <div class="bg-card p-6 rounded-xl border border-white/5 shadow-lg hover:border-neon/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm font-semibold uppercase tracking-wider">Total Kategori</p>
                        <h3 class="text-4xl font-bold text-white mt-2"><?php echo $total_kategori; ?></h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-400 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-tags text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-white/5">
                    <a href="admin.php?page=jenis" target="_top" class="text-sm text-blue-400 hover:text-blue-300 flex items-center gap-1">
                        Lihat Detail <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Card Produk -->
            <div class="bg-card p-6 rounded-xl border border-white/5 shadow-lg hover:border-neon/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm font-semibold uppercase tracking-wider">Total Produk</p>
                        <h3 class="text-4xl font-bold text-white mt-2"><?php echo $total_produk; ?></h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-neon/10 flex items-center justify-center text-neon group-hover:bg-neon group-hover:text-dark transition-colors">
                        <i class="fa-solid fa-box-open text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-white/5">
                    <a href="admin.php?page=produk" target="_top" class="text-sm text-neon hover:text-white flex items-center gap-1">
                        Lihat Detail <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Card Waktu (Hiasan) -->
            <div class="bg-card p-6 rounded-xl border border-white/5 shadow-lg hover:border-purple-500/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm font-semibold uppercase tracking-wider">Status System</p>
                        <h3 class="text-xl font-bold text-green-400 mt-3 flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-green-500 animate-ping"></span> Online
                        </h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-purple-500/10 flex items-center justify-center text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-server text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-white/5">
                    <p class="text-xs text-gray-500">PHP Version: <?php echo phpversion(); ?></p>
                </div>
            </div>

        </div>
    </div>

</body>
</html>