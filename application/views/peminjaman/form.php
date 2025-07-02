<div class="card shadow-sm p-4 mb-4">
  <h3 class="mb-4"><?= $title ?></h3>

  <form method="post">
    <div class="mb-3">
      <label class="form-label">📚 Buku</label>
      <select name="id_buku" class="form-select" required>
        <option value="">-- Pilih Buku --</option>
        <?php foreach ($buku as $b): ?>
          <option value="<?= $b->id ?>" <?= isset($peminjaman) && $peminjaman->id_buku == $b->id ? 'selected' : '' ?>>
            <?= $b->judul ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">👤 Anggota</label>
      <select name="id_anggota" class="form-select" required>
        <option value="">-- Pilih Anggota --</option>
        <?php foreach ($anggota as $a): ?>
          <option value="<?= $a->id ?>" <?= isset($peminjaman) && $peminjaman->id_anggota == $a->id ? 'selected' : '' ?>>
            <?= $a->nama ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">📅 Tanggal Pinjam</label>
      <input type="date" name="tanggal_pinjam" class="form-control" value="<?= isset($peminjaman) ? $peminjaman->tanggal_pinjam : '' ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">📅 Tanggal Kembali</label>
      <input type="date" name="tanggal_kembali" class="form-control" value="<?= isset($peminjaman) ? $peminjaman->tanggal_kembali : '' ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">📄 Status</label>
      <select name="status" class="form-select" required>
        <option value="">-- Pilih Status --</option>
        <option value="Dipinjam" <?= isset($peminjaman) && $peminjaman->status == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
        <option value="Dikembalikan" <?= isset($peminjaman) && $peminjaman->status == 'Dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
      </select>
    </div>

    <div class="d-flex justify-content-between">
      <a href="<?= site_url('peminjaman') ?>" class="btn btn-secondary">⬅️ Kembali</a>
      <button type="submit" class="btn btn-success">💾 Simpan</button>
    </div>
  </form>
</div>
