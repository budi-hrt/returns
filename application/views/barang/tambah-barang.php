<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Barang
        </li>
        <li class="breadcrumb-item active">Tambah Data Barang</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <!-- flashdata -->
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('addproduk'); ?>"></div>
                    <div class="alert alert-success" role="alert" style="display:none;">Produk telah ditambahkan</div>
                    <div class="alert alert-danger" role="alert" style="display:none;">Kode Produk sudah ada !</div>
                    <!-- end flashdata -->
                    <div class="card card-border-app flat">
                        <div class="card-header bg-primary flat">
                            <strong>Form</strong> Tambah Barang
                        </div>
                        <div class="card-body">


                            <!-- tab -->
                            <ul class="nav nav-tabs" id="myTab1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link tabs-app active" id="spesifikasi-tab" data-toggle="tab" href="#spesifikasi" role="tab" aria-controls="spesifikasi" aria-selected="true"><i class="fa fa-pencil-square-o text-info fa-2x"></i> Spesifikasi </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="satuan-tab" data-toggle="tab" href="#satuan" role="tab" aria-controls="satuan" aria-selected="false"><i class="fa fa-qrcode text-success fa-2x"></i> Satuan & Harga</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="harga-tab" data-toggle="tab" href="#harga" role="tab" aria-controls="harga" aria-selected="false"><i class="fa fa-usd text-warning fa-2x"></i> Diskon</a>
                                </li>
                            </ul>
                            <form class="form-horizontal" id="form-produk" action="">
                                <div class="tab-content" id="myTab1Content">
                                    <div class="tab-pane fade show active" id="spesifikasi" role="tabpanel" aria-labelledby="spesifikasi-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Kode -->
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="barcode">ID Produk</label>
                                                    <div class="col-md-5">
                                                        <input class="form-control flat" type="text" name="kode_produk" autocomplete="off">
                                                    </div>
                                                </div>
                                                <!-- Barcode -->
                                                <div class="form-group row has-icon">
                                                    <label class="col-md-3 col-form-label" for="barcode">Barcode</label>
                                                    <div class="col-md-9">
                                                        <span class="fa fa-barcode form-control-feedback "></span>
                                                        <input class="form-control flat" id="barcode" type="text" name="barcode" placeholder="Enter Barcode.." autocomplete="off" value="<?= set_value('barcode'); ?>">
                                                    </div>
                                                </div>
                                                <!-- Nama Produk -->
                                                <div class="form-group row has-icon">
                                                    <label class="col-md-3 col-form-label" for="nama">Nama Produk</label>
                                                    <div class="col-md-9">
                                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                        <span class="fa fa-tag form-control-feedback "></span>
                                                        <input class="form-control flat" id="nama" type="text" name="nama" placeholder="Enter Nama Produk.." autocomplete="off" value="<?= set_value('nama'); ?>">
                                                    </div>
                                                </div>
                                                <!-- Merek produk -->
                                                <div class="form-group row has-icon">
                                                    <label class="col-md-3 col-form-label" for="merek">Merek Produk</label>
                                                    <div class="col-sm-7">
                                                        <span class="fa fa-search form-control-feedback "></span>
                                                        <input type="hidden" name="id_merek">
                                                        <input type="text" name="merek" id="merek" class="form-control flat" placeholder="Cari...">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" id="btn-merek" class="btn btn-square btn-teal flat">Baru</a>
                                                    </div>
                                                </div>


                                            </div>
                                            <!-- Akhir col -->
                                            <div class="col-md-6">
                                                <!-- Kategori -->
                                                <div class="form-group row has-icon">
                                                    <label class="col-md-3 col-form-label" for="kategori">Kategori</label>
                                                    <div class="col-md-7">
                                                        <span class="fa fa-search form-control-feedback "></span>
                                                        <input type="hidden" name="id_kategori">
                                                        <input type="text" name="kategori" id="kategori" class="form-control flat" placeholder="Cari...">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-square btn-teal">Baru</button>
                                                    </div>
                                                </div>
                                                <!-- Subkategori -->
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="subkategori">Sub Kategori</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control " name="subkategori" id="subkategori" required disabled>
                                                            <option value="">Pilih ...</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" id="btnsub" class="btn btn-square btn-teal" disabled>Baru</button>
                                                    </div>
                                                </div>


                                                <!-- minimum stok -->
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="minStok">Stk.minimum</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control" id="minStok" type="number" name="minStok" placeholder="0" autocomplete="off" value="<?= set_value('minStok'); ?>">
                                                    </div>
                                                </div>
                                                <!-- aktif -->
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="is_active"></label>
                                                    <div class="col-md-9">
                                                        <div class="form-check checkbox">
                                                            <input class="form-check-input" name="is_active" id="is_active" type="checkbox" value="1" checked>
                                                            <label class="form-check-label" for="is_active">Aktif ?</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Akhir col -->
                                        </div>

                                    </div>
                                    <!-- akhir tab spesifikasi -->
                                    <!-- tab satuan -->
                                    <div class="tab-pane fade" id="satuan" role="tabpanel" aria-labelledby="satuan-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Satuan 1-->
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="satuan1">Satuan 1</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control flat" name="satuan1" id="satuan1" required>
                                                            <option value="">Pilih ...</option>
                                                            <?php foreach ($satuan as $s1) : ?>
                                                                <option value="<?= $s1['nama_satuan']; ?>"><?= $s1['nama_satuan']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-square btn-teal flat">Baru</button>
                                                    </div>

                                                </div>
                                                <!-- Sataun 2 -->
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="satuan2">Satuan 2</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control flat" name="satuan2" id="satuan2" required>
                                                            <option value="">Pilih ...</option>
                                                            <?php foreach ($satuan as $s2) : ?>
                                                                <option value="<?= $s2['nama_satuan']; ?>"><?= $s2['nama_satuan']; ?></option>
                                                            <?php endforeach; ?>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-square btn-teal flat">Baru</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- akhir satuan -->
                                            <!-- col isi -->
                                            <div class="col-md-6">
                                                <div class="form-group row has-icon">
                                                    <label for="harga" class="col-md-2 col-form-label">Harga Jual</label>
                                                    <div class="col-md-5">
                                                        <span class="fa fa-usd form-control-feedback "></span>
                                                        <input type="text" class="form-control flat money" name="harga" placeholder="Rp.">
                                                    </div>
                                                </div>
                                                <!-- Isi 2 -->
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label" for="isi2">Isi 2</label>
                                                    <div class="col-md-3">
                                                        <?= form_error('isi2', '<small class="text-danger">', '</small>'); ?>
                                                        <input class="form-control flat money" id="isi2" type="number" name="isi2" placeholder="0" autocomplete="off" value="<?= set_value('isi2'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir col isi -->
                                        </div>

                                        <!-- Akhir row -->
                                    </div>
                                    <!-- Akhir tab satuan -->
                                    <!-- tab harga -->
                                    <div class="tab-pane fade" id="harga" role="tabpanel" aria-labelledby="harga-tab">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="180px">Level Customer</th>
                                                    <th width="80px">Quantity</th>
                                                    <th>Discount</th>
                                                    <th>Date start</th>
                                                    <th>Date end</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tm = 1;
                                                $ts = 1;
                                                foreach ($level as $l) : ?>
                                                    <tr>
                                                        <td><input type="hidden" class="level" name="id_level[]" id="id_level" value="<?= $l['id']; ?>"> <?= $l['nama_level']; ?></td>
                                                        <td>
                                                            <input type="hidden" class="kode" name="kode_barang[]" id="kode_barang">
                                                            <input type="text" class="form-control qty text-center flat" placeholder="0" name="quantity[]">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control disc flat money" placeholder="Rp." name="discount[]">
                                                        </td>
                                                        <td>

                                                            <div class="input-group">
                                                                <span class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </span><input type="text" class="form-control datepicker1 flat" name="tanggal_mulai[]" id="tanggal_mulai<?= $tm++; ?>" value="<?= date('Y-m-d'); ?>">
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class=" input-group">
                                                                <span class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </span><input type="text" class="form-control datepicker2 flat" name="tanggal_selesai[]" id="tanggal_selesai<?= $ts++; ?>" value="<?= date('Y-m-d'); ?>">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <!-- akhir tab -->
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer">
                            <button class="btn btn-sm btn-success flat" id="btn-simpan" type="button">
                                <i class="fa fa-dot-circle-o"></i> Simpan</button>
                            <button class="btn btn-sm btn-danger flat" type="reset">
                                <i class="fa fa-ban"></i> Reset</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>


<?php $this->load->view('template/footer2'); ?>
<script>
    $(document).ready(function() {
        // Mask input 
        $('.money').mask('000.000.000.000.000', {
            reverse: true
        });

        // datepicker
        $('#tanggal_mulai1').datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,

        });

        $('#tanggal_mulai2').datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,

        });

        $('#tanggal_mulai3').datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,

        });


        $('#tanggal_selesai1').datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true

        });
        $('#tanggal_selesai2').datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true

        });
        $('#tanggal_selesai3').datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true

        });


        // Autocomplate Merek
        $("#merek").autocomplete({
            source: "<?php echo site_url('barang/satuan/get_autocompletemerek/?'); ?>",
            select: function(event, ui) {
                $('[name="id_merek"]').val(ui.item.description);
                $('[name="merek"]').val(ui.item.label);
                document.getElementById("kategori").focus();
            }
        });

        // Autocomplete Kategori
        $("#kategori").autocomplete({
            source: "<?php echo site_url('barang/kategori/get_autocomplete'); ?>",

            select: function(event, ui) {
                $('[name="id_kategori"]').val(ui.item.description);
                $('[name="kategori"]').val(ui.item.label);
                document.getElementById("subkategori").focus();
                const kategori_id = $('input[name="id_kategori"]').val();

                $.ajax({
                    type: 'get',
                    url: base_url + 'barang/kategori/get_sub',
                    data: {
                        kategori_id: kategori_id
                    },
                    success: function(html) {
                        $('#subkategori').removeAttr('disabled');
                        $('#btnsub').removeAttr('disabled');
                        $("#subkategori").empty();
                        $("#subkategori").html(html);
                    },
                    error: function() {
                        alert('error !');
                        return false;
                    }
                });
            }

        });


        // Kode otomatis
        kodeProduk();

    });


    // Kode Barang
    function kodeProduk() {
        $.ajax({
            url: base_url + 'barang/barang/kode',
            dataType: 'json',
            success: function(data) {
                $('input[name=kode_produk]').val(data.kode);
                $('.kode').val(data.kode);
            }
        });
    }


    // tombol simpan klik
    $('#btn-simpan').on('click', function() {
        const kode_produk = $('input[name=kode_produk]').val();
        const barcode = $('input[name=barcode]').val();
        const nama = $('input[name=nama]').val();
        const id_merek = $('input[name=id_merek]').val();
        const minStok = $('input[name=minStok]').val();
        const id_kategori = $('input[name=id_kategori]').val();
        const subkategori = $('#subkategori option:selected').attr('value');
        const satuan1 = $('#satuan1 option:selected').attr('value');
        const satuan2 = $('#satuan2 option:selected').attr('value');
        const isi2 = $('input[name=isi2]').val();
        const harga = $('input[name=harga]').val();

        console.log(id_kategori);




        // array
        const kode_barang = [];
        $('.kode').each(function() {
            kode_barang.push($(this).val());
        });
        const quantity = [];
        $('.qty').each(function() {
            quantity.push($(this).val());
        });
        const discount = [];
        $('.disc').each(function() {
            discount.push($(this).val());
        });
        const id_level = [];
        $('.level').each(function() {
            id_level.push($(this).val());
        });
        const tanggal_mulai = [];
        $('.datepicker1').each(function() {
            tanggal_mulai.push($(this).val());
        });
        const tanggal_selesai = [];
        $('.datepicker2').each(function() {
            tanggal_selesai.push($(this).val());
        });

        if (nama == '') {
            $('input[name=nama]').addClass('is-invalid');
            $('#form-produk').find('.invalid-feedback').text('Nama Produk kosong!');
        } else {

            $.ajax({
                type: 'post',
                url: '<?= base_url('barang/barang/tambah'); ?>',
                data: {
                    kode_produk: kode_produk,
                    barcode: barcode,
                    nama: nama,
                    id_kategori: id_kategori,
                    subkategori: subkategori,
                    satuan1: satuan1,
                    satuan2: satuan2,
                    isi2: isi2,
                    id_merek: id_merek,
                    harga: harga,
                    minStok: minStok,
                    kode_barang: kode_barang,
                    quantity: quantity,
                    discount: discount,
                    id_level: id_level,
                    tanggal_mulai: tanggal_mulai,
                    tanggal_selesai: tanggal_selesai
                },
                success: function() {
                    $('#form-produk')[0].reset();
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success('Data Produk Berhasil di Simpan', 'Berhasil...');

                    }, 100);
                    kodeProduk();
                    $('#spesifikasi-tab').addClass('active');
                    $('#satuan-tab').removeClass('active');
                    $('#harga-tab').removeClass('active');
                    $('#spesifikasi').addClass('active show');
                    $('#satuan').removeClass('active');
                    $('#harga').removeClass('active');
                    $('#subkategori').prop('disabled', true);
                    $('#btnsub').prop('disabled', true);
                },
                error: function() {
                    alert('error');
                }
            });
        }


    });


    //flash alert
    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata == 'duplikat') {
        $('.alert-danger').html('Kode Produk Sudah ada di database !').fadeIn().delay(5000).fadeOut('slow');
    } else if (flashdata == 'simpan') {
        $('.alert-success').html('Data Produk berhasil disimpan.').fadeIn().delay(3000).fadeOut('slow');
    }
</script>

<?php $this->load->view('template/footHtml'); ?>