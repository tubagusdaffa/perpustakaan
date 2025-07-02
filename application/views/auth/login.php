<!DOCTYPE html>
<html>
<head>
  <title>Login Perpustakaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-card {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .login-header {
      font-weight: bold;
      color: #343a40;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }
    .login-link {
      text-align: center;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4 login-card">
      <h3 class="text-center mb-4 login-header">Login Perpustakaan</h3>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
      <?php endif ?>

      <form method="post" action="<?= site_url('auth/login') ?>">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>

      <div class="login-link">
        <a href="<?= site_url('auth/register') ?>">Belum punya akun? <strong>Register</strong></a>
      </div>
    </div>
  </div>
</body>
</html>
