<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pemesanan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <!-- <?php echo anchor(site_url('pemesanan/create'), '<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?> -->
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('pemesanan/index'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <div class="input-group">

                            </div>
                        </form>
                    </div>
                </div>
                <form method="post" action="<?= site_url('pemesanan/deletebulk'); ?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>

                            <th>No</th>
                            <th>Gambar Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Qty</th>
                            <th>Total Bayar</th>

                        </tr><?php
                                $start = 0;
                                foreach ($pemesanan_data as $pemesanan) {


                                ?>
                            <tr>



                                <td width="80px"><?php echo ++$start ?></td>
                                <td>
                                    <a href="<?php echo base_url('assets/uploads/image/menu/') . $pemesanan->gambar_produk ?>" target="_blank">
                                        <img src="<?php echo base_url('assets/uploads/image/menu/') . $pemesanan->gambar_produk ?>" alt="" class="img img-thumbnail" width="100">
                                    </a>
                                </td>

                                <td><?php echo $pemesanan->nama_produk ?></td>
                                <td><?php echo $pemesanan->harga_produk ?></td>
                                <td><?php echo $pemesanan->qty ?></td>
                                <td><?php echo $pemesanan->total_harga ?></td>


                            </tr>
                        <?php
                                }
                        ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <a href="<?= base_url("pemesanan_pelanggan/histori"); ?>" class="btn bg-purple">Kembali</a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>