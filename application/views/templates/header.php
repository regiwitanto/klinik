<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!-- gijgo -->
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title><?php echo $judul ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <!-- <a class="navbar-brand" href="<?= base_url(); ?>">Klinik <strong>MITRA MULYA</strong></a> -->
      <img src="<?= base_url() ?>/assets/img/logo.jpeg" alt="" width="15%" style="margin-right: 15px;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link btn btn-light" href="<?= base_url(); ?>pasien"><strong>Data Pasien</strong></a>
        </div>
        <div class="navbar-nav">
          <a class="nav-item nav-link btn btn-light" href="<?= base_url(); ?>pasien/tambah"><strong>Tambah Data Pasien</strong></a>
        </div>
        <div class="navbar-nav" style="margin-left: auto;">
          <a class="nav-item nav-link btn btn-light" href="<?= base_url(); ?>auth/logout" onclick="return confirm('Apakah anda yakin?')"><strong>Logout</strong></a>
        </div>
      </div>
    </div>
  </nav>