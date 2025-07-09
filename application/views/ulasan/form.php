<div class="card shadow-sm p-4 mb-4">
  <h3 class="mb-4"><?= $title ?></h3>

  <form method="post" action="<?= site_url('ulasan/simpan') ?>">
    <input type="hidden" name="id_buku" value="<?= $buku->id ?>">

    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">NIM</label>
      <input type="text" name="nim" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Jurusan</label>
      <input type="text" name="jurusan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Rating (1-5)</label>
      <select name="rating" class="form-select" required>
        <option value="">-- Pilih Rating --</option>
        <option value="1">⭐ 1</option>
        <option value="2">⭐ 2</option>
        <option value="3">⭐ 3</option>
        <option value="4">⭐ 4</option>
        <option value="5">⭐ 5</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Komentar</label>
      <textarea name="komentar" class="form-control" rows="3" required></textarea>
    </div>

    <div class="d-flex justify-content-between">
      <a href="<?= site_url('ulasan/index/'.$buku->id) ?>" class="btn btn-secondary">
        ← Kembali
      </a>
      <button type="submit" class="btn btn-success">Simpan Ulasan</button>
    </div>
  </form>
</div>
