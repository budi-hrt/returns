<main class="main">

    <div class="container-fluid">
        <div class="animated fadeIn">



            <div class="row mt-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Invoice
                            <strong> <?= $po['no_po']; ?><input type="hidden" id="no_po" value="<?= $po['no_po']; ?>"> </strong>
                            Tanggal :
                            <strong> <?= $po['tanggal']; ?></strong>
                            <span class="float-right"> <strong>Status:</strong> <?= $po['status_po']; ?></span>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <input type="hidden" id="id_po" value="<?= md5($po['id_po']); ?>">
                                <div class="col-sm-6">
                                    <h6 class="mb-3">From:</h6>
                                    <div>
                                        <strong>R.A Mart</strong>
                                    </div>
                                    <div>Btn Bumi Tinggede Indah 3, Sigi</div>
                                    <div>Email: adeeva@outlook.com</div>
                                    <div>Phone: 0813 5438 0434</div>
                                </div>

                                <div class="col-sm-6">
                                    <h6 class="mb-3">To:</h6>
                                    <div>
                                        <strong><?= $po['nama_suplier']; ?></strong>
                                    </div>
                                    <div><?= $po['alamat_suplier']; ?></div>
                                    <div>Email: </div>
                                    <div>Phone: <?= $po['telephone_suplier']; ?></div>
                                </div>



                            </div>
                            <table class="table table-responsive-sm table-hover table-outline mb-0 " id="table-po">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Produk</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Satuan</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="tampildetilpo">


                                </tbody>
                            </table>

                            <div class="row mt-2 ">
                                <div class="col-md-12 ">

                                    <ul class="nav justify-content-end">
                                        <li class="nav-item">
                                            <a href="<?= base_url('pembelian/po/cetakpo/' . md5($po['id_po'])) . '/' . md5($po['no_po']); ?>" class="btn btn-primary mr-1" id="cetak" target="blank"> <i class="fa fa-print"> Cetak</i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="btn btn-success mr-1" id="edit"><i class="fa fa-pencil"> Ubah data</i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="btn btn-danger" id="pdf"><i class="fa fa-pdf-o"> Simpan Pdf</i></a>
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




<?php $this->load->view('template/footer2'); ?>

<script>
    $(document).ready(function() {
        tampil_detil();
        toastr.success("Data PO berhasil di simpan");
    });

    // tampil detil
    function tampil_detil() {
        const faktur_po = $('#no_po').val();


        $.ajax({
            type: 'get',
            url: base_url + 'pembelian/po/getdetilinvoice',
            data: {
                faktur_po: faktur_po
            },
            success: function(html) {

                $('#tampildetilpo').html(html);
            },
            error: function() {
                alert('error!');
                return false;
            }
        });
    }


    $('#edit').on('click', function() {
        const id_po = $('#id_po').val();
        window.location.href = base_url + 'pembelian/po/editpo/' + id_po;
    });
</script>

<?php $this->load->view('template/footHtml'); ?>