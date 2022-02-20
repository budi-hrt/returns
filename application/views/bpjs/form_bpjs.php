<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Gaji</li>
        <li class="breadcrumb-item">
            Iuran Bpjs
        </li>
        <li class="breadcrumb-item active">Form Iuran Bpjs</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <!-- Kategori -->
                <div class="col-lg-5">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massege'); ?>"></div>
                    <div class="clearfix">
                        <span class="float-left">
                            <h5 class="judul">Tambah iuran Bpjs</h5>
                        </span>
                    </div>
                    <div class="card card-border-app flat">
                        <div class="card-header ">
                            <i class="fa fa-align-justify"></i>Form Input iuran
                        </div>
                        <?= form_open('gaji/bpjs/input_iuran', 'id="form_bpjs"'); ?>
                        <div class="card-body">
                            <!-- input hidden1 -->
                            <input type="hidden" name="kode_iuran_bpjs">
                            <input type="hidden" name="id_iuran">
                            <input type="hidden" name="id_detil">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $user['id']; ?>">
                            <div class="row align-items-center">
                                <div class="form-group col-sm-3">
                                    <label for="ccmonth">Bulan</label>
                                    <input type="hidden" name="bulan_hide" id="bulan_hide">
                                    <select class="form-control form-control-sm" name="bulan" id="bulan" required>
                                        <option selected="selected" value="">Pilih</option>
                                        <?php
                                        $bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "July", "Agustus", "September", "Oktober", "November", "Desember");
                                        for ($bulan = 1; $bulan <= 12; $bulan++) {
                                            if ($bulan <= 9) {
                                                echo "<option value='0$bulan'>$bln[$bulan]</option>";
                                            } else {
                                                echo "<option value='$bulan'>$bln[$bulan]</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="tahun">Tahun</label>
                                    <input type="hidden" name="tahun_hide" id="tahun_hide">
                                    <select class="form-control form-control-sm" name="tahun" id="tahun" required>
                                        <option value="<?= date('Y'); ?>" selected><?= date('Y'); ?></option>
                                        <?php for ($i = date('Y'); $i >= 2017; $i--) {
                                            echo "<option value='$i'> $i </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input class="form-control form-control-sm input-app" name="ket_bpjs" id="ket_bpjs" type="text" placeholder="Singkat dan jelas..." autocomplete="off" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row has-icon">
                                        <label class="col-md-3 col-form-label" for="email">Karyawan</label>
                                        <div class="col-md-9">
                                            <span class="fa fa-search form-control-feedback "></span>
                                            <input type="hidden" name="id_kry" id="id_kry">

                                            <input type="text" class="form-control flat input-app" name="karyawan" id="karyawan" placeholder="Cari Karyawan..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row hitung" style="display: none;">
                                        <label class="col-md-3 col-form-label" for="is_active">Hitung Iuran</label>
                                        <div class="col-md-9">
                                            <div class="form-check checkbox">
                                                <input class="form-check-input" name="manual" id="manual" type="checkbox" value="1" checked>
                                                <label class="form-check-label" for="manual">Manual</label>
                                            </div>
                                            <div class="form-check checkbox">
                                                <input class="form-check-input otomatis" name="otomatis" id="otomatis" type="checkbox" value="">
                                                <label class="form-check-label" for="otomatis">Otomatis</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row upah" style="display: none;">

                                        <label class="col-md-3 col-form-label" for="gaji">Upah</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control flat  text-right input-app" name="upah" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="bps_ks">Bpjs
                                            <small>Kesehatan</small></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control flat text-right input-app money" name="bpjs_ks" id="bpjs_ks" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="bpjs_ktk">Bpjs KTK</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control flat text-right input-app money" name="bpjs_ktk" id="bpjs_ktk" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="total"><b>TOTAL IURAN</b></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control flat text-right" style="font-weight: bold;font-size:medium;" name="total" id="total" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- row -->
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-sm btn-teal flat" type="submit" id="btn_simpan">
                                <i class="fa fa-floppy-o"></i> Simpan & lanjutkan</button>
                            <button class="btn btn-sm btn-danger flat" type="button" id="btn_selesai">
                                <i class="fa fa-check-square-o"></i> Selesai & keluar </button>
                            <button class="btn btn-sm btn-warning flat" type="button" id="reset" style="display: none;"> <i class="fa fa-repeat"></i> Batal Update</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-->


                <!-- Sub kategori -->
                <div class="col-lg-7">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massege'); ?>"></div>
                    <div class="clearfix">
                        <span class="float-left">
                            <h5 class="judul_total">Total iuran Bpjs : </h5>
                        </span>
                    </div>
                    <div class="card card-border-app  flat">
                        <div class="card-header bg-primary">
                            <i class="fa fa-align-justify"></i>List Iuran Bpjs
                        </div>
                        <div class="card-body">
                            <!-- inpit hidden 2-->
                            <input type="hidden" name="subtotal_iuran">
                            <input type="hidden" name="jumlah_orang">
                            <table class="table table-responsive-sm table-bordered  table-sm" id="table-iuran">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center"> Action</th>
                                        <th class="text-center" width="20px">Nama</th>
                                        <th>Bpjs KS</th>
                                        <th>Bpjs KTK</th>
                                        <th>Total Iuran</th>
                                        <th>Update by</th>
                                    </tr>
                                </thead>
                                <tbody id="list_iuran">

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

<!-- Modal Kategori-->
<!-- Modal Hapus -->
<div class="modal fade" id="modal-hapusdetil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Konfirmasi hapus data</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('gaji/bpjs/hapus_detil', 'id="form_hapus"'); ?>

                <h5 class="nama_hapus">Yakin menghapus data iuran <b class="text-success">BPJS</b> -></h5>
                <input name="idHapus" id="idHapus" type="hidden">
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm flat" type="submit" id="btn-hapus">Ya Hapus !</button>
                <button class="btn btn-success btn-sm flat" type="button" data-dismiss="modal">Batal hapus</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>


<?php $this->load->view('template/footer'); ?>
<script src="<?= base_url('assets/mask-input/jquery.mask.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bpjs.js'); ?>"></script>



<?php $this->load->view('template/footHtml'); ?>