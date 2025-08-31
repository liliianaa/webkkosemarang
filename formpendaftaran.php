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

// Proses simpan jika tombol daftar ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama          = $_POST['nama'];
    $tempat_lahir  = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat        = $_POST['alamat'];
    $no_hp         = $_POST['no_hp'];
    $email         = $_POST['email'];

    $sql = "INSERT INTO anggota (nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, no_hp, email) 
            VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$no_hp', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='padding:15px; background:#d4edda; color:#155724; text-align:center;'>Pendaftaran berhasil disimpan!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow mx-auto" style="max-width: 600px;">
    <div class="card-header bg-danger text-white text-center">
      <h5>Formulir Pendaftaran Anggota KKO PAUD Kota Semarang</h5>
    </div>
    <div class="card-body">
      <form method="POST" action="">
        <div class="mb-3">
          <label>Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
          </div>
        </div>

        <div class="mb-3">
          <label>Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-select" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-danger">Daftar</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
