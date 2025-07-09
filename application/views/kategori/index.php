<div class="card shadow-sm p-4 mb-4">
  <h3 class="mb-4"><?= $title ?></h3>

  <?php if ($this->session->userdata('role') === 'Admin'): ?>
    <div class="mb-3 text-end">
      <a href="<?= site_url('kategori/tambah') ?>" class="btn btn-primary">
        Tambah Data Kategori
      </a>
    </div>
  <?php endif ?>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Nama Kategori</th>
          <?php if ($this->session->userdata('role') === 'Admin'): ?>
            <th>Aksi</th>
          <?php endif ?>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($kategori as $k): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $k->nama ?></td>
          <?php if ($this->session->userdata('role') === 'Admin'): ?>
          <td>
            <a href="<?= site_url('kategori/edit/'.$k->id) ?>" class="btn btn-sm btn-warning me-1">Edit Data</a>
            <a href="<?= site_url('kategori/hapus/'.$k->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus Data</a>
          </td>
          <?php endif ?>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
