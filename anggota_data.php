<?php
include "koneksi.php";
include "upload_foto.php";

// Tangkap halaman saat ini
$hlm = isset($_GET['hlm']) ? (int) $_GET['hlm'] : 1;

// ==== TAMBAH & EDIT ====
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $pendidikan = $_POST['pendidikan_terakhir'];
    $foto = '';
    $fotoFolder = 'assets/foto_pengurus/';
    $namaFile = $_FILES['foto']['name'];

    if ($namaFile != '') {
        $upload = upload_foto($_FILES['foto'], $fotoFolder);
        if ($upload['status']) {
            $foto = $upload['message'];
        } else {
            echo "<script>alert('" . $upload['message'] . "');</script>";
            exit;
        }
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        if ($foto == '') {
            $foto = $_POST['foto_lama'];
        } else {
            if ($_POST['foto_lama'] != '' && file_exists($fotoFolder . $_POST['foto_lama'])) {
                unlink($fotoFolder . $_POST['foto_lama']);
            }
        }

        $stmt = $conn->prepare("UPDATE pengurus SET nama=?, jabatan=?, pendidikan_terakhir=?, foto=? WHERE id=?");
        $stmt->bind_param("ssssi", $nama, $jabatan, $pendidikan, $foto, $id);
    } else {
        $stmt = $conn->prepare("INSERT INTO pengurus (nama, jabatan, pendidikan_terakhir, foto) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $jabatan, $pendidikan, $foto);
    }

    $stmt->execute();
    echo "<script>alert('Data berhasil disimpan');window.location='admin.php?page=anggota_data&hlm=$hlm';</script>";
}

// ==== HAPUS ====
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $foto = $_POST['foto'];
    if ($foto != '' && file_exists("assets/foto_pengurus/" . $foto)) {
        unlink("assets/foto_pengurus/" . $foto);
    }

    $stmt = $conn->prepare("DELETE FROM pengurus WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "<script>alert('Data berhasil dihapus');window.location='admin.php?page=anggota_data&hlm=$hlm';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Anggota - KKO PAUD Kota Semarang</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- CSS Pagination Danger -->
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
      <h4>Pengurus KKO PAUD Kota Semarang</h4>
    </div>
    <div class="card-body">

      <!-- Tombol Tambah -->
      <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah Anggota
      </button>

      <!-- Tabel -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="table-danger">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Pendidikan</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $hlm = (isset($_GET['hlm'])) ? (int) $_GET['hlm'] : 1;
            $limit = 15;
            $limit_start = ($hlm - 1) * $limit;
            $no = $limit_start + 1;

            $sql = "SELECT * FROM pengurus 
            ORDER BY CASE
                WHEN jabatan LIKE 'Pembina%' THEN 1
                WHEN jabatan LIKE 'Ketua Umum%' THEN 2
                WHEN jabatan LIKE 'Ketua Harian%' THEN 3
                WHEN jabatan LIKE 'Sekretaris%' THEN 4
                WHEN jabatan LIKE 'Bendahara%' THEN 5
                WHEN jabatan LIKE 'Bidang%' THEN 6
                WHEN jabatan LIKE 'Anggota%' THEN 7
                ELSE 99
            END, id ASC
            LIMIT $limit_start, $limit";
            $hasil = $conn->query($sql);

            while ($row = $hasil->fetch_assoc()) {
                $id = $row['id'];
                $fotoPath = 'assets/foto_pengurus/' . $row["foto"];
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><strong><?= $row["nama"] ?></strong></td>
                  <td><?= $row["jabatan"] ?></td>
                  <td><?= $row["pendidikan_terakhir"] ?></td>
                  <td>
                    <?php if (!empty($row["foto"]) && file_exists($fotoPath)): ?>
                      <img src="<?= $fotoPath ?>" width="80">
                    <?php else: ?>
                      <span class="text-muted">-</span>
                    <?php endif; ?>
                  </td>
                  <td>
                            <a href="#" title="edit" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalEdit<?= $id ?>"><i class="bi bi-pencil"></i></a>
                            <a href="#" title="delete" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalHapus<?= $id ?>"><i class="bi bi-trash"></i></a>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEdit<?= $id ?>" data-bs-backdrop="static" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Pengurus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <input type="hidden" name="foto_lama" value="<?= $row['foto'] ?>">

                                                <div class="mb-3">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama" class="form-control"
                                                        value="<?= $row["nama"] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="jabatan" class="form-control"
                                                        value="<?= $row["jabatan"] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Pendidikan Terakhir</label>
                                                    <input type="text" name="pendidikan_terakhir" class="form-control"
                                                        value="<?= $row["pendidikan_terakhir"] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Ganti Foto</label>
                                                    <input type="file" name="foto" class="form-control">
                                                    <?php if (!empty($row["foto"]) && file_exists($fotoPath)): ?>
                                                        <br><img src="<?= $fotoPath ?>" width="100">
                                                    <?php endif; ?>
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
                            <div class="modal fade" id="modalHapus<?= $id ?>" data-bs-backdrop="static" tabindex="-1">
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
                                                Yakin ingin menghapus "<strong><?= $row["nama"] ?></strong>"?
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
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
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
    $sql1 = "SELECT * FROM pengurus";
    $hasil1 = $conn->query($sql1);
    $total_records = $hasil1->num_rows;
    ?>
    <p>Total Pengurus : <?php echo $total_records; ?></p>
    <nav class="mb-2">
        <ul class="pagination justify-content-end">
            <?php
            $jumlah_page = ceil($total_records / $limit);
            $jumlah_number = 1;
            $start_number = ($hlm > $jumlah_number) ? $hlm - $jumlah_number : 1;
            $end_number = ($hlm < ($jumlah_page - $jumlah_number)) ? $hlm + $jumlah_number : $jumlah_page;

            // Tombol First dan Previous
            if ($hlm == 1) {
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>';
            } else {
                $prev = $hlm - 1;
                echo '<li class="page-item"><a class="page-link" href="?page=anggota_data&hlm=1">First</a></li>';
                echo '<li class="page-item"><a class="page-link" href="?page=anggota_data&hlm=' . $prev . '">&laquo;</a></li>';
            }

            // Nomor halaman
            for ($i = $start_number; $i <= $end_number; $i++) {
                $active = ($hlm == $i) ? ' active' : '';
                echo '<li class="page-item' . $active . '"><a class="page-link" href="?page=anggota_data&hlm=' . $i . '">' . $i . '</a></li>';
            }

            // Tombol Next dan Last
            if ($hlm == $jumlah_page) {
                echo '<li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
            } else {
                $next = $hlm + 1;
                echo '<li class="page-item"><a class="page-link" href="?page=anggota_data&hlm=' . $next . '">&raquo;</a></li>';
                echo '<li class="page-item"><a class="page-link" href="?page=anggota_data&hlm=' . $jumlah_page . '">Last</a></li>';
            }
            ?>
        </ul>
    </nav>

</div>