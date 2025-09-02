<?php
// Koneksi ke database
$host = "localhost";
$user = "root"; // default XAMPP
$pass = "";
$db   = "webkkosemarang";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses simpan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama          = $_POST['nama'];
    $tempat_lahir  = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $alamat        = $_POST['alamat'];
    $no_hp         = $_POST['no_hp'];
    $email         = $_POST['email'];

    $sql = "INSERT INTO anggota (nama, tempat_lahir, tanggal_lahir, jenis_kelamin, pendidikan_terakhir, alamat, no_hp, email) 
            VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$pendidikan_terakhir', '$alamat', '$no_hp', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success text-center'>✅ Pendaftaran berhasil disimpan!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>❌ Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(180deg, #fde8e9 0%, #fff 100%);
      font-family: "Poppins", sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      animation: fadeInUp 0.8s ease;
    }
    .card-header {
      background: #f44336;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
    }
    .btn-danger {
      border-radius: 12px;
      font-weight: bold;
      transition: 0.3s;
      background: #f44336;
    }
    .btn-danger:hover {
      transform: scale(1.05);
      background: #f44336;
    }
    @keyframes fadeInUp {
      from {opacity: 0; transform: translateY(30px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card mx-auto" style="max-width: 600px;">
    <div class="card-header text-white text-center py-3 fw-bold">
      <h5 class="mb-0" style="font-weight: bold;">📋 Formulir Pendaftaran Anggota</h5>
      <small>KKO PAUD Kota Semarang</small>
    </div>
    <div class="card-body p-4">
      <form method="POST" action="">
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan tempat lahir" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-select" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Pendidikan Terakhir</label>
          <input type="text" name="pendidikan_terakhir" class="form-control" placeholder="Contoh: S1 - Pendidikan PAUD" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat" required></textarea>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor handphone" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
          </div>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-danger text-white">Daftar Sekarang</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
