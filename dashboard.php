<?php
// jumlah pengurus
$q1 = $conn->query("SELECT COUNT(*) as total FROM pengurus");
$jumlah_pengurus = $q1->fetch_assoc()['total'];

// jumlah pendaftar (anggota)
$q4 = $conn->query("SELECT COUNT(*) as total FROM anggota");
$jumlah_pendaftar = $q4->fetch_assoc()['total'];

// jumlah kegiatan bulan ini
$q2 = $conn->query("SELECT COUNT(*) as total FROM kegiatan WHERE MONTH(tanggal)=MONTH(CURRENT_DATE())");
$jumlah_kegiatan = $q2->fetch_assoc()['total'];

// jumlah user
$q3 = $conn->query("SELECT COUNT(*) as total FROM user");
$jumlah_user = $q3->fetch_assoc()['total'];
?>

<div class="container mt-4">
  <h2 class="fw-bold">Dashboard Admin</h2>
  <p class="text-muted">Ringkasan Sistem KKO PAUD Semarang</p>

  <!-- Statistik -->
  <div class="row g-4 mb-4">
    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <p class="text-muted mb-1">Total Pengurus</p>
            <h3 class="fw-bold"><?= $jumlah_pengurus ?></h3>
          </div>
          <div class="rounded-circle bg-primary bg-opacity-10 p-3">
            <i class="bi bi-people-fill text-primary fs-2"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <p class="text-muted mb-1">Total pendaftar</p>
            <h3 class="fw-bold"><?= $jumlah_pendaftar ?></h3>
          </div>
          <div class="rounded-circle bg-primary bg-opacity-10 p-3">
            <i class="bi bi-person-fill text-primary fs-2"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <p class="text-muted mb-1">Kegiatan Bulan Ini</p>
            <h3 class="fw-bold"><?= $jumlah_kegiatan ?></h3>
          </div>
          <div class="rounded-circle bg-success bg-opacity-10 p-3">
            <i class="bi bi-calendar-event-fill text-success fs-2"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <p class="text-muted mb-1">Total User</p>
            <h3 class="fw-bold"><?= $jumlah_user ?></h3>
          </div>
          <div class="rounded-circle bg-warning bg-opacity-10 p-3">
            <i class="bi bi-person-circle text-warning fs-2"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Aksi Cepat -->
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <h5 class="fw-bold mb-3">Aksi Cepat</h5>
      <p class="text-muted">Kelola data dengan mudah</p>
      <div class="list-group">
        <a href="admin.php?page=anggota_data" class="list-group-item list-group-item-action">
          <i class="bi bi-people-fill text-danger me-2"></i> Kelola Pengurus
        </a>
        <a href="admin.php?page=daftar_data" class="list-group-item list-group-item-action">
          <i class="bi bi-person-fill text-danger me-2"></i> Kelola Anggota
        </a>
        <a href="admin.php?page=kegiatan_data" class="list-group-item list-group-item-action">
          <i class="bi bi-calendar-event text-danger me-2"></i> Kelola Kegiatan
        </a>
        <a href="admin.php?page=user" class="list-group-item list-group-item-action">
          <i class="bi bi-person-circle text-danger me-2"></i> Kelola User
        </a>
      </div>
    </div>
  </div>
</div>