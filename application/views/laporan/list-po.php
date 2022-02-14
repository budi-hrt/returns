<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            Laporan
        </li>
        <li class="breadcrumb-item active">List PO</li>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <h5>List PO</h5>
            <br>
            <div class="row">

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>Table List PO</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm" id="table-listpo">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nomor PO</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Item</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center"> Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($po as $p) : ?>

                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td class="text-center"><?= $p['no_po']; ?></td>
                                            <td class="text-center"><?= date('d F Y', strtotime($p['tanggal'])); ?></td>
                                            <td class="text-center"><?= $p['jumlah_item']; ?></td>
                                            <td class="text-right"><?= number_format($p['total'], 0, ',', '.'); ?></td>
                                            <td class="text-center">
                                                <?php if ($p['status_po'] == 'Proses') : ?>
                                                    <span class="badge badge-secondary"> <?= $p['status_po']; ?></span>
                                                <?php elseif ($p['status_po'] == 'Selesai') : ?>
                                                    <span class="badge badge-success"> <?= $p['status_po']; ?></span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger"> <?= $p['status_po']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="badge badge-sm badge-primary item-cetak" target="blank" title="Cetak" href="<?= base_url('transaksi/po/cetakpo/' . md5($p['id'])) . '/' . md5($p['no_po']); ?>"><i class="fa fa-print"></i></a>
                                                <a class="badge badge-sm badge-warning item-edit" title="Edit" href="javascript:;" data="<?= $p['id']; ?>"><i class="fa fa-pencil"></i></a>
                                                <a class="badge badge-sm badge-danger item-batal" title="Hapus" href="javascript:;"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
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




<?php $this->load->view('template/footer2'); ?>

<script>
    $('#table-listpo').on('click', '.item-cetak', function() {
        const id = $(this).attr('data');
        $.ajax({
            type: 'get',
            url: base_url + 'transaksi/po/terima',
        });
    });
</script>


<?php $this->load->view('template/footHtml'); ?>