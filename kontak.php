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
            padding-top: 50px;
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

        .hero-section {
            background-color: #ffe3e3;
            padding: 80px 20px;
        }

        .hero-section .container {
            position: relative;
            z-index: 1;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #ff3c3c;
            text-decoration: none;
            font-size: 16px;
        }

        .icon-circle-soft {
            width: 60px;
            height: 60px;
            background-color: #ffe3e3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
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
                    <li class="nav-item"><a class="nav-link" href="legalitas.php">Legalitas</a></li>
                    <li class="nav-item"><a class="nav-link active" href="kontak.php">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="hero" class="hero-section">
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- Kolom Kiri (Teks) -->
                <div class="col-md-6">
                    <a href="index.php" class="back-link d-inline-block mb-3">← Kembali ke Beranda</a>
                    <h1 class="hero-title">
                        Mari <span class="highlight-green">Terhubung</span>
                    </h1>
                    <p class="hero-desc">
                        Kami siap membantu Anda dalam mengembangkan pendidikan anak usia dini. Mari berkolaborasi untuk
                        masa depan yang lebih cerah bagi generasi penerus bangsa.
                    </p>
                    <div class="d-flex flex-wrap gap-4 mt-4">
                        <div class="d-flex align-items-center gap-2 text-success">
                            <i class="bi bi-award"></i> Terpercaya
                        </div>
                        <div class="d-flex align-items-center gap-2 text-success">
                            <i class="bi bi-heart"></i> Berpengalaman
                        </div>
                        <div class="d-flex align-items-center gap-2 text-success">
                            <i class="bi bi-star"></i> Profesional
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan (Gambar) -->
                <div class="col-md-6 text-center">
                    <img src="assets/img/gambarkontak.jpg" alt="Anak-anak belajar" class="img-fluid rounded-4 shadow-sm"
                        style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<!-- KONTAK -->
<section class="py-5" style="background-color: #fff0f0;">
    <div class="container">

        <!-- Tambahan Judul dan Deskripsi -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Informasi <span class="text-danger">Kontak</span>
            </h2>
            <p class="text-muted">
                Hubungi kami melalui berbagai cara yang tersedia. Tim kami siap melayani<br />
                Anda dengan sepenuh hati.
            </p>
        </div>

        <!-- Baris Isi Kontak -->
        <div class="row g-4 justify-content-center">

            <!-- Alamat -->
            <div class="col-md-3 col-sm-6">
                <div class="card text-center border-0 shadow-sm p-4 h-100 rounded-4">
                    <div class="icon-circle-soft mb-3 mx-auto">
                        <i class="bi bi-geo-alt-fill text-danger" style="font-size: 1.8rem;"></i>
                    </div>
                    <h5 class="fw-bold">Alamat</h5>
                    <p class="text-muted small mb-0">Jl. Graha Mukti Utama No. 344b</p>
                    <p class="text-muted small mb-0">Pedurungan</p>
                    <p class="text-muted small">Kota Semarang, Jawa Tengah</p>
                </div>
            </div>

            <!-- Telepon -->
            <div class="col-md-3 col-sm-6">
                <div class="card text-center border-0 shadow-sm p-4 h-100 rounded-4">
                    <div class="icon-circle-soft mb-3 mx-auto">
                        <i class="bi bi-telephone-fill text-danger" style="font-size: 1.8rem;"></i>
                    </div>
                    <h5 class="fw-bold">Telepon</h5>
                    <p class="text-muted small mb-0">0816661087</p>
                    <p class="text-muted small">08976622262</p>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-3 col-sm-6">
                <div class="card text-center border-0 shadow-sm p-4 h-100 rounded-4">
                    <div class="icon-circle-soft mb-3 mx-auto">
                        <i class="bi bi-envelope-fill text-danger" style="font-size: 1.8rem;"></i>
                    </div>
                    <h5 class="fw-bold ">Email</h5>
                    <p class="text-muted small mb-0">kkopaudkotasemarang@gmail.com</p>
                </div>
            </div>

            <!-- Jam Operasional -->
            <div class="col-md-3 col-sm-6">
                <div class="card text-center border-0 shadow-sm p-4 h-100 rounded-4">
                    <div class="icon-circle-soft mb-3 mx-auto">
                        <i class="bi bi-clock-fill text-danger" style="font-size: 1.8rem;"></i>
                    </div>
                    <h5 class="fw-bold">Jam Operasional</h5>
                    <p class="text-muted small mb-0">Senin - Jumat</p>
                    <p class="text-muted small">08:00 - 16:00 WIB</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- IKUTI MEDIA SOSIAL -->
<section class="py-5" style="background-color: #fff0f0;">
    <div class="container">
        <div class="bg-white rounded-4 shadow-sm p-4 text-center">
            <h3 class="fw-bold">Ikuti Media Sosial Kami</h3>
            <p class="text-muted mb-4">
                Dapatkan update terbaru tentang kegiatan, program pelatihan, dan inspirasi pendidikan anak usia dini
            </p>
            <div class="row justify-content-center g-3">

                <!-- Facebook -->
                <div class="col-6 col-md-3">
                    <a href="https://facebook.com/kkopaudsemarang" target="_blank"
                        class="text-decoration-none text-dark">
                        <div class="border rounded-4 py-3 h-100">
                            <i class="bi bi-facebook text-primary fs-4"></i>
                            <p class="fw-semibold mt-2 mb-0">Facebook</p>
                        </div>
                    </a>
                </div>

                <!-- Instagram -->
                <div class="col-6 col-md-3">
                    <a href="https://instagram.com/kkopaudkotasemarang" target="_blank"
                        class="text-decoration-none text-dark">
                        <div class="border rounded-4 py-3 h-100">
                            <i class="bi bi-instagram text-danger fs-4"></i>
                            <p class="fw-semibold mt-2 mb-0">Instagram</p>
                        </div>
                    </a>
                </div>

                <!-- YouTube -->
                <div class="col-6 col-md-3">
                    <a href="https://www.youtube.com/@kkopaudkotasemarang242" target="_blank"
                        class="text-decoration-none text-dark">
                        <div class="border rounded-4 py-3 h-100">
                            <i class="bi bi-youtube text-danger fs-4"></i>
                            <p class="fw-semibold mt-2 mb-0">YouTube</p>
                        </div>
                    </a>
                </div>

                <!-- WhatsApp -->
                <div class="col-6 col-md-3">
                    <a href="https://wa.me/6281266622262" target="_blank" class="text-decoration-none text-dark">
                        <div class="border rounded-4 py-3 h-100">
                            <i class="bi bi-whatsapp text-success fs-4"></i>
                            <p class="fw-semibold mt-2 mb-0">WhatsApp</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- AKSI CEPAT -->
<section class="py-5" style="background-color: #fff0f0;">
    <div class="container">
        <div class="bg-white rounded-4 shadow-sm p-4 text-center">
            <h3 class="fw-bold">Aksi Cepat</h3>
            <p class="text-muted mb-4">
                Langsung akses ke layanan yang Anda butuhkan
            </p>
            <div class="row justify-content-center g-3">

                <!-- Daftar Program -->
                <div class="col-md-5">
                    <a href="#" class="text-white text-decoration-none" data-bs-toggle="modal"
                        data-bs-target="#daftarModal">
                        <div class="bg-success rounded-4 p-3 text-start h-100">
                            <i class="bi bi-person-lines-fill fs-5"></i>
                            <h6 class="fw-bold mt-2 mb-1">Daftar Program Pelatihan</h6>
                            <p class="mb-0 small">Tingkatkan kompetensi Anda</p>
                        </div>
                    </a>
                </div>


                <!-- Jadwal Kegiatan -->
                <div class="col-md-5">
                    <a href="#" class="text-dark text-decoration-none">
                        <div class="border rounded-4 p-3 text-start h-100">
                            <i class="bi bi-calendar-event text-success fs-5"></i>
                            <h6 class="fw-bold mt-2 mb-1">Lihat Jadwal Kegiatan</h6>
                            <p class="mb-0 small">Ikuti kegiatan terbaru kami</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Form Pendaftaran -->
<div class="modal fade" id="daftarModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4">
            <form action="kirim_email.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Form Pendaftaran Pelatihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Aktif</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Institusi</label>
                        <input type="text" name="institusi" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>
            </form>
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
                    <li><a href="kegiatan.php" class="text-white-50 text-decoration-none">Kegiatan</a></li>
                    <li><a href="legalitas.php" class="text-white-50 text-decoration-none">Legalitas</a></li>
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
                <p class="mb-0 text-white-50">Alamat: Jl. Graha Mukti Utama No. 344b Tlogomulyo, Pedurungan, Kota
                    Semarang</p>
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