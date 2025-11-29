<?php
include 'db.php';
$sql = "SELECT tbnamamenu.*, tbjenismenu.nama_jenis 
        FROM tbnamamenu 
        LEFT JOIN tbjenismenu ON tbnamamenu.id_jenis = tbjenismenu.id_jenis 
        ORDER BY id_menu DESC";
$result = $conn->query($sql);
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="overflow-x-auto rounded-lg shadow-lg">
    <table class="w-full border-collapse border border-gray-700">
        <thead>
            <tr class="bg-[#1a1d21] text-[#66FCF1]">
                <th class="p-4 border border-gray-700 font-bold text-center w-16">No</th>
                <th class="p-4 border border-gray-700 font-bold text-center w-24">Gambar</th>
                <th class="p-4 border border-gray-700 font-bold text-left">Nama Produk</th>
                <th class="p-4 border border-gray-700 font-bold text-left w-40">Kategori</th>
                <th class="p-4 border border-gray-700 font-bold text-left w-40">Harga</th>
                <th class="p-4 border border-gray-700 font-bold text-center w-32">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-[#0B0C10] text-gray-300">
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while($row = $result->fetch_assoc()) {
            ?>
                <tr class="hover:bg-[#1F2833] transition-colors duration-200">
                    <td class="p-3 border border-gray-700 text-center align-middle"><?php echo $no++; ?></td>
                    <td class="p-3 border border-gray-700 text-center align-middle">
                        <?php if (!empty($row['image'])): ?>
                            <img src="../img/portfolio/<?php echo $row['image']; ?>" class="w-16 h-16 object-cover rounded border border-gray-600 mx-auto shadow-sm">
                        <?php else: ?>
                            <span class="text-xs text-gray-500 italic">No Img</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-3 border border-gray-700 align-middle">
                        <div class="font-bold text-white mb-1"><?php echo htmlspecialchars($row['nama_menu']); ?></div>
                        <div class="text-xs text-gray-500 leading-snug line-clamp-2"><?php echo $row['deskripsi']; ?></div>
                    </td>
                    <td class="p-3 border border-gray-700 align-middle">
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded bg-gray-800 text-[#66FCF1] border border-gray-600">
                            <?php echo $row['nama_jenis']; ?>
                        </span>
                    </td>
                    <td class="p-3 border border-gray-700 align-middle font-mono text-yellow-400">
                        Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                    </td>
                    <td class="p-3 border border-gray-700 text-center align-middle">
                        <div class="flex items-center justify-center gap-2">
                            <a href="edit.php?id=<?php echo $row['id_menu']; ?>" 
                               class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1.5 rounded transition-all shadow shadow-yellow-500/20">
                               <i class="fas fa-edit"></i>
                            </a>
                            
                            <a href="delete.php?id=<?php echo $row['id_menu']; ?>" 
                               class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded transition-all shadow shadow-red-500/20" 
                               onclick="konfirmasiHapusProduk(event, this.href)">
                               <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php } } else { echo "<tr><td colspan='6' class='p-6 text-center text-gray-500 italic border border-gray-700'>Belum ada data produk.</td></tr>"; } $conn->close(); ?>
        </tbody>
    </table>
</div>

<script>
function konfirmasiHapusProduk(event, urlLink) {
    event.preventDefault(); 
    Swal.fire({
        title: 'Hapus Produk?',
        text: "Data produk ini akan dihapus permanen.",
        icon: 'warning',
        background: '#1F2833',
        color: '#fff',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#374151',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = urlLink;
        }
    })
}
</script>