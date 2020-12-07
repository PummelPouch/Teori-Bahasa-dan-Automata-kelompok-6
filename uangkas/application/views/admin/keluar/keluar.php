<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<div class="col-md-14 pl-3 pt-1 ">
<h3><i class="fas fa-arrow-up pr-2"></i>Daftar Kas Keluar</h3><hr>
<?= $this->session->flashdata('message'); ?>
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-square mr-2"></i>
  Tambah Data
</button>


<table class="table  table-bordered table-hover">
<thead class="thead-dark thead-center">
<tr>
    <th scope="col" style="width:50px">No</th>
    <th scope="col" style="text-align:center;">Keterangan</th>
    <th scope="col" style="text-align:center;">Tanggal</th>
    <th scope="col" style="text-align:center;">Jumlah</th>
    <th colspan="2" scope="col" style="text-align:center;">More</th>
  </tr>
</thead>
<tbody>
  <?php
      $count = 0;
      foreach($data_klr as $row) {
        $count = $count + 1;
      
  
  ?>

  <tr>
    <th scope="row"><?php echo $count ?></th>
    <td><?php echo $row->keterangan ?></td>
    <td><?php echo date('d F Y', strtotime($row->tanggal)); ?></td>
    <td>Rp. <?php echo number_format($row->jumlah,0,',','.')?>,-</td>
    <td style="text-align:center;"><a href="<?php echo base_url('keluar/editkeluar/') . $row->id ?>" class="btn fas fa-edit bg-warning p-2 text-white rounded" data-toggle="tooltip" title="Edit"></a></td>
    <td style="text-align:center;"><a href="<?php echo base_url('keluar/DeleteData/') . $row->id ?>" class="btn far fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete" onclick="return confirm('Delete?');"></a></td>

      <?php } ?>
  </tr>
  <tr?>
  <th scope="col" colspan="3" style="text-align:center;">Total</th>
  <th scope="col"> Rp. <?php echo number_format($jumlah,0,',','.')?>,-</th>
  </tr>
</tbody>
</table>

</div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kas Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>keluar/add" method="post">
                <div class="form-group col-sm" >
                     <label>Keterangan</label>
                     <input type="text" class="form-control form-control-user" id="keterangan" placeholder="Isikan Keterangan..." name="keterangan" required>
                </div>
                <div class="form-group col-sm" >
                     <label>Tanggal</label>
                     <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group col-sm" >
                     <label>Jumlah</label>
                     <input type="number" class="form-control form-control-user" id="jumlah" placeholder="Isikan Jumlah Kas..." name="jumlah" required>
                </div>
                
        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Data</button></form>
      </div>
    </div>
  </div>
</div>