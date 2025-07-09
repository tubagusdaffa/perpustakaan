<h1 class="text-center mb-4 fw-bold text-primary"><?= $title ?></h1>

<?php if ($this->session->userdata('role') === 'Anggota'): ?>
  <div class="alert alert-success text-center p-4 fs-5 shadow-sm">
    <p class="mb-2 fw-bold fs-4">
      Selamat datang di Sistem Perpustakaan, <?= $this->session->userdata('username') ?>!
    </p>
    <p class="mb-0 fw-normal">
      Dibawah ini adalah data statistik dari perpustakaan kami,jika ada pertanyaan bisa tanyakan admin.
    </p>
  </div>
<?php endif; ?>

<div class="row justify-content-center text-center mt-5">
  <div class="col-md-3 mb-4">
    <div class="border-bottom border-4 border-primary pb-3">
      <h5 class="fw-bold text-primary">Total Buku</h5>
      <p class="display-6 fw-bold text-dark"><?= $total_buku ?></p>
    </div>
  </div>

  <div class="col-md-3 mb-4">
    <div class="border-bottom border-4 border-success pb-3">
      <h5 class="fw-bold text-success">Total Anggota</h5>
      <p class="display-6 fw-bold text-dark"><?= $total_anggota ?></p>
    </div>
  </div>

  <div class="col-md-3 mb-4">
    <div class="border-bottom border-4 border-warning pb-3">
      <h5 class="fw-bold text-warning">Total Peminjaman</h5>
         <p class="display-6 fw-bold text-dark"><?= $total_peminjaman ?></p>
    </div>
  </div>
</div>
