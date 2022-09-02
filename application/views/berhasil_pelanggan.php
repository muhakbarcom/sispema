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
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th>Total Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $value) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $value->tanggal_pemesanan; ?></td>
                    <td><?= $value->status_pemesanan; ?></td>
                    <td><?= rupiah($value->total_pembayaran); ?></td>
                    <td>
                        <a href="<?= base_url() ?>pemesanan_pelanggan/berhasil_detail/<?= $value->id_pemesanan; ?>" class="btn btn-sm btn-primary">Detail</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>