<?php
$host = "localhost";
$user = "root"; 
$pass = "";
$db   = "webkkosemarang";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// proses update status
if (isset($_GET['update_id']) && isset($_GET['status'])) {
    $id = intval($_GET['update_id']);
    $status = $_GET['status'];

    $sql = "UPDATE anggota SET status='$status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: daftar_data.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// filter status
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'Semua';
if ($filter == 'Semua') {
    $sql = "SELECT * FROM anggota ORDER BY id DESC";
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
  <script>
    function confirmUpdate(url, action) {
        if (confirm("Apakah Anda yakin ingin " + action + " pendaftar ini?")) {
            window.location.href = url;
        }
    }
    function applyFilter() {
        let filter = document.getElementById("filter").value;
        window.location.href = "daftar_data.php?filter=" + filter;
    }
  </script>
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-danger text-white text-center">
      <h4>Dashboard Anggota KKO PAUD Kota Semarang</h4>
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

      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
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
              echo "<tr>
                      <td>".$no++."</td>
                      <td>".$row['nama']."</td>
                      <td>".$row['tempat_lahir'].", ".$row['tanggal_lahir']."</td>
                      <td>".$row['jenis_kelamin']."</td>
                      <td>".$row['alamat']."</td>
                      <td>".$row['no_hp']."</td>
                      <td>".$row['email']."</td>
                      <td>".$row['tanggal_daftar']."</td>
                      <td>".($row['status'] ?? 'Belum Diproses')."</td>
                      <td>
                          <button onclick=\"confirmUpdate('daftar_data.php?update_id=".$row['id']."&status=Diterima','menerima')\" class='btn btn-sm btn-success'>Terima</button>
                          <button onclick=\"confirmUpdate('daftar_data.php?update_id=".$row['id']."&status=Ditolak','menolak')\" class='btn btn-sm btn-danger'>Tolak</button>
                      </td>
                    </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
