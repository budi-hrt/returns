<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Iuran</li>
    <li class="breadcrumb-item">
      Bpjs
    </li>
    <!-- Breadcrumb Menu-->
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12">
          <?= $this->session->flashdata('massage'); ?>
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('suplierupdate'); ?>"></div>
          <div class="alert alert-success" role="alert" style="display:none;">Menu Updated</div>
          <a class="btn btn-success flat btn-sm mb-3" href="<?= base_url('gaji/bpjs/form_bpjs'); ?>">Tambah data Iuran Bpjs</a>
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i>Table Iuran Bpjs
            </div>
            <div class="card-body">
              <table class="table table-responsive-sm table-bordered table-striped table-sm" id="table-suplier">
                <thead>
                  <tr>
                    <th>Aksi</th>
                    <th>Keterangan</th>
                    <th>Priode</th>
                    <th>Total Iuran</th>
                    <th class="text-center">Update by</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($bpjs as $b) : ?>
                    <tr>
                      <td class="text-center">
                        <a class="badge badge-sm badge-success item-edit" href="javascript:;" data="">Edit</a>
                        <a class="badge badge-sm badge-danger item-delete" href="javascript:;">Delete</a>
                      </td>
                      <td><?= $b['kode_bpjs']; ?>-><?= $b['ket_bpjs']; ?></td>
                      <td><?= $b['bulan']; ?>-<?= $b['tahun']; ?></td>
                      <td><?= $b['total_bpjs']; ?></td>
                      <td><?= $b['date_update']; ?></td>
                      <!-- <td class="text-center">
                        <?php if ($b['is_active'] == 1) : ?>
                          <span class="badge badge-primary">Aktif</span>
                        <?php else : ?>
                          <span class="badge badge-danger">Tidak Aktif</span>
                        <?php endif; ?>
                      </td> -->

                    </tr>

                  <?php endforeach; ?>
                </tbody>
              </table>

            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->


    </div>
  </div>
</main>

<!-- Modal -->

<div class="modal fade" id="suplierModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-primary" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Suplier</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form class="form-horizontal" action="<?= base_url('master/suplier'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-email">Kode</label>
            <div class="col-md-9">
              <input class="form-control" name="kode" type="text" placeholder="Suplier kode" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-email">Nama</label>
            <div class="col-md-9">
              <input class="form-control" name="nama" type="text" placeholder="nama Suplier" autocomplete="off">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-email">Alamat</label>
            <div class="col-md-9">
              <input class="form-control" name="alamat" type="text" placeholder="Alamat" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-email">Telephone</label>
            <div class="col-md-9">
              <input class="form-control" name="telephone" type="text" placeholder="Telephone" autocomplete="off">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Add</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>
<!-- /.modal-->


<!-- Modal Edit -->
<div class="modal fade" id="suplier-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-primary" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Suplier</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form class="form-horizontal" action="<?= base_url('master/suplier/editsuplier'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <input type="hidden" name="idsuplier">
            <label class="col-md-3 col-form-label" for="hf-email">Kode</label>
            <div class="col-md-9">
              <input class="form-control" name="kodeedit" type="text" placeholder="Suplier kode" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-email">Nama</label>
            <div class="col-md-9">
              <input class="form-control" name="namaedit" type="text" placeholder="nama Suplier" autocomplete="off">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-email">Alamat</label>
            <div class="col-md-9">
              <input class="form-control" name="alamatedit" type="text" placeholder="Alamat" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-email">Telephone</label>
            <div class="col-md-9">
              <input class="form-control" name="telephoneedit" type="text" placeholder="Telephone" autocomplete="off">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>
<!-- /.modal-->

<?php $this->load->view('template/footer2'); ?>
<script src="<?= base_url('assets/js/master.js'); ?>"></script>
<script>
  // Flash alert
  const flashdata = $('.flash-data').data('flashdata');
  if (flashdata == 'suplierupdate') {
    $('.alert-success').html('Suplier berhasil di ubah!').fadeIn().delay(3000).fadeOut('slow');
  }
</script>

<?php $this->load->view('template/footHtml'); ?>