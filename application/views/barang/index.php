<main class="main">
    <!-- Breadcrumb-->

    <div class="container-fluid">
        <div class="animated fadeIn">


            <br>
            <div class="row">

                <div class="col-lg-12">



                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="alert alert-success" role="alert" style="display:none;">Menu Updated</div>

                    <div class="card card-border-app flat">
                        <div class="card-header bg-primary ">
                            <i class="fa fa-align-justify"></i>Table Produk</div>
                        <div class="card-body">
                            <!-- Nav -->
                            <nav class="navbar navbar-expand-lg navbar-menu">
                                <a class="btn btn-teal btn-sm mr-2 flat" href="<?= base_url('barang/barang/tambahbarang'); ?>"><i class="fa fa-dropbox"></i> Tambah Baru</a>


                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item dropdown">
                                            <div class="btn-group">
                                                <button class="btn btn-teal btn-sm dropdown-toggle flat" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file"></i> File</button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" href="#">Excel</a>
                                                    <a class="dropdown-item" href="#">Pdf</a>
                                                    <a class="dropdown-item" href="#">Csv</a>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                    <form class="form-inline my-2 my-lg-0" id="form-filter">
                                        <!-- Kategori -->
                                        <div class="form-group row">
                                            <div class="col-md-12 mr-1">
                                                <?php echo $form_kategori; ?>
                                            </div>
                                        </div>
                                        <!-- akhir katergori -->
                                        <!-- merek -->
                                        <div class="form-group row">
                                            <div class="col-md-12 mr-1">
                                                <?php echo $form_merek; ?>
                                            </div>
                                        </div>
                                        <!-- akhir merek -->


                                        <!-- berdasarkan -->
                                        <div class="form-group row">
                                            <div class="col-md-12 mr-1">
                                                <input type="text" class="form-control form-control-sm flat" placeholder="Barcode" id="barcode" name="barcode">
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <div class="col-md-12 mr-1">
                                                <input class="form-control form-control-sm flat" id="keyword" type="text" name="keyword" placeholder="Nama Barang" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 ">
                                                <button class="btn btn-teal btn-sm flat" type="button" id="btn-filter"> <i class="fa fa-filter"></i> Filter</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </nav>
                            <!-- Akhir Nav -->
                            <table class="table table-responsive-sm table-bordered table-striped  table-sm" id="table">
                                <thead class="thead-blue">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Barcode</th>
                                        <th>Kategori</th>
                                        <th>Merek</th>
                                        <th>Satuan 1</th>
                                        <th>Harga</th>
                                        <th class="text-center"> Action</th>

                                    </tr>
                                </thead>
                                <tbody>

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

<div class="modal fade" id="produkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('barang/hapus'); ?>" method="post">
                <div class="modal-body">

                    <h5>Yakin menghapus data produk ini?</h5>
                    <input class="form-control" name="idP" id="idP" type="hidden">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
<!-- /.modal-->



<?php $this->load->view('template/footer2'); ?>


<script src="<?= base_url('assets/js/barang.js'); ?>"></script>
<script>
    //=======table====
    $(document).ready(function() {


        var table;
        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "searching": false,
            "ordering": false,
            "bLengthChange": false,


            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": base_url + 'barang/barang/ajax_list',
                "type": "POST",
                "data": function(data) {
                    data.merek = $('#merek').val();
                    data.kategori = $('#kategori').val();
                    data.keyword = $('#keyword').val();
                    data.barcode = $('#barcode').val();

                }
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

        $('#btn-filter').click(function() { //button filter event click
            table.ajax.reload(); //just reload table
        });
        $('#btn-reset').click(function() { //button reset event click
            $('#form-filter')[0].reset();
            table.ajax.reload(); //just reload table
        });

        // Changr Kategori
        $('#kategori').on('change', function() {
            table.ajax.reload();
        });
        // Change Merek
        $('#merek').on('change', function() {
            table.ajax.reload();
        });


        //=====akhir table

    });
    //====akhir table==



    //========= Flash alert======//
    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata == 'hapus') {
        $('.alert-success').html('Data produk telah di hapus!').fadeIn().delay(3000).fadeOut('slow');
    }

    // delete produk
    function delete_produk(id) {
        $('input[name=idP]').val(id);
        $('#produkModal').modal('show');

    }
    // akhir delete
</script>

<?php $this->load->view('template/footHtml'); ?>