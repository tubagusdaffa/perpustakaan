<h3><?= $title ?></h3>

<form action="<?= site_url('import/upload') ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="file_excel" class="form-label">Pilih File Excel (.xlsx)</label>
    <input type="file" name="file_excel" class="form-control" required accept=".xlsx">
  </div>
  <button type="submit" class="btn btn-success">Upload</button>
</form>
