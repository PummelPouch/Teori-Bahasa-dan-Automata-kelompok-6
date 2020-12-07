
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
          <div class="row">
            <!-- Member -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Kas Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countMsk ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Psychologist -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Data Kas Keluar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countKlr ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Schedule -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Data</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countKlr+$countMsk ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-save fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          
          </div>


          <div class="row">
          <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Kas Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($sumMsk,0,',','.')?>,-</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Psychologist -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Kas Keluar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($sumKlr,0,',','.')?>,-</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Schedule -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Kas Bersih</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($sumMsk-$sumKlr,0,',','.')?>,-</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          



    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
</div>