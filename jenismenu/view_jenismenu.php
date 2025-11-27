<?php
// Include koneksi database
include 'db.php';

$sql = "SELECT * FROM tbjenismenu ORDER BY id_jenis DESC";
$result = $conn->query($sql);
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th width="10%">No</th>
                <th>Nama Jenis Menu / Kategori</th>
                <th width="20%">Aksi</th>
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
                    <td><?php echo htmlspecialchars($row['nama_jenis']); ?></td>
                    <td class="text-center">
                        <!-- Tombol Edit -->
                        <a href="edit.php?id=<?php echo $row['id_jenis']; ?>" class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Tombol Hapus -->
                       <a href="delete.php?id=<?php echo $row['id_jenis']; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="konfirmasiHapus(event, this.href)">
                           <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='3' class='text-center text-muted py-4'>Belum ada data kategori.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script>
function konfirmasiHapus(event, urlLink) {
    event.preventDefault(); // Mencegah link langsung jalan
    
    Swal.fire({
        title: 'Yakin hapus data?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = urlLink; // Lanjut ke link delete.php
        }
    })
}
</script>