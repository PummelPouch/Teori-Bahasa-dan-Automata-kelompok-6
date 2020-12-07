<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


  <div class="col-md-14 pl-3 pt-1 ">
  
  <h3><i class="fas fa-arrow-down pr-2"></i>Edit Data Kas Keluar</h3><hr>
  <form action="<?php echo base_url('masuk/EditAction') ?>" method="post">
      <div class="form-group col-sm-5" >
           <input type="text" class="form-control form-control-user" value="<?php echo $data_msk->id ?> " disabled>
           <input type="text" id="id" name="id"  value="<?php echo $data_msk->id ?> " hidden>
      </div>
      <div class="form-group col-sm-5" >
                     <label>Keterangan</label>
                     <input type="text" class="form-control form-control-user" id="keterangan" placeholder="Isikan Keterangan..." name="keterangan" value="<?php echo $data_msk->keterangan ?>">
                </div>
                <div class="form-group col-sm-5" >
                     <label>Tanggal</label>
                     <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" value="<?php echo $data_msk->tanggal ?>">
                </div>
                <div class="form-group col-sm-5" >
                     <label>Jumlah</label>
                     <input type="number" class="form-control form-control-user" id="jumlah" placeholder="Isikan Jumlah Kas..." name="jumlah" value="<?php echo $data_msk->jumlah ?>">
                </div>
       <div class="form-group col-sm-5">
          <button type="submit" class="btn btn-primary btn-user btn-block">Edit Data</button>
      </div>
  </form>
  </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->