<div class="container">

  <h3 class="mt-3">Ubah Data Pasien</h3>

  <div class="row mt-3">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          Form Ubah Data Pasien
        </div>
        <div class="card-body">
          <form action="" method="post">
            <input type="hidden" name="pasien_id" value="<?= $pasien['pasien_id']; ?>">
            <div class="form-group">
              <label for="pasien_nama">Nama Pasien</label>
              <input type="text" class="form-control" id="pasien_nama" name="pasien_nama"
                value="<?= $pasien['pasien_nama'] ?>">
              <small class="form-text text-danger"><?= form_error('pasien_nama'); ?></small>
            </div>
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value=1
                  <?= ($pasien['jenis_kelamin'] == 1 ? ' checked' : ''); ?>>
                <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin0" value=0
                  <?= ($pasien['jenis_kelamin'] == 0 ? ' checked' : ''); ?>>
                <label class="form-check-label" for="jenis_kelamin0">Perempuan</label>
              </div>
            </div>
            <div class="form-group">
              <label for="no_lab">Nomor Lab</label>
              <input type="text" class="form-control" id="no_lab" name="no_lab" value="<?= $pasien['no_lab'] ?>">
              <small class="form-text text-danger"><?= form_error('no_lab'); ?></small>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $pasien['tanggal'] ?>">
              <script>
                $('#tanggal').datepicker({
                  uiLibrary: 'bootstrap4',
                  format: 'yyyy-mm-dd',
                  autoclose: true,
                  todayHighlight: true,
                });
              </script>
              <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
            </div>
            <div class="form-group">
              <label for="no_telp">Nomor Telepon</label>
              <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $pasien['no_telp'] ?>">
              <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
            </div>
            <div class="form-group">
              <label for="no_hp">Nomor HP</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $pasien['no_hp'] ?>">
              <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
            </div>
            <div class="form-group">
              <label for="pengirim">Nama Pengirim</label>
              <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $pasien['pengirim'] ?>">
              <small class="form-text text-danger"><?= form_error('pengirim'); ?></small>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $pasien['alamat'] ?></textarea>
              <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                value="<?= $pasien['tanggal_lahir'] ?>">
              <script>
                $('#tanggal_lahir').datepicker({
                  uiLibrary: 'bootstrap4',
                  format: 'yyyy-mm-dd',
                  autoclose: true,
                  todayHighlight: true,
                });
              </script>
              <small class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></small>
            </div>
            <label for="status_hasil">Status Hasil</label>
            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_hasil" id="status_hasil1" value=1
                  <?= ($pasien['status_hasil'] == 1 ? ' checked' : ''); ?>>
                <label class="form-check-label" for="status_hasil1">DIAMBIL</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_hasil" id="status_hasil0" value=0
                  <?= ($pasien['status_hasil'] == 0 ? ' checked' : ''); ?>>
                <label class="form-check-label" for="status_hasil0">BELUM DIAMBIL</label>
              </div>
            </div>
            <div class="form-group">
              <label for="dokter_id">Dokter Penanggung Jawab</label>
              <select class="form-control" id="dokter_id" name="dokter_id">
                <?php foreach($dokter as $d){ ?>
                <?php if( $d['dokter_id'] == $pasien['dokter_id'] ) : ?>
                <option value="<?= $d['dokter_id']; ?>" selected><?= $d['dokter_nama']; ?></option>
                <?php else : ?>
                <option value="<?= $d['dokter_id']; ?>"><?= $d['dokter_nama']; ?></option>
                <?php endif; ?>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="pemeriksaan_id">Hasil Pemeriksaan</label>
              <select class="form-control" id="pemeriksaan_id" name="pemeriksaan_id">
                <?php foreach($pemeriksaan as $p){ ?>
                <?php if( $p['pemeriksaan_id'] == $pasien['pemeriksaan_id'] ) : ?>
                <option value="<?= $p['pemeriksaan_id']; ?>" selected><?= $p['jenis']; ?>, <?= $p['nama']; ?>,
                  <?= $p['hasil']; ?></option>
                <?php else : ?>
                <option value="<?= $p['pemeriksaan_id']; ?>"><?= $p['jenis']; ?>, <?= $p['nama']; ?>,
                  <?= $p['hasil']; ?></option>
                <?php endif; ?>
                <?php } ?>
              </select>
            </div>
            <a href="<?= base_url() ?>pasien" class="btn btn-light">Kembali</a>
            <button type="submit" name="ubah" class="btn btn-primary">Kirim</button>
          </form>
        </div>
      </div>

    </div>
  </div>

</div>