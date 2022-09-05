<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pemesanan Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <?php foreach ($pemesanan_data as $value) {
                    ?>
                        <tr>
                            <td>Produk : <?php echo cek_nama_produk($value->id_produk); ?></td>
                            <td>QTY : <?php echo $value->qty; ?></td>
                        </tr>

                    <?php  } ?>
                    <tr>
                        <td>Nama Pemesan</td>
                        <td><?php echo $nama_pemesan ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Meja</td>
                        <td><?php echo $no_meja ?></td>
                    </tr>
                    <tr>
                        <td>Nama Cheff</td>
                        <td><?php echo $id_cheff ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td><?php echo $tanggal_pemesanan ?></td>
                    </tr>
                    <tr>
                        <td>Total Bayar</td>
                        <td><?php echo rupiah($total) ?></td>
                    </tr>
                    <tr>
                        <td>
                            <a class="btn btn-primary" href="<?php echo base_url('pemesanan/admin') ?>">Back</a>
                            <a class="btn btn-success" target="_BLANK" href="<?php echo base_url('pemesanan/print/' . $id_pesanan) ?>">Print</a>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>