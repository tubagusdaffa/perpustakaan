<h3 class="mb-4 text-center"><?= $title ?></h3>

<?php if ($this->session->userdata('role') === 'Anggota'): ?>
  <!-- ✅ Pesan Selamat Datang khusus Anggota -->
<div class="alert alert-success text-center fw-bold fs-5">
    Selamat datang di website Perpustakaan, <?= $this->session->userdata('username') ?>!<br>
    <span class="fw-normal">
      Terima kasih telah bergabung. Di bawah ini adalah statistik jumlah data yang tersedia dalam sistem kami. 
      Jika Anda ingin meminjam buku atau memiliki pertanyaan lainnya, silakan hubungi bagian admin.
    </span>
  </div>

  <!-- ✅ Tampilkan statistik juga (jika mau) -->
  <div class="row g-4 mt-4">
    <div class="col-md-4">
      <div class="card shadow-sm border-0 text-white bg-primary h-100">
        <div class="card-body text-center">
          <h5 class="card-title">📚 Total Buku</h5>
          <p class="display-6 fw-bold"><?= $total_buku ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0 text-white bg-success h-100">
        <div class="card-body text-center">
          <h5 class="card-title">👤 Total Anggota</h5>
          <p class="display-6 fw-bold"><?= $total_anggota ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0 text-white bg-warning h-100">
        <div class="card-body text-center">
          <h5 class="card-title">📄 Total Peminjaman</h5>
          <p class="display-6 fw-bold"><?= $total_peminjaman ?></p>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>
  <!-- ✅ Tampil penuh untuk Admin -->
  <div class="row g-4 mb-4">
    <div class="col-md-4">
      <div class="card shadow-sm border-0 text-white bg-primary h-100">
        <div class="card-body text-center">
          <h5 class="card-title">📚 Total Buku</h5>
          <p class="display-6 fw-bold"><?= $total_buku ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0 text-white bg-success h-100">
        <div class="card-body text-center">
          <h5 class="card-title">👤 Total Anggota</h5>
          <p class="display-6 fw-bold"><?= $total_anggota ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0 text-white bg-warning h-100">
        <div class="card-body text-center">
          <h5 class="card-title">📄 Total Peminjaman</h5>
          <p class="display-6 fw-bold"><?= $total_peminjaman ?></p>
        </div>
      </div>
    </div>
  </div>

  <hr class="my-5">

  <!-- ✅ Tombol Aksi Cepat -->
  <h4 class="mb-3">⚡ Aksi Cepat</h4>
  <div class="row g-3">
    <div class="col-md-4">
      <a href="<?= site_url('anggota') ?>" class="btn btn-outline-primary btn-lg w-100">
        👥 Kelola Anggota
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?= site_url('peminjaman') ?>" class="btn btn-outline-warning btn-lg w-100">
        📄 Kelola Peminjaman
      </a>
    </div>
    <div class="col-md-4">
      <a href="<?= site_url('buku') ?>" class="btn btn-outline-success btn-lg w-100">
        📚 Kelola Buku
      </a>
    </div>
  </div>
<?php endif; ?>
