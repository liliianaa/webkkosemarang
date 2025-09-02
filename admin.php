<?php  
session_start();
include "koneksi.php";  

// cek jika belum login
if (!isset($_SESSION['username'])) { 
    header("location:login.php"); 
    exit;
} 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel | KKO PAUD</title>
    <link rel="icon" href="assets/img/logo.jpg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-danger" href="admin.php">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= (!isset($_GET['page']) || $_GET['page']=="dashboard") ? 'active fw-semibold text-danger' : '' ?>" href="admin.php?page=dashboard">
                        <i class="bi bi-bar-chart"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['page']) && $_GET['page']=="anggota_data") ? 'active fw-semibold text-danger' : '' ?>" href="admin.php?page=anggota_data">
                        <i class="bi bi-people"></i> Pengurus
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['page']) && $_GET['page']=="daftar_data") ? 'active fw-semibold text-danger' : '' ?>" href="admin.php?page=daftar_data">
                        <i class="bi bi-person-fill"></i> Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['page']) && $_GET['page']=="kegiatan_data") ? 'active fw-semibold text-danger' : '' ?>" href="admin.php?page=kegiatan_data">
                        <i class="bi bi-calendar-event"></i> Kegiatan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['page']) && $_GET['page']=="galeri_data") ? 'active fw-semibold text-danger' : '' ?>" href="admin.php?page=galeri_data">
                        <i class="bi bi-images"></i> Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['page']) && $_GET['page']=="user") ? 'active fw-semibold text-danger' : '' ?>" href="admin.php?page=user">
                        <i class="bi bi-person-circle"></i> User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger ms-2" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Content -->
<section id="content" class="py-4 mb-5">
    <div class="container">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $file = $page . ".php";
            if (file_exists($file)) {
                include($file);
            } else {
                echo "<div class='alert alert-danger'>Halaman tidak ditemukan!</div>";
            }
        } else {
            include("dashboard.php");
        }
        ?>
    </div>
</section>
<!-- End Content -->

<!-- Footer -->
<footer class="text-center p-3 border-top small bg-dark text-white mt-auto">
    <div>
        <a href="https://instagram.com/kkopaudkotasemarang"><i class="bi bi-instagram h5 p-2 text-white"></i></a>
        <a href="https://www.youtube.com/@kkopaudkotasemarang242"><i class="bi bi-youtube h5 p-2 text-white"></i></a>
        <a href="https://wa.me/+62816661087"><i class="bi bi-whatsapp h5 p-2 text-white"></i></a>
    </div>
    <div>KKO PAUD Semarang &copy; 2025</div>
</footer>
<!-- End Footer -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
