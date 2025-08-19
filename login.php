<?php 
session_start();
include "koneksi.php";

if (isset($_SESSION['username'])) {
    header("location:admin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT username FROM user WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $hasil = $stmt->get_result();
    $row = $hasil->fetch_array(MYSQLI_ASSOC);

    if (!empty($row)) {
        $_SESSION['username'] = $row['username'];
        header("location:admin.php");
    } else {
        $error = "Email atau Password salah!";
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login | KKO PAUD Semarang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #fff9f9;
    }
    .login-card {
      max-width: 420px;
      margin: auto;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      background: #fff;
    }
    .logo-box {
      width: 60px;
      height: 60px;
      border-radius: 12px;
      background: #e53935;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: auto;
    }
    .logo-box i {
      font-size: 30px;
      color: #fff;
    }
    a.back-link {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      color: #555;
    }
    a.back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card login-card p-4">
      <div class="text-center">
        <div class="logo-box mb-3">
          <i class="bi bi-book"></i>
        </div>
        <h5 class="fw-bold mb-1">KKO PAUD Semarang</h5>
        <h6 class="fw-semibold">Admin Login</h6>
        <p class="text-muted mb-4">Masuk ke panel administrasi</p>
      </div>

      <?php if (!empty($error)) { ?>
        <div class="alert alert-danger py-2"><?php echo $error; ?></div>
      <?php } ?>

      <h6 class="fw-bold text-center mb-3">Selamat Datang</h6>
      <form method="post" action="">
        <div class="mb-3">
          <label class="form-label fw-semibold">Email Admin</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="username" class="form-control" placeholder="admin@kkopaudsemarang.org" required />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required />
            <button class="input-group-text" type="button" onclick="togglePassword()"><i class="bi bi-eye"></i></button>
          </div>
        </div>
        <div class="d-grid mb-3">
          <button class="btn btn-danger" type="submit">Masuk</button>
        </div>
      </form>

      <div class="text-center">
        <a href="index.php" class="back-link">&larr; Kembali ke Beranda</a>
      </div>
    </div>
  </div>

<script>
function togglePassword() {
  const passwordInput = document.getElementById('password');
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);
}
</script>
</body>
</html>
