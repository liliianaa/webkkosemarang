<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pendaftaran Anggota KKO PAUD Kota Semarang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5"> <!-- atur lebar di sini -->
      <div class="card shadow-lg">
        <div class="card-header bg-danger text-white text-center">
          <h5>Formulir Pendaftaran Anggota KKO PAUD Kota Semarang</h5>
        </div>
        <div class="card-body">
          <form action="proses_daftar.php" method="POST">
            
            <div class="mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" required>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
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
              <label class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control" rows="2"></textarea>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
              </div>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-danger">Daftar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
