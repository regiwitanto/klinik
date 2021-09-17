<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $judul; ?></title>
  <style>
    body {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    p {
      margin: 0;
      padding: 3px;
    }

    .afterHeader {
      background-color: #C4EFDB;
      width: 100%;
      font-size: 11.5px
    }

    .tableProfile {
      border-collapse: collapse;
      width: 100%;
      font-size: 12px
    }

    .tableProfile th {
      padding: 8px;
      text-align: left;
      color: white;
    }

    .tableProfile td {
      padding: 2.7px
    }

    .tableResult {
      width: 100%;
      border-spacing: 0;
      table-layout: fixed;
    }

    .tableResult td:first-letter {
      text-transform: capitalize;
    }

    .tableResultHead {
      background-color: #70C19B;
      text-transform: uppercase;
    }

    thead.tableResultHead tr th {
      border-collapse: collapse;
      border-bottom: 2.5px solid #322A28;
      font-size: 12px
    }

    tbody.tableResultBody tr td {
      vertical-align: top;
      border-bottom: 2px solid #B1BEB8;
      border-collapse: collapse;
      padding: 10px;
      font-size: 12px
    }

    tbody.tableResultBody tr:last-child td {
      vertical-align: top;
      border-bottom: none;
      border-collapse: collapse;
      padding: 10px;
    }

    tbody.tableResultBody tr:nth-child(even) {
      background: #C0E5D4
    }

    tbody.tableResultBody tr:nth-child(odd) {
      background: #fff
    }

    .gridContainerFooter {
      position: absolute;
      bottom: 0;
      text-align: right;
      font-size: 12px
    }
  </style>
</head>

<body>
  <header>
    <img src="<?= base_url() ?>/assets/img/logo.jpg" alt="" width="100%">
  </header>
  <div class="afterHeader">
    <p>Dokter Penanggung Jawab : <?= $pasien['dokter_nama'] ?></p>
  </div>
  <table class="tableProfile">
    <tr>
      <td>Nama</td>
      <td>: <?= $pasien['pasien_nama'] ?>(<?= $pasien['jenis_kelamin'] ? 'L' : 'P'; ?>)</td>
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
      <td>: <?= $pasien['no_telp']; ?> /<?= $pasien['no_hp']; ?></td>
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

  <table class="tableResult">
    <thead class="tableResultHead">
      <tr>
        <th>PEMERIKSAAN</th>
        <th>HASIL</th>
        <th>NILAI RUJUKAN</th>
      </tr>
    </thead>
    <tbody class="tableResultBody">
      <tr>
        <td><?= $pasien['jenis']; ?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><?= $pasien['nama']; ?></td>
        <td><strong><?= $pasien['hasil']; ?></strong></td>
        <td><?= $pasien['nilai_rujukan']; ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><?= $nilai_rujukan_2 ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>

  <div class="gridContainerFooter">
    <p><?= 'Bandung, ' . date_indo(date('Y-m-d')); ?></p>
    <p><?= 'Pemeriksa : ' . $name ?></p>
</body>

</html>