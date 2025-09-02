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
      background: linear-gradient(180deg, #fde8e9 0%, #fff 100%);
      position: relative;
      padding-top: 100px;
      padding-bottom: 100px;
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
          <li class="nav-item"><a class="nav-link active" href="kegiatan.php">Kegiatan</a></li>
          <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
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
      <span class="tagline">Kegiatan & Berita</span>
      <h1 class="hero-title">Kegiatan</h1>
      <h1 class="hero-subtitle">KKO PAUD Kota Semarang</h1>
      <p class="hero-desc">
        Ikuti berbagai kegiatan menarik dan dapata informasi terbaru seputar perkembangan KKO Paud Kota Semarang.
      </p>
  </section>
</body>

<!-- CARD KEGIATAN -->
<div class="container my-5">
  <div class="row g-4 justify-content-center">
    <?php
    $sql = "SELECT * FROM kegiatan ORDER BY tanggal ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        // Ambil foto (banyak dipisah koma → pilih yang pertama)
        $fotoList = !empty($row['foto']) ? explode(",", $row['foto']) : [];
        $fotoUtama = (!empty($fotoList[0]) && file_exists("assets/foto_kegiatan/" . $fotoList[0]))
                      ? "assets/foto_kegiatan/" . $fotoList[0]
                      : "assets/img/contoh.jpeg";

        $tgl = date("d M Y", strtotime($row['tanggal']));
        $jam = date("H:i", strtotime($row['jam']));
        ?>
        <div class="col-md-4">
          <div class="card shadow-sm rounded-4 h-100">
            <div class="position-relative">
              <img src="<?= $fotoUtama ?>" class="card-img-top rounded-top-4" alt="<?= $row['nama_kegiatan'] ?>">
              <span
                class="badge <?= (strtotime($row['tanggal']) >= time()) ? 'bg-primary' : 'bg-success' ?> position-absolute top-0 end-0 m-3">
                  <?= (strtotime($row['tanggal']) >= time()) ? 'Mendatang' : 'Selesai' ?>
              </span>
              <?php if (count($fotoList) > 1): ?>
                <span class="badge bg-info position-absolute bottom-0 end-0 m-2">
                  +<?= count($fotoList) - 1 ?> foto
                </span>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold"><?= $row['nama_kegiatan'] ?></h5>
              <p class="mb-1 text-muted"><i class="bi bi-calendar-event text-danger"></i> <?= $tgl ?></p>
              <p class="mb-1 text-muted"><i class="bi bi-clock text-danger"></i> <?= $jam ?> WIB</p>
              <p class="mb-1 text-muted"><i class="bi bi-geo-alt text-danger"></i> <?= $row['tempat'] ?></p>
              <p class="card-text"><?= substr($row['deskripsi'],0,120) ?>...</p>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-between">
              <a href="detail_kegiatan.php?id=<?= $row['id'] ?>" class="btn btn-danger w-75">
                <i class="bi bi-eye"></i> Detail
              </a>
              <div class="dropdown">
                <button class="btn btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-share"></i>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item"
                      href="https://wa.me/?text=<?= urlencode($row['nama_kegiatan'].' - Lihat detail di: http://yourdomain/detail_kegiatan.php?id='.$row['id']) ?>"
                      target="_blank">
                      <i class="bi bi-whatsapp text-success"></i> WhatsApp
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item"
                      href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('http://yourdomain/detail_kegiatan.php?id='.$row['id']) ?>"
                      target="_blank">
                      <i class="bi bi-facebook text-primary"></i> Facebook
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item"
                      href="https://www.instagram.com/?url=<?= urlencode('http://yourdomain/detail_kegiatan.php?id='.$row['id']) ?>"
                      target="_blank">
                      <i class="bi bi-instagram text-danger"></i> Instagram
                    </a>
                  </li>
                </ul>
              </div>

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
</div>

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
