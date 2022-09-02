<div class="row" style="margin-top: 100px;">
    <!-- pesan sukses -->
    <?php if ($this->session->flashdata('success')) { ?>
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> <?= $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php } ?>
    <h2>
        <center>List Pemesanan Saya</center>
    </h2>

    <table class="table table-responsive">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $value) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= cek_nama_produk($value->id_produk); ?></td>
                    <td><?= $value->qty; ?></td>
                    <td><?= rupiah($value->total_harga); ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <!-- kembali -->
        <tfoot>
            <tr>
                <td colspan="3">
                    <a href="<?= base_url() ?>pemesanan_pelanggan/berhasil" class="btn btn-sm btn-primary">Kembali</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>