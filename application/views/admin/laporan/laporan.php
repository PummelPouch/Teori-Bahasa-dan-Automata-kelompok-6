<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<div class="col-md-14 pl-3 pt-1 ">
<h3><i class="fas fa-scroll pr-2"></i>Laporan Kas</h3><hr>
<?= $this->session->flashdata('message'); ?>



<a href="<?= base_url('laporan/cetak?p=') ?>excel&tglawal=<?= $this->session->flashdata('tglawal') ?>&tglakhir=<?= $this->session->flashdata('tglakhir') ?>" class=" btn btn-success mb-4"><i class="fas fa-file-excel"></i> Cetak Laporan</a>
<table class="table  table-bordered table-hover ">
<thead class="thead-dark thead-center">
  <tr>
    <th scope="col" style="width:50px">No</th>
    <th scope="col" style="text-align:center;">Tanggal</th>
    <th scope="col" style="text-align:center;">Id Trans</th>
    <th scope="col" style="text-align:center;">Uraian</th>
    <th scope="col" style="text-align:center;">Debit</th>
    <th scope="col" style="text-align:center;">Kredit</th>
    <th scope="col" style="text-align:center;">Saldo</th>
  </tr>
</thead>
<tbody>
  <?php
      $count = 0;
      $saldo = 0;
      foreach($jurnal as $row) {
        $count = $count + 1;
        
        if ($row['debit'] == 0) {
            $jumlah = $row['kredit'];

            $saldo = $saldo - $jumlah;
        } else {
            $jumlah = $row['debit'];
            $saldo = $saldo + $jumlah;
        }
  
  ?>

  <tr>
    <th scope="row"><?php echo $count ?></th>
    <td><?php echo date('d F Y', strtotime($row['tanggal'])); ?></td>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['keterangan'] ?></td>
    <td>Rp. <?php echo number_format($row['debit'],0,',','.')?>,-</td>
    <td>Rp. <?php echo number_format($row['kredit'],0,',','.')?>,-</td>
    <td>Rp. <?php echo number_format($saldo,0,',','.')?>,-</td>

      <?php } ?>
  </tr>
  
</tbody>
</table>


</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
