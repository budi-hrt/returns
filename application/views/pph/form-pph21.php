<main class="main">
    <!-- Breadcrumb-->
    <!-- <ol class="breadcrumb d-flex justify-content-end">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:;" class="btn btn-sm btn-flat btn-success flat" id="copy_data"><i
                        class="fa fa-copy"></i> Copy dari priode sebelumnya </a>
                <a href="#" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>

    </ol> -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Gaji</li>
        <li class="breadcrumb-item">
            Iuran PPh21
        </li>
        <li class="breadcrumb-item">Form Iuran PPh21</li>
        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
                <a class="btn text-primary" href="javascript:;" id="copy_data">
                    <i class="icon-docs"></i> Copy dari priode sebelumnya
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
                            <h5 class="judul">Form Tambah iuran PPh21</h5>
                        </span>
                    </div>
                    <div class="card card-border-app flat">
                        <div class="card-header ">
                            <i class="fa fa-align-justify"></i>Form Input iuran PPh21
                        </div>
                        <?= form_open('gaji/bpjs/input_iuran', 'id="form_bpjs"'); ?>
                        <div class="card-body">
                            <!-- input hidden1 -->
                            <input type="hidden" name="kode_iuran_pph21">
                            <input type="hidden" name="id_iuran">
                            <input type="hidden" name="id_detil">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $user['id']; ?>">



                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row mb-1 ">
                                        <label class="col-md-3 col-form-label" for="email">Masa Pajak</label>

                                        <div class="form-group col-sm-3">
                                            <label for="ccmonth">Bulan</label>
                                            <input type="hidden" name="bulan_hide" id="bulan_hide">
                                            <select class="form-control form-control-sm" name="bulan" id="bulan"
                                                required>
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
                                            <select class="form-control form-control-sm" name="tahun" id="tahun"
                                                required>
                                                <option value="<?= date('Y'); ?>" selected><?= date('Y'); ?></option>
                                                <?php for ($i = date('Y'); $i >= 2017; $i--) {
                                                    echo "<option value='$i'> $i </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group row has-icon">
                                        <label class="col-md-3 col-form-label" for="email">Karyawan</label>
                                        <div class="col-md-9">
                                            <span class="fa fa-search form-control-feedback "></span>
                                            <input type="hidden" name="id_kry" id="id_kry">

                                            <input type="text" class="form-control form-control-sm flat input-app"
                                                name="karyawan" id="karyawan" placeholder="Cari Karyawan..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row hitung" style="display: none;">
                                        <label class="col-md-3 col-form-label" for="is_active">Type Hitung</label>
                                        <div class="col-md-6">
                                            <input type="hidden" name="type" id="type">
                                            <div class="form-check checkbox">
                                                <input class="form-check-input" name="manual" id="manual"
                                                    type="checkbox" value="1" checked>
                                                <label class="form-check-label" for="manual">Manual</label>
                                            </div>
                                            <div class="form-check checkbox">
                                                <input class="form-check-input otomatis" name="otomatis" id="otomatis"
                                                    type="checkbox" value="">
                                                <label class="form-check-label" for="otomatis">Otomatis</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>


                                    <!-- Form hitung auto -->
                                    <div class="hitung-auto" style="display: none;">



                                        <div class="form-group row mb-1 upah">
                                            <label class="col-md-5 col-form-label" for="gaji">Gaji pokok +
                                                Tunjangan</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right input-app money"
                                                    name="upah" id="upah">
                                            </div>
                                        </div>
                                        <div class="form-group row jkk mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">JKK 0,24%</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right " name="jkk"
                                                    id="jkk">
                                            </div>
                                        </div>
                                        <div class="form-group row jk mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">JK 0,3%</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right " name="jk"
                                                    id="jk">
                                            </div>
                                        </div>
                                        <hr class="mb-1 mt-1">

                                        <div class="form-group row p_bruto mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji"><b>Penghasilan
                                                    Bruto</b></label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right font-weight-bold"
                                                    name="bruto" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-1">
                                            <label class="col-md-3 col-form-label text-primary font-weight-bold"
                                                for="gaji">Pengurangan
                                                :</label>

                                        </div>
                                        <div class="form-group row mb-1 by_jabatan">
                                            <label class="col-md-5 col-form-label" for="gaji">By.Jabatan 5% <small>
                                                    dari pengh.bruto
                                                </small></label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right text-primary"
                                                    name="by_jabatan" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row jht mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">Iuran JHT 2% <small>dari
                                                    Upah</small> </label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right text-primary"
                                                    name="jht" id="jht">
                                            </div>
                                        </div>
                                        <div class="form-group row jp mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">Iuran JP 1% <small>dari
                                                    Upah</small></label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right text-primary"
                                                    name="jp" id="jp">
                                            </div>
                                        </div>
                                        <hr class="mb-1 mt-1">
                                        <div class="form-group row neto_bulan mb-3">
                                            <label class="col-md-5 col-form-label" for="gaji"><b>Penghasilan neto
                                                    sebulan</b></label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right font-weight-bold"
                                                    name="neto_bulan" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row neto_tahun mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">Penghasilan neto
                                                setahun</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right "
                                                    name="neto_tahun" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row ptkp mb-1 ">
                                            <label class="col-md-2 col-form-label" for="gaji">PTKP</label>
                                            <div class="col-md-3">
                                                <select class="form-control form-control-sm input-app" name="ptkp"
                                                    id="ptkp">
                                                    <option value="0" selected>TK/0</option>
                                                    <?php foreach ($status_ptkp as $p) : ?>
                                                    <option value="<?= $p['status_tg']; ?>"><?= $p['nama_status']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="hidden" value="<?= $ptkp['ptkp']; ?>" name="ptkp_hide"
                                                    id="ptkp_hide">
                                                <input type="hidden" value="<?= $ptkp['tanggungan']; ?>"
                                                    name="tanggungan_hide" id="tanggungan_hide">
                                                <input type="text"
                                                    class="form-control form-control-sm money flat  text-right text-success"
                                                    name="val_ptkp" id="val_ptkp" value="<?= $ptkp['ptkp']; ?>"
                                                    readonly>
                                            </div>
                                        </div>
                                        <hr class="mb-1 mt-1">
                                        <div class="form-group row pkp mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">PKP setahun</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right " name="pkp"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row pembulatan mb-2">
                                            <label class="col-md-5 col-form-label" for="gaji">Pembulatan ke
                                                bawah</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right "
                                                    name="pembulatan" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row lima mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">5%</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right "
                                                    name="lima_persen" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row lima_belas mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">15%</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right "
                                                    name="lima_belas" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row dua_lima mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">25%</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right "
                                                    name="dua_lima" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row dua_lima mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">30%</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right "
                                                    name="tiga_puluh" readonly>
                                            </div>
                                        </div>
                                        <hr class="mb-1 mt-1">
                                        <div class="form-group row terhutang mb-1">
                                            <label class="col-md-5 col-form-label" for="gaji">PPh terhutang
                                                setahun</label>
                                            <div class="col-md-7">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right "
                                                    name="pph_tahun" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row iuran_pph mb-1">
                                            <label class="col-md-7 col-form-label" for="gaji"><b>PPh bulan ini :
                                                    100.000.000
                                                    /12</b></label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control form-control-sm flat  text-right"
                                                    name="pph_bulan" readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Akhir form hitung auto -->

                                    <!-- Form hitung manual -->
                                    <div class="hitung-manual">
                                        <div class="form-group row iuran_pph mb-1">
                                            <label class="col-md-3 col-form-label" for="gaji">Iuran PPh 21</label>
                                            <div class="col-md-9">
                                                <input type="text"
                                                    class="form-control form-control-sm flat  text-right input-app"
                                                    name="iuran" id="iuran">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir hitung manual -->
                                    <div class="form-group row keterangan mb-1">
                                        <label class="col-md-3 col-form-label" for="gaji">Keterangan</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm flat input-app"
                                                name="ket" placeholder="singkat & jelas..." autocomplete="off">
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
                            <button class="btn btn-sm btn-warning flat" type="button" id="reset" style="display: none;">
                                <i class="fa fa-repeat"></i> Batal Update</button>
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
                            <table class="table table-responsive-sm table-bordered  table-sm dataTables_scrollBody"
                                id="table-iuran" style="margin-left: 0px; width: 815px;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" width="35px"> Action</th>
                                        <th class="text-center">Nama</th>
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


<!-- Modal Hapus -->
<div class="modal fade" id="modal-hapusdetil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
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

<div class="modal fade" id="modal-copy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content modal-app">
            <div class="modal-header  modal-header-app flat">
                <h6 class=" modal-title">Pilih Priode Iuran</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body flat">
                <table class="table table-responsive-sm table-bordered  table-sm dataTables_scrollBody" id="table-copy"
                    style="margin-left: 0px; width: 575px;">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" width="35px"> Action</th>
                            <th class="text-center" width="350px">Uraian</th>
                            <th>Priode</th>
                            <th width="100px"> Total Iuran</th>
                        </tr>
                    </thead>
                    <tbody id="list_copy">

                    </tbody>
                </table>

            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>


</div>


<div class="modal fade" id="modal-copy_detil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-app">
            <div class="modal-header  modal-header-app flat">
                <h6 class=" modal-title">Pilih Priode Iuran</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body flat">
                <h6>Copy data <b class="text-success"> BPJS</b><b class="judul_copy"></b> ke priode... <i
                        class="fa fa-hand-o-down text-primary" aria-hidden="true"></i></h6>
                <?= form_open('gaji/bpjs/copy_detil', 'id="form_copy"'); ?>
                <input name="kd" id="kd" type="hidden">
                <input type="hidden" name="id_user_copy" id="id_user_copy" value="<?= $user['id']; ?>">

                <div class="row align-items-center">
                    <div class="form-group col-sm-3">
                        <label for="ccmonth">Bulan</label>
                        <select class="form-control form-control-sm input-app" name="bulan_copy" id="bulan_copy"
                            required>
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
                        <select class="form-control form-control-sm input-app" name="tahun_copy" id="tahun_copy"
                            required>
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
                            <input class="form-control form-control-sm input-app" name="ket_bpjs_copy"
                                id="ket_bpjs_copy" type="text" placeholder="Singkat dan jelas..." autocomplete="off"
                                required>
                        </div>
                    </div>
                </div>

                <div style="display: none;">
                    <table class="table table-responsive-sm table-bordered  table-sm " id="table-copy_detil">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center"> Id</th>
                                <th class="text-center">Bpjs Ks</th>
                                <th>Bpjs Ktk</th>
                            </tr>
                        </thead>
                        <tbody id="list_copy_detil">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-sm flat" type="submit" id="btn-copy">Ya, copy data !</button>
                    <button class="btn btn-danger btn-sm flat" type="button" data-dismiss="modal">Tutup</button>
                </div>

            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>

</div>


<?php $this->load->view('template/footer'); ?>
<script src="<?= base_url('assets/mask-input/jquery.mask.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/form-pph21.js'); ?>"></script>



<?php $this->load->view('template/footHtml'); ?>