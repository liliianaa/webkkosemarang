<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "webkkosemarang";

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
            <p><b>Nama:</b> ".$row['nama']."</p>
            <p><b>Email:</b> ".$row['email']."</p>
            <p><b>No HP:</b> ".$row['no_hp']."</p>
            <p><b>Status Pendaftaran:</b> 
                <span class='badge bg-".($row['status']=='Diterima'?'success':($row['status']=='Ditolak'?'danger':'secondary'))."'>
                ".$row['status']."
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
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow p-4">
    <h3 class="text-center">Cek Status Pendaftaran</h3>
    <p class="text-muted text-center">Masukkan <b>Email</b> atau <b>No HP</b> yang digunakan saat mendaftar.</p>
    <form method="POST" class="mb-3">
      <div class="input-group">
        <input type="text" name="keyword" class="form-control" placeholder="Masukkan Email atau No HP" required>
        <button type="submit" class="btn btn-primary">Cek</button>
      </div>
    </form>
    <?= $status_msg ?>
  </div>
</div>
</body>
</html>
