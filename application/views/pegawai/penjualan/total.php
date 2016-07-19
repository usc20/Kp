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
                  <?php foreach ($t as $row) {
                  ?>
                  <form class="form-group" action="<?php echo base_url();?>transaksi_penjualan/insert_total_TPU/<?php echo $row->ID_TPU;?>" method="post">
                    <div class="form-group">
                      <label class="control-label" for="inputUserName">ID Transaksi</label>
                      <input type="text" class="form-control" id="inputUserName" name="ID_TPU" required="required" value= "<?php echo $row->ID_TPU;?>">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputPassword">Total Belanja</label>
                      <label class="control-label" for="inputPassword"><?php echo $row->TOTAL_TPU; }?></label>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputUserName">Uang Pembayaran</label>
                      <input type="text" class="form-control" id="inputUserName" name="BAYAR_TPU" required="required">
                    </div>                   
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