<?php
include 'db.php';
$pesan = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // 1. Ambil nama file gambar dulu sebelum data dihapus
    $queryCek = $conn->query("SELECT image FROM tbnamamenu WHERE id_menu=$id");
    $data = $queryCek->fetch_assoc();
    
    // 2. Hapus file fisik gambar jika ada
    if (!empty($data['image'])) {
        $pathFile = "../img/portfolio/" . $data['image'];
        if (file_exists($pathFile)) {
            unlink($pathFile); // Fungsi PHP untuk menghapus file
        }
    }

    // 3. Hapus data dari database
    $sql = "DELETE FROM tbnamamenu WHERE id_menu=$id";

    if ($conn->query($sql) === TRUE) {
        $pesan = "sukses";
    } else {
        $pesan = "gagal";
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>body { font-family: sans-serif; background: #f4f7f6; }</style>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        <?php if($pesan == "sukses"){ ?>
            Swal.fire({
                icon: 'success',
                title: 'Terhapus!',
                text: 'Produk dan gambarnya berhasil dihapus.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = 'index.php';
            });
        <?php } elseif($pesan == "gagal"){ ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat menghapus data.',
            }).then(() => {
                window.location = 'index.php';
            });
        <?php } ?>
    </script>

</body>
</html>