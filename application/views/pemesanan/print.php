<!-- cdn bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="container">
  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>QTY</th>
        </tr>
      </thead>
      <?php $no = 1; ?>
      <?php foreach ($pemesanan_data as $value) {
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo cek_nama_produk($value->id_produk); ?></td>
          <td><?php echo $value->qty; ?></td>
        </tr>

      <?php  } ?>


    </table>
  </div>

  <div class="row">
    <table class="table table-stripped" style="border:0">
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
    </table>
  </div>

</div>


<script>
  window.print();
</script>