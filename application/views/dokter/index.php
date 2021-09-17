<div class="container">

  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
          <?php unset($_SESSION['flash']); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <h3 class="mt-3">Data Dokter</h3>

  <div class="row mt-3">
    <div class="col-md-6">
      <form action="<?= base_url('dokter') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukkan pencarian . ." name="keyword" autocomplete="off" autofocus>
          <div class="input-group-append">
            <input class="btn btn-primary" type="submit" name="submit">
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class=" row">
    <div class="col-md">

      <h5>Jumlah data : <?= $total_rows ?></h5>

      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($dokter)) : ?>
            <tr>
              <td colspan="4">
                <div class="alert alert-danger" role="alert">
                  Data tidak ditemukan.
                </div>
              </td>
            </tr>
          <?php endif; ?>
          <?php foreach ($dokter as $p) : ?>
            <tr>
              <th>
                <?= ++$start ?>
              </th>
              <td><?= $p['dokter_nama'] ?></td>
              <td>
                <!-- <a href="<?= base_url(); ?>dokter/detail/<?= $p['dokter_id'] ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-search-plus"></i>
                </a> -->
                <a href="<?= base_url(); ?>dokter/ubah/<?= $p['dokter_id'] ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i>
                </a>
                <a href="<?= base_url(); ?>dokter/hapus/<?= $p['dokter_id'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <?= $this->pagination->create_links(); ?>
    </div>
  </div>

</div>