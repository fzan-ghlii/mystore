<?php
session_start();

// Koneksi Database
$conn = new mysqli("localhost", "root", "", "dbmystore");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika sudah login, lempar ke admin.php
if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){
    header("location:admin.php");
    exit();
}

// Logic Login
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_hash = md5($password);

    $query = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password_hash'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['status'] = "login";
        header("location:admin.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Chemika Nusantara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden; /* Hilangkan scrollbar */
            margin: 0;
            background-color: #000; /* Fallback color */
        }
        
        /* BACKGROUND IMAGE BLUR */
        .bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Taruh di belakang */
            filter: blur(8px) brightness(0.7); /* Efek Blur & Gelap dikit biar tulisan jelas */
            transform: scale(1.1); /* Zoom dikit biar pinggiran blur gak putih */
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            border: none;
            /* Efek kaca (Glassmorphism) */
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            z-index: 1; /* Pastikan di depan background */
        }
        
        .btn-login {
            background: linear-gradient(to right, #1E90FF, #779936);
            border: none;
            color: white;
            font-weight: bold;
            transition: transform 0.2s;
        }
        .btn-login:hover { 
            transform: scale(1.02);
            color: white;
            box-shadow: 0 5px 15px rgba(30, 144, 255, 0.3);
        }
    </style>
</head>
<body>

    <!-- GAMBAR BACKGROUND (Dari Prompt Generator) -->
    <!-- Saya menggunakan Content ID hasil generate tadi -->
    <img src="" class="bg-image" alt="Chemical Background">

    <div class="card login-card p-4">
        <div class="card-body">
            <div class="text-center mb-4">
                <h3 class="fw-bold" style="color:#1E90FF">CHEMIKA ADMIN</h3>
                <small class="text-muted">Silakan masuk untuk mengelola data</small>
            </div>
            
            <?php if(isset($error)) : ?>
                <div class="alert alert-danger py-2 text-center small" role="alert">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" name="login" class="btn btn-login w-100 py-3 mt-2">MASUK SEKARANG</button>
            </form>
            
            <div class="text-center mt-4">
                <a href="index.php" class="text-decoration-none text-muted small fw-bold">
                    &larr; Kembali ke Website Utama
                </a>
            </div>
        </div>
    </div>

</body>
</html>