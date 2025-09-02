<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "webkkosemarang";

$conn = new mysqli($host, $user, $pass, $db);
$status_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $keyword = $conn->real_escape_string($_POST['keyword']);

  $sql = "SELECT * FROM anggota 
            WHERE email='$keyword' OR no_hp='$keyword' 
            LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $status_msg = "
        <div class='alert alert-info'>
            <h5>Hasil Pencarian:</h5>
            <p><b>Nama:</b> " . $row['nama'] . "</p>
            <p><b>Email:</b> " . $row['email'] . "</p>
            <p><b>No HP:</b> " . $row['no_hp'] . "</p>
            <p><b>Status Pendaftaran:</b> 
                <span class='badge bg-" . ($row['status'] == 'Diterima' ? 'success' : ($row['status'] == 'Ditolak' ? 'danger' : 'secondary')) . "'>
                " . $row['status'] . "
                </span>
            </p>
        </div>";
  } else {
    $status_msg = "<div class='alert alert-danger'>Data tidak ditemukan. Pastikan email/nomor HP benar.</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Cek Status Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .search-box {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      border: 1px solid #f0f0f0;
    }

    .search-box .title {
      font-weight: 600;
      font-size: 16px;
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }

    .search-box .title i {
      color: #e74c3c;
      margin-right: 6px;
    }

    .search-box p {
      font-size: 14px;
      color: #6c757d;
      margin-bottom: 15px;
    }

    .search-box input {
      border-radius: 8px;
    }

    .btn-cari {
      background-color: #ff6b6b;
      border: none;
      border-radius: 8px;
      color: #fff;
      padding: 8px 20px;
    }

    .btn-cari:hover {
      background-color: #ff4d4d;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container mt-5">

    <!-- Judul Utama -->
    <div class="text-center mb-4">
      <h2 class="fw-bold text-danger">Cek Status Pendaftaran</h2>
      <p class="text-muted">Masukkan email atau nomor telepon pendaftar untuk melihat status pendaftaran Anda</p>
    </div>

    <!-- Search Box -->
    <div class="search-box">
      <div class="title"><i class="bi bi-search"></i> Pencarian Status</div>
      <p>Gunakan Email atau nomor telepon untuk mencari status pendaftaran</p>
      <form method="POST" class="d-flex">
        <input type="text" name="keyword" class="form-control me-2"
          placeholder="Masukkan email atau nomor telepon pendaftar" required>
        <button type="submit" class="btn btn-cari d-flex align-items-center">
          <i class="bi bi-search me-1"></i> Cari
        </button>
      </form>
    </div>

    <div class="mt-3">
      <?= $status_msg ?>
    </div>
  </div>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</body>

</html>