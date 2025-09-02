<?php
include "koneksi.php";

// Daftar dokumen legalitas
$legalDocuments = [
    [
        "title" => "SK Kemenkumham",
        "description" => "Surat Keputusan Pengesahan Badan Hukum KKO Paud",
        "file" => "assets/dokumen/Kemenkumham.pdf",
        "badge" => "Disahkan"
    ],
    [
        "title" => "SK KKO",
        "description" => "Surat Keputusan KKO Paud Masa 2025-2029",
        "file" => "assets/dokumen/SK_KKO.pdf",
        "badge" => "Otentik"
    ],
    [
        "title" => "SK Keberadaan Kesbangpol",
        "description" => "Surat Keputusan Keberadaan dari Kesatuan Bangsa dan Politik",
        "file" => "assets/dokumen/Kesbangpol.pdf",
        "badge" => "Resmi"
    ]
];
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

    /* HERO */
    #hero {
      background: linear-gradient(180deg, #fde8e9 0%, #fff 100%);
      padding-top: 100px;
      padding-bottom: 100px;
      text-align: center;
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

    .navbar .nav-link.active {
      color: #f44336 !important;
      font-weight: bold;
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
          <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
          <li class="nav-item"><a class="nav-link active" href="legalitas.php">Legalitas</a></li>
          <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section id="hero">
    <div class="container">
      <span class="tagline">Dokumen Resmi</span>
      <h1 class="hero-title">Legalitas</h1>
      <h1 class="hero-subtitle">KKO PAUD Kota Semarang</h1>
      <p class="hero-desc">
        Berikut adalah dokumen resmi legalitas organisasi KKO PAUD Kota Semarang yang telah disahkan.
      </p>
    </div>
  </section>

  <!-- LIST LEGALITAS -->
  <div class="container my-5">
    <div class="row justify-content-center g-4">
      <?php foreach ($legalDocuments as $doc): ?>
        <div class="col-md-4">
          <div class="card shadow-sm rounded-4 h-100">
            <div class="position-relative">
              <div class="bg-light d-flex align-items-center justify-content-center"
                   style="height:200px; border-radius: 12px 12px 0 0;">
                <i class="bi bi-file-earmark-text text-danger" style="font-size:60px;"></i>
              </div>
              <span class="badge bg-danger position-absolute top-0 start-0 m-2"><?= $doc['badge']; ?></span>
            </div>
            <div class="card-body text-center">
              <h5 class="fw-bold"><?= $doc['title']; ?></h5>
              <p class="text-muted"><?= $doc['description']; ?></p>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-center">
              <a href="<?= $doc['file']; ?>" target="_blank" class="btn btn-danger w-100">
                <i class="bi bi-eye"></i> Lihat Dokumen
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- FOOTER -->
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
            <li><a href="anggota.php" class="text-white-50 text-decoration-none">Anggota</a></li>
            <li><a href="kegiatan.php" class="text-white-50 text-decoration-none">Kegiatan</a></li>
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
          <p class="mb-1 text-white-50">Email: kkopaudkotasemarang@gmail.com</p>
          <p class="mb-1 text-white-50">Telepon: 0816661087/08976622262</p>
          <p class="mb-0 text-white-50">Alamat: Jl. Graha Mukti Utama No. 344b Tlogomulyo, Pedurungan, Kota Semarang</p>
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
