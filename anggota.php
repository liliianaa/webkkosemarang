<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>KKO PAUD Kota Semarang</title>
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
      <a class="navbar-brand fw-bold text-danger" href="#">KKO PAUD Semarang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link active" href="anggota.php">Anggota</a></li>
          <li class="nav-item"><a class="nav-link" href="kegiatan.php">Kegiatan</a></li>
          <li class="nav-item"><a class="nav-link" href="legalitas.php">Legalitas</a></li>
          <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section id="hero" class="text-center">
    <div class="circle"></div>
    <div class="container position-relative" style="z-index:1;">
      <span class="tagline">Komunitas PAUD</span>
      <h1 class="hero-title">Anggota</h1>
      <h1 class="hero-subtitle">KKO PAUD Kota Semarang</h1>
      <p class="hero-desc">
        Profesional berpengalaman yang berkomitmen memajukan pendidikan anak usia dini di Kota Semarang
      </p>
      <div class="mt-4">
        <a href="#" class="btn btn-join"><i class="bi bi-person-plus"></i> Bergabung dengan Kami</a>
        <a href="#" class="btn btn-program"><i class="bi bi-book"></i> Lihat Program Kami</a>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- PENGURUS -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-2">Pengurus KKO PAUD</h2>
    <p class="text-center text-muted mb-5">
      Tim kepemimpinan yang berpengalaman dan berdedikasi
    </p>
    <div class="row g-4">

      <?php
      include "koneksi.php";
      $sql = "SELECT * FROM pengurus ORDER BY id ASC";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {
        $foto = $row['foto'];
        $fotoPath = "assets/foto_pengurus/" . $foto;
        ?>
        <div class="col-md-4">
          <div class="card pengurus-card h-100 shadow-sm border-0 rounded-4 text-center p-4 transition-card">
            <!-- Foto Pengurus -->
            <?php if (!empty($foto) && file_exists($fotoPath)): ?>
              <div class="text-center mb-3">
                <img src="<?= $fotoPath ?>" alt="<?= $row['nama'] ?>" class="rounded-circle shadow mb-2 mx-auto d-block"
                  style="width: 100px; height: 100px; object-fit: cover;">
              </div>
            <?php else: ?>
              <div class="icon-circle text-center mx-auto mb-3">
                <i class="bi bi-person" style="font-size: 2rem; color: white;"></i>
              </div>
            <?php endif; ?>


            <h5 class="fw-bold"><?= htmlspecialchars($row['nama']) ?></h5>
            <span class="badge badge-center bg-danger-subtle text-danger mb-2 px-3 py-1 rounded-pill">
              <?= htmlspecialchars($row['jabatan']) ?>
            </span>

            <p class="mb-0 mt-3">
              <i class="bi bi-mortarboard-fill text-danger me-1"></i>
              <strong>Pendidikan:</strong> <?= htmlspecialchars($row['pendidikan_terakhir']) ?>
            </p>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</section>



<footer class="bg-dark text-white pt-5 pb-3">
  <div class="container">
    <div class="row">
      <!-- Logo & Deskripsi -->
      <div class="col-md-3 mb-4">
        <div class="d-flex align-items-center mb-2">
          <div class="bg-danger text-white rounded-circle p-2 me-2 d-flex justify-content-center align-items-center"
            style="width: 40px; height: 40px;">
            <i class="bi bi-book"></i>
          </div>
          <div>
            <h5 class="mb-0 fw-bold">KKO PAUD</h5>
            <small class="text-white-50">Kota Semarang</small>
          </div>
        </div>
        <p class="text-white-50 small">
          Kolaborasi profesional untuk kemajuan PAUD di Kota Semarang
        </p>
      </div>

      <!-- Halaman -->
      <div class="col-md-3 mb-4">
        <h6 class="fw-bold mb-3">Halaman</h6>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text-white-50 text-decoration-none">Beranda</a></li>
          <li><a href="kegiatan.php" class="text-white-50 text-decoration-none">Kegiatan</a></li>
          <li><a href="legalitas.php" class="text-white-50 text-decoration-none">Legalitas</a></li>
          <li><a href="kontak.php" class="text-white-50 text-decoration-none">Kontak</a></li>
        </ul>
      </div>

      <!-- Layanan -->
      <div class="col-md-3 mb-4">
        <h6 class="fw-bold mb-3">Layanan</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white-50 text-decoration-none">Konsultasi PAUD</a></li>
          <li><a href="#" class="text-white-50 text-decoration-none">Sertifikasi</a></li>
          <li><a href="#" class="text-white-50 text-decoration-none">Konten Edukatif</a></li>
          <li><a href="#" class="text-white-50 text-decoration-none">Platform Digital</a></li>
        </ul>
      </div>

      <!-- Kontak -->
      <div class="col-md-3 mb-4">
        <h6 class="fw-bold mb-3">Kontak</h6>
        <p class="mb-1 text-white-50">Email: info@kkopaud-semarang.id</p>
        <p class="mb-1 text-white-50">Telepon: (024) 123-4567</p>
        <p class="mb-0 text-white-50">Alamat: Semarang, Jawa Tengah</p>
      </div>
    </div>

    <hr class="border-secondary">

    <!-- Copyright -->
    <div class="text-center small text-white-50">
      © 2025 KKO PAUD Kota Semarang. Semua hak dilindungi.
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>