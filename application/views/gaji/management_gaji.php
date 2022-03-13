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


                    <div class="card card-border-app  flat">
                        <div class="card-header bg-primary judul">
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
                                <div class="col-md-12">
                                    <?= form_open('gaji/management_gaji/simpan_detil', 'id="form_management"'); ?>

                                    <div style="display: none;">
                                        <input type="text" name="kode" id="kode" value="">
                                        <input type="text" name="id_user" id="id_user" value="<?= $user['id']; ?>">
                                        <input type="text" name="kode_pending" id="kode_pending">
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="form-group col-sm-2">
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
                                        <div class="form-group col-sm-1">
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
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="mengetahui">Mengetahui</label>
                                                <select class="form-control form-control-sm input-app" name="mengetahui" id="mengetahui">
                                                    <option value="">Pilih....</option>
                                                    <option value="1">Bos</option>
                                                    <option value="2">Bendahara</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group ">
                                                <label for="keterangan">Keterangan</label>
                                                <input class="form-control form-control-sm input-app" name="ket_gaji" id="ket_gaji" type="text" placeholder="Singkat & jelas" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-1 ">
                                            <button class="btn btn-sm btn-success flat " id="buat" type="button" style="margin-top:12px;margin-left:-10px"> <i class="fa fa-refresh"></i> Buat data gaji</button>
                                            <button class="btn btn-sm btn-danger flat" id="simpan_keluar" type="submit" style="margin-top:12px;margin-left:-10px;display:none">Simpan & Keluar</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary flat" type="button" id="copy" style="margin-top:12px"><i class="icon-docs"></i> Copy data sebelumnya</button>
                                        </div>
                                        <div class="col-sm-1">
                                            <button class="btn btn-sm btn-warning flat" style="margin-top:12px;margin-left:-40px" type="button" id="kembali"><i class="fa fa-reply"></i> Kembali</button>
                                        </div>
                                    </div>
                                    <!-- table karyawan hide -->
                                    <div style="display: none;">
                                        <table>
                                            <?php foreach ($karyawan as $k) : ?>
                                                <tr>
                                                    <td><input type="text" class="id_karyawan" name="id_karyawan[]" id="id_karyawan" value="<?= $k['id_karyawan']; ?>"></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>

                                    <!-- akhir table hide -->


                                    </form>
                                </div>


                                <div class="col-md-12">

                                    <table class="table table-responsive-sm table-bordered table-striped table-sm dataTables_scrollBody" id="table-listGaji" style="margin-left: 0px; width: 1165px;">
                                        <thead class="thead-blue text-white">
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
                                                <td class="bg-white text-secondary text-center">Lain lain</td>
                                            </tr>
                                        </thead>
                                        <tbody id="detil_gaji">

                                        </tbody>
                                    </table>
                                </div>

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

<!-- Loader -->
<div id="throbber" class="modal" role="dialog" style="display:none; position:relative; opacity:0.6; background-color:white;">
    <img style="margin: 0 auto;
                position: absolute;
                top: 0; bottom: 0; left:0; right:0;
                margin: auto;
                display: block;
                /* width:10%; */
               " src="<?= base_url('assets'); ?>/img/loader/5.gif" />
</div>

<!-- end loader -->





<?php $this->load->view('template/footer'); ?>
<script src="<?= base_url('assets/js/gajian.js'); ?>"></script>

<script>
    // Klik Edit Role
</script>
<?php $this->load->view('template/footHtml'); ?>