<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Stok In
        </li>
        <li class="breadcrumb-item active">Pembelian</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">



            <div class="row mt-1">
                <div class="col-md-12">
                    <div class="card card-border-app flat">
                        <div class="card-header bg-primary">Pembelian</div>
                        <div class="card-body">
                            <br>




                            <form id="form-po">
                                <div class="row">
                                    <!-- col 1 -->
                                    <div class="col-xl-3 col-md-3">
                                        <div class="form-group row has-icon">
                                            <label class="col-md-4 col-form-label" for="faktur">Faktur</label>
                                            <div class="col-md-8">
                                                <span class="fa fa-file-text-o form-control-feedback "></span>
                                                <input type="hidden" name="id_pembelian" id="id_pembelian">
                                                <input class="form-control flat" id="faktur" name="faktur" type="text" readonly>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label" for="suplier">Gudang</label>
                                            <div class="col-md-8">
                                                <select name="gudang" id="gudang" class="form-control flat">
                                                    <?php foreach ($gudang as $g) : ?>
                                                        <option value="<?= $g['kode_gudang']; ?>"><?= $g['kode_gudang']; ?> | <?= $g['nama_gudang']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>




                                    </div>



                                    <!-- col 2 -->
                                    <div class="col-md-5">
                                        <div class="form-group row has-icon">
                                            <label class="col-md-2 col-form-label" for="hf-email">Tanggal :</label>
                                            <div class="col-md-4">
                                                <span class="fa fa-calendar form-control-feedback "></span>
                                                <input class="form-control flat" id="tanggal" type="text" name="tanggal" value="<?= date('d-m-Y'); ?>" autocomplete="off">

                                            </div>
                                            <label class="col-md-2 col-form-label text-right" for="hf-email">J.tempo :</label>

                                            <div class="col-md-4">
                                                <span class="fa fa-calendar form-control-feedback "></span>
                                                <input class="form-control flat" id="jtempo" type="text" name="jtempo" value="<?= date('d-m-Y'); ?>" autocomplete="off">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>




                                        <div class="form-group row has-icon">
                                            <label class="col-md-2 col-form-label" for="suplier">Suplier</label>
                                            <div class="col-md-10">
                                                <span class="fa fa-search form-control-feedback "></span>
                                                <input type="hidden" name="id_suplier" id="id_suplier">
                                                <input type="text" name="nama_suplier" id="nama_suplier" class="form-control flat" placeholder="Cari...">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- COL 2 -->
                                    <div class="col-md-4">

                                        <div class="form-group row has-icon">
                                            <label class="col-md-4 col-form-label text-right" for="nomorPo">Nomor PO</label>
                                            <div class="col-md-8">
                                                <span class="fa fa-file-text-o form-control-feedback "></span>
                                                <div class="input-group">
                                                    <input class="form-control flat" id="nomorPo" type="text" name="nomorPo" placeholder="Nomor PO" readonly>
                                                    <span class="input-group-append">
                                                        <button class="btn btn-primary flat" type="button" id="btn_po"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row has-icon">
                                            <label class="col-md-4 col-form-label text-right" for="hf-email">No.S.Jalan</label>
                                            <div class="col-md-8">
                                                <span class="fa fa-file-text-o form-control-feedback "></span>
                                                <input class="form-control flat" name="surat_jalan" id="surat_jalan" type="text" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END ROW -->
                                </div>
                            </form>



                            <div class="row">
                                <div class="col-md-11">
                                    <table class="table table-responsive-sm table-hover table-striped table-sm mb-0 table-bordered" id="table-pembelian">
                                        <thead class="thead-blue">
                                            <tr>
                                                <!-- <th class="text-center" width="10"><input type="checkbox" id="check-all"> </th> -->
                                                <th width="50px" class="text-center">#</th>
                                                <th width="200px">Barcode</th>
                                                <th width="500px">Produk</th>
                                                <th width="80px" class="text-center">Qty</th>
                                                <th width="100px" class="text-center">Satuan</th>
                                                <th width="120px" class="text-center">Harga</th>
                                                <th width="100px" class="text-center">Diskon</th>
                                                <th width="150px" class="text-center">Subtotal</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show-detil">




                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-1 btn-kanan">

                                    <ul class="nav justify-content-start">
                                        <li class="nav-item">
                                            <button class="btn btn-outline-primary  flat mb-1 btn-transaksi text-left" id="tambah_produk"><i class="fa fa-dropbox"></i> Barang</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="btn btn-outline-primary  flat mb-1 btn-transaksi text-left" id="btn_draft"><i class="fa fa-send"></i> Draft</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="btn btn-outline-primary  flat mb-1 btn-transaksi text-left" id="btn_potongan"><i class="fa fa-usd"></i> Potongan</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="btn btn-outline-primary  flat mb-1 btn-transaksi text-left" id="btn_proses"><i class="fa fa-send"></i> Simpan</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="btn btn-outline-primary  flat mb-1 btn-transaksi text-left" id="btn_reset"><i class="fa fa-refresh"></i> Reset</button>
                                        </li>
                                    </ul>
                                </div>
                                <!-- row -->
                            </div>

                            <table class="table table-responsive-sm table-hover table-striped table-sm mb-0 table-bordered" id="table-detilpo" style="display:none">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" width="10"><input type="checkbox" id="check-all"> </th>
                                        <th class="text-center">#</th>
                                        <th width="200px">Barcode</th>
                                        <th width="300px">Produk</th>
                                        <th width="20px" class="text-center">Qty</th>
                                        <th width="20px" class="text-center">Satuan</th>
                                        <th width="100px" class="text-center">Harga</th>
                                        <th width="100px" class="text-center">Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="show-detilpo">




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

<div class="modal fade" id="Modal-po" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Input</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-prdk" action="">
                <div class="modal-body">
                    <table>
                        <thead>
                            <th>#</th>
                            <th>Nomor Po</th>
                        </thead>
                    </table>
                </div>
            </form>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="btnSimpan" type="button">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- /.modal-->


<!-- Modal edit -->

<div class="modal fade" id="Modal-eprdk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Edit</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-eprdk" action="">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="eproduk">Produk</label>
                        <div class="col-md-10">
                            <input type="hidden" name="idDetil">
                            <input type="hidden" name="ekode_prdk">
                            <input class="form-control" id="eproduk" type="text" name="eproduk" placeholder="Cari data produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="eqty">Qty</label>
                        <div class="col-md-3">
                            <input class="form-control money" name="eqty" type="text" id="eqty" placeholder="0" value="0" onkeyup="eSubtotal();">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="esatuan">Satuan</label>
                        <div class="col-md-6">
                            <select class="form-control" name="esatuan" id="esatuan">
                                <option value="">Pilih Satuan</option>
                                <?php foreach ($satuan as $s) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['nama_satuan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="eharga">Harga</label>
                        <div class="col-md-6">
                            <input class="form-control money" name="eharga" id="eharga" type="text" placeholder="0" onkeyup="eSubtotal();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="subtotal">Subtotal</label>
                        <div class="col-md-6">
                            <input class="form-control money" name="esubtotal" id="esubtotal" type="text" value="0" readonly>

                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="btnUbah" type="button">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- /.modal-->


<!-- Modal Hapus -->
<div class="modal fade" id="modal-hapusdetil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form>
                <div class="modal-body">

                    <h5>Yakin menghapus data yang diplih?</h5>
                    <input class="form-control" name="idHapus" id="idHapus" type="hidden">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-danger" type="button" id="btn-hapus">Hapus</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>

<!-- MOdal PO -->
<div class="modal fade" id="modal-po" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content modal-app">
            <div class="modal-header modal-header-app flat">
                <p class="modal-title modal-title-app">List PO</p>
                <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form>
                <div class="modal-body">

                    <h5>Pilih PO</h5>
                    <table class="table table-sm table-striped" id="table-po">
                        <thead>
                            <th>#</th>
                            <th>Nomor PO</th>
                            <th>Suplier</th>
                            <th></th>

                        <tbody>
                            <?php $no = 1;
                            foreach ($po as $p) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p['no_po']; ?></td>
                                    <td><?= $p['nama_suplier']; ?></td>
                                    <td><a href="javascript:;" class="pilih" data-nomor="<?= $p['no_po']; ?>" data-idsup="<?= $p['id_suplier']; ?>" data-sup="<?= $p['nama_suplier']; ?>">Pilih</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </thead>
                    </table>
                </div>

            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- DIALOG -->



<!-- Modal potongan -->

<div class="modal" id="modal-potongan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content modal-app" id="panel-modal">
            <div class="modal-header modal-header-app flat">
                <p class="modal-title modal-title-app">Konfirmasi</p>
                <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-potongan" action="">

                    <input class="form-control money flat" name="pot" id="pot" type="text">
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm flat" type="button" id="btn_edit_potongan"><i class="fa fa-download"></i> Simpan</button>
            </div>
            </form>
        </div>







        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>





<!-- loader -->


<div id="throbber1" class="modal" role="dialog" style="display:none; position:relative;  background-color:white;">
    <img style="width:30px" class="spiner" src="<?= base_url('assets'); ?>/img/loader/35.gif" />
</div>
<!-- end loader -->


<?php
foreach ($e_satuan as $s) {
    $result[] = array('value' => $s->id, 'text' => $s->nama_satuan);
}; ?>

<?php $this->load->view('template/footer2'); ?>
<script src="<?= base_url('assets'); ?>/editable/js/bootstrap-editable.min.js"></script>
<script>
    $(document).ready(function() {


        $('.money').mask('000.000.000.000.000', {
            reverse: true
        });

        faktur();
        // nomor po
        // spiner
        spiner();
        // datepicker
        $('#tanggal').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,

        });
        // datepicker
        $('#jtempo').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,

        });

        // Autocomplate Suplier
        $("#nama_suplier").autocomplete({
            source: "<?php echo site_url('master/suplier/get_autocompletesuplier/?'); ?>",
            select: function(event, ui) {
                $('[name="id_suplier"]').val(ui.item.description);
                $('[name="nama_suplier"]').val(ui.item.label);
                document.getElementById("ket").focus();
            }
        });


        $("#produk").autocomplete({
            source: "<?php echo site_url('transaksi/po/get_produk'); ?>",

            select: function(event, ui) {
                $('[name="kode_prdk"]').val(ui.item.description);
                $('[name="produk"]').val(ui.item.label);
                $('[name="produk"]').removeClass('is-invalid');
                $('#form-prdk').find('.invalid-feedback').text('');
                document.getElementById("qty").focus();
                const kode = $('[name="kode_prdk"]').val();

                $.ajax({
                    type: 'get',
                    url: base_url + 'transaksi/po/getharga',
                    data: {
                        kode: kode
                    },
                    dataType: 'json',
                    success: function(data) {
                        const hg = data.harga_item.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        $('[name=harga]').val(hg);


                    },
                    error: function() {
                        alert('error !');
                        return false;
                    }
                });
            }

        });


        // edit autocomplate
        $("#eproduk").autocomplete({
            source: "<?php echo site_url('transaksi/po/get_produk'); ?>",

            select: function(event, ui) {
                $('[name="ekode_prdk"]').val(ui.item.description);
                $('[name="eproduk"]').val(ui.item.label);
                $('[name="eproduk"]').removeClass('is-invalid');
                $('#form-eprdk').find('.invalid-feedback').text('');
                document.getElementById("eqty").focus();
                const kode = $('[name="ekode_prdk"]').val();

                $.ajax({
                    type: 'get',
                    url: base_url + 'transaksi/po/getharga',
                    data: {
                        kode: kode
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('[name=eharga]').val(data.harga_item);
                    },
                    error: function() {
                        alert('error !');
                        return false;
                    }
                });
            }

        });




    }); //Ahir document ready

    // Function Disable dan Enable Button
    function disabled_buton() {
        var item = $('#item').val();
        if (item == '') {
            $('#btn_po').prop('disabled', false);
            $('#btn_proses').prop('disabled', true);
            $('#btn_draft').prop('disabled', false);
            $('#btn_reset').prop('disabled', true);

        } else {
            $('#btn_po').prop('disabled', true);
            $('#btn_proses').prop('disabled', false);
            $('#btn_draft').prop('disabled', true);
            $('#btn_reset').prop('disabled', false);

        }
    }

    // edit diskon
    $('#show-detil').editable({
        container: 'body',
        selector: 'td.diskon',
        url: base_url + "pembelian/stok_in/edittable",
        title: 'Diskon ',
        type: "POST",
        //dataType: 'json',
        // validate: function(value) {
        //     if ($.trim(value) == '') {
        //         return 'This field is required';
        //     }
        // }
        success: function() {
            tampil_detil();
        }
    });

    // edit Quantity
    $('#show-detil').editable({
        container: 'body',
        selector: 'td.qty',
        url: base_url + "pembelian/stok_in/edit_qty",
        title: 'Quantity ',
        type: "POST",
        success: function() {
            tampil_detil();
        }
    });

    // edit Harga
    $('#show-detil').editable({
        container: 'body',
        selector: 'td.harga',
        url: base_url + "pembelian/stok_in/edit_harga",
        title: 'Harga ',
        type: "POST",
        success: function() {
            tampil_detil();
        }
    });

    // edit Satuan
    $('#show-detil').editable({
        container: 'body',
        selector: 'td.satuan',
        url: base_url + "pembelian/stok_in/edit_satuan",
        title: 'Satuan ',
        type: "POST",
        dataType: 'json',
        source: <?php echo json_encode($result); ?>,
        success: function() {
            tampil_detil();
        }
    });

    // tampil detil
    function tampil_detil() {
        const faktur = $('#faktur').val();


        $.ajax({
            type: 'get',
            url: base_url + 'pembelian/stok_in/getdetil',
            data: {
                faktur: faktur
            },
            success: function(html) {

                $('#show-detil').html(html);
                // nomor po
                nmr_po();
                disabled_buton();

            },
            error: function() {
                alert('error!');
                return false;
            }
        });
    }




    function nmr_po() {
        const no_faktur = $('#faktur').val();
        $.ajax({
            type: 'get',
            url: base_url + 'pembelian/stok_in/no_po',
            data: {
                no_faktur: no_faktur
            },
            dataType: 'json',
            success: function(data) {
                $('input[name=nomorPo]').val(data.nomor_po);
                $('input[name=id_suplier]').val(data.id_sup);
                $('input[name=nama_suplier]').val(data.nama_suplier);
            }
        });
    }




    // faktur otomatis
    function faktur() {
        $.ajax({
            url: base_url + 'pembelian/stok_in/faktur',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data) {
                    $('input[name=faktur]').val(data.faktur_in);
                    $('input[name=id_pembelian]').val(data.id);

                    tampil_detil();
                } else {
                    alert('data tidak Ada');
                    window.location.href = base_url + 'pembelian/stok_in';
                }


            }
        });
    }


    // Btn PO clikc
    $('#btn_po').on('click', function() {
        $('#modal-po').modal('show');
    });

    // click pilih po
    $('#table-po').on('click', '.pilih', function() {
        const no_po = $(this).attr('data-nomor');
        const id_suplier = $(this).attr('data-idsup');
        const nama_suplier = $(this).attr('data-sup');
        $('input[name=nomorPo]').val(no_po);
        $('input[name=id_suplier]').val(id_suplier);
        $('input[name=nama_suplier]').val(nama_suplier);
        spiner();
        tampil_detilpo();

        $('#modal-po').modal('hide');



    });


    //Tampil Detil PO

    function tampil_detilpo() {
        const faktur_po = $('#nomorPo').val();
        const faktur_pembelian = $('input[name=faktur]').val();
        const id_suplier = $('input[name=id_suplier]').val();

        $.ajax({
            type: 'get',
            url: base_url + 'pembelian/stok_in/getdetil_po',
            data: {
                faktur_po: faktur_po,
                faktur_pembelian: faktur_pembelian,
                id_suplier: id_suplier
            },
            success: function(html) {

                $('#show-detilpo').html(html);
                simpan_kedetil();
            },
            error: function() {
                alert('error!');
                return false;
            }
        });
    }


    // Tambahkan ke table detil Pembelian
    function simpan_kedetil() {
        // array
        const faktur = [];
        $('.faktur').each(function() {
            faktur.push($(this).val());
        });
        const nomor_po = [];
        $('.nomor_po').each(function() {
            nomor_po.push($(this).val());
        });
        const id_suplier = [];
        $('.id_suplier').each(function() {
            id_suplier.push($(this).val());
        });
        const kode_produk = [];
        $('.kode_produk').each(function() {
            kode_produk.push($(this).val());
        });
        const qty = [];
        $('.qty').each(function() {
            qty.push($(this).val());
        });
        const id_satuan = [];
        $('.id_satuan').each(function() {
            id_satuan.push($(this).val());
        });
        const harga = [];
        $('.harga').each(function() {
            harga.push($(this).val());
        });
        const diskon = [];
        $('.diskon').each(function() {
            diskon.push($(this).val());
        });
        const subtotal = [];
        $('.subtotal').each(function() {
            subtotal.push($(this).val());
        });

        $.ajax({
            type: 'post',
            url: base_url + 'pembelian/stok_in/simpan_batch',
            data: {
                faktur: faktur,
                kode_produk: kode_produk,
                qty: qty,
                id_satuan: id_satuan,
                harga: harga,
                diskon: diskon,
                subtotal: subtotal,
                nomor_po: nomor_po,
                id_suplier: id_suplier
            },
            success: function() {
                $('#show-detilpo').empty();
                tampil_detil();
            }
        });
    }


    // clik tambah produk
    $('#tambah_produk').on('click', function() {
        $('#Modal-prdk').modal('show');
        $("#produk").autocomplete("option", "appendTo", "#form-prdk");

    });

    // Hitung Subtotal

    function Subtotal() {
        var qty = $('#qty').val().replace(".", "");
        var qt = parseInt(qty);
        var hr = $('#harga').val().replace(".", "");
        var hrg = parseInt(hr);
        var Stotal = qt * hrg;
        var t = Stotal.toFixed(0);
        var St = t.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('#subtotal').val(St);
    }


    function eSubtotal() {
        var q = $('#eqty').val().replace(".", "");
        var qy = parseInt(q);
        var h = $('#eharga').val().replace(".", "");
        var hr = parseInt(h);
        var eStotal = qy * hr;
        var ettl = eStotal.toFixed(0);
        var jadi = ettl.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('#esubtotal').val(jadi);
        console.log(jadi);
    }

    // btnsimpan detil
    $('#btnSimpan').on('click', function() {
        const faktur = $('[name="fakturPo"]').val();
        const kode = $('[name="kode_prdk"]').val();
        const qty = $('[name="qty"]').val();
        const satuan = $('#satuan option:selected').attr('value');
        const harga = $('[name="harga"]').val();
        const Sttl = $('[name="subtotal"]').val();

        if (kode == '') {
            $('[name="produk"]').addClass('is-invalid');
            $('#form-prdk').find('.invalid-feedback').text('data produk salah!');
        } else {
            $.ajax({
                type: 'post',
                url: base_url + 'transaksi/po/simpandetil',
                data: {
                    faktur: faktur,
                    kode: kode,
                    qty: qty,
                    satuan: satuan,
                    harga: harga,
                    Sttl: Sttl
                },
                success: function() {
                    $('#Modal-prdk').modal('hide');
                    $('#form-prdk')[0].reset();
                    tampil_detil()

                }
            });
        }



    });


    $('#edit').on('click', function() {

        var id = "";
        var check = $('[name="check[]"]');
        // harusnya check =$(".checklist"); tp sy blum nyoba!!
        for (i = 0; i < check.length; i++) {
            if (check[i].checked) {
                id = id + check[i].value + ","; //value
            }
        }
        // jumlah data yang di pilih
        var str = id.split(',');
        // var l = str.replace(',', '');
        if (id == "") { //jika tidak ada buah yg dipilih  
            alert("Silahkan pilih  !");
            check[0].focus();
            return false;
        } else if (str.length > 2) {
            alert("Pilih satu saja untuk di edit");
            console.log(str);
        } else {
            var idD = id.replace(',', '');
            $.ajax({
                type: 'get',
                url: base_url + 'transaksi/po/getD',
                data: {
                    idD: idD
                },
                dataType: 'json',
                success: function(data) {
                    var harga = data.harga_item.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                    var Subttl = data.subtotal.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                    $('#Modal-eprdk').modal('show');
                    $('[name="idDetil"]').val(data.idDetil);
                    $('[name="ekode_prdk"]').val(data.kode_produk);
                    $('[name="eproduk"]').val(data.barcode + ' | ' + data.nama_barang);
                    $('[name="eqty"]').val(data.qty);
                    $('#esatuan').val(data.idSatuan).trigger('change');
                    $('[name="eharga"]').val(harga);
                    $('[name="esubtotal"]').val(Subttl);
                    $("#eproduk").autocomplete("option", "appendTo", "#form-eprdk");
                }
            });
        }
    });


    // function ubah

    $('#btnUbah').on('click', function() {
        const iDetl = $('[name="idDetil"]').val();
        const ekode = $('[name="ekode_prdk"]').val();
        const eqty = $('[name="eqty"]').val();
        const esatuan = $('#esatuan option:selected').attr('value');
        const hrgItem = $('[name="eharga"]').val();
        const sbttl = $('[name="esubtotal"]').val();
        if (ekode == '') {
            $('[name="eproduk"]').addClass('is-invalid');
            $('#form-eprdk').find('.invalid-feedback').text('data produk salah!');
        } else {

            $.ajax({
                type: 'post',
                url: base_url + 'transaksi/po/ubahdetil',
                data: {
                    iDetl: iDetl,
                    ekode: ekode,
                    eqty: eqty,
                    esatuan: esatuan,
                    hrgItem: hrgItem,
                    sbttl: sbttl
                },
                success: function() {
                    // $('#show-detilpo').empty();
                    tampil_detil();
                    $('#Modal-eprdk').modal('hide');
                    $('#form-prdk')[0].reset();
                }
            });
        }
    });


    // hapus
    $('#hapus').on('click', function() {
        var id = "";
        var check = $('[name="check[]"]');
        // harusnya check =$(".checklist"); tp sy blum nyoba!!
        for (i = 0; i < check.length; i++) {
            if (check[i].checked) {
                id = id + check[i].value + ","; //value
            }
        }
        // jumlah data yang di pilih

        if (id == "") { //jika tidak ada buah yg dipilih  
            alert("Silahkan pilih  !");
            check[0].focus();
            return false;
        } else {
            console.log(id);
            $('#modal-hapusdetil').modal('show');
            $('input[name=idHapus]').val(id);
        }
    });


    $('#btn-hapus').on('click', function() {
        const id = $('#idHapus').val();
        $.ajax({
            type: 'post',
            url: base_url + 'transaksi/po/hapusdetil',
            data: {
                id: id
            },
            success: function() {
                $('#modal-hapusdetil').modal('hide');
                // $('#show-detilpo').empty();
                tampil_detil();
            }
        });
    });



    // Proses Simpan
    $('#btn_simpan').on('click', function() {

        const id_pembelian = $('#id_pembelian').val();
        const faktur_in = $('#faktur').val();
        const tanggal_in = $('#tanggal').val();
        const jatuh_tempo = $('#jtempo').val();
        const no_po = $('#nomorPo').val();
        const id_suplier = $('#id_suplier').val();
        const surat_jalan = $('#surat_jalan').val();
        const total_item = $('#item').val();
        const total_harga = $('#total').val();
        const potongan = $('#potongan').val();
        const id_user = '<?= $user['id']; ?>';

        if (id_suplier == '') {
            alert('Suplier belum dipilih!');
            document.getElementById('suplier').focus();
            return false;
        } else if (total == '') {
            toastr.error("Belum ada produk untuk di simpan!");
        } else {
            $.ajax({
                type: 'post',
                url: base_url + 'pembelian/stok_in/proses',
                data: {
                    id_pembelian: id_pembelian,
                    faktur_in: faktur_in,
                    tanggal_in: tanggal_in,
                    jatuh_tempo: jatuh_tempo,
                    no_po: no_po,
                    id_suplier: id_suplier,
                    surat_jalan: surat_jalan,
                    total_item: total_item,
                    total_harga: total_harga,
                    potongan: potongan,
                    id_user: id_user
                },
                success: function() {


                },
            });
        }





    });



    // edit qty
    $('#show-detil').on('click', '.item-qty', function() {
        const id = $(this).attr('data');
        $('#form-qhd')[0].reset();
        $('#modal-qhd').find('.modal-title').text('Qty');
        $('#form-qhd').attr('action', base_url + 'pembelian/stok_in/edit_qty');
        $('input[name=res]').val('qty');
        $.ajax({
            type: 'get',
            url: base_url + 'pembelian/stok_in/get_qty',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $('#modal-qhd').modal('show');
                $('input[name=iddetil]').val(data.id_detil);
                $('input[name=qhd]').val(data.qty);
                document.getElementById("qhd").focus();
            }
        });
    });


    // Modal Potongan
    $('#btn_potongan').on('click', function() {
        const data_potongan = $('input[name=potongan]').val();
        $('#modal-potongan').modal('show');
        $('#form-potongan')[0].reset();
        $('#modal-potongan').find('.modal-title').text('Potongan Pembelian');
        $('input[name="pot"]').val(data_potongan);
    });


    // edit qhd
    $('#btn_edit_potongan').on('click', function() {
        const id = $('#id_pembelian').val();
        const pot = $('#pot').val();
        if (pot == '') {
            alert('belum ada potongan');
            return false;

        } else {


            $.ajax({
                type: 'post',
                url: base_url + 'pembelian/stok_in/potongan',
                data: {
                    id: id,
                    pot: pot
                },
                // dataType: 'json',
                success: function() {
                    block_modal();

                    setTimeout(function() {
                        unblock_modal();
                        $('#modal-potongan').modal('hide');
                        tampil_detil();
                    }, 350); //wait 0.5 second to see the spinning gif



                }
            });
        }

    });

    // blok modal

    // Loader
    function block_modal() {
        var body = $('#panel-modal');
        var w = body.css("width");
        var h = body.css("height");
        var trb = $('#throbber1');
        var position = body.offset(); // top and left coord, related to document

        trb.css({
            width: w,
            height: h,
            opacity: 0.7,
            position: 'absolute',
            top: position.top,
            left: position.left
        });
        trb.show();
    }



    // Loader
    function block() {
        var body = $('#panel-body');
        var w = body.css("width");
        var h = body.css("height");
        var trb = $('#throbber');
        var position = body.offset(); // top and left coord, related to document

        trb.css({
            width: w,
            height: h,
            opacity: 0.7,
            position: 'absolute',
            top: position.top,
            left: position.left
        });
        trb.show();
    }

    function unblock() {
        var trb = $('#throbber');
        trb.hide();
    }

    function unblock_modal() {
        var trb = $('#throbber1');
        trb.hide();
    }

    function spiner() {
        block();

        setTimeout(function() {
            unblock();
        }, 1000); //wait 0.5 second to see the spinning gif
    }

    $('#btn_reset').click(function() {
        block();

        setTimeout(function() {
            unblock();
        }, 1000); //wait 0.5 second to see the spinning gif

    });
</script>

<?php $this->load->view('template/footHtml'); ?>