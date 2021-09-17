<div class="container">

  <h3 class="mt-3">Detail Data Dokter</h3>

  <div class="row">
    <div class="col-md">

      <table class="table table-striped">
        <tbody>
          <tr>
            <td>Nama Dokter</td>
            <td>:</td>
            <td><?= $dokter['dokter_nama']; ?></td>
          </tr>
        </tbody>
      </table>

      <a href="<?= base_url() ?>dokter" class="btn btn-light">Kembali</a>
      <!-- <a href="<?= base_url() ?>pasien/cetak/<?= $pasien['pasien_id'] ?>" class="btn btn-success">Cetak</a> -->
      <br><br>
    </div>
  </div>

</div>