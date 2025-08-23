<?php
include "koneksi.php";
include "upload_foto.php";

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
    echo "<script>alert('Data berhasil disimpan');window.location='admin.php?page=anggota_data';</script>";
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

    echo "<script>alert('Data berhasil dihapus');window.location='admin.php?page=anggota';</script>";
}
?>

<div class="container">
    <!-- Tombol Tambah -->
    <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah Anggota
    </button>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-info">
                <tr>
                    <th class="w-5">No</th>
                    <th class="w-20">Nama</th>
                    <th class="w-20">Jabatan</th>
                    <th class="w-35">Pendidikan</th>
                    <th class="w-10">Foto</th>
                    <th class="w-10">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $hlm = (isset($_GET['hlm'])) ? (int) $_GET['hlm'] : 1;
                $limit = 15;
                $limit_start = ($hlm - 1) * $limit;
                $no = $limit_start + 1;

                $sql = "SELECT * FROM pengurus ORDER BY id ASC LIMIT $limit_start, $limit";
                $hasil = $conn->query($sql);

                while ($row = $hasil->fetch_assoc()) {
                    $id = $row['id'];
                    $fotoPath = 'assets/foto_pengurus/' . $row["foto"];
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><strong><?= $row["nama"] ?></strong></td>
                        <td><?= $row["jabatan"] ?></td>
                        <td><?= $row["pendidikan_terakhir"] ?></td>
                        <td>
                            <?php if (!empty($row["foto"]) && file_exists($fotoPath)): ?>
                                <img src="<?= $fotoPath ?>" width="100">
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="#" title="edit" class="badge rounded-pill text-bg-success" data-bs-toggle="modal"
                                data-bs-target="#modalEdit<?= $id ?>"><i class="bi bi-pencil"></i></a>
                            <a href="#" title="delete" class="badge rounded-pill text-bg-danger" data-bs-toggle="modal"
                                data-bs-target="#modalHapus<?= $id ?>"><i class="bi bi-x-circle"></i></a>

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
                                                    <textarea class="form-control" name="jabatan"
                                                        required><?= $row["jabatan"] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Pendidikan Terakhir</label>
                                                    <textarea class="form-control" name="pendidikan_terakhir"
                                                        required><?= $row["pendidikan_terakhir"] ?></textarea>
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
                                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
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
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
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