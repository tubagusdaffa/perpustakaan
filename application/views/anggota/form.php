<div class="card shadow-sm border-0 mb-4">
  <div class="card-body">
    <h3 class="mb-4"><?= $title ?></h3>

    <form method="post">
      <div class="mb-3">
        <label class="form-label fw-semibold">Nama</label>
        <input type="text" name="nama" class="form-control" 
               value="<?= isset($anggota) ? $anggota->nama : '' ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">NIM</label>
        <input type="text" name="nim" class="form-control"
               value="<?= isset($anggota) ? $anggota->nim : '' ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Jurusan</label>
        <input type="text" name="jurusan" class="form-control" 
               value="<?= isset($anggota) ? $anggota->jurusan : '' ?>">
      </div>

      <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-success">
          Simpan Data
        </button>
        <a href="<?= site_url('anggota') ?>" class="btn btn-secondary">
          Kembali
        </a>
      </div>
    </form>
  </div>
</div>
