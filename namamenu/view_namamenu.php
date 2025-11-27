<?php
include 'db.php';
$sql = "SELECT tbnamamenu.*, tbjenismenu.nama_jenis 
        FROM tbnamamenu 
        LEFT JOIN tbjenismenu ON tbnamamenu.id_jenis = tbjenismenu.id_jenis 
        ORDER BY id_menu DESC";
$result = $conn->query($sql);
?>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th width="5%">No</th>
                <th width="10%">Gambar</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-center">
                        <?php if (!empty($row['image'])): ?>
                            <img src="../img/portfolio/<?php echo $row['image']; ?>" width="60" height="60" style="object-fit:cover; border-radius:5px;">
                        <?php else: ?>
                            <span class="text-muted text-small">No Img</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <strong><?php echo htmlspecialchars($row['nama_menu']); ?></strong><br>
                        <small class="text-muted"><?php echo substr($row['deskripsi'], 0, 50); ?>...</small>
                    </td>
                    <td><span class="badge bg-secondary"><?php echo $row['nama_jenis']; ?></span></td>
                    <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?php echo $row['id_menu']; ?>" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                        
                        <!-- SweetAlert Trigger -->
                        <a href="delete.php?id=<?php echo $row['id_menu']; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="konfirmasiHapusProduk(event, this.href)">
                           <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } } else { echo "<tr><td colspan='6' class='text-center py-4'>Belum ada data.</td></tr>"; } $conn->close(); ?>
        </tbody>
    </table>
</div>

<script>
function konfirmasiHapusProduk(event, urlLink) {
    event.preventDefault(); 
    Swal.fire({
        title: 'Hapus Produk?',
        text: "Produk dan gambar akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = urlLink;
        }
    })
}
</script>