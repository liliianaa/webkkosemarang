<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>KKO PAUD Kota Semarang</title>
    <link rel="icon" href="assets/img/logo.jpg"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Background lembut */
        #hero {
            position: relative;
            height: 100vh;
            /* full tinggi layar */
            margin: 0;
            padding: 0;
            /* hapus padding */
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

        .btn-join {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-program {
            background-color: white;
            border: 1px solid #ccc;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            margin-left: 10px;
        }

        .navbar .nav-link.active {
            color: #f44336 !important;
            font-weight: bold;
        }

        .text-shadow {
            text-shadow: 3px 3px 12px rgba(0, 0, 0, 0.9);
        }

        #hero {
            height: 100vh;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger d-flex align-items-center" href="#">
                <img src="assets/img/logo.jpg" alt="Logo" width="35" height="35" class="me-2 rounded-circle">
                KKO PAUD Kota Semarang
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="anggota.php">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link" href="kegiatan.php">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="legalitas.php">Legalitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO DENGAN SLIDESHOW BACKGROUND -->
    <section id="hero" class="text-center position-relative overflow-hidden">

        <!-- Carousel Background -->
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/gambarkontak.jpg" class="d-block w-100" style="height:100vh; object-fit:cover;"
                        alt="slide1">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/g2.jpg" class="d-block w-100" style="height:100vh; object-fit:cover;"
                        alt="slide2">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/g3.jpg" class="d-block w-100" style="height:100vh; object-fit:cover;"
                        alt="slide3">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/g4.jpg" class="d-block w-100" style="height:100vh; object-fit:cover;"
                        alt="slide4">
                </div>
            </div>

            <!-- Indicator bulatan -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
            </div>
        </div>

        <!-- Overlay konten -->
        <div class="container position-absolute top-50 start-50 translate-middle text-white text-center animate__animated animate__fadeInUp"
            style="z-index:2;">
            <span class="tagline bg-danger-subtle text-danger px-3 py-1 rounded-pill">Komunitas PAUD</span>
            <h1 class="hero-title display-4 fw-bold text-shadow mb-1"
                style="color:#fff; text-shadow: 3px 3px 12px rgba(0,0,0,0.9);">
                KKO PAUD
            </h1>
            <h1 class="hero-subtitle display-4 fw-bold text-shadow mb-3"
                style="text-shadow: 3px 3px 12px rgba(0,0,0,0.9);">
                Kota Semarang
            </h1>
            <p class="hero-desc mt-3 p-3 rounded-3"
                style="color:#fff; text-shadow: 2px 2px 8px rgba(66, 66, 66, 0.3); max-width:700px; margin:auto;">
                Wadah kolaborasi profesional operator PAUD yang berfokus pada peningkatan mutu pendidikan anak usia dini
                melalui pelatihan, digitalisasi, dan kegiatan sosial.
            </p>
            <div class="mt-4">
                <a href="anggota.php" class="btn btn-danger btn-lg me-2 shadow">Bergabung Sekarang</a>
                <a href="kegiatan.php" class="btn btn-outline-light btn-lg shadow">Lihat Kegiatan</a>
            </div>
        </div>

        <!-- Overlay gradien -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.4)); z-index:1;"></div>
    </section>

    <!-- Tambahkan animate.css untuk animasi -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<!-- VISI MISI START -->
<section id="about" class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">Apa itu KKO PAUD?</h2>
        <p class="text-muted mb-5">
            Komunitas profesional yang berkomitmen untuk memajukan pendidikan anak usia dini di Kota Semarang
        </p>

        <div class="row g-4">
            <!-- Visi -->
            <div class="col-md-6">
                <div class="p-4 h-100 shadow-sm rounded-4 border-start border-4 border-danger text-start">
                    <h5 class="fw-bold mb-3 text-center">
                        <i class="bi bi-eye-fill text-danger me-2"></i>Visi Kami
                    </h5>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Mewujudkan Kelompok Kerja Operator PAUD yang Handal, Solid</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Berkualitas dalam Pengelolaan Administrasi Sekolah yang Berbasis IPTEK</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-md-6">
                <div class="p-4 h-100 shadow-sm rounded-4 border-start border-4 border-danger text-start">
                    <h5 class="fw-bold mb-3 text-center">
                        <i class="bi bi-bullseye text-danger me-2"></i>Misi Kami
                    </h5>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Meningkatkan Profesionalisme SDM Operator Sekolah Dalam Bidang TIK</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Membangun Jaringan Komunikasi dan Informasi</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Menjamin Mitra Kerja Dengan Pemangku Kepentingan</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Penyampaian Informasi Secara Cepat, Tepat, Akurat, dan Dapat Dipercaya</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Meningkatkan Validitas data dan persaudaraan Dalam Bekerja, Baik, Jujur, Amanah, dan
                                Solidaritas</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Mewujudkan Satu Nusa Satu Bangsa Satu Bahasa dan Satu Data yang Berkualitas</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- VISI MISI END -->


<!-- KETUA KKO START -->
<section id="leadership" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-2">Kepemimpinan KKO PAUD</h2>
        <p class="text-muted mb-5">
            Tim kepemimpinan inti yang berpengalaman dan berdedikasi
        </p>

        <div class="row g-4">
            <?php
            // Ambil hanya Pembina, Ketua Umum, dan Ketua Harian
            $sql = "SELECT * FROM pengurus WHERE jabatan IN ('Pembina','Ketua Umum','Ketua Harian') ORDER BY FIELD(jabatan,'Pembina','Ketua Umum','Ketua Harian')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Jika ada foto, gunakan. Kalau tidak, pakai ikon default
                    $foto = (!empty($row['foto']) && file_exists("assets/foto_pengurus/" . $row['foto']))
                        ? "assets/foto_pengurus/" . $row['foto']
                        : "https://via.placeholder.com/150x150?text=Foto";

                    ?>
                    <div class="col-md-4">
                        <div class="p-4 h-100 shadow-sm rounded-4 bg-white">
                            <div class="mb-3">
                                <img src="<?= $foto ?>" alt="<?= $row['nama'] ?>" class="rounded-circle mb-3"
                                    style="width:100px;height:100px;object-fit:cover;">
                            </div>
                            <h5 class="fw-bold mb-1"><?= $row['nama'] ?></h5>
                            <span class="badge bg-danger-subtle text-danger mb-3"><?= $row['jabatan'] ?></span>
                            <?php if (!empty($row['pengalaman'])): ?>
                                <p class="mb-1"><strong>Pengalaman:</strong> <?= $row['pengalaman'] ?></p>
                            <?php endif; ?>
                            <?php if (!empty($row['keahlian'])): ?>
                                <p class="mb-3"><strong>Keahlian:</strong> <?= $row['keahlian'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-muted'>Data kepemimpinan belum tersedia.</p>";
            }
            ?>
        </div>
    </div>
</section>
<!-- KETUA KKO END -->


<!-- SECTION KEGIATAN TERBARU -->
<section id="activities" class="py-5">
    <style>
        #activities .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Kegiatan Terbaru</h2>
            <p class="text-muted">Sekilas kegiatan terkini yang sedang berlangsung di KKO PAUD</p>
        </div>

        <div class="row g-4">
            <?php
            // Query: ambil 3 kegiatan terbaru
            $sql = "SELECT * FROM kegiatan ORDER BY tanggal ASC LIMIT 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $fotoList = !empty($row['foto']) ? explode(",", $row['foto']) : [];
                    $fotoUtama = (!empty($fotoList[0]) && file_exists("assets/foto_kegiatan/" . $fotoList[0]))
                        ? "assets/foto_kegiatan/" . $fotoList[0]
                        : "assets/img/contoh.jpeg";

                    $tgl = date("d M Y", strtotime($row['tanggal']));
                    $jam = date("H:i", strtotime($row['jam']));
                    ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
                            <div class="position-relative">
                                <img src="<?= $fotoUtama ?>" class="card-img-top" alt="<?= $row['nama_kegiatan'] ?>">
                                <span
                                    class="badge <?= (strtotime($row['tanggal']) >= time()) ? 'bg-primary' : 'bg-success' ?> position-absolute top-0 end-0 m-3">
                                    <?= (strtotime($row['tanggal']) >= time()) ? 'Mendatang' : 'Selesai' ?>
                                </span>
                            </div>
                            <div class="card-body">
                                <h5 class="fw-bold"><?= $row['nama_kegiatan'] ?></h5>
                                <p class="mb-1 text-muted"><i class="bi bi-calendar-event me-1 text-danger"></i> <?= $tgl ?></p>
                                <p class="mb-1 text-muted"><i class="bi bi-clock text-danger"></i> <?= $jam ?> WIB</p>
                                <p class="mb-1 text-muted"><i class="bi bi-geo-alt me-1 text-danger"></i> <?= $row['tempat'] ?>
                                </p>
                                <p class="mb-3 text-muted"><?= substr($row['deskripsi'], 0, 100) ?>...</p>
                                <a href="detail_kegiatan.php?id=<?= $row['id'] ?>" class="text-danger fw-semibold">Lihat Detail
                                    <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center text-muted'>Belum ada kegiatan.</p>";
            }
            ?>
        </div>

        <!-- Tombol ke semua kegiatan -->
        <div class="text-center mt-4">
            <a href="kegiatan.php" class="btn btn-outline-danger">Lihat Semua Kegiatan</a>
        </div>
    </div>
</section>

<!-- MARS KKO PAUD -->
<section id="mars-kko" class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-3 text-primary">🎵 Mars KKO PAUD</h2>
    <p class="text-secondary mb-4">
      Dengarkan lagu kebanggaan kami dan ikuti liriknya.
    </p>

    <!-- Audio Player -->
    <div class="d-flex justify-content-center mb-4">
      <audio controls class="shadow rounded w-100" style="max-width: 480px;">
        <source src="assets/mars_kko/mars_kkopaudkotasemarang.mp3" type="audio/mp3">
        Browser Anda tidak mendukung pemutar audio.
      </audio>
    </div>

    <!<!-- Lirik Lagu -->
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 720px;">
    <div class="card-body text-start">
        <h5 class="fw-bold text-primary mb-3">📜 Lirik Mars KKO PAUD</h5>
        
        <p class="text-muted mb-2">
        KKO PAUD Kota Semarang <br>
        Sebagai mitra dalam berkarya <br>
        Berkomitmen tingkatkan profesionalisme <br>
        Sumber daya manusia
        </p>

        <p class="text-muted mb-2">
        Membangun insan yang bekerja sama <br>
        Hadapi perkembangan dunia <br>
        Berbasis informasi cepat tepat akurat <br>
        Serta dapat dipercaya
        </p>

        <p class="text-muted mb-2">
        Bekerja berkualitas jujur solid dan amanah <br>
        Mengelola masa depan bangsa <br>
        Untuk mewujudkan tujuan kita bersama
        </p>

        <p class="fw-semibold text-success">
        Berprestasi untuk semua! <br>
        KKO Maju, Indonesia Jaya!
        </p>
    </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>