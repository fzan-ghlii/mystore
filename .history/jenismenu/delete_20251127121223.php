<?php include '../cek_session.php'; ?>
<?php
include 'db.php';

// Cek apakah ada parameter ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query hapus
    $sql = "DELETE FROM tbjenismenu WHERE id_jenis=$id";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, kembali ke index
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Jika akses langsung tanpa ID, kembalikan ke index
    header("Location: index.php");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>body { font-family: sans-serif; background: #f4f7f6; }</style>
</head>
<body>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        <?php if($pesan == "sukses"){ ?>
            Swal.fire({
                icon: 'success',
                title: 'Terhapus!',
                text: 'Kategori berhasil dihapus.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = 'index.php';
            });
        <?php } elseif($pesan == "gagal"){ ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Data gagal dihapus. Mungkin sedang digunakan oleh produk lain.',
            }).then(() => {
                window.location = 'index.php';
            });
        <?php } ?>
    </script>

</body>
</html>