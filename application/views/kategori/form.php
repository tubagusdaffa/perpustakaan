<div class="card shadow-sm p-4 mb-4">
  <h3 class="mb-4"><?= $title ?></h3>

  <form method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Kategori</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($kategori) ? $kategori->nama : '' ?>" required>
    </div>

    <div class="d-flex justify-content-between">
      <a href="<?= site_url('kategori') ?>" class="btn btn-secondary">
        Kembali
      </a>
      <button type="submit" class="btn btn-success">
        Simpan Data
      </button>
    </div>
  </form>
</div>
