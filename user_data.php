<?php
$host = "localhost";
$user = "root"; 
$pass = "";
$db   = "webkkosemarang";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah User
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // simpan dengan md5 hash

    $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    header("Location: user_data.php");
    exit;
}

// Edit User
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = !empty($_POST['password']) ? md5($_POST['password']) : $_POST['old_password'];

    $stmt = $conn->prepare("UPDATE user SET username=?, password=? WHERE id=?");
    $stmt->bind_param("ssi", $username, $password, $id);
    $stmt->execute();
    header("Location: user_data.php");
    exit;
}

// Hapus User
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM user WHERE id='$id'");
    header("Location: user_data.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Manajemen User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
      body {
          background-color: #f8f9fa;
      }
      .card-custom {
          border-radius: 10px;
          overflow: hidden;
          box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      }
      .card-header {
          background-color: #dc3545; /* merah */
          color: white;
          font-weight: bold;
          text-align: center;
      }
      .btn-danger {
          border-radius: 8px;
          font-weight: 500;
      }
      .table thead {
          background-color: #f8d7da; /* merah muda */
      }
      .table th, .table td {
          vertical-align: middle;
      }
  </style>
</head>
<body class="p-4">

<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            Data User KKO PAUD Kota Semarang
        </div>
        <div class="card-body">
            <!-- Tombol Tambah -->
            <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah User
            </button>

            <!-- Tabel User -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:50px;">No</th>
                        <th>Username</th>
                        <th>Password (MD5)</th>
                        <th style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $result = $conn->query("SELECT * FROM user ORDER BY id DESC");
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><b><?= $row['username'] ?></b></td>
                        <td><?= $row['password'] ?></td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            <button class="btn btn-outline-success btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalEdit<?= $row['id'] ?>">
                                    <i class="bi bi-pencil"></i>
                            </button>

                            <!-- Tombol Hapus -->
                            <a href="?hapus=<?= $row['id'] ?>" 
                               onclick="return confirm('Yakin hapus user ini?')" 
                               class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="post">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="old_password" value="<?= $row['password'] ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Username</label>
                                            <input type="text" name="username" value="<?= $row['username'] ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Password (Kosongkan jika tidak diganti)</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <input type="submit" name="update" value="Update" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-danger">
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
