<main class="main">

    <div class="container-fluid">
        <div class="animated fadeIn">



            <div class="row mt-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Ubah Data Purchase Order</div>
                        <div class="card-body">
                            <br>
                            <form id="form-po">
                                <div class="row">
                                    <!-- col 1 -->
                                    <div class="col-md-4">
                                        <div class="form-group row has-icon">
                                            <label class="col-md-3 col-form-label" for="faktourPo">Faktur PO</label>
                                            <div class="col-md-5">
                                                <input type="hidden" id="id_po" value="<?= $faktur['id_po']; ?>">
                                                <span class="fa fa-file-text-o form-control-feedback "></span>
                                                <input class="form-control flat" id="fakturPo" name="fakturPo" type="text" readonly value="<?= $faktur['no_po']; ?>">
                                            </div>
                                        </div>



                                        <div class="form-group row has-icon">
                                            <label class="col-md-3 col-form-label" for="nama_suplier">Suplier</label>
                                            <div class="col-md-9">
                                                <span class="fa fa-search form-control-feedback "></span>
                                                <input type="hidden" name="suplier" id="suplier" value="<?= $faktur['id_sup']; ?>">
                                                <input type="text" name="nama_suplier" id="nama_suplier" class="form-control flat" value="<?= $faktur['nama_suplier']; ?>">
                                            </div>
                                        </div>


                                    </div>



                                    <!-- col 2 -->
                                    <div class="col-md-8">
                                        <div class="form-group row has-icon">
                                            <label class="col-md-2 col-form-label" for="hf-email">Tanggal</label>
                                            <div class="col-md-3">
                                                <span class="fa fa-calendar-o form-control-feedback "></span>
                                                <input class="form-control flat" id="tanggal" type="text" name="tanggal" value="<?= date('d-m-Y', strtotime($faktur['tanggal'])); ?>">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>

                                        <div class="form-group row has-icon">
                                            <label class="col-md-2 col-form-label" for="hf-email">Keterangan</label>
                                            <div class="col-md-10">
                                                <span class="fa fa-font form-control-feedback "></span>
                                                <input class="form-control flat" name="ket" id="ket" type="text" value="<?= $faktur['keterangan_po']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <table class="table table-sm table-hover table-outline mb-0 table-bordered" id="table-po">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" width="10"><input type="checkbox" id="check-all"> </th>
                                        <th class="text-center">#</th>
                                        <th>SKU</th>
                                        <th>Produk</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Satuan</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Subtotal</th>

                                    </tr>
                                </thead>
                                <tbody id="show-detilpo">




                                </tbody>
                            </table>

                            <div class="row mt-2 ">
                                <div class="col-md-12 ">

                                    <ul class="nav justify-content-end">
                                        <li class="nav-item">
                                            <a href="javascript:;" class="btn btn-primary btn-sm mr-1 flat" id="tambah_produk"><i class="fa fa-dropbox"> Produk</i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="btn btn-warning btn-sm mr-1 flat" id="proses"><i class="fa fa-send"> Proses</i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="btn btn-success btn-sm mr-1 flat" id="edit"><i class="fa fa-pencil"> Edit</i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="btn btn-danger btn-sm flat" id="hapus"><i class="fa fa-trash"> Hapus</i></a>
                                        </li>
                                    </ul>
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

<div class="modal fade" id="Modal-prdk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-app">
            <div class="modal-header modal-header-app flat">
                <p class="modal-title modal-title-app">Form Input</p>
                <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            <form id="form-prdk" action="">
                <div class="modal-body">
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="produk">Produk</label>
                        <div class="col-md-10">
                            <input type="hidden" name="kode_prdk">
                            <span class="fa fa-search form-control-feedback "></span>
                            <input class="form-control flat" id="produk" type="text" name="produk" placeholder="Cari data produk">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="qty">Qty</label>
                        <div class="col-md-3">
                            <span class="fa fa-at form-control-feedback "></span>
                            <input class="form-control money flat" name="qty" type="text" id="qty" placeholder="0" onkeyup="Subtotal();">
                        </div>

                    </div>
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="satuan">Satuan</label>
                        <div class="col-md-6">
                            <span class="fa fa-bars form-control-feedback "></span>
                            <select class="form-control flat" name="satuan" id="satuan">
                                <option value="">Pilih Satuan</option>
                                <?php foreach ($satuan as $s) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['nama_satuan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="harga">Harga</label>
                        <div class="col-md-6">
                            <span class="fa fa-usd form-control-feedback "></span>
                            <input class="form-control money flat" name="harga" id="harga" type="text" placeholder="0" onkeyup="Subtotal();">
                        </div>
                    </div>
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="subtotal">Subtotal</label>
                        <div class="col-md-6">
                            <span class="fa fa-usd form-control-feedback "></span>
                            <input class="form-control money flat" name="subtotal" id="subtotal" type="text" value="0" readonly>

                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button class="btn btn-success flat" id="btnSimpan" type="button"><i class="fa fa-floppy-o"></i> Tambahkan</button>
            </div>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- /.modal-->


<!-- Modal edit -->

<div class="modal fade" id="Modal-eprdk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-app">
            <div class="modal-header modal-header-app flat">
                <p class="modal-title modal-title-app">Form Edit</p>
                <button class="close modal-btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            <form id="form-eprdk" action="">
                <div class="modal-body">
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="eproduk">Produk</label>
                        <div class="col-md-10">
                            <input type="hidden" name="idDetil">
                            <input type="hidden" name="ekode_prdk">
                            <span class="fa fa-search form-control-feedback "></span>
                            <input class="form-control flat" id="eproduk" type="text" name="eproduk" readonly>
                        </div>
                    </div>
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="eqty">Qty</label>
                        <div class="col-md-3">
                            <span class="fa fa-at form-control-feedback "></span>
                            <input class="form-control money flat" name="eqty" type="text" id="eqty" placeholder="0" value="0" onkeyup="eSubtotal();">
                        </div>

                    </div>
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="esatuan">Satuan</label>
                        <div class="col-md-6">
                            <span class="fa fa-bars form-control-feedback "></span>
                            <select class="form-control flat" name="esatuan" id="esatuan">
                                <option value="">Pilih Satuan</option>
                                <?php foreach ($satuan as $s) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['nama_satuan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="eharga">Harga</label>
                        <div class="col-md-6">
                            <span class="fa fa-usd form-control-feedback "></span>
                            <input class="form-control money flat" name="eharga" id="eharga" type="text" placeholder="0" onkeyup="eSubtotal();">
                        </div>
                    </div>
                    <div class="form-group row has-icon">
                        <label class="col-md-2 col-form-label" for="subtotal">Subtotal</label>
                        <div class="col-md-6">
                            <span class="fa fa-usd form-control-feedback "></span>
                            <input class="form-control money flat" name="esubtotal" id="esubtotal" type="text" value="0" readonly>

                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button class="btn btn-warning flat" id="btnUbah" type="button"> <i class="fa fa-floppy-o"></i> Simpan</button>
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
                    <span aria-hidden="true">??</span>
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


<?php $this->load->view('template/footer2'); ?>
<script>
    $(document).ready(function() {
        $('.money').mask('000.000.000.000.000', {
            reverse: true
        });
        tampil_detil();

        // datepicker
        $('#tanggal').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,

        });




        // Autocomplate Suplier
        $("#nama_suplier").autocomplete({
            source: "<?php echo site_url('master/suplier/get_autocompletesuplier/?'); ?>",
            select: function(event, ui) {
                $('[name="suplier"]').val(ui.item.description);
                $('[name="nama_suplier"]').val(ui.item.label);
                document.getElementById("ket").focus();
            }
        });



        $("#produk").autocomplete({
            source: "<?php echo site_url('pembelian/po/get_produk'); ?>",

            select: function(event, ui) {
                $('[name="kode_prdk"]').val(ui.item.description);
                $('[name="produk"]').val(ui.item.label);
                $('[name="produk"]').removeClass('is-invalid');
                $('#form-prdk').find('.invalid-feedback').text('');
                document.getElementById("qty").focus();
                const kode = $('[name="kode_prdk"]').val();

                $.ajax({
                    type: 'get',
                    url: base_url + 'pembelian/po/getharga',
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
            source: "<?php echo site_url('pembelian/po/get_produk'); ?>",

            select: function(event, ui) {
                $('[name="ekode_prdk"]').val(ui.item.description);
                $('[name="eproduk"]').val(ui.item.label);
                $('[name="eproduk"]').removeClass('is-invalid');
                $('#form-eprdk').find('.invalid-feedback').text('');
                document.getElementById("eqty").focus();
                const kode = $('[name="ekode_prdk"]').val();

                $.ajax({
                    type: 'get',
                    url: base_url + 'pembelian/po/getharga',
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

        // input nama produk
        $('#produk').on('input', function() {
            $('input[name=kode_prdk]').val('');
            $('input[name=produk]').removeClass('is-invalid');
        });

    });

    // tampil detil
    function tampil_detil() {
        const faktur_po = $('#fakturPo').val();


        $.ajax({
            type: 'get',
            url: base_url + 'pembelian/po/getdetil',
            data: {
                faktur_po: faktur_po
            },
            success: function(html) {

                $('#show-detilpo').html(html);
            },
            error: function() {
                alert('error!');
                return false;
            }
        });
    }




    // clik tambah produk
    $('#tambah_produk').on('click', function() {
        $('#Modal-prdk').modal('show');
        $('#form-prdk')[0].reset();
        $('input[name=kode_prdk]').val('');
        $('#produk').removeClass('is-invalid');
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
                url: base_url + 'pembelian/po/simpandetil',
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





    // checkall
    $("#check-all").click(function() { // Ketika user men-cek checkbox all
        if ($(this).is(":checked")) // Jika checkbox all diceklis
            $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
        else // Jika checkbox all tidak diceklis
            $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
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
                url: base_url + 'pembelian/po/getD',
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
                url: base_url + 'pembelian/po/ubahdetil',
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
            url: base_url + 'pembelian/po/hapusdetil',
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
    $('#proses').on('click', function() {

        const id_po = $('#id_po').val();
        const no_po = $('#fakturPo').val();
        const tanggal = $('#tanggal').val();
        const id_suplier = $('input[name=suplier]').val();
        const jumlah_item = $('#item').val();
        const total = $('#total').val();
        const keterangan_po = $('#ket').val();
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
                url: base_url + 'pembelian/po/ubahdatapo',
                data: {
                    id_po: id_po,
                    no_po: no_po,
                    tanggal: tanggal,
                    id_suplier: id_suplier,
                    jumlah_item: jumlah_item,
                    total: total,
                    keterangan_po: keterangan_po,
                    id_user: id_user
                },
                success: function() {

                    window.location.href = "<?php echo  base_url('pembelian/po/invoice'); ?>";
                },
            });
        }





    });
</script>

<?php $this->load->view('template/footHtml'); ?>