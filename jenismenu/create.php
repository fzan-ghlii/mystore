<?php include '../cek_session.php'; ?>
<?php
include 'db.php';
$pesan = ""; // Variabel untuk menampung alert

if (isset($_POST['submit'])) {
    $nama_jenis = $_POST['nama_jenis'];
    $sql = "INSERT INTO tbjenismenu (nama_jenis) VALUES ('$nama_jenis')";

    if ($conn->query($sql) === TRUE) {
        $pesan = "sukses";
    } else {
        $pesan = "gagal"; 
        $error_msg = $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'], heading: ['Space Grotesk', 'sans-serif'] },
                    colors: { dark: '#0B0C10', card: '#1F2833', neon: '#66FCF1' }
                }
            }
        }
    </script>
</head>
<body class="bg-dark text-gray-300 font-sans min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background Elements -->
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-neon/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-500/10 rounded-full blur-[100px]"></div>

    <div class="w-full max-w-lg relative z-10">
        <div class="bg-card border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
            
            <!-- Header -->
            <div class="bg-[#141619] p-6 border-b border-white/5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-neon/10 flex items-center justify-center text-neon">
                    <i class="fa-solid fa-plus text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white font-heading tracking-wide">Tambah Kategori</h2>
                    <p class="text-xs text-gray-500">Masukkan nama kategori menu baru.</p>
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-8">
                <form method="POST" action="" autocomplete="off">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-400 mb-2">Nama Kategori</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-gray-500"><i class="fa-solid fa-tag"></i></span>
                            <input type="text" name="nama_jenis" class="w-full bg-dark border border-gray-700 rounded-lg py-3 pl-10 pr-4 text-white focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all" placeholder="Contoh: Bahan Padat" required autofocus>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-4 mt-8">
                        <a href="index.php" class="w-1/2 text-center bg-gray-700 hover:bg-gray-600 text-white font-medium py-3 rounded-lg transition-all">
                            Batal
                        </a>
                        <button type="submit" name="submit" class="w-1/2 bg-neon text-dark font-bold py-3 rounded-lg hover:bg-white hover:shadow-[0_0_15px_rgba(102,252,241,0.4)] transition-all transform active:scale-95">
                            <i class="fa-solid fa-save mr-2"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        <?php if($pesan == "sukses"){ ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Kategori berhasil ditambahkan.',
                background: '#1F2833',
                color: '#fff',
                iconColor: '#66FCF1',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = 'index.php'; 
            });
        <?php } elseif($pesan == "gagal"){ ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Error: <?php echo $error_msg; ?>',
                background: '#1F2833',
                color: '#fff',
                confirmButtonColor: '#ef4444'
            });
        <?php } ?>
    </script>
</body>
</html>