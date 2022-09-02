<?php 
// print_r($this->session->userdata());die;
?>
<div class="col-md-12" style="margin-top: 100px;">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <!-- <th>Gambar</th> -->
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Sub Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php echo form_open('pemesanan/update'); ?>
            <?php $i = 1; ?>
            <?php
            foreach ($this->cart->contents() as $items) :
            ?>
                <tr>
                    <!-- <td>Gambar</td> -->
                    <td><?= $items['name']; ?></td>
                    <td><?= rupiah($items['price']); ?></td>
                    <!-- <td><?= $items['qty']; ?></td> -->
                    <td width="10%">
                        <?php
                        $id_produk = $items['id'];
                        // $stok_menu = $this->db->query('select stok_produk from produk where id_produk=' . $id_produk)->row();
                       
                            // $stok_max = $stok_menu->stok_produk;
                        // var_dump($stok_max);
                        // exit;
                        ?>
                        <?php echo form_input(array(
                            'name' => $i . '[qty]',
                            'value' => $items['qty'],
                            'maxlength' => 3,
                            'min' => 0,
                            'size' => 1,
                            'type' => 'number',
                            'class' => 'form-control',
                        )) ?>
                    </td>
                    <td><?= rupiah($items['subtotal']); ?></td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                        <a href="<?php echo base_url() ?>pemesanan/hapus/<?php echo $items['rowid']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach ?>

        </tbody>
    </table>
    <?= form_close(); ?>
    <form action="<?= base_url() ?>pemesanan/checkout" method="POST">>
    <div class="row">
        <div class="col-md-6 text-right">
            <input type="text" id="nama_pemesan" placeholder="Nama Pemesan" name="nama_pemesan">
        </div>
        <div class="col-md-6">
            <input type="text" id="no_meja" placeholder="Nomor Meja" name="no_meja">
        </div>
    </div>
    <br>
    <div class="row">
        <?php $jumlah_menu_item = count($this->cart->contents()); ?>
        <div class="col-md-6 text-right"><b> Total Item </b><?= $jumlah_menu_item; ?>
            <b> Total Quantity </b> <?= $this->cart->total_items(); ?>
        </div>

        <div class="col-md-6"> <b>Total Bayar</b> <?= rupiah($this->cart->total()); ?></div>
    </div>
    <div class="row mt-3">

    </div>
   
    
    <div class="row mt-5"> 
        <div class="col-md-6"><a href="<?= base_url('frontend'); ?>" class="btn btn-primary">Kembali</a></div>
        <div class="col-md-6 text-right"><button type="submit" class="btn btn-primary">Checkout</button></div>
    </div>
                        </form>



</div>
<script>
function namapemesan() {
  x = document.getElementById("nama_pemesan").value;
    $.ajax({
     type: "POST",
     url: "Pemesanan/set_session_np",
     data: [
        'session'=>x
     ]
   }).done(function( msg ) {
     alert( "Data Saved: " + msg );
   });
}
function nomeja() {
    $.get("Pemesanan/set_session_nm/" + export_type, function (result) {
    console.log(result);
})
}
</script>