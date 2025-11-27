<?php
session_start();

// Koneksi Database (Langsung disini agar praktis)
$conn = new mysqli("localhost", "root", "", "dbmystore");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika sudah login, lempar ke admin.php
if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){
    header("location:admin.php");
    exit();
}

// Logic Login Database + Hashing
if(isset($_POST['login'])){
    // Ambil input dan amankan dari SQL Injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Ubah password input menjadi MD5 agar cocok dengan di database
    $password_hash = md5($password);

    // Cek ke database
    $query = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password_hash'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        // Jika data ditemukan
        $data = $result->fetch_assoc();
        
        $_SESSION['username'] = $username;
        $_SESSION['nama_lengkap'] = $data['nama_lengkap']; // Simpan nama asli
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
            background: linear-gradient(to right, #1E90FF, #779936);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .btn-login {
            background-color: #1E90FF;
            color: white;
            font-weight: bold;
        }
        .btn-login:hover { background-color: #104e8b; color: white; }
    </style>
</head>
<body>

    <div class="card login-card p-4">
        <div class="card-body">
            <h3 class="text-center mb-4 fw-bold" style="color:#779936">ADMIN LOGIN</h3>
            
            <?php if(isset($error)) : ?>
                <div class="alert alert-danger py-2 text-center" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="" required>
                </div>
                <button type="submit" name="login" class="btn btn-login w-100 py-2 mt-2">MASUK</button>
            </form>
            <div class="text-center mt-3">
                <a href="index.php" class="text-decoration-none text-muted small">← Kembali ke Website Utama</a>
            </div>
        </div>
    </div>

</body>
</html>