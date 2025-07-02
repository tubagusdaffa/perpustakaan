<!DOCTYPE html>
<html>
<head>
  <title><?= isset($title) ? $title : 'Perpustakaan' ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

</head>
<body class="bg-light">

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?= site_url('dashboard') ?>">📚 Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <?php if ($this->session->userdata('logged_in')): ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('dashboard') ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('buku') ?>">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('anggota') ?>">Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('peminjaman') ?>">Peminjaman</a>
          </li>
          
          <?php if ($this->session->userdata('role') == 'Admin') : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('kategori') ?>">Kategori</a>
            </li>
          <?php endif; ?>
        </ul>

        <div class="d-flex align-items-center">
          <span class="text-white me-3">
            Hai, <strong><?= $this->session->userdata('username') ?></strong> (<?= $this->session->userdata('role') ?>)
          </span>
          <a href="<?= site_url('auth/logout') ?>" class="btn btn-light btn-sm">Logout</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>

<!-- ✅ Container utama -->
<div class="container mb-5">
