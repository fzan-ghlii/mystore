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
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">Tambah Produk Baru</div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <!-- (Isi Form Sama seperti sebelumnya) -->
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" name="nama_menu" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Harga (Rp)</label>
                                    <input type="number" name="harga" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select name="id_jenis" class="form-select" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php
                                        $kat = $conn->query("SELECT * FROM tbjenismenu");
                                        while ($k = $kat->fetch_assoc()) {
                                            echo "<option value='" . $k['id_jenis'] . "'>" . $k['nama_jenis'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar Produk</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="index.php" class="btn btn-secondary">Batal</a>
                                <button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if($pesan == "sukses"){ ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Produk berhasil disimpan.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = 'index.php';
            });
        <?php } elseif($pesan == "gagal"){ ?>
            Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan.', 'error');
        <?php } ?>
    </script>
</body>
</html>