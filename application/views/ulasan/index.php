<div class="card shadow-sm p-4 mb-4">
  <h3 class="mb-4"><?= $title ?></h3>

  <div class="mb-4">
    <h5 class="fw-bold"><?= $buku->judul ?></h5>
    <p class="text-muted mb-0">
      Penulis: <?= $buku->penulis ?> | Penerbit: <?= $buku->penerbit ?>
    </p>
  </div>

  <?php if ($this->session->userdata('role') === 'Anggota'): ?>
    <div class="mb-3 text-end">
      <a href="<?= site_url('ulasan/form/'.$buku->id) ?>" class="btn btn-success">
        Tulis Ulasan Anda 
      </a>
    </div>
  <?php endif; ?>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
      <?= $this->session->flashdata('success'); ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($ulasan)): ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-primary">
          <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($ulasan as $u): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($u->nama) ?></td>
              <td><?= htmlspecialchars($u->nim) ?></td>
              <td><?= htmlspecialchars($u->jurusan) ?></td>
              <td><?= str_repeat('⭐', $u->rating) ?> (<?= $u->rating ?>)</td>
              <td><?= nl2br(htmlspecialchars($u->komentar)) ?></td>
              <td><?= date('d-m-Y H:i', strtotime($u->tanggal)) ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-warning text-center fw-semibold">
      ! Belum ada ulasan untuk buku ini.
    </div>
  <?php endif; ?>

  <div class="mt-3">
    <a href="<?= site_url('buku') ?>" class="btn btn-secondary">
      ← Kembali ke Daftar Buku
    </a>
  </div>
</div>
