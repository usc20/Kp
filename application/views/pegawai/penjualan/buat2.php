  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Buat Data Penjualan</h1>
      <ol class="breadcrumb">
        <li>Penjualan</li>
        <li>Buat</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Buat Transaksi Penjualan</h4>
                <div class="example">
                  <form class="form-group" action="<?php echo base_url();?>transaksi_penjualan/insert_transaksi_penjualan" method="post">
                    <div class="form-group">
                      <label class="control-label" for="inputPassword">Waktu Transaksi Penjualan</label>
                      <input type="date" class="form-control" id="inputPassword" name="TGL_TPU"
                      required="required">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputUserName">Id Transaksi Penjualan</label>
                      <input type="text" class="form-control" id="inputUserName" name="ID_TPU" required="required">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputPassword">Id Pembeli</label>
                       <select class="form-control" name="ID_PMB" >
                                <option></option> 
                                <?php 
                                foreach ($pem as $row1) {?>
                                <option><?php echo $row1->ID_PMB;?></option>
                                <?php } ?>
                      </select>  
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputPassword">Id Pegawai</label>
                        <select class="form-control" name="ID_PGW" >
                                <option></option> 
                                <?php 
                                foreach ($peg as $row2) {?>
                                <option><?php echo $row2->ID_PGW;?></option>
                                <?php } ?> 
                        </select>
                    </div>

                    <?php for($i=1;$i<11;$i++) {?>
                    <div class="form-group">
                            <div class="row row-lg">
                            <div class="col-sm-6">
                              <label class="control-label" for="inputPassword">Barang</label>
                              <select class="form-control" name="<?php echo 'nama_brg'.$i;?>" >
                                <option></option>
                                <?php 
                                foreach ($h as $row) {?>
                                <option><?php echo $row->NAMA_BRG;?></option>
                                <?php } ?>
                              </select> 
                            </div>
                            <div class="col-sm-6">
                              <label class="control-label" for="inputPassword">Jumlah</label>
                              <input type="text" class="form-control" id="inputPassword" name="<?php echo 'Jumlah'.$i;?>" >  
                            </div>
                            </div>
                    </div>
                    <?php } ?>
                   
                      <button type="submit" class="btn btn-primary">Buat</button>
                    
                  </form>
                </div>
              </div>
              <!-- End Example Basic Form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->