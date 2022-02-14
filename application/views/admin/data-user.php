<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">
      Admin
    </li>
    <li class="breadcrumb-item active">Data User</li>
    <!-- Breadcrumb Menu-->
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">



      <div class="row">
        <div class="col-md-12">
          <div class="card card-border-app  flat">
            <div class="card-header bg-primary">Data User
              <div class="card-header-actions">
                <div class="btn-group  float-right">
                  <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-settings"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:;" id="tambahUser">Tabah User Baru</a>
                    <a class="dropdown-item" href="#">Tampil Gird</a>
                    <a class="dropdown-item" href="#">Tampil Normal</a>
                  </div>
                </div>

              </div>
            </div>
            <div class="collapse show" id="collapseExample">
              <div class="card-body">

                <table class="table table-sm table-hover" id="table-user">
                  <thead class="thead-light">
                    <tr>
                      <th class="text-center">
                        <i class="icon-people"></i>
                      </th>
                      <th>Nama</th>
                      <th class="text-center">Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($userData as $u) : ?>
                      <tr>
                        <td class="text-center">
                          <div class="avatar">
                            <img class="img-avatar" src="<?= base_url('assets/'); ?>img/profile/<?= $u['image']; ?>" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                          </div>
                        </td>
                        <td>
                          <div><?= $u['name']; ?></div>
                          <div class="small text-muted">
                            <span>New</span> | Registered: <?= date('d F Y', $u['date_created']); ?></div>
                        </td>
                        <td class="text-center"><?= $u['email']; ?></td>

                        <td class="text-center"><?= $u['role_id']; ?></td>
                        <td>
                          <?php if ($u['is_active'] == 0) : ?>
                            <span class="badge badge-danger flat">Tidak Aktif</span>
                          <?php else : ?>
                            <span class="badge badge-success flat">Aktif</span>
                          <?php endif; ?>
                        </td>
                        <td class="text-center">
                          <?php if ($u['is_active'] == 0) : ?>
                            <!-- /btn-group-->
                            <div class="btn-group">
                              <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="<?= base_url('admin/aktifkan/') . $u['id']; ?>">Aktifkan</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Detil</a>
                                <div class="dropdown-divider"></div>

                              </div>
                            </div>
                            <!-- /btn-group-->
                          <?php else : ?>
                            <!-- /btn-group-->
                            <div class="btn-group">
                              <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="<?= base_url('admin/useraccess/') . $u['id']; ?>">Akses</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Detil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Nonaktifkan</a>
                              </div>
                            </div>
                            <!-- /btn-group-->
                          <?php endif; ?>
                        </td>
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

<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-primary" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah User</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input class="form-control" name="title" type="text" placeholder="Submenu title">
          </div>

          <div class="form-group">
            <select class="form-control" name="menu_id" id="menu_id">
              <option value="">Select menu</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input class="form-control" name="url" type="text" placeholder="Submenu url">
          </div>
          <div class="form-group">
            <input class="form-control" name="icon" type="text" placeholder="Submenu icon">
          </div>
          <div class="form-group">
            <div class="form-check checkbox">
              <input class="form-check-input" name="is_active" id="is_active" type="checkbox" value="1" checked>
              <label class="form-check-label" for="is_active">Active ?</label>
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


<?php $this->load->view('template/footer2'); ?>
<script src="<?= base_url('assets/js/data-user.js'); ?>"></script>
<script>
  $(document).ready(function() {
    $('#table-user').DataTable();
  });
</script>
</script>

<?php $this->load->view('template/footHtml'); ?>