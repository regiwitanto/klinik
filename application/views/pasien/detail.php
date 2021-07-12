<div class="container">

  <h3 class="mt-3">Detail Data Pasien</h3>

  <div class="row">
    <div class="col-md">

      <table class="table table-striped">
        <tbody>
          <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><?= $pasien['pasien_nama']; ?>(<?= $pasien['jenis_kelamin'] ? 'L' : 'P'; ?>)</td>
          </tr>
          <tr>
            <td>No Lab / Tgl</td>
            <td>:</td>
            <td><?= $pasien['no_lab']; ?> / <?= date_indo($pasien['tanggal']); ?></td>
          </tr>
          <tr>
            <td>Tlp / HP</td>
            <td>:</td>
            <td><?= $pasien['no_telp']; ?> / <?= $pasien['no_hp']; ?></td>
          </tr>
          <tr>
            <td>Pengirim</td>
            <td>:</td>
            <td><?= $pasien['pengirim']; ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $pasien['alamat']; ?></td>
          </tr>
          <tr>
            <td>Tgl Lahir / Umur</td>
            <td>:</td>
            <td><?= date_indo($pasien['tanggal_lahir']); ?> / <?= hitung_umur($pasien['tanggal_lahir']); ?></td>
          </tr>
          <tr>
            <td>Status Hasil</td>
            <td>:</td>
            <td><?= $pasien['status_hasil'] ? 'DIAMBIL' : 'BELUM DIAMBIL'; ?></td>
          </tr>
          <tr>
            <td>Dokter Penanggung Jawab</td>
            <td>:</td>
            <td><?= $pasien['dokter_nama']; ?></td>
          </tr>
          <tr>
            <td>Jenis Pemeriksaan</td>
            <td>:</td>
            <td><?= $pasien['jenis']; ?></td>
          </tr>
          <tr>
            <td>Nama Pemeriksaan</td>
            <td>:</td>
            <td><?= $pasien['nama']; ?></td>
          </tr>
          <tr>
            <td>Hasil Pemeriksaan</td>
            <td>:</td>
            <td><?= $pasien['hasil']; ?></td>
          </tr>
          <tr>
            <td>Nilai Rujukan</td>
            <td>:</td>
            <td><?= $pasien['nilai_rujukan']; ?></td>
          </tr>
        </tbody>
      </table>

      <a href="<?= base_url() ?>pasien" class="btn btn-light">Kembali</a>
      <a href="<?= base_url() ?>pasien/cetak/<?= $pasien['pasien_id'] ?>" class="btn btn-success">Cetak</a>
    </div>
  </div>

</div>