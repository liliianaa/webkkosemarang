<?php
include "koneksi.php";

// Daftar dokumen legalitas
$legalDocuments = [
    [
        "title" => "SK Kemenkumham",
        "description" => "Surat Keputusan dari Kementerian Hukum dan HAM",
        "file" => "assets/dokumen/Kemenkumham.pdf"
    ],
    [
        "title" => "Akte Notaris",
        "description" => "Akta pendirian organisasi yang disahkan notaris",
        "file" => "assets/dokumen/AkteNotaris.pdf"
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar .nav-link.active {
            color: #f44336 !important;
            font-weight: bold;
        }

        .document-icon {
            width: 60px;
            height: 60px;
            background: #ffeaea;
            color: #f44336;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 15px;
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
                    <li class="nav-item"><a class="nav-link" href="kegiatan.php">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="legalitas.php">Legalitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SECTION LEGALITAS -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Legalitas Organisasi</h2>
                <p class="text-muted">Dokumen resmi yang menjadi dasar hukum KKO PAUD Kota Semarang</p>
            </div>

            <div class="row g-4">
                <?php foreach ($legalDocuments as $doc): ?>
                    <div class="col-md-4">
                        <div class="border rounded-4 text-center shadow-sm p-4 h-100">
                            <div class="document-icon">
                                <i class="bi bi-file-earmark-text-fill"></i>
                            </div>
                            <h5 class="fw-bold"><?= $doc['title']; ?></h5>
                            <p class="text-muted"><?= $doc['description']; ?></p>
                            <a href="<?= $doc['file']; ?>" target="_blank" class="btn btn-danger w-100">
                                <i class="bi bi-eye me-2"></i>Lihat Dokumen
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

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
                        <li><a href="anggota.php" class="text-white-50 text-decoration-none">Anggota</a></li>
                        <li><a href="kegiatan.php" class="text-white-50 text-decoration-none">Kegiatan</a></li>
                        <li><a href="Kegiatan.php" class="text-white-50 text-decoration-none">Kegiatan</a></li>
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
                    <p class="mb-0 text-white-50">Alamat: Jl. Graha Mukti Utama No. 344b Tlogomulyo, Pedurungan, Kota
                        Semarang</p>
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