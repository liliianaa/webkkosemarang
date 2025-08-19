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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="anggota.php">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link" href="#program">Program</a></li>
                    <li class="nav-item"><a class="nav-link" href="kegiatan.php">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
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
            <h1 class="hero-title">KKO PAUD</h1>
            <h1 class="hero-subtitle">Kota Semarang</h1>
            <p class="hero-desc">
                Wadah kolaborasi profesional operator PAUD yang berfokus pada peningkatan mutu pendidikan anak usia dini
                melalui pelatihan, digitalisasi, dan kegiatan sosial.
            </p>
        </div>
    </section>

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
                    <h5 class="fw-bold mb-3"><i class="bi bi-eye-fill text-danger me-2"></i>Visi Kami</h5>
                    <p class="text-muted">
                        Menjadi organisasi kolaborasi profesional PAUD terdepan di Indonesia yang mampu menghasilkan
                        generasi emas melalui pendidikan anak usia dini yang berkualitas, inovatif, dan berkelanjutan.
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-md-6">
                <div class="p-4 h-100 shadow-sm rounded-4 border-start border-4 border-danger text-start">
                    <h5 class="fw-bold mb-3"><i class="bi bi-bullseye text-danger me-2"></i>Misi Kami</h5>
                    <ul class="text-muted ps-3">
                        <li class="mb-2"><i class="bi bi-check-circle text-danger me-2"></i>Meningkatkan kompetensi
                            operator PAUD melalui pelatihan berkelanjutan</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-danger me-2"></i>Mendorong digitalisasi dan
                            inovasi dalam pengelolaan PAUD</li>
                        <li><i class="bi bi-check-circle text-danger me-2"></i>Membangun kolaborasi strategis dengan
                            berbagai institusi</li>
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
            Tim kepemimpinan yang berpengalaman dan berdedikasi
        </p>

        <div class="row g-4">
            <!-- Ketua -->
            <div class="col-md-6">
                <div class="p-4 h-100 shadow-sm rounded-4 bg-white">
                    <div class="mb-3">
                        <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center"
                            style="width:80px;height:80px;background: linear-gradient(135deg,#f77d6b,#e5443c);">
                            <i class="bi bi-people-fill text-white fs-2"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">Dr. Siti Nurhaliza, M.Pd</h5>
                    <span class="badge bg-danger-subtle text-danger mb-3">Ketua KKO PAUD</span>
                    <p class="mb-1"><strong>Pengalaman:</strong> 15 tahun</p>
                    <p class="mb-3"><strong>Keahlian:</strong> Kurikulum PAUD, Manajemen Pendidikan</p>
                    <a href="#" class="text-danger fw-semibold">Lihat Semua Anggota <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <!-- Wakil Ketua -->
            <div class="col-md-6">
                <div class="p-4 h-100 shadow-sm rounded-4 bg-white">
                    <div class="mb-3">
                        <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center"
                            style="width:80px;height:80px;background: linear-gradient(135deg,#f77d6b,#e5443c);">
                            <i class="bi bi-people-fill text-white fs-2"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">Ahmad Fauzi, S.Pd</h5>
                    <span class="badge bg-danger-subtle text-danger mb-3">Wakil Ketua KKO PAUD</span>
                    <p class="mb-1"><strong>Pengalaman:</strong> 12 tahun</p>
                    <p class="mb-3"><strong>Keahlian:</strong> Digitalisasi PAUD, Pelatihan</p>
                    <a href="#" class="text-danger fw-semibold">Lihat Semua Anggota <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- KETUA KKO END -->


<!-- SECTION KEGIATAN TERBARU -->
<section id="activities" class="py-5">
    <style>
        #activities .card-img-top {
            height: 200px;
            /* tinggi seragam */
            object-fit: cover;
            /* crop proporsional */
        }
    </style>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Kegiatan Terbaru</h2>
            <p class="text-muted">Sekilas kegiatan terkini yang sedang berlangsung di KKO PAUD</p>
        </div>

        <div class="row g-4">
            <!-- Kegiatan 1 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="assets/gambar1.jpeg" class="card-img-top" alt="Workshop Kurikulum">
                        <span class="badge bg-success position-absolute top-0 end-0 m-3">Berlangsung</span>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold">Workshop Kurikulum Merdeka PAUD</h5>
                        <p class="mb-1 text-muted"><i class="bi bi-calendar-event me-1"></i> 15 Januari 2025</p>
                        <p class="mb-1 text-muted"><i class="bi bi-geo-alt me-1"></i> Aula Dinas Pendidikan Kota
                            Semarang</p>
                        <p class="mb-3 text-muted"><i class="bi bi-people me-1"></i> 150/200 peserta</p>
                        <a href="kegiatan.php" class="text-danger fw-semibold">Lihat Semua Kegiatan <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Kegiatan 2 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="assets/g2.jpg" class="card-img-top" alt="Webinar Digital">
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3">Mendatang</span>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold">Webinar Teknologi Pembelajaran Digital</h5>
                        <p class="mb-1 text-muted"><i class="bi bi-calendar-event me-1"></i> 20 Januari 2025</p>
                        <p class="mb-1 text-muted"><i class="bi bi-geo-alt me-1"></i> Online via Zoom</p>
                        <p class="mb-3 text-muted"><i class="bi bi-people me-1"></i> 320/500 peserta</p>
                        <a href="kegiatan.php" class="text-danger fw-semibold">Lihat Semua Kegiatan <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Kegiatan 3 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="assets/g3.jpg" class="card-img-top" alt="Bakti Sosial Pendidikan">
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3">Mendatang</span>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold">Bakti Sosial Pendidikan Desa Terpencil</h5>
                        <p class="mb-1 text-muted"><i class="bi bi-calendar-event me-1"></i> 25 Januari 2025</p>
                        <p class="mb-1 text-muted"><i class="bi bi-geo-alt me-1"></i> Desa Karanganyar, Kab. Semarang
                        </p>
                        <p class="mb-3 text-muted"><i class="bi bi-people me-1"></i> 45/60 peserta</p>
                        <a href="kegiatan.php" class="text-danger fw-semibold">Lihat Semua Kegiatan <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
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
                    <li><a href="#" class="text-white-50 text-decoration-none">Anggota</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none">Program</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none">Kegiatan</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none">Kontak</a></li>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>