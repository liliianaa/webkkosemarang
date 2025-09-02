<?php
include "koneksi.php";

// ==== TAMBAH & EDIT ====
if (isset($_POST['simpan'])) {
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $tempat = $_POST['tempat'];
    $deskripsi = $_POST['deskripsi'];

    $fotoFolder = 'assets/foto_kegiatan/';
    $uploadedFiles = [];

    // Upload foto baru (bisa banyak)
    if (!empty($_FILES['foto']['name'][0])) {
        foreach ($_FILES['foto']['name'] as $key => $name) {
            $tmpName = $_FILES['foto']['tmp_name'][$key];
            $error   = $_FILES['foto']['error'][$key];

            if ($error == 0 && $tmpName != '') {
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                $newName = uniqid() . "." . strtolower($ext);

                if (move_uploaded_file($tmpName, $fotoFolder . $newName)) {
                    $uploadedFiles[] = $newName;
                }
            }
        }
    }

    if (isset($_POST['id'])) {
        // EDIT
        $id = $_POST['id'];
        $foto_lama = $_POST['foto_lama'];

        // foto lama tetap dipakai
        $fotoList = [];
        if (!empty($foto_lama)) {
            $fotoList = explode(",", $foto_lama);
        }
        // gabung foto lama + baru
        if (!empty($uploadedFiles)) {
            $fotoList = array_merge($fotoList, $uploadedFiles);
        }
        $foto = implode(",", $fotoList);

        $stmt = $conn->prepare("UPDATE kegiatan SET nama_kegiatan=?, tanggal=?, jam=?, tempat=?, deskripsi=?, foto=? WHERE id=?");
        $stmt->bind_param("ssssssi", $nama_kegiatan, $tanggal, $jam, $tempat, $deskripsi, $foto, $id);
    } else {
        // TAMBAH
        $foto = implode(",", $uploadedFiles);
        $stmt = $conn->prepare("INSERT INTO kegiatan (nama_kegiatan, tanggal, jam, tempat, deskripsi, foto) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nama_kegiatan, $tanggal, $jam, $tempat, $deskripsi, $foto);
    }

    $stmt->execute();
    echo "<script>alert('Data berhasil disimpan');window.location='admin.php?page=kegiatan_data';</script>";
}

// ==== HAPUS ====
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $foto = $_POST['foto'];

    // hapus semua foto kegiatan
    if (!empty($foto)) {
        $fotoList = explode(",", $foto);
        foreach ($fotoList as $f) {
            if (!empty($f) && file_exists("assets/foto_kegiatan/" . $f)) {
                unlink("assets/foto_kegiatan/" . $f);
            }
        }
    }

    $stmt = $conn->prepare("DELETE FROM kegiatan WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "<script>alert('Data berhasil dihapus');window.location='admin.php?page=kegiatan_data';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Kegiatan - KKO PAUD Kota Semarang</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- CSS Custom Pagination Danger -->
  <style>
    .pagination .page-link {
        color: #dc3545;
    }
    .pagination .page-link:hover {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .pagination .page-item.active .page-link {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
    }
  </style>
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-danger text-white text-center">
      <h4>Kegiatan KKO PAUD Kota Semarang</h4>
    </div>
    <div class="card-body">

      <!-- Tombol Tambah -->
      <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah Kegiatan
      </button>

      <!-- Tabel Data -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="table-danger">
            <tr>
              <th>No</th>
              <th>Nama Kegiatan</th>
              <th>Tanggal</th>
              <th>Jam</th>
              <th>Tempat</th>
              <th>Deskripsi</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $hlm = (isset($_GET['hlm'])) ? (int) $_GET['hlm'] : 1;
            $limit = 10;
            $limit_start = ($hlm - 1) * $limit;
            $no = $limit_start + 1;

            $sql = "SELECT * FROM kegiatan ORDER BY tanggal ASC LIMIT $limit_start, $limit";
            $hasil = $conn->query($sql);

            while ($row = $hasil->fetch_assoc()) {
                $id = $row['id'];
                $fotoList = explode(",", $row["foto"]);
                ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><strong><?= $row["nama_kegiatan"] ?></strong></td>
                  <td><?= $row["tanggal"] ?></td>
                  <td><?= $row["jam"] ?></td>
                  <td><?= $row["tempat"] ?></td>
                  <td><?= substr($row["deskripsi"], 0, 50) ?>...</td>
                  <td>
                    <?php if (!empty($row["foto"])): ?>
                      <img src="assets/foto_kegiatan/<?= $fotoList[0] ?>" width="100">
                      <?php if (count($fotoList) > 1): ?>
                        <span class="badge bg-danger">+<?= count($fotoList) - 1 ?></span>
                      <?php endif; ?>
                    <?php else: ?>
                      <span class="text-muted">-</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <div class="d-flex gap-1">
                        <a href="#" title="Edit" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalEdit<?= $id ?>">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="#" title="Delete" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalHapus<?= $id ?>">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEdit<?= $id ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Kegiatan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <input type="hidden" name="foto_lama" value="<?= $row['foto'] ?>">

                                                <div class="mb-3">
                                                    <label>Nama Kegiatan</label>
                                                    <input type="text" name="nama_kegiatan" class="form-control" value="<?= $row["nama_kegiatan"] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Tanggal</label>
                                                    <input type="date" name="tanggal" class="form-control" value="<?= $row["tanggal"] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Jam</label>
                                                    <input type="time" name="jam" class="form-control" value="<?= $row["jam"] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Tempat</label>
                                                    <input type="text" name="tempat" class="form-control" value="<?= $row["tempat"] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" rows="4" required><?= $row["deskripsi"] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Foto Lama</label><br>
                                                    <?php
                                                    foreach ($fotoList as $f) {
                                                        if (!empty($f) && file_exists("assets/foto_kegiatan/" . $f)) {
                                                        echo "
                                                            <div class='d-inline-block text-center me-2 mb-2'>
                                                            <img src='assets/foto_kegiatan/$f' width='100' class='border rounded mb-1'><br>
                                                            <a href=\"hapus_foto_kegiatan.php?id=$id&foto=$f\" 
                                                                onclick=\"return confirm('Hapus foto ini?')\" 
                                                                class='btn btn-sm btn-danger'>
                                                                <i class='bi bi-trash'></i>
                                                            </a>
                                                            </div>
                                                        ";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Tambah Foto Baru</label>
                                                    <input type="file" name="foto[]" class="form-control" multiple>
                                                    <small class="text-muted">Bisa pilih lebih dari 1 foto</small>
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

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="modalHapus<?= $id ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <input type="hidden" name="foto" value="<?= $row["foto"] ?>">
                                                Yakin ingin menghapus "<strong><?= $row["nama_kegiatan"] ?></strong>"?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <input type="submit" name="hapus" value="Hapus" class="btn btn-danger">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"><label>Nama Kegiatan</label><input type="text" name="nama_kegiatan" class="form-control" required></div>
                        <div class="mb-3"><label>Tanggal</label><input type="date" name="tanggal" class="form-control" required></div>
                        <div class="mb-3"><label>Jam</label><input type="time" name="jam" class="form-control" required></div>
                        <div class="mb-3"><label>Tempat</label><input type="text" name="tempat" class="form-control" required></div>
                        <div class="mb-3"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" rows="4" required></textarea></div>
                        <div class="mb-3">
                            <label>Foto</label>
                            <input type="file" name="foto[]" class="form-control" multiple>
                            <small class="text-muted">Bisa pilih lebih dari 1 foto</small>
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

    <!-- Pagination -->
    <?php
    $sql1 = "SELECT * FROM kegiatan";
    $hasil1 = $conn->query($sql1);
    $total_records = $hasil1->num_rows;
    ?>
    <p>Total Kegiatan : <?php echo $total_records; ?></p>
    <nav class="mb-2">
        <ul class="pagination justify-content-end">
            <?php
            $jumlah_page = ceil($total_records / $limit);
            $jumlah_number = 1;
            $start_number = ($hlm > $jumlah_number) ? $hlm - $jumlah_number : 1;
            $end_number = ($hlm < ($jumlah_page - $jumlah_number)) ? $hlm + $jumlah_number : $jumlah_page;

            if ($hlm == 1) {
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>';
            } else {
                $prev = $hlm - 1;
                echo '<li class="page-item"><a class="page-link" href="?page=kegiatan_data&hlm=1">First</a></li>';
                echo '<li class="page-item"><a class="page-link" href="?page=kegiatan_data&hlm=' . $prev . '">&laquo;</a></li>';
            }

            for ($i = $start_number; $i <= $end_number; $i++) {
                $active = ($hlm == $i) ? ' active' : '';
                echo '<li class="page-item' . $active . '"><a class="page-link" href="?page=kegiatan_data&hlm=' . $i . '">' . $i . '</a></li>';
            }

            if ($hlm == $jumlah_page) {
                echo '<li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
            } else {
                $next = $hlm + 1;
                echo '<li class="page-item"><a class="page-link" href="?page=kegiatan_data&hlm=' . $next . '">&raquo;</a></li>';
                echo '<li class="page-item"><a class="page-link" href="?page=kegiatan_data&hlm=' . $jumlah_page . '">Last</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>