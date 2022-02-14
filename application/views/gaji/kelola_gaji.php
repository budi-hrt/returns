<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">
      Gaji
    </li>
    <li class="breadcrumb-item active">Kelola Gaji</li>
    <!-- Breadcrumb Menu-->
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">

      <div class="row">
        <div class="col-lg">
          <div class="alert alert-success" role="alert" style="display:none;"></div>
          <div class="alert alert-danger" role="alert" style="display:none;"></div>
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
          <div class="clearfix">
            <span class="float-left"><a id="tambah" class="btn btn-teal flat mb-2 " href="javascript:;"><i class="fa fa-plus"></i> Tambah Penggajian </a></span>
          </div>
          <div class="card card-border-app  flat">
            <div class="card-header bg-primary">List data gaji
              <div class="card-header-actions">
                <a class="card-header-action btn-setting" href="javascript:;">
                  <i class="icon-settings"></i>
                </a>
                <a class="card-header-action btn-minimize" href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true">
                  <i class="icon-arrow-up"></i>
                </a>
                <a class="card-header-action btn-close" href="javascript:;">
                  <i class="icon-close"></i>
                </a>
              </div>
            </div>
            <div class="collapse show" id="collapseExample">
              <div class="card-body">

                <table class="table table-responsive-sm table-bordered table-sm" id="table-listGaji">
                  <thead class="thead-light">
                    <tr>
                      <th class="text-center"> Aksi</th>
                      <th class="text-center">Keterangan</th>
                      <th class="text-center">Priode</th>
                      <th class="text-center">Total Gaji</th>
                      <th class="text-center" width="90px">Updated by</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($gajian as $p) : ?>
                      <!-- <?php $ttlUpah = $p['gaji_pokok'] + $p['tunjangan'] + $p['um']; ?> -->
                      <tr>

                        <td class="text-center">
                          <a class="btn btn-sm btn-square btn-primary text-white item-edit" href="javascript:;" data-id="<?= $p['id_list_gaji']; ?>" data-priode="<?= $p['priode']; ?>" data-ket="<?= $p['ket_list_gaji']; ?>" data-total="<?= $p['total_list']; ?>">
                            <i class="fa fa-pencil mr-2 text-white"></i>Edit</a>
                          <button class="btn btn-sm btn-square btn-danger "><i class="fa fa-times mr-2 "></i>Hapus</button>
                        </td>
                        <td class="text-uppercase"><b><?= $p['priode']; ?></b></td>
                        <td><?= $p['ket_list_gaji']; ?></td>
                        <td class="text-right"><?= number_format($p['total_list'], 0, ',', '.'); ?></td>
                        <td><small class="text-primary"><?= $p['name']; ?></small>, <small><?= date('d-m-Y H:i:s', $p['date_update']); ?></small> </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
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

<div class="modal fade" id="modal-gajian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-app">
      <div class="modal-header modal-header-app flat">
        <p class="modal-title modal-title-app">Tambah Data Gaji</p>
        <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="form-gajian" action="" method="post">
        <div class="modal-body flat">
          <input type="hidden" name="id">
          <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
          <div class="form-group">
            <input class="form-control" name="ket" type="text" placeholder="Isi Keterangan" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="priode">Priode Gaji</label>
            <input class="form-control" id="priode" name="priode" type="text" value="<?= date('d-m-Y'); ?>" autocomplete="off" required>
            <span id="pesan"></span></p>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success flat" type="submit"><i class="fa fa-floppy-o"></i> Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>
<!-- /.modal-->

<?php $this->load->view('template/footer'); ?>
<script src="<?= base_url('assets/js/gajian.js'); ?>"></script>

<script>
  $(document).ready(function() {
    $('#table-listGaji').DataTable();
  });
  // Klik Edit Role
</script>
<?php $this->load->view('template/footHtml'); ?>