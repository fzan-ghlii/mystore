<?php
// Middleware: Cek apakah user sudah login
session_start();

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    // PERBAIKAN: Tambahkan '../' agar mundur ke folder root
    header("location:../login.php");
    exit();
}
?>