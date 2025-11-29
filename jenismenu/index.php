<?php include '../cek_session.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Jenis Menu</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { dark: '#0B0C10', card: '#1F2833', neon: '#66FCF1' }
                }
            }
        }
    </script>
    <style>
        /* Styling Paksa untuk Tabel yang di-include agar sesuai tema gelap */
        table { width: 100%; border-collapse: collapse; color: #e5e7eb; }
        th { background-color: #111316; color: #66FCF1; padding: 12px; text-align: left; border-bottom: 2px solid #374151; }
        td { padding: 12px; border-bottom: 1px solid #374151; }
        tr:hover { background-color: rgba(102, 252, 241, 0.05); }
        .btn { padding: 6px 12px; border-radius: 6px; font-size: 0.875rem; text-decoration: none; display: inline-block; margin-right: 5px; }
        .btn-primary, .btn-info { background-color: #3b82f6; color: white; }
        .btn-danger { background-color: #ef4444; color: white; }
        .btn-warning { background-color: #eab308; color: black; }
    </style>
</head>
<body class="bg-dark p-6 md:p-10 font-sans text-gray-300">

    <div class="max-w-6xl mx-auto">
        <!-- Header Page -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                    <span class="w-1 h-8 bg-neon rounded-full block"></span>
                    Manajemen Kategori
                </h2>
                <p class="text-sm text-gray-500 mt-1">Kelola jenis/kategori produk kimia Anda di sini.</p>
            </div>
            
            <a href="create.php" class="bg-neon text-dark font-bold px-6 py-2.5 rounded-lg shadow-[0_0_15px_rgba(102,252,241,0.3)] hover:bg-white hover:scale-105 transition-all flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Tambah Kategori
            </a>
        </div>

        <!-- Content Card -->
        <div class="bg-card border border-white/5 rounded-xl shadow-xl overflow-hidden p-6">
            <div class="overflow-x-auto">
                <!-- Memanggil file view_jenismenu.php -->
                <!-- Pastikan file view_jenismenu.php HANYA berisi tabel/konten, bukan struktur HTML body penuh -->
                <?php include 'view_jenismenu.php'; ?>
            </div>
        </div>
    </div>

</body>
</html>