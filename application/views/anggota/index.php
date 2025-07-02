<div class="card shadow-sm p-4 mb-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><?= $title ?></h3>
    
    <?php if ($this->session->userdata('role') === 'Admin'): ?>
      <a href="<?= site_url('anggota/tambah') ?>" class="btn btn-primary">
        ➕ Tambah Anggota
      </a>
    <?php endif ?>
  </div>

  <?php if ($this->session->userdata('role') === 'Anggota'): ?>
    <div class="alert alert-info text-center fw-semibold fs-6">
      Berikut adalah data anggota yang terdaftar di perpustakaan kami.<br>
      📢 <span class="text-primary">Jika ingin daftar menjadi anggota silahkan hubungi bagian admin.</span>
    </div>
  <?php endif; ?>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIM</th>
          <th>Jurusan</th>
          <?php if ($this->session->userdata('role') === 'Admin'): ?>
            <th>Aksi</th>
          <?php endif ?>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($anggota as $a): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $a->nama ?></td>
          <td><?= $a->nim ?></td>
          <td><?= $a->jurusan ?></td>
          <?php if ($this->session->userdata('role') === 'Admin'): ?>
          <td>
            <a href="<?= site_url('anggota/edit/'.$a->id) ?>" class="btn btn-sm btn-warning me-1">✏️ Edit</a>
            <a href="<?= site_url('anggota/hapus/'.$a->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">🗑️ Hapus</a>
          </td>
          <?php endif ?>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
