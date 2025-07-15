<div class="card shadow-sm p-4 mb-4">
  <h3 class="mb-4"><?= $title ?></h3>

  <?php if ($this->session->userdata('role') === 'Anggota'): ?>
    <div class="alert alert-info text-center fw-semibold fs-6">
      Berikut adalah daftar peminjam buku di perpustakaan kami.<br>
       <span class="text-primary">Jika ingin meminjam buku silahkan hubungi bagian admin.</span>
    </div>
  <?php endif; ?>

  <?php if ($this->session->userdata('role') === 'Admin'): ?>
    <div class="mb-3 text-end">
      <a href="<?= site_url('peminjaman/tambah') ?>" class="btn btn-primary">
        Tambah Data Peminjaman
      </a>
    </div>
  <?php endif ?>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Nama Anggota</th>
          <th>Tgl Pinjam</th>
          <th>Tgl Kembali</th>
          <?php if ($this->session->userdata('role') === 'Admin'): ?>
            <th>Status Peminjaman</th>
            <th>Aksi</th>
          <?php endif ?>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($peminjaman as $p): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $p->judul ?></td>
          <td><?= $p->nama ?></td>
          <td><?= $p->tanggal_pinjam ?></td>
          <td><?= $p->tanggal_kembali ?></td>
          <?php if ($this->session->userdata('role') === 'Admin'): ?>
            <td>
              <?= ($p->status == 'Dikembalikan') ? '<span class="badge bg-success">Dikembalikan</span>' : '<span class="badge bg-warning text-dark">Dipinjam</span>' ?>
            </td>
            <td>
              <a href="<?= site_url('peminjaman/edit/'.$p->id) ?>" class="btn btn-sm btn-warning me-1">Edit</a>
              <a href="<?= site_url('peminjaman/hapus/'.$p->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
          <?php endif ?>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
