<?php
include "koneksi.php";

if (isset($_GET['id']) && isset($_GET['foto'])) {
    $id = (int) $_GET['id'];
    $foto = $_GET['foto'];

    // Ambil foto lama
    $stmt = $conn->prepare("SELECT foto FROM kegiatan WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();

    if ($row) {
        $fotoList = explode(",", $row['foto']);
        $newFotoList = [];

        foreach ($fotoList as $f) {
            if ($f == $foto) {
                if (file_exists("assets/foto_kegiatan/" . $f)) {
                    unlink("assets/foto_kegiatan/" . $f);
                }
            } else {
                $newFotoList[] = $f;
            }
        }

        $fotoBaru = implode(",", $newFotoList);
        $update = $conn->prepare("UPDATE kegiatan SET foto=? WHERE id=?");
        $update->bind_param("si", $fotoBaru, $id);
        $update->execute();
    }
}

header("Location: admin.php?page=kegiatan_data");
exit;
?>
