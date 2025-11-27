<?php
// Middleware: Cek apakah user sudah login
session_start();

if($_SESSION['status'] != "login"){
    // Jika belum login, paksa pindah ke halaman login
    // Menggunakan ../ karena file ini akan di-include dari sub-folder
    header("location:./login.php");
    exit();
}
?>