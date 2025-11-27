<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Jenis Menu</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .container-fluid { margin-top: 20px; } 
        .card { border: none; shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 10px; }
        .card-header { background: linear-gradient(to right, #1E90FF, #779936); color: white; border-radius: 10px 10px 0 0 !important; font-weight: bold; }
        .btn-add { background-color: #779936; color: white; border: none; }
        .btn-add:hover { background-color: #5e870e; color: white; }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-list"></i> Manajemen Jenis Menu</span>
                <!-- Tombol ke halaman Create -->
                <a href="create.php" class="btn btn-add btn-sm rounded-pill px-3">
                    <i class="fas fa-plus"></i> Tambah Baru
                </a>
            </div>
            <div class="card-body">
                <!-- Memanggil file view_jenismenu.php -->
                <?php include 'view_jenismenu.php'; ?>
            </div>
        </div>
        
        <div class="text-center mt-3">
             <a href="../index.php" class="text-decoration-none text-muted"><i class="fas fa-arrow-left"></i> Kembali ke Website Utama</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>