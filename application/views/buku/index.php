<div class="card shadow-sm p-4 mb-4">
  <h3 class="mb-4"><?= $title ?></h3>

  <!-- ✅ Form Pencarian Buku (hanya untuk Anggota) -->
  <?php if ($this->session->userdata('role') === 'Anggota'): ?>
    <div class="row mb-4 justify-content-center">
      <div class="col-md-8">
        <form action="<?= site_url('buku') ?>" method="get" class="input-group">
          <input 
            type="text" 
            name="keyword" 
            class="form-control" 
            placeholder="🔍 Cari berdasarkan judul, penulis, atau penerbit..." 
            value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>"
          >
          <button type="submit" class="btn btn-primary">
            Cari
          </button>
        </form>
      </div>
    </div>
  <?php endif; ?>

  <!-- ✅ Alert Anggota (hanya muncul kalau tidak sedang cari buku) -->
  <?php if ($this->session->userdata('role') === 'Anggota' && (!isset($_GET['keyword']) || $_GET['keyword'] === '')): ?>
    <div class="alert alert-info text-center fw-semibold fs-6">
      Berikut adalah data buku yang tersedia di perpustakaan kami.<br>
      📢 <span class="text-primary">Jika Anda ingin meminjam buku, silakan hubungi bagian admin.</span>
    </div>
  <?php endif; ?>

  <!-- ✅ Jika sedang melakukan pencarian -->
  <?php if (isset($_GET['keyword']) && $_GET['keyword'] !== ''): ?>
    <?php if (empty($buku)): ?>
      <div class="alert alert-danger text-center fw-semibold fs-6">
        ⚠️ Data buku yang Anda cari tidak tersedia.
      </div>
    <?php endif; ?>
    <div class="mb-3 text-start">
      <a href="<?= site_url('buku') ?>" class="btn btn-secondary btn-sm">
        ← Kembali ke Semua Data Buku
      </a>
    </div>
  <?php endif; ?>

  <!-- ✅ Tombol Tambah Buku (Admin saja) -->
  <?php if ($this->session->userdata('role') === 'Admin'): ?>
    <div class="mb-3 text-end">
      <a href="<?= site_url('buku/tambah') ?>" class="btn btn-primary">
        ➕ Tambah Buku
      </a>
    </div>
  <?php endif; ?>

  <!-- ✅ Tampilkan tabel hanya kalau data buku tidak kosong -->
  <?php if (!empty($buku)): ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Kategori</th>
            <th>Ulasan</th>
            <?php if ($this->session->userdata('role') === 'Admin'): ?>
              <th>Aksi</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($buku as $b): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $b->judul ?></td>
              <td><?= $b->penulis ?></td>
              <td><?= $b->penerbit ?></td>
              <td><?= $b->tahun_terbit ?></td>
              <td><?= $b->nama_kategori ?></td>
              <td>
                <a href="<?= site_url('ulasan/index/'.$b->id) ?>" class="btn btn-sm btn-info">⭐ Lihat</a>
              </td>
              <?php if ($this->session->userdata('role') === 'Admin'): ?>
                <td>
                  <a href="<?= site_url('buku/edit/'.$b->id) ?>" class="btn btn-sm btn-warning me-1">✏️ Edit</a>
                  <a href="<?= site_url('buku/hapus/'.$b->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">🗑️ Hapus</a>
                </td>
              <?php endif ?>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
