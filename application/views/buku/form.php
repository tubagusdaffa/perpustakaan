<div class="card shadow-sm p-4 mb-4">
  <h3 class="mb-4"><?= $title ?></h3>

  <form method="post">
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= isset($buku) ? $buku->judul : '' ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Penulis</label>
      <input type="text" name="penulis" class="form-control" value="<?= isset($buku) ? $buku->penulis : '' ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Penerbit</label>
      <input type="text" name="penerbit" class="form-control" value="<?= isset($buku) ? $buku->penerbit : '' ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Tahun Terbit</label>
      <input type="number" name="tahun_terbit" class="form-control" value="<?= isset($buku) ? $buku->tahun_terbit : '' ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Kategori</label>
      <select name="id_kategori" class="form-select" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategori as $k): ?>
          <option value="<?= $k->id ?>" <?= isset($buku) && $buku->id_kategori == $k->id ? 'selected' : '' ?>>
            <?= $k->nama ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-success">💾 Simpan</button>
      <a href="<?= site_url('buku') ?>" class="btn btn-secondary">↩️ Kembali</a>
    </div>
  </form>

  <div class="mt-4 text-end">
    <a href="<?= site_url('import') ?>" class="btn btn-outline-primary">
      📥 Import Buku dari Excel
    </a>
  </div>
</div>
