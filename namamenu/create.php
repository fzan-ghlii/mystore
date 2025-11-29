<?php include '../cek_session.php'; ?>
<?php
include 'db.php';
$pesan = "";

if (isset($_POST['submit'])) {
    $nama_menu = $_POST['nama_menu'];
    $harga     = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $id_jenis  = $_POST['id_jenis'];

    $image = $_FILES['image']['name'];
    $target_dir = "../img/portfolio/";
    
    if ($image != "") {
        $image_name = time() . "_" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $image_name);
    } else {
        $image_name = "";
    }

    $sql = "INSERT INTO tbnamamenu (nama_menu, harga, deskripsi, image, id_jenis) 
            VALUES ('$nama_menu', '$harga', '$deskripsi', '$image_name', '$id_jenis')";

    if ($conn->query($sql) === TRUE) {
        $pesan = "sukses";
    } else {
        $pesan = "gagal";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
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
<body class="bg-dark text-gray-300 font-sans min-h-screen flex items-center justify-center p-6 relative overflow-hidden">

    <!-- Background Elements -->
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-neon/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-500/10 rounded-full blur-[100px]"></div>

    <div class="w-full max-w-2xl relative z-10">
        <div class="bg-card border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
            
            <!-- Header -->
            <div class="bg-[#141619] p-6 border-b border-white/5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-500/10 flex items-center justify-center text-green-500">
                    <i class="fa-solid fa-box-open text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white font-heading tracking-wide">Tambah Produk Baru</h2>
                    <p class="text-xs text-gray-500">Masukkan detail produk kimia baru Anda.</p>
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-8">
                <form method="POST" enctype="multipart/form-data" autocomplete="off" class="space-y-5">
                    
                    <!-- Nama Produk -->
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Nama Produk</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-gray-500"><i class="fa-solid fa-flask"></i></span>
                            <input type="text" name="nama_menu" class="w-full bg-dark border border-gray-700 rounded-lg py-3 pl-10 pr-4 text-white focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all" placeholder="Contoh: Asam Sulfat 98%" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Harga -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Harga (Rp)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-3.5 text-gray-500">Rp</span>
                                <input type="number" name="harga" class="w-full bg-dark border border-gray-700 rounded-lg py-3 pl-10 pr-4 text-white focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all" placeholder="0" required>
                            </div>
                        </div>
                        <!-- Kategori -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Kategori</label>
                            <select name="id_jenis" class="w-full bg-dark border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all" required>
                                <option value="" class="text-gray-500">-- Pilih Kategori --</option>
                                <?php
                                $kat = $conn->query("SELECT * FROM tbjenismenu");
                                while ($k = $kat->fetch_assoc()) {
                                    echo "<option value='" . $k['id_jenis'] . "'>" . $k['nama_jenis'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Deskripsi Produk</label>
                        <textarea name="deskripsi" rows="3" class="w-full bg-dark border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all" placeholder="Jelaskan kegunaan dan spesifikasi produk..."></textarea>
                    </div>

                    <!-- Upload Gambar -->
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Upload Gambar</label>
                        <input type="file" name="image" class="block w-full text-sm text-gray-400
                            file:mr-4 file:py-2.5 file:px-4
                            file:rounded-lg file:border-0
                            file:text-sm file:font-semibold
                            file:bg-neon/10 file:text-neon
                            hover:file:bg-neon/20 cursor-pointer bg-dark border border-gray-700 rounded-lg">
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between gap-4 mt-8 pt-4 border-t border-gray-700">
                        <a href="index.php" class="w-1/3 text-center bg-gray-700 hover:bg-gray-600 text-white font-medium py-3 rounded-lg transition-all">
                            Batal
                        </a>
                        <button type="submit" name="submit" class="w-2/3 bg-green-500 text-white font-bold py-3 rounded-lg hover:bg-green-600 hover:shadow-[0_0_15px_rgba(34,197,94,0.4)] transition-all transform active:scale-95 flex justify-center items-center gap-2">
                            <i class="fa-solid fa-save"></i> Simpan Data
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
                text: 'Produk berhasil ditambahkan.',
                background: '#1F2833',
                color: '#fff',
                iconColor: '#22c55e',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = 'index.php'; 
            });
        <?php } elseif($pesan == "gagal"){ ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan sistem.',
                background: '#1F2833',
                color: '#fff',
                confirmButtonColor: '#ef4444'
            });
        <?php } ?>
    </script>
</body>
</html>