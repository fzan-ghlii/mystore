<?php include '../cek_session.php'; ?>
<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tbnamamenu WHERE id_menu=$id");
$data = $result->fetch_assoc();
$pesan = "";

if (isset($_POST['update'])) {
    $nama_menu = $_POST['nama_menu'];
    $harga     = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $id_jenis  = $_POST['id_jenis'];
    
    $image_name = $data['image'];
    if ($_FILES['image']['name'] != "") {
        if (!empty($data['image']) && file_exists("../img/portfolio/" . $data['image'])) {
            unlink("../img/portfolio/" . $data['image']);
        }
        $image_name = time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../img/portfolio/" . $image_name);
    }

    $sql = "UPDATE tbnamamenu SET 
            nama_menu='$nama_menu', harga='$harga', deskripsi='$deskripsi', 
            id_jenis='$id_jenis', image='$image_name' 
            WHERE id_menu=$id";

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
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- (Bagian HTML Form Edit sama persis seperti sebelumnya) -->
    <div class="container mt-4">
        <div class="card col-md-8 mx-auto shadow">
            <div class="card-header bg-warning">Edit Produk</div>
            <div class="card-body">
                 <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['nama_menu']; ?>" required>
                    </div>
                    <!-- ... Sisa field form sama ... -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" value="<?php echo $data['harga']; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Kategori</label>
                            <select name="id_jenis" class="form-select">
                                <?php
                                $kat = $conn->query("SELECT * FROM tbjenismenu");
                                while ($k = $kat->fetch_assoc()) {
                                    $sel = ($k['id_jenis'] == $data['id_jenis']) ? 'selected' : '';
                                    echo "<option value='" . $k['id_jenis'] . "' $sel>" . $k['nama_jenis'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"><?php echo $data['deskripsi']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Ganti Gambar</label>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Gambar saat ini: <?php echo $data['image']; ?></small>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if($pesan == "sukses"){ ?>
            Swal.fire({
                icon: 'success',
                title: 'Update Berhasil!',
                text: 'Data produk telah diperbarui.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = 'index.php';
            });
        <?php } elseif($pesan == "gagal"){ ?>
            Swal.fire('Gagal!', 'Gagal update data.', 'error');
        <?php } ?>
    </script>
</body>
</html>