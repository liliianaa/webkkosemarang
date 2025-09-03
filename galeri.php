<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>KKO PAUD Kota Semarang</title>
    <link rel="icon" href="assets/img/logo.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Background lembut */
        #hero {
            background: linear-gradient(180deg, #fde8e9 0%, #fff 100%);
            position: relative;
            padding-top: 100px;
            padding-bottom: 220px;
        }

        .tagline {
            display: inline-block;
            background: #fde0df;
            color: #c94c4c;
            font-size: 14px;
            padding: 5px 15px;
            border-radius: 20px;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .hero-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 0.2rem;
        }

        .hero-subtitle {
            font-size: 2.8rem;
            font-weight: 800;
            color: #f44336;
        }

        .hero-desc {
            max-width: 600px;
            margin: 20px auto;
            font-size: 1.1rem;
            color: #444;
        }

        /* Tombol Bergabung */
        .btn-join {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-join:hover {
            background-color: white;
            color: #f44336;
            border: 2px solid #f44336;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(244, 67, 54, 0.4);
            transform: translateY(-3px) scale(1.05);
            /* bergerak naik + membesar */
        }


        /* Tombol Cek Status */
        .btn-program-danger {
            background-color: white;
            border: 2px solid #f44336;
            color: #f44336;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            margin-left: 10px;
            transition: all 0.3s ease;
        }

        .btn-program-danger:hover {
            background-color: #f44336;
            color: white;
            box-shadow: 0 6px 15px rgba(244, 67, 54, 0.4);
            transform: translateY(-3px) scale(1.05);
            /* bergerak naik + membesar */
        }

        .navbar .nav-link.active {
            color: #f44336 !important;
            font-weight: bold;
        }

        .icon-circle {
            background: #dc3545;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .badge-center {
            display: inline-block;
            margin: 0 auto;
            padding: 6px 14px;
            font-size: 12px;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 10px;
            background-color: #f8d7da;
            /* warna bg-danger-subtle */
            color: #dc3545;
            /* warna text-danger */
            white-space: nowrap;
        }

        .pengurus-card {
            transition: all 0.3s ease;
            background-color: #fff;
        }

        .pengurus-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .rounded-circle {
            border: 3px solid #f8f9fa;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger d-flex align-items-center" href="#">
                <img src="assets/img/logo.jpg" alt="Logo" width="35" height="35" class="me-2 rounded-circle">
                KKO PAUD Kota Semarang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="anggota.php">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link" href="kegiatan.php">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="galeri.php">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="legalitas.php">Legalitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="hero" class="py-5" style="background: linear-gradient(180deg, #fde8e9 0%, #fff 100%);">
        <div class="container">
            <div class="row align-items-center">

                <!-- Kiri: Teks -->
                <div class="col-md-6 text-center text-md-start">
                    <span class="tagline d-inline-block mb-2">Dokumentasi Kegiatan</span>
                    <h1 class="hero-title">Galeri Kegiatan</h1>
                    <h1 class="hero-subtitle">KKO PAUD Kota Semarang</h1>
                    <p class="hero-desc mt-3">
                        Dokumentasi berbagai kegiatan yang telah diselenggarakan oleh KKO PAUD Kota Semarang
                    </p>
                    <a href="#galeri-section" class="btn btn-join mt-3">Lihat Galeri</a>
                </div>

                <!-- Kanan: Gambar -->
                <div class="col-md-6 text-center mt-4 mt-md-0">
                    <img src="assets/img/gambar5.png" alt="Ilustrasi Guru dan Anak-anak" class="img-fluid"
                        style="max-width: 500px;">
                </div>

            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- GALERI -->
<section id="galeri-section" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-3">Galeri Kegiatan</h2>
        <p class="text-center text-muted mb-4">Pilih kegiatan untuk melihat dokumentasinya</p>

        <!-- Dropdown Filter -->
        <form method="GET" class="text-center mb-5">
            <select name="judul" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
                <option value="">-- Semua Kegiatan --</option>
                <?php
                $sqlJudul = "SELECT DISTINCT judul FROM galeri ORDER BY judul";
                $resultJudul = $conn->query($sqlJudul);
                while ($row = $resultJudul->fetch_assoc()) {
                    $selected = (isset($_GET['judul']) && $_GET['judul'] == $row['judul']) ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($row['judul']) . '" ' . $selected . '>' . htmlspecialchars($row['judul']) . '</option>';
                }
                ?>
            </select>
        </form>

        <div class="row g-4">
            <?php
            // Ambil parameter judul
            $filterJudul = isset($_GET['judul']) ? $_GET['judul'] : null;

            // Query berdasarkan filter judul
            $sqlGaleri = "SELECT * FROM galeri";
            if ($filterJudul) {
                $judulSafe = $conn->real_escape_string($filterJudul);
                $sqlGaleri .= " WHERE judul = '$judulSafe'";
            }

            $resultGaleri = $conn->query($sqlGaleri);

            if ($resultGaleri->num_rows > 0) {
                while ($row = $resultGaleri->fetch_assoc()) {
                    $judul = $row['judul'];
                    $fotoList = explode(',', $row['foto']);

                    foreach ($fotoList as $foto) {
                        $foto = trim($foto);
                        $path = "assets/galeri/" . $foto;
                        if (!empty($foto) && file_exists($path)) {
                            ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="card h-100 shadow-sm border-0 rounded-4">
                                    <img src="<?= $path ?>" class="card-img-top rounded-top-4" style="height: 200px; object-fit: cover;"
                                        alt="Galeri <?= htmlspecialchars($judul) ?>">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0 fw-semibold"><?= htmlspecialchars($judul) ?></h6>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
            } else {
                echo '<p class="text-center text-muted">Belum ada foto untuk kegiatan ini.</p>';
            }
            ?>
        </div>
    </div>
</section>




<!-- FOOTER -->
<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row justify-content-center text-center text-md-start">

            <!-- Logo & Deskripsi -->
            <div class="col-md-3 mb-4 mx-md-3">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                    <div class="bg-danger text-white rounded-circle p-2 me-2 d-flex justify-content-center align-items-center"
                        style="width: 40px; height: 40px;">
                        <i class="bi bi-book"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">KKO PAUD</h5>
                        <small class="text-white-50">Kota Semarang</small>
                    </div>
                </div>
                <p class="text-white-50 small mb-0">
                    Kolaborasi profesional untuk kemajuan PAUD di Kota Semarang
                </p>
            </div>

            <!-- Halaman -->
            <div class="col-md-3 mb-4 mx-md-3">
                <h6 class="fw-bold mb-3">Halaman</h6>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-white-50 text-decoration-none">Beranda</a></li>
                    <li><a href="anggota.php" class="text-white-50 text-decoration-none">Anggota</a></li>
                    <li><a href="kegiatan.php" class="text-white-50 text-decoration-none">Kegiatan</a></li>
                    <li><a href="galeri.php" class="text-white-50 text-decoration-none">Galeri</a></li>
                    <li><a href="kontak.php" class="text-white-50 text-decoration-none">Kontak</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-3 mb-4 mx-md-3">
                <h6 class="fw-bold mb-3">Kontak</h6>
                <p class="mb-1 text-white-50">Email: kkopaudkotasemarang@gmail.com</p>
                <p class="mb-1 text-white-50">Telepon: 0816661087 / 08976622262</p>
                <p class="mb-0 text-white-50">Alamat: Jl. Graha Mukti Utama No. 344b<br>Tlogomulyo, Pedurungan, Kota
                    Semarang
                </p>
            </div>

        </div>

        <hr class="border-secondary">

        <div class="text-center small text-white-50">
            © 2025 KKO PAUD Kota Semarang. Semua hak dilindungi.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>