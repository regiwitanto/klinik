<div class="container">

  <h3 class="mt-3">Ubah Data Dokter</h3>

  <div class="row mt-3">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          Form Ubah Data Dokter
        </div>
        <div class="card-body">
          <form action="" method="post">
            <input type="hidden" name="dokter_id" value="<?= $dokter['dokter_id']; ?>">
            <div class="form-group">
              <label for="dokter_nama">Nama Dokter</label>
              <input type="text" class="form-control" id="dokter_nama" name="dokter_nama" value="<?= $dokter['dokter_nama'] ?>">
              <small class="form-text text-danger"><?= form_error('dokter_nama'); ?></small>
            </div>
            <a href="<?= base_url() ?>dokter" class="btn btn-light">Kembali</a>
            <button type="submit" name="ubah" class="btn btn-success">Kirim</button>
          </form>
        </div>
      </div>

    </div>
  </div>

</div>