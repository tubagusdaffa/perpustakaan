<!DOCTYPE html>
<html>
<head>
  <title><?= isset($title) ? $title : 'Perpustakaan' ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="icon" type="image/png" sizes="64x64" href="<?= base_url('assets/images/favicon-64.png') ?>">


  <style>
    body {
      background-color: var(--bg-color, #f9fafb);
    }
    .sidebar {
      height: 100vh;
      background: linear-gradient(180deg, #7b2cbf, #5a189a);
      color: white;
      padding-top: 1.5rem;
      position: fixed;
      left: 0;
      top: 0;
      width: 250px;
    }
    .sidebar .nav-link {
      color: rgba(255, 255, 255, 0.85);
      font-weight: 500;
      padding: 10px 20px;
      border-radius: 6px;
      margin-bottom: 5px;
      transition: all 0.2s ease;
    }
    .sidebar .nav-link:hover {
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
    }
    .sidebar .nav-link.active {
      background: rgba(255, 255, 255, 0.3);
      color: #fff;
    }
    .sidebar-brand {
      font-size: 1.5rem;
      font-weight: 700;
      padding: 0 20px;
      margin-bottom: 2rem;
      display: block;
      color: #fff;
      text-decoration: none;
    }
    .content {
      margin-left: 250px;
      padding: 2rem 2rem;
    }
  </style>
</head>
<body>

<?php if ($this->session->userdata('logged_in')): ?>
  <!-- ✅ Sidebar -->
  <div class="sidebar">
    <a href="<?= site_url('dashboard') ?>" class="sidebar-brand">Perpustakaan</a>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= site_url('dashboard') ?>">
          Halaman Utama
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= uri_string() == 'buku' ? 'active' : '' ?>" href="<?= site_url('buku') ?>">
          Buku
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= uri_string() == 'anggota' ? 'active' : '' ?>" href="<?= site_url('anggota') ?>">
          Anggota
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= uri_string() == 'peminjaman' ? 'active' : '' ?>" href="<?= site_url('peminjaman') ?>">
          Peminjaman
        </a>
      </li>
      <?php if ($this->session->userdata('role') == 'Admin') : ?>
        <li class="nav-item">
          <a class="nav-link <?= uri_string() == 'kategori' ? 'active' : '' ?>" href="<?= site_url('kategori') ?>">
            Kategori
          </a>
        </li>
      <?php endif; ?>
    </ul>

    <div class="mt-auto px-3">
      <hr class="border-light opacity-25">
      <div class="d-flex justify-content-between align-items-center">
        <span class="small">
          Hai, <strong><?= $this->session->userdata('username') ?></strong> (<?= $this->session->userdata('role') ?>)
        </span>
      </div>
      <a href="<?= site_url('auth/logout') ?>" class="btn btn-sm btn-light w-100 mt-2">Logout</a>
    </div>
  </div>
<?php endif; ?>

<!-- ✅ Konten Utama -->
<div class="content">
