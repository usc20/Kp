  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Hapus Data Transaksi Penjualan</h1>
      <ol class="breadcrumb">
        <li>Transaksi Penjualan</li>
        <li>Hapus</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Hapus Data Transaksi Penjualan</h4>
                <div class="example">
                  <?php foreach ($h->result() as $row){?>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID Transaksi Penjualan</label>
                        <br>
                        <label><?php echo $row->ID_TPU;?></label>
                    </div>
                     <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID Pembeli</label>
                        <br>
                        <label><?php echo $row->ID_PGW;?></label>
                    </div>
                   <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID Pegawai</label>
                        <br>
                        <label><?php echo $row->ID_PMB;?></label>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">Tanggal Transaksi Penjualan</label>
                        <br>
                        <label><?php echo $row->TGL_TPU;?></label>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Total Transaksi Penjualan</label>
                      <br>
                      <label><?php echo $row->TOTAL_TPU;?></label>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Bayar Transaksi Penjualan</label>
                      <br>
                      <label><?php echo $row->BAYAR_TPU;?></label>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Kembalian Transaksi Penjualan</label>
                      <br>
                      <label><?php echo $row->KEMBALIAN_TPU;?></label>
                    </div>
                    <div class="form-group">
                      <label>Apakah Anda yakin ingin menghapus data tersebut?</label>
                      <br>
                      <form method="post" class="form-group" action="<?php echo base_url(); ?>transaksi_penjualan/delete_tpu/<?php echo $row->ID_TPU; }?>">
                        <button type="submit" class="btn btn-danger">Ya</button>
                      </form>
                      <form method="get" action="<?php echo base_url(); ?>transaksi_penjualan/penjualan_lihat">
                        <button type="submit" class="btn btn-success">Tidak</button>
                      </form>
                    </div>
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

 