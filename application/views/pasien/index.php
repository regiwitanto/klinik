<div class="container">

  <?php if( $this->session->flashdata('flash') ) : ?>
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

  <h3 class="mt-3">Data Pasien</h3>

  <div class="row mt-3">
    <div class="col-md-6">
      <form action="<?= base_url('pasien') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukan pencarian.." name="keyword" autocomplete="off"
            autofocus>
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
            <th>No Lab / Tgl</th>
            <th>Status Hasil</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if( empty($pasien )) : ?>
          <tr>
            <td colspan="4">
              <div class="alert alert-danger" role="alert">
                Data tidak ditemukan.
              </div>
            </td>
          </tr>
          <?php endif; ?>
          <?php foreach( $pasien as $p) : ?>
          <tr>
            <th>
              <?= ++$start ?>
            </th>
            <td><?= $p['pasien_nama'] ?></td>
            <td><?= $p['no_lab'] ?> / <?= date_indo($p['tanggal']) ?></td>
            <td><?= $p['status_hasil'] ? 'DIAMBIL' : 'BELUM DIAMBIL' ?></td>
            <td>
              <a href="<?= base_url(); ?>pasien/detail/<?= $p['pasien_id'] ?>">
                <div class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i
                    class="fa fa-search-plus"></i></div>
              </a>
              <a href="<?= base_url(); ?>pasien/ubah/<?= $p['pasien_id'] ?>">
                <div class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i
                    class="fa fa-edit"></i></div>
              </a>
              <a href="<?= base_url(); ?>pasien/hapus/<?= $p['pasien_id'] ?>"
                onclick="return confirm('Apakah anda yakin?')">
                <div class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i
                    class="fa fa-trash"></i></div>
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