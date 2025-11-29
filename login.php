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
    <!-- ====== FAVICONS ====== -->
<link rel="icon" type="image/png" sizes="16x16" href="img/logo/favicon-16x16.png" />
<link rel="icon" type="image/png" sizes="32x32" href="img/logo/favicon-32x32.png" />
<link rel="icon" type="image/x-icon" href="img/logo/favicon.ico" />

<!-- ====== APPLE TOUCH ICON ====== -->
<link rel="apple-touch-icon" href="img/logo/apple-touch-icon.png" />

<!-- ====== ANDROID / CHROME ICONS ====== -->
<link rel="icon" type="image/png" sizes="192x192" href="img/logo/android-chrome-192x192.png" />
<link rel="icon" type="image/png" sizes="512x512" href="img/logo/android-chrome-512x512.png" />

<!-- ====== WEB MANIFEST ====== -->
<link rel="manifest" href="img/logo/site.webmanifest" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'], heading: ['Space Grotesk', 'sans-serif'] },
                    colors: { dark: '#0B0C10', card: '#1F2833', neon: '#66FCF1' }
                }
            }
        }
    </script>
    <style>
        .bg-pattern {
            background-color: #0B0C10;
            background-image: radial-gradient(#1F2833 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>
<body class="bg-pattern h-screen flex items-center justify-center text-gray-300 relative overflow-hidden">

    <!-- Efek Glow Background -->
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-neon/20 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-500/20 rounded-full blur-[100px]"></div>

    <div class="relative w-full max-w-md p-8">
        <!-- Card Login -->
        <div class="bg-card/80 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8 transform hover:scale-[1.01] transition-all duration-300">
            
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-dark border-2 border-neon mb-4 shadow-[0_0_15px_rgba(102,252,241,0.3)]">
                    <img src="img/logo.png" alt="Logo Chemika" class="w-16 h-16 rounded-full object-cover">
                </div>
                <h2 class="text-3xl font-heading font-bold text-white tracking-wide">CHEMIKA <span class="text-neon">ADMIN</span></h2>
                <p class="text-sm text-gray-400 mt-2">Masuk untuk mengelola data laboratorium</p>
            </div>

            <?php if(isset($error)) : ?>
                <div class="bg-red-500/10 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg mb-6 text-center text-sm flex items-center justify-center gap-2">
                    <i class="fa-solid fa-circle-exclamation"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Username</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3.5 text-gray-500"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="username" class="w-full bg-dark border border-gray-700 rounded-lg py-3 pl-10 pr-4 text-white focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all" placeholder="Masukkan username" required>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3.5 text-gray-500"><i class="fa-solid fa-lock"></i></span>
                        <!-- Input Field -->
                        <input type="password" name="password" id="passwordInput" class="w-full bg-dark border border-gray-700 rounded-lg py-3 pl-10 pr-12 text-white focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all" placeholder="Masukkan password" required>
                        
                        <!-- Tombol Mata (Toggle) -->
                        <button type="button" onclick="togglePassword()" class="absolute right-4 top-3.5 text-gray-500 hover:text-neon transition-colors focus:outline-none">
                            <i class="fa-solid fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" name="login" class="w-full bg-neon text-dark font-bold py-3.5 rounded-lg hover:bg-white hover:shadow-[0_0_20px_rgba(102,252,241,0.4)] transition-all duration-300 transform active:scale-95">
                    MASUK DASHBOARD
                </button>
            </form>

            <div class="mt-8 text-center border-t border-gray-700 pt-6">
                <a href="index.php" class="text-sm text-gray-400 hover:text-neon transition-colors flex items-center justify-center gap-2 group">
                    <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i> Kembali ke Website Utama
                </a>
            </div>
        </div>
    </div>

    <!-- Script Toggle Password -->
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("passwordInput");
            var toggleIcon = document.getElementById("toggleIcon");
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>
</html>