<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $judul;?></title>
  <style>
    #table1,
    #table2 {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      font-size: 13px
    }

    #table1 th,
    #table2 th {
      padding: 8px;
      text-align: left;
      background-color: #4AA96C;
      color: white;
    }

    #table1 td {
      padding: 8px
    }

    #table2 td {
      padding: 8px
    }

    #p {
      background-color: #9FE6A0;
    }
  </style>
</head>

<body>
  <img src="<?= base_url() ?>/assets/img/logo.jpg" alt="" width="100%">

  <table id="table1">
    <tr>
      <th>Dokter Penanggung Jawab : <?= $pasien['dokter_nama'] ?></th>
    </tr>
  </table>

  <table id="table1">
    <tr>
      <td>Nama</td>
      <td>: <?= $pasien['pasien_nama'] ?></td>
      <td valign="top">Tgl Lahir / Umur</td>
      <td>: <?= date_indo($pasien['tanggal_lahir']); ?> / <?= hitung_umur($pasien['tanggal_lahir']); ?></td>
    </tr>
    <tr>
      <td>No Lab / tgl</td>
      <td>: <?= $pasien['no_lab']; ?> / <?= date_indo($pasien['tanggal']); ?></td>
      <td>Status Hasil</td>
      <td>: <?= $pasien['status_hasil'] ? 'DIAMBIL' : 'BELUM DIAMBIL'; ?></td>
    </tr>
    <tr>
      <td>Tlp / HP</td>
      <td>: <?= $pasien['no_telp']; ?> / <?= $pasien['no_hp']; ?></td>
    </tr>
    <tr>
      <td>Pengirim</td>
      <td>: <?= $pasien['pengirim']; ?></td>
    </tr>
    <tr>
      <td valign="top">Alamat</td>
      <td>: <?= $pasien['alamat']; ?></td>
    </tr>
  </table>

  <table id="table2">
    <thead>
      <tr>
        <th>PEMERIKSAAN</th>
        <th>HASIL</th>
        <th>NILAI RUJUKAN</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1. <?= $pasien['jenis']; ?></td>
      </tr>
      <tr id="p">
        <td valign="top"><?= $pasien['nama']; ?></td>
        <td valign="top"><strong><?= $pasien['hasil']; ?></strong></td>
        <td valign="top"><?= $pasien['nilai_rujukan']; ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</body>

</html>