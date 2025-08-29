<?php
include "koneksi.php";

// cek apakah ada parameter id
if (!isset($_GET['id'])) {
    echo "<script>alert('ID kegiatan tidak ditemukan');window.location='kegiatan.php';</script>";
    exit;
}

$id = (int) $_GET['id'];
$sql = "SELECT * FROM kegiatan WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>alert('Kegiatan tidak ditemukan');window.location='kegiatan.php';</script>";
    exit;
}

$row = $result->fetch_assoc();
$foto = !empty($row['foto']) && file_exists("assets/foto_kegiatan/" . $row['foto'])
        ? "assets/foto_kegiatan/" . $row['foto']
        : "assets/img/contoh.jpeg";
$tgl = date("d M Y", strtotime($row['tanggal']));
$jam = date("H:i", strtotime($row['jam'])) . " WIB";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $row['nama_kegiatan'] ?> - KKO PAUD Kota Semarang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-danger" href="index.php">KKO PAUD Semarang</a>
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
      </ul>
    </div>
  </div>
</nav>

<!-- DETAIL KEGIATAN -->
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm rounded-4">
        <!-- Carousel Gambar -->
<div id="carouselKegiatan" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    $fotoList = explode(",", $row['foto']); // pisah jadi array
    $active = "active";
    foreach ($fotoList as $fotoItem) {
        $fotoPath = (!empty($fotoItem) && file_exists("assets/foto_kegiatan/" . trim($fotoItem)))
                    ? "assets/foto_kegiatan/" . trim($fotoItem)
                    : "assets/img/contoh.jpeg";
        ?>
        <div class="carousel-item <?= $active ?>">
          <img src="<?= $fotoPath ?>" class="d-block w-100 rounded-top-4" alt="Gambar kegiatan">
        </div>
        <?php
        $active = ""; // hanya slide pertama yg active
    }
    ?>
  </div>
  <!-- Tombol Navigasi -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselKegiatan" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselKegiatan" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

        <div class="card-body">
          <h2 class="fw-bold mb-3"><?= $row['nama_kegiatan'] ?></h2>
          <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> <?= $tgl ?></p>
          <p class="mb-1 text-muted"><i class="bi bi-clock"></i> <?= $jam ?></p>
          <p class="mb-3 text-muted"><i class="bi bi-geo-alt"></i> <?= $row['tempat'] ?></p>
          <p class="card-text"><?= nl2br($row['deskripsi']) ?></p>
        </div>
        <div class="card-footer bg-white border-0 d-flex justify-content-between">
          <a href="kegiatan.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
          </a>
          <div class="btn-group">
            <!-- Share WhatsApp -->
            <a href="https://wa.me/?text=<?= urlencode($row['nama_kegiatan'] . ' - ' . 'http://yourdomain.com/detail_kegiatan.php?id=' . $row['id']) ?>" 
              target="_blank" class="btn btn-success" title="Share ke WhatsApp">
              <i class="bi bi-whatsapp"></i>
            </a>
            <!-- Share Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('http://yourdomain.com/detail_kegiatan.php?id=' . $row['id']) ?>" 
              target="_blank" class="btn btn-primary" title="Share ke Facebook">
              <i class="bi bi-facebook"></i>
            </a>
            <!-- Share Instagram (link ke profil IG resmi) -->
            <a href="https://www.instagram.com/kkopaudsemarang" target="_blank" class="btn btn-danger" title="Instagram KKO PAUD">
              <i class="bi bi-instagram"></i>
            </a>
            <!-- Copy Link -->
            <button class="btn btn-dark" onclick="copyLink()" title="Salin Link">
              <i class="bi bi-link-45deg"></i>
            </button>
          </div>
        </div>

<script>
function copyLink() {
  const link = "http://yourdomain.com/detail_kegiatan.php?id=<?= $row['id'] ?>";
  navigator.clipboard.writeText(link).then(function() {
    alert("Link berhasil disalin: " + link);
  }, function() {
    alert("Gagal menyalin link.");
  });
}
</script>

      </div>
    </div>
  </div>
</div>

<footer class="bg-dark text-white text-center py-3">
  © 2025 KKO PAUD Kota Semarang. Semua hak dilindungi.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
