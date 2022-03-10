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

                    <!-- Form Gajian -->
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Form</strong>
                                    <small>Management Penggajian</small>
                                </div>
                                <div class="card-body">


                                    <!-- <form action="<?= base_url('gaji/management_gaji/simpan_detil'); ?>" method="post"> -->
                                    <?= form_open('gaji/management_gaji/simpan_detil', 'id="form_management"'); ?>
                                    <!-- table bantu -->
                                    <div style="display: none;">
                                        <input type="text" name="kode" value="<?= $kode; ?>">
                                        <input type="text" name="id_user" value="<?= $user['id']; ?>">
                                        <input type="text" name="kode_pending" id="kode_pending">

                                        <table>
                                            <tbody>
                                                <?php
                        $no = 1;
                        foreach ($gaji as $g) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><input type="text" name="id_karyawan[]"
                                                            value="<?= $g['id_kry']; ?>"></td>
                                                    <td><input type="text" name="gp[]" value="<?= $g['gaji_pokok']; ?>">
                                                    </td>
                                                    <td><input type="text" name="tj[]" value="<?= $g['tunjangan']; ?>">
                                                    </td>
                                                    <td><input type="text" name="um[]" value="<?= $g['um']; ?>"></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!-- akhir table bantu -->
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="form-group col-sm-2">
                                            <label for="ccmonth">Bulan</label>
                                            <select class="form-control form-control-sm" name="bulan" id="bulan">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="tahun">Tahun</label>
                                            <select class="form-control form-control-sm" name="tahun" id="tahun">
                                                <option value="<?= date('Y'); ?>" selected><?= date('Y'); ?></option>
                                                <?php
                        for ($i = date('Y'); $i >= 2017; $i--) {
                          echo "<option value='$i'> $i </option>";
                        }
                        ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <input class="form-control form-control-sm" name="ket_gaji"
                                                    id="ket_gaji" type="text" placeholder="Keterangan"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-success flat" id="buat" type="submit"
                                                style="margin-top:12px">Buat data gaji</button>
                                            <button class="btn btn-sm btn-danger flat" id="simpan_keluar" type="submit"
                                                style="margin-top:12px;display:none">Simpan & Keluar</button>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- /.row-->
                                    <!-- <hr> -->
                                    <!-- <div class="row" >
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="file-input">Upload file</label>
                        <div class="col-md-8">
                          <input id="file-input" type="file" name="file-input">
                        </div>
                      </div>
                    </div>
                  </div> -->
                                    <!-- /.row-->
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Akhir Form -->

                    <div class="card card-border-app  flat">
                        <div class="card-header bg-primary">List data gaji
                            <div class="card-header-actions">
                                <a class="card-header-action btn-setting" href="javascript:;">
                                    <i class="icon-settings"></i>
                                </a>
                                <a class="card-header-action btn-minimize" href="#" data-toggle="collapse"
                                    data-target="#collapseExample" aria-expanded="true">
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
                                            <th class="text-center" rowspan="2"> Aksi</th>
                                            <th class="text-center" rowspan="2">Nama</th>
                                            <th class="text-center" rowspan="2">Gaji Pokok</th>
                                            <th class="text-center" rowspan="2">Tunjangan</th>
                                            <th class="text-center" rowspan="2">UM</th>
                                            <th class="text-center" colspan="5">Potongan</th>
                                            <th class="text-center" rowspan="2" width="90px">Ttl Terima</th>
                                        </tr>
                                        <tr>
                                            <td class="bg-success">BPJS</td>
                                            <td class="bg-warning">Pph21</td>
                                            <td class="bg-danger">Absensi</td>
                                            <td class="bg-secondary">Pinjaman</td>
                                            <td class="bg-info">Lain lain</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list_gaji as $p) : ?>
                                        <?php $uph = $p['terima_gp'] + $p['terima_tj'] + $p['terima_um'];
                      $pot = $p['pot_bpjs'] + $p['pot_pph21'] + $p['pot_absensi'] + $p['pot_pinjaman'] + $p['pot_lain'];
                      $ttl_terima = $uph - $pot;; ?>
                                        <tr>

                                            <td class="text-center">
                                                <a class="item-edit" href="javascript:;"
                                                    data-id="<?= $p['id_gajian']; ?>"
                                                    data-kode="<?= $p['kode_gaji']; ?>">
                                                    <i class="icon-pencil mr-2"></i></a>
                                                <a class="item-hapus" href="javascript:;"><i
                                                        class="icon-trash mr-2 text-danger"></i></a>
                                            </td>
                                            <td><b><?= $p['nama_karyawan']; ?></b></td>
                                            <td class="text-right"><?= number_format($p['terima_gp'], 0, ',', '.'); ?>
                                            </td>
                                            <td class="text-right"><?= number_format($p['terima_tj'], 0, ',', '.'); ?>
                                            </td>
                                            <td class="text-right"><?= number_format($p['terima_um'], 0, ',', '.'); ?>
                                            </td>
                                            <td class="text-right text-danger">
                                                <?= number_format($p['pot_bpjs'], 0, ',', '.'); ?></td>
                                            <td class="text-right text-danger">
                                                <?= number_format($p['pot_pph21'], 0, ',', '.'); ?></td>
                                            <td class="text-right text-danger">
                                                <?= number_format($p['pot_absensi'], 0, ',', '.'); ?></td>
                                            <td class="text-right text-danger">
                                                <?= number_format($p['pot_pinjaman'], 0, ',', '.'); ?></td>
                                            <td class="text-right text-danger">
                                                <?= number_format($p['pot_lain'], 0, ',', '.'); ?></td>
                                            <td class="text-right">
                                                <b><?= number_format($ttl_terima, 0, ',', '.'); ?></b></td>
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
                        <input class="form-control" name="ket" type="text" placeholder="Isi Keterangan"
                            autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="priode">Priode Gaji</label>
                        <input class="form-control" id="priode" name="priode" type="text" value="<?= date('d-m-Y'); ?>"
                            autocomplete="off" required>
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
// Klik Edit Role
</script>
<?php $this->load->view('template/footHtml'); ?>