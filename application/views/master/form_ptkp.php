<main class="main">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Master
        </li>
        <li class="breadcrumb-item">Master PTKP</li>
        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
                <a class="btn text-success" href="javascript:;" id="tambah">
                    <i class="icon-docs"></i> Tambah baru
                </a>
                <a class="btn text-warning" href="./">
                    <i class="icon-action-undo"></i> Kembali</a>
            </div>
        </li>
    </ol>



    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messege'); ?>"></div>
        <div class="alert alert-success" role="alert" style="display:none;">Berhasil</div>
        <div class="alert alert-danger" role="alert" style="display:none;">warning!</div>
        <div class="animated fadeIn">
            <div class="row">
                <!-- Kategori -->
                <div class="col-lg-5">
                    <div class="clearfix">
                        <span class="float-left">
                            <h5 class="judul">Tambah PTKP</h5>
                        </span>
                    </div>
                    <div class="card card-border-app flat">
                        <div class="card-header ">
                            <i class="fa fa-align-justify"></i>Form Input PTKP
                        </div>
                        <?= form_open('master/ptkp/input_ptkp', 'id="form_ptkp"'); ?>
                        <div class="card-body">


                            <!-- input hidden1 -->
                            <input type="hidden" name="id_ptkp">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $user['id']; ?>">
                            <div class="row align-items-center">
                                <div class="form-group col-sm-4">
                                    <label for="ccmonth">Berlaku Mulai</label>
                                    <input type="hidden" name="tahun1_hide" id="tahun1_hide">
                                    <select class="form-control form-control-sm" name="start_tahun" id="start_tahun" required disabled>
                                        <?php for ($i = date('Y'); $i >= 2017; $i--) {
                                            echo "<option value='$i'> $i </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="tahun">Sampai</label>
                                    <input type="hidden" name="tahun_hide" id="tahun_hide">
                                    <select class="form-control form-control-sm" name="end_tahun" id="end_tahun" required disabled>
                                        <option value="<?= date('Y'); ?>" selected><?= date('Y'); ?></option>
                                        <?php for ($i = date('Y'); $i >= 2017; $i--) {
                                            echo "<option value='$i'> $i </option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="ptkp">PTKP</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control flat text-right input-app money" name="ptkp" id="ptkp" required disabled>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="tanggungan">Tanggungan</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control flat text-right input-app money" name="tanggungan" id="tanggungan" required disabled>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- row -->
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-sm btn-teal flat" type="submit" id="btn_simpan" disabled>
                                <i class="fa fa-floppy-o"></i> Simpan & lanjutkan</button>
                            <button class="btn btn-sm btn-danger flat" type="reset" id="btn_batal" disabled>
                                <i class="fa fa-check-square-o"></i>Batal </button>

                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-->


                <!-- Sub kategori -->
                <div class="col-lg-7">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massege'); ?>"></div>
                    <div class="card card-border-app  flat">
                        <div class="card-header bg-primary">
                            <i class="fa fa-align-justify"></i>List PTKP
                        </div>
                        <div class="card-body">
                            <!-- inpit hidden 2-->
                            <input type="hidden" name="subtotal_iuran">
                            <input type="hidden" name="jumlah_orang">
                            <table class="table table-responsive-sm table-bordered  table-sm dataTables_scrollBody" id="table-ptkp" style="margin-left: 0px; width: 815px;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" width="105px" rowspan="2"> Action</th>
                                        <th class="text-center" width="125px" rowspan="2">PTKP</th>
                                        <th class="text-center" rowspan="2">Tanggungan</th>
                                        <th class="text-center" colspan="2">Berlaku</th>
                                        <th class="text-center" rowspan="2">Update By</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">mulai</th>
                                        <th class="text-center">sampai</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ptkp as $p) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <a class="badge badge-sm badge-success item-edit" href="javascript:;" data="<?= $p['id_ptkp']; ?>">Edit</a>
                                                <a class="badge badge-sm badge-danger item-delete" href="javascript:;" data="<?= $p['id_ptkp']; ?>">Delete</a>
                                            </td>
                                            <td class="text-center"><?= number_format($p['ptkp'], 0, ',', '.'); ?></td>
                                            <td class="text-center"><?= number_format($p['tanggungan'], 0, ',', '.'); ?></td>
                                            <td class="text-center"><?= $p['start_tahun']; ?></td>
                                            <td class="text-center"><?= $p['end_tahun']; ?></td>
                                            <td class="text-center"><?= $p['id_user']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- .col2 -->
            </div>
            <!-- /.row-->


        </div>
    </div>
</main>


<!-- Modal Hapus -->
<div class="modal fade" id="modal-hapusdetil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content modal-app">
            <div class="modal-header  modal-header-app flat">
                <h6 class=" modal-title">Konfirmasi hapus data</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body flat">
                <?= form_open('gaji/bpjs/hapus_detil', 'id="form_hapus"'); ?>

                <h6>Yakin membatalkan iuran <b class="text-success">BPJS</b> -><b class="nama_hapus"></b></h6>
                <input name="idHapus" id="idHapus" type="hidden">
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm flat" type="submit" id="btn-hapus">Ya, batalkan !</button>
                <button class="btn btn-success btn-sm flat" type="button" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>







<?php $this->load->view('template/footer'); ?>
<script src="<?= base_url('assets/mask-input/jquery.mask.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/f_ptkp.js'); ?>"></script>



<?php $this->load->view('template/footHtml'); ?>