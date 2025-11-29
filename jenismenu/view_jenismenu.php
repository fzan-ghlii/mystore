<?php
// Include koneksi database
include 'db.php';

$sql = "SELECT * FROM tbjenismenu ORDER BY id_jenis DESC";
$result = $conn->query($sql);
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Menggunakan Tailwind Utility Classes untuk Tabel -->
<div class="overflow-x-auto rounded-lg shadow-lg">
    <table class="w-full border-collapse border border-gray-700">
        <thead>
            <tr class="bg-[#1a1d21] text-[#66FCF1]">
                <th class="p-4 border border-gray-700 font-bold text-center w-16">No</th>
                <th class="p-4 border border-gray-700 font-bold text-left">Nama Jenis Menu / Kategori</th>
                <th class="p-4 border border-gray-700 font-bold text-center w-40">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-[#0B0C10] text-gray-300">
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while($row = $result->fetch_assoc()) {
            ?>
                <tr class="hover:bg-[#1F2833] transition-colors duration-200">
                    <td class="p-3 border border-gray-700 text-center"><?php echo $no++; ?></td>
                    <td class="p-3 border border-gray-700 font-medium"><?php echo htmlspecialchars($row['nama_jenis']); ?></td>
                    <td class="p-3 border border-gray-700 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <!-- Tombol Edit -->
                            <a href="edit.php?id=<?php echo $row['id_jenis']; ?>" 
                               class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1.5 rounded transition-all shadow shadow-yellow-500/20" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <!-- Tombol Hapus -->
                           <a href="delete.php?id=<?php echo $row['id_jenis']; ?>" 
                               class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded transition-all shadow shadow-red-500/20" 
                               onclick="konfirmasiHapus(event, this.href)" title="Hapus">
                               <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='3' class='p-6 text-center text-gray-500 italic border border-gray-700'>Belum ada data kategori.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script>
function konfirmasiHapus(event, urlLink) {
    event.preventDefault(); 
    
    Swal.fire({
        title: 'Hapus Data?',
        text: "Data kategori ini akan dihapus permanen.",
        icon: 'warning',
        background: '#1F2833',
        color: '#fff',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#374151',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = urlLink;
        }
    })
}
</script>