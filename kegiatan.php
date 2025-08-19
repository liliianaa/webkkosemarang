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
      padding-bottom: 100px;
    }

    /* Elemen bulat dekorasi */
    .circle {
      width: 80px;
      height: 80px;
      background: radial-gradient(circle at 30% 30%, #f77d6b, #e5443c);
      border-radius: 50%;
      position: absolute;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 0;
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
      <a class="navbar-brand fw-bold text-danger" href="#">KKO PAUD Semarang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="anggota.php">Anggota</a></li>
          <li class="nav-item"><a class="nav-link active" href="kegiatan.php">Kegiatan</a></li>
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
        Ikuti berbagai kegiatan menarik dan dapatkan informasi terbaru seputar perkembangan KKO PAUD Kota Semarang.
      </p>
      <div class="mt-4">
        <a href="#" class="btn btn-join"><i class="bi bi-person-plus"></i> Bergabung dengan Kami</a>
        <a href="#" class="btn btn-program"><i class="bi bi-book"></i> Lihat Program Kami</a>
      </div>
    </div>
  </section>
</body>

</html>

<!-- button -->
<div class="container my-4">
  <div class="d-flex flex-wrap gap-2 justify-content-center">
    <button class="btn btn-danger fw-semibold rounded-3 px-3">
      Semua Kegiatan (6)
    </button>
    <button class="btn btn-outline-secondary fw-semibold rounded-3 px-3">
      Workshop (1)
    </button>
    <button class="btn btn-outline-secondary fw-semibold rounded-3 px-3">
      Webinar (1)
    </button>
    <button class="btn btn-outline-secondary fw-semibold rounded-3 px-3">
      Seminar (1)
    </button>
    <button class="btn btn-outline-secondary fw-semibold rounded-3 px-3">
      Pelatihan (1)
    </button>
    <button class="btn btn-outline-secondary fw-semibold rounded-3 px-3">
      Kegiatan Sosial (1)
    </button>
    <button class="btn btn-outline-secondary fw-semibold rounded-3 px-3">
      Launching (1)
    </button>
  </div>
</div>

<!-- card -->
<div class="container my-5">
  <div class="row justify-content-center g-4">

    <!-- Card 1 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/g1.png" class="card-img-top rounded-top-4" alt="Workshop">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Gratis</span>
          <span class="badge bg-light text-dark position-absolute top-0 end-0 m-2">Mendatang</span>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold">Workshop Kurikulum Merdeka PAUD</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 15 Januari 2025</p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i> 09:00 - 15:00 WIB</p>
          <p class="mb-1 text-muted"><i class="bi bi-geo-alt"></i> Aula Dinas Pendidikan Kota Semarang</p>
          <p class="mb-2 text-muted"><i class="bi bi-people"></i> 150/200 peserta</p>
          <p class="card-text">Workshop intensif tentang implementasi Kurikulum Merdeka untuk pendidik PAUD se-Kota
            Semarang dengan fokus pada pembelajaran yang berpusat pada anak.</p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between">
          <a href="#" class="btn btn-danger w-75"><i class="bi bi-eye"></i> Detail</a>
          <button class="btn btn-light border"><i class="bi bi-share"></i></button>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/g2.png" class="card-img-top rounded-top-4" alt="Webinar">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Gratis</span>
          <span class="badge bg-light text-dark position-absolute top-0 end-0 m-2">Mendatang</span>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold">Webinar Digitalisasi Administrasi PAUD</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 22 Januari 2025</p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i> 19:00 - 21:00 WIB</p>
          <p class="mb-1 text-muted"><i class="bi bi-geo-alt"></i> Online via Zoom</p>
          <p class="mb-2 text-muted"><i class="bi bi-people"></i> 320/500 peserta</p>
          <p class="card-text">Webinar tentang penggunaan teknologi untuk efisiensi administrasi lembaga PAUD, termasuk
            sistem informasi manajemen dan pelaporan digital.</p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between">
          <a href="#" class="btn btn-danger w-75"><i class="bi bi-eye"></i> Detail</a>
          <button class="btn btn-light border"><i class="bi bi-share"></i></button>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/g3.png" class="card-img-top rounded-top-4" alt="Bakti Sosial">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Gratis</span>
          <span class="badge bg-light text-dark position-absolute top-0 end-0 m-2">Mendatang</span>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold">Bakti Sosial Pendidikan Desa Terpencil</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 20 Maret 2025</p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i> 07:00 - 17:00 WIB</p>
          <p class="mb-1 text-muted"><i class="bi bi-geo-alt"></i> Desa Karanganyar, Kab. Semarang</p>
          <p class="mb-2 text-muted"><i class="bi bi-people"></i> 45/60 peserta</p>
          <p class="card-text">Kegiatan bakti sosial memberikan bantuan pendidikan, alat peraga edukatif, dan pelatihan
            parenting untuk masyarakat desa terpencil.</p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between">
          <a href="#" class="btn btn-danger w-75"><i class="bi bi-eye"></i> Detail</a>
          <button class="btn btn-light border"><i class="bi bi-share"></i></button>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/contoh.jpeg" class="card-img-top rounded-top-4" alt="Bakti Sosial">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Rp 150.000</span>
          <span class="badge bg-light text-dark position-absolute top-0 end-0 m-2">Mendatang</span>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold">Seminar Nasional Inovasi PAUD 2025</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 15 April 2025</p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i>08:00 - 16:00 WIB</p>
          <p class="mb-1 text-muted"><i class="bi bi-geo-alt"></i> Hotel Santika Semarang</p>
          <p class="mb-2 text-muted"><i class="bi bi-people"></i> 89/300 peserta</p>
          <p class="card-text">
            Seminar nasional dengan tema 'Inovasi Pembelajaran PAUD di Era Digital' menghadirkan pakar pendidikan anak
            usia dini terkemuka dari seluruh Indonesia.
          </p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between">
          <a href="#" class="btn btn-danger w-75"><i class="bi bi-eye"></i> Detail</a>
          <button class="btn btn-light border"><i class="bi bi-share"></i></button>
        </div>
      </div>
    </div>

    <!-- Card 5 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/contoh.jpeg" class="card-img-top rounded-top-4" alt="Bakti Sosial">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Rp 75.000</span>
          <span class="badge bg-light text-dark position-absolute top-0 end-0 m-2">Mendatang</span>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold">Pelatihan Asesmen Pembelajaran PAUD</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 18 Februari 2025</p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i> 09:00 - 16:00 WIB</p>
          <p class="mb-1 text-muted"><i class="bi bi-geo-alt"></i> Gedung KKO PAUD Semarang</p>
          <p class="mb-2 text-muted"><i class="bi bi-people"></i> 67/80 peserta</p>
          <p class="card-text">
            Pelatihan komprehensif tentang teknik asesmen autentik dalam pembelajaran PAUD, termasuk pengembangan
            instrumen dan analisis hasil asesmen.
          </p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between">
          <a href="#" class="btn btn-danger w-75"><i class="bi bi-eye"></i> Detail</a>
          <button class="btn btn-light border"><i class="bi bi-share"></i></button>
        </div>
      </div>
    </div>

    <!-- Card 6 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/contoh.jpeg" class="card-img-top rounded-top-4" alt="Bakti Sosial">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Gratis</span>
          <span class="badge bg-light text-dark position-absolute top-0 end-0 m-2">Mendatang</span>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold">Launching Platform Digital KKO PAUD</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 25 Februari 2025</p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i> 10:00 - 12:00 WIB</p>
          <p class="mb-1 text-muted"><i class="bi bi-geo-alt"></i> Hybrid: Offline & Online</p>
          <p class="mb-2 text-muted"><i class="bi bi-people"></i> 234/400 peserta</p>
          <p class="card-text">
            Peluncuran resmi platform digital KKO PAUD yang akan memudahkan administrasi dan manajemen lembaga PAUD di
            Kota Semarang
          </p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between">
          <a href="#" class="btn btn-danger w-75"><i class="bi bi-eye"></i> Detail</a>
          <button class="btn btn-light border"><i class="bi bi-share"></i></button>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="container my-5">
  <!-- kegiatan mendatang -->
  <div class="text-center mb-5">
    <h2 class="fw-bold">Kegiatan Mendatang</h2>
    <p class="text-muted">Daftar kegiatan yang akan segera diselenggarakan oleh KKO PAUD</p>
  </div>

  <!-- Card List -->
  <div class="row justify-content-center g-4">

    <!-- Card 1 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/contoh.jpeg" class="card-img-top rounded-top-4" alt="Seminar">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Rp 150.000</span>
          <span class="badge bg-light text-dark position-absolute top-0 end-0 m-2">Mendatang</span>
        </div>
        <div class="card-body">
          <h5 class="fw-bold">Seminar Nasional Inovasi PAUD 2025</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 15 April 2025</p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i> 09:00 - 16:00 WIB</p>
          <p class="mb-1 text-muted"><i class="bi bi-geo-alt"></i> Gedung KKO PAUD Semarang</p>
          <p class="mb-2 text-muted"><i class="bi bi-people"></i> 67/80 peserta</p>
          <p class="card-text">Seminar nasional yang membahas inovasi terbaru dalam pendidikan anak usia dini dengan
            pembicara ahli dari berbagai universitas terkemuka.</p>
        </div>
        <div class="card-footer bg-white border-0">
          <a href="#" class="btn btn-outline-secondary w-100">
            <i class="bi bi-share"></i> Bagikan Kegiatan
          </a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/contoh.jpeg" class="card-img-top rounded-top-4" alt="Pelatihan">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Rp 75.000</span>
          <span class="badge bg-light text-dark position-absolute top-0 end-0 m-2">Mendatang</span>
        </div>
        <div class="card-body">
          <h5 class="fw-bold">Pelatihan Asesmen Pembelajaran PAUD</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 18 Februari 2025</p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i> 09:00 - 16:00 WIB</p>
          <p class="mb-1 text-muted"><i class="bi bi-geo-alt"></i> Gedung KKO PAUD Semarang</p>
          <p class="mb-2 text-muted"><i class="bi bi-people"></i> 67/80 peserta</p>
          <p class="card-text">Pelatihan komprehensif tentang teknik asesmen yang efektif untuk mengukur perkembangan
            anak usia dini.</p>
        </div>
        <div class="card-footer bg-white border-0">
          <a href="#" class="btn btn-outline-secondary w-100">
            <i class="bi bi-share"></i> Bagikan Kegiatan
          </a>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/contoh.jpeg" class="card-img-top rounded-top-4" alt="Launching">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Gratis</span>
          <span class="badge bg-light text-dark position-absolute top-0 end-0 m-2">Mendatang</span>
        </div>
        <div class="card-body">
          <h5 class="fw-bold">Launching Platform Digital KKO PAUD</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 25 Februari 2025</p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i> 10:00 - 12:00 WIB</p>
          <p class="mb-1 text-muted"><i class="bi bi-geo-alt"></i> Hybrid: Offline & Online</p>
          <p class="mb-2 text-muted"><i class="bi bi-people"></i> 234/400 peserta</p>
          <p class="card-text">Peluncuran resmi platform digital KKO PAUD yang akan memudahkan kolaborasi dan
            administrasi operator PAUD.</p>
        </div>
        <div class="card-footer bg-white border-0">
          <a href="#" class="btn btn-outline-secondary w-100">
            <i class="bi bi-share"></i> Bagikan Kegiatan
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="container my-5">
  <!-- berita terbaru -->
  <div class="text-center mb-5">
    <h2 class="fw-bold">Berita Terbaru</h2>
    <p class="text-muted">Update terkini seputar kegiatan dan pencapaian KKO PAUD</p>
  </div>

  <!-- Card List -->
  <div class="row justify-content-center g-4">

    <!-- Card 1 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/contoh.jpeg" class="card-img-top rounded-top-4" alt="Seminar">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Penghargaan</span>
        </div>
        <div class="card-body">
          <h5 class="fw-bold">KKO PAUD Semarang Raih Penghargaan Inovasi Pendidikan 2024</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 10 Januari 2025</p>
          <p class="card-text">
            KKO PAUD Kota Semarang berhasil meraih penghargaan Inovasi Pendidikan Terbaik dari Kementerian Pendidikan
            untuk kategori Kolaborasi Profesional PAUD.
          </p>
        </div>
        <div class="card-footer bg-white border-0">
          <a href="#" class="btn btn-outline-secondary w-100">
            <i class="bi bi-box-arrow-up-right"></i> Baca Selengkapnya
          </a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/contoh.jpeg" class="card-img-top rounded-top-4" alt="Seminar">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Kerjasama</span>
        </div>
        <div class="card-body">
          <h5 class="fw-bold">Kerjasama dengan 5 Universitas untuk Program Penelitian PAUD</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 5 Januari 2025</p>
          <p class="card-text">
            KKO PAUD menandatangani MoU dengan lima universitas terkemuka untuk mengembangkan program penelitian dan
            pengembangan PAUD yang berkelanjutan
          </p>
        </div>
        <div class="card-footer bg-white border-0">
          <a href="#" class="btn btn-outline-secondary w-100">
            <i class="bi bi-box-arrow-up-right"></i> Baca Selengkapnya
          </a>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-4">
      <div class="card shadow-sm rounded-4 h-100">
        <div class="position-relative">
          <img src="assets/img/contoh.jpeg" class="card-img-top rounded-top-4" alt="Seminar">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Program Sosial</span>
        </div>
        <div class="card-body">
          <h5 class="fw-bold">Program Beasiswa PAUD untuk 100 Anak Kurang Mampu</h5>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> 28 Desember 2024</p>
          <p class="card-text">
            KKO PAUD meluncurkan program beasiswa pendidikan untuk 100 anak dari keluarga kurang mampu di Kota Semarang
            sebagai bentuk kepedulian sosial.
          </p>
        </div>
        <div class="card-footer bg-white border-0">
          <a href="#" class="btn btn-outline-secondary w-100">
            <i class="bi bi-box-arrow-up-right"></i> Baca Selengkapnya
          </a>
        </div>
      </div>
    </div>


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

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>