<?php
$host = "localhost";
$user = "root"; 
$pass = "";
$db   = "webkkosemarang";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// ==== UPDATE STATUS ====
if (isset($_GET['update_id']) && isset($_GET['status'])) {
    $id = intval($_GET['update_id']);
    $status = $_GET['status'];

    $sql = "UPDATE anggota SET status='$status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php?page=daftar_data");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// ==== HAPUS ====
if (isset($_POST['hapus'])) {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM anggota WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "<script>alert('Data berhasil dihapus');window.location='admin.php?page=daftar_data';</script>";
}

// ==== FILTER STATUS ====
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'Semua';
if ($filter == 'Semua') {
    $sql = "SELECT * FROM anggota ORDER BY id ASC";
} else {
    $sql = "SELECT * FROM anggota WHERE status='$filter' ORDER BY id DESC";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Anggota - KKO PAUD Kota Semarang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <script>
    function confirmUpdate(url, action) {
        if (confirm("Apakah Anda yakin ingin " + action + " pendaftar ini?")) {
            window.location.href = url;
        }
    }
    function applyFilter() {
        let filter = document.getElementById("filter").value;
        window.location.href = "admin.php?page=daftar_data&filter=" + filter;
    }
  </script>
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-danger text-white text-center">
      <h4>Anggota KKO PAUD Kota Semarang</h4>
    </div>
    <div class="card-body">

      <!-- Filter Status -->
      <div class="mb-3">
        <label for="filter" class="form-label"><b>Filter Status:</b></label>
        <select id="filter" class="form-select w-auto d-inline" onchange="applyFilter()">
          <option value="Semua" <?= ($filter == 'Semua') ? 'selected' : '' ?>>Semua</option>
          <option value="Belum Diproses" <?= ($filter == 'Belum Diproses') ? 'selected' : '' ?>>Belum Diproses</option>
          <option value="Diterima" <?= ($filter == 'Diterima') ? 'selected' : '' ?>>Diterima</option>
          <option value="Ditolak" <?= ($filter == 'Ditolak') ? 'selected' : '' ?>>Ditolak</option>
        </select>
      </div>

      <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-danger">
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Pendidikan Terakhir</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Tanggal Daftar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($row = $result->fetch_assoc()) {
              $id = $row['id'];
              echo "<tr>
                    <td>".$no++."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['tempat_lahir'].", ".$row['tanggal_lahir']."</td>
                    <td>".$row['jenis_kelamin']."</td>
                    <td>".$row['pendidikan_terakhir']."</td>
                    <td>".$row['alamat']."</td>
                    <td>".$row['no_hp']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['tanggal_daftar']."</td>
                    <td>".($row['status'] ?? 'Belum Diproses')."</td>
                    <td>
                        <div class='d-flex gap-1'>
                            <button onclick=\"confirmUpdate('daftar_data.php?update_id=".$row['id']."&status=Diterima','menerima')\" 
                                    class='btn btn-outline-success btn-sm' title='Terima'>
                                <i class='bi bi-check-circle'></i>
                            </button>
                            <button onclick=\"confirmUpdate('daftar_data.php?update_id=".$row['id']."&status=Ditolak','menolak')\" 
                                    class='btn btn-outline-danger btn-sm' title='Tolak'>
                                <i class='bi bi-x-circle'></i>
                            </button>
                            <button class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#modalHapus$id' title='Hapus'>
                                <i class='bi bi-trash'></i>
                            </button>
                        </div>

                        <!-- Modal Hapus -->
                        <div class='modal fade' id='modalHapus$id' data-bs-backdrop='static' tabindex='-1'>
                          <div class='modal-dialog'>
                            <form method='post'>
                              <div class='modal-content'>
                                <div class='modal-header'>
                                  <h5 class='modal-title'>Konfirmasi Hapus</h5>
                                  <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                </div>
                                <div class='modal-body'>
                                  <input type='hidden' name='id' value='$id'>
                                  Yakin ingin menghapus <strong>".$row['nama']."</strong>?
                                </div>
                                <div class='modal-footer'>
                                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Batal</button>
                                  <input type='submit' name='hapus' value='Hapus' class='btn btn-danger'>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                    </td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
