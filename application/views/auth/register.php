<!DOCTYPE html>
<html>
<head>
  <title>Register Perpustakaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .register-card {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .register-header {
      font-weight: bold;
      color: #343a40;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #198754;
    }
    .register-link {
      text-align: center;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4 register-card">
      <h3 class="text-center mb-4 register-header">Register Perpustakaan</h3>

      <form method="post" action="<?= site_url('auth/register') ?>">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="role" class="form-label">Pilih Role</label>
          <select name="role_id" id="role_id" class="form-select" required>
          <option value="">-- Pilih Role --</option>
          <option value="1">Admin</option>
          <option value="3">Anggota</option>
        </select>

        </div>

        <button type="submit" class="btn btn-success w-100">Register</button>
      </form>

      <div class="register-link">
        <a href="<?= site_url('auth/login') ?>">Sudah punya akun? <strong>Login</strong></a>
      </div>
    </div>
  </div>
</body>
</html>
