<?php  
session_start();
include "koneksi.php";  

if (!isset($_SESSION['username'])) { 
    header("location:login.php"); 
    exit;
} 
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel | KKO PAUD Semarang</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/> 
  <style>
    body { background-color: #f9fafb; }
    .stat-card {
      border-radius: 16px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }
    .quick-action .list-group-item {
      border: none;
      border-radius: 12px;
      margin-bottom: 8px;
      background-color: #fff5f5;
      transition: 0.2s;
    }
    .quick-action .list-group-item:hover {
      background-color: #ffecec;
    }
    .activity-item {
      border-left: 4px solid #dc3545;
      padding-left: 10px;
      margin-bottom: 10px;
      background-color: #fff5f5;
      border-radius: 8px;
    }
    .activity-item small {
      font-size: 0.8rem;
      color: #6c757d;
    }
    /* ringkasan sistem */
    .summary-card {
      border-radius: 14px;
      padding: 20px;
      text-align: center;
    }
    .summary-card h4 {
      font-weight: bold;
      margin: 0;
    }
    .summary-card p {
      margin: 0;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar bg-white shadow-sm">
    <div class="container">
      <span class="navbar-brand fw-bold">
        <i class="bi bi-book text-danger"></i> Admin Panel
      </span>
      <div class="ms-auto d-flex align-items-center">
        <span class="me-3 text-muted">Selamat datang, <?= $_SESSION['username']?> </span>
        <a href="logout.php" class="btn btn-outline-dark btn-sm">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container my-4">
    <h3 class="fw-bold">Dashboard Admin</h3>
    <p class="text-muted">Kelola data KKO PAUD Semarang</p>

    <!-- Statistik -->
    <div class="row g-3 mb-4">
      <div class="col-md-4">
        <div class="card stat-card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <p class="text-muted mb-1">Total Anggota</p>
              <h4 class="fw-bold">156</h4>
            </div>
            <div class="bg-primary text-white p-3 rounded-3">
              <i class="bi bi-people h4"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card stat-card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <p class="text-muted mb-1">Kegiatan Bulan Ini</p>
              <h4 class="fw-bold">12</h4>
            </div>
            <div class="bg-purple text-white p-3 rounded-3" style="background:#8b5cf6;">
              <i class="bi bi-calendar-event h4"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card stat-card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <p class="text-muted mb-1">Peserta Terdaftar</p>
              <h4 class="fw-bold">1,247</h4>
            </div>
            <div class="bg-warning text-white p-3 rounded-3">
              <i class="bi bi-activity h4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Aksi cepat + Aktivitas terbaru -->
    <div class="row g-3 mb-4">
      <div class="col-md-6">
        <div class="card p-3 h-100">
          <h6 class="fw-bold">Aksi Cepat</h6>
          <p class="text-muted">Kelola data dengan mudah</p>
          <div class="list-group quick-action">
            <a href="#" class="list-group-item d-flex align-items-center">
              <i class="bi bi-people-fill text-danger me-2"></i>
              Kelola Anggota <span class="ms-auto text-muted small">Tambah, edit, hapus</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
              <i class="bi bi-calendar-date text-danger me-2"></i>
              Kelola Kegiatan <span class="ms-auto text-muted small">Atur program</span>
            </a>
            <a href="#" class="list-group-item d-flex align-items-center">
              <i class="bi bi-gear-fill text-danger me-2"></i>
              Pengaturan <span class="ms-auto text-muted small">Konfigurasi sistem</span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-3 h-100">
          <h6 class="fw-bold">Aktivitas Terbaru</h6>
          <p class="text-muted">Log aktivitas sistem</p>
          <div class="activity-item">
            <strong>Anggota baru ditambahkan</strong><br>
            <small>oleh Siti Nurhaliza - 2 jam lalu</small>
          </div>
          <div class="activity-item">
            <strong>Kegiatan webinar dibuat</strong><br>
            <small>oleh Admin - 4 jam lalu</small>
          </div>
          <div class="activity-item">
            <strong>Anggota dinonaktifkan</strong><br>
            <small>oleh Budi Santoso - 2 hari lalu</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Ringkasan Sistem -->
    <div class="card p-3 mb-4">
      <h6 class="fw-bold mb-3"><i class="bi bi-bar-chart me-1"></i> Ringkasan Sistem</h6>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="summary-card bg-light">
            <h4 class="text-primary">142</h4>
            <p class="text-muted">Anggota Aktif <br><small>dari 156 total anggota</small></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="summary-card bg-light">
            <h4 class="text-success">28</h4>
            <p class="text-muted">Kegiatan Selesai <br><small>bulan ini</small></p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
