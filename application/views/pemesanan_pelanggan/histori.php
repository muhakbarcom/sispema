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
                            <th>Nama Pemesan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total Pembayaran</th>
                            <th>Metode Pembayaran</th>
                            <th>Status Pemesanan</th>
                            <th>Status Pembayaran</th>
                            <th>Bukti Transfer</th>
                            <th>Action</th>
                        </tr><?php
                                foreach ($pemesanan_data as $pemesanan) {
                                    $id_pelanggan = $pemesanan->id_pelanggan;
                                    $nama_pemesan = $this->db->query("select concat(first_name,' ',last_name) as nama from users where id =" . $id_pelanggan)->row();
                                    $nama_pemesan = $nama_pemesan->nama;
                                ?>
                            <tr>



                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $nama_pemesan ?></td>
                                <td><?php echo tanggal_transaksi($pemesanan->tanggal_pemesanan) ?></td>
                                <td><?php echo rupiah($pemesanan->total_pembayaran) ?></td>
                                <td><?php echo $pemesanan->metode_pembayaran ?></td>
                                <td><?php echo $pemesanan->status_pemesanan ?></td>
                                <td><?php echo $pemesanan->status_pembayaran ?></td>
                                <td>
                                    <a href="<?php echo base_url('assets/uploads/image/bukti_tf/') . $pemesanan->bukti_transfer ?>" target="_blank">
                                        <img src="<?php echo base_url('assets/uploads/image/bukti_tf/') . $pemesanan->bukti_transfer ?>" alt="" class="img img-thumbnail" width="100">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('pemesanan_pelanggan/detail_histori/') . $pemesanan->id_pemesanan; ?>" class="btn btn-warning">Detail</a>
                                </td>
                            </tr>
                        <?php
                                }
                        ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <a href="<?= base_url(); ?>" class="btn bg-purple">Kembali</a>
                            <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>