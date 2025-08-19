<?php
include "koneksi.php";

// Daftar dokumen legalitas
$legalDocuments = [
    [
        "title" => "SK Kemenkumham",
        "description" => "Surat Keputusan dari Kementerian Hukum dan HAM",
        "file" => "assets/dokumen/Kesbangpol.pdf"
    ],
    [
        "title" => "Akte Notaris",
        "description" => "Akta pendirian organisasi yang disahkan notaris",
        "file" => "assets/dokumen/Kesbangpol.pdf"
    ],
    [
        "title" => "SK Keberadaan Kesbangpol",
        "description" => "Surat Keputusan Keberadaan dari Kesatuan Bangsa dan Politik",
        "file" => "assets/dokumen/Kesbangpol.pdf"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>KKO PAUD Kota Semarang - Legalitas</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- Tailwind for grid & utilities -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body { font-family: 'Poppins', sans-serif; }
    .navbar .nav-link.active { color: #f44336 !important; font-weight: bold; }
  </style>
</head>

<body class="bg-white">

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
        <li class="nav-item"><a class="nav-link" href="anggota.php">Anggota</a></li>
        <li class="nav-item"><a class="nav-link" href="kegiatan.php">Kegiatan</a></li>
        <li class="nav-item"><a class="nav-link active" href="legalitas.php">Legalitas</a></li>
        <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
      </ul>
    </div>
  </div>
</nav>


  <!-- SECTION LEGALITAS -->
  <section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <!-- Judul -->
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Legalitas Organisasi</h2>
        <p class="text-lg text-gray-600">Dokumen resmi yang menjadi dasar hukum KKO PAUD Kota Semarang</p>
      </div>

      <!-- Grid Card -->
      <div class="grid md:grid-cols-3 gap-8">
        <?php foreach ($legalDocuments as $doc): ?>
          <div class="text-center p-6 rounded-2xl border shadow-sm hover:shadow-lg transition">
            <!-- Icon -->
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l2 2h5a2 2 0 012 2v14a2 2 0 01-2 2z"/>
              </svg>
            </div>

            <!-- Judul & Deskripsi -->
            <h3 class="text-lg font-semibold mb-2"><?= $doc['title']; ?></h3>
            <p class="text-gray-600 mb-6"><?= $doc['description']; ?></p>

            <!-- Tombol Lihat Dokumen -->
            <a href="<?= $doc['file']; ?>" target="_blank"
               class="block w-full px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition">
              <i class="bi bi-file-earmark-text me-2"></i>Lihat Dokumen
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-dark text-white pt-5 pb-3 mt-5">
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
          <p class="text-white-50 small">Kolaborasi profesional untuk kemajuan PAUD di Kota Semarang</p>
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
          <p class="mb-1 text-white-50">Email: info@kkopaud-semarang.id</p>
          <p class="mb-1 text-white-50">Telepon: (024) 123-4567</p>
          <p class="mb-0 text-white-50">Alamat: Semarang, Jawa Tengah</p>
        </div>
      </div>

      <hr class="border-secondary">
      <div class="text-center small text-white-50">
        © 2025 KKO PAUD Kota Semarang. Semua hak dilindungi.
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
