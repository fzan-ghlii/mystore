<?php
include 'db.php';
$pesan = ""; // Variabel untuk menampung alert

if (isset($_POST['submit'])) {
    $nama_jenis = $_POST['nama_jenis'];
    $sql = "INSERT INTO tbjenismenu (nama_jenis) VALUES ('$nama_jenis')";

    if ($conn->query($sql) === TRUE) {
        // Berhasil: Set variabel pesan sukses
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
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">Tambah Kategori</div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" name="nama_jenis" class="form-control" required autocomplete="off">
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

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Cek variabel PHP $pesan
        <?php if($pesan == "sukses"){ ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Kategori berhasil ditambahkan.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = 'index.php'; // Redirect via JS
            });
        <?php } elseif($pesan == "gagal"){ ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Error: <?php echo $error_msg; ?>',
            });
        <?php } ?>
    </script>
</body>
</html>