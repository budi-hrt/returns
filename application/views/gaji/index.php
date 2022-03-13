<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Gaji</li>
        <li class="breadcrumb-item">
            Penggajian
        </li>
        <!-- <li class="breadcrumb-item active">Data Stok In</li> -->
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">



            <div class="row">

                <div class="col-lg-12">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="alert alert-success" role="alert" style="display:none;">Menu Updated</div>
                    <div class="card card-border-app flat">
                        <div class="card-header bg-primary">
                            <i class="fa fa-align-justify"></i>Table Penggajian
                            <div class="card-header-actions">
                                <a class="btn btn-putih btn-sm flat" href="javascript:;" id="tambah" style="margin-top:-10px;">
                                    <i class="icon-settings"></i>Tambah Baru
                                </a>

                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm" id="table-upah">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>Kode</th>
                                        <th>Priode</th>
                                        <th>Jumlah Penerima</th>
                                        <th>Total Upah</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center"> update by</th>

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
<!-- Loader -->
<div id="throbber" class="modal" role="dialog" style="display:none; position:relative; opacity:0.6; background-color:white;">
    <img class="spiner" src="<?= base_url('assets'); ?>/img/loader/5.gif" />
</div>


<?php $this->load->view('template/footer2'); ?>
<script src="<?= base_url('assets/js/gaji.js'); ?>"></script>
<script>
    // Flash alert
    // const flashdata = $('.flash-data').data('flashdata');
    // if (flashdata == 'suplierupdate') {
    //     $('.alert-success').html('Suplier berhasil di ubah!').fadeIn().delay(3000).fadeOut('slow');
    // }





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
</script>

<?php $this->load->view('template/footHtml'); ?>