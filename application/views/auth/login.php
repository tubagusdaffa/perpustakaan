<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Perpustakaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="64x64" href="<?= base_url('assets/images/favicon-64.png') ?>">

  <style>
    body {
      margin: 0;
      background: linear-gradient(135deg, #4f46e5, #7c3aed);
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 3rem 2.5rem;
      box-shadow: 0 8px 32px rgba(0,0,0,0.3);
      max-width: 400px;
      width: 90%;
      color: #fff;
      border: 1px solid rgba(255,255,255,0.25);

      /* ✅ Tambah background logo ke dalam kotak */
      background-image: url('<?= base_url("assets/images/logo.png") ?>');
      background-repeat: no-repeat;
      background-position: center;
      background-size: 200px;
      background-blend-mode: lighten;
    }

    .login-header {
      font-weight: 700;
      font-size: 2rem;
      text-align: center;
      margin-bottom: 2rem;
      color: #ffffff;
      text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .form-label {
      color: #e0e0e0;
      font-weight: 600;
    }

    .form-control {
      background: rgba(255,255,255,0.2);
      border: none;
      color: #fff;
      border-radius: 10px;
    }

    .form-control::placeholder {
      color: rgba(255,255,255,0.6);
    }

    .form-control:focus {
      background: rgba(255,255,255,0.25);
      border: none;
      box-shadow: 0 0 0 0.25rem rgba(124,58,237,0.4);
      color: #fff;
    }

    .btn-primary {
      background: linear-gradient(90deg, #4f46e5, #7c3aed);
      border: none;
      font-weight: 600;
      padding: 0.75rem;
      border-radius: 12px;
    }

    .btn-primary:hover {
      background: #3730a3;
    }

    .login-link {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.95rem;
      color: #e0e0e0;
    }

    .login-link a {
      color: #ffffff;
      font-weight: 600;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    .alert {
      background: rgba(255, 0, 0, 0.2);
      border: none;
      color: #fff;
      font-weight: 500;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h2 class="login-header">Login Perpustakaan</h2>

    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert mt-3">
        <?= $this->session->flashdata('error') ?>
      </div>
    <?php endif ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username anda..." required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password anda..." required>
      </div>

      <button type="submit" class="btn btn-primary w-100 mt-3">
        Login
      </button>
    </form>

    <div class="login-link mt-3">
      Belum punya akun?
      <a href="<?= site_url('auth/register') ?>">Daftar Disini</a>
    </div>
  </div>

</body>
</html>
