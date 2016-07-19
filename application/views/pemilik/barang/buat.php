  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Buat Data Barang</h1>
      <ol class="breadcrumb">
        <li>Barang</li>
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
                <h4 class="example-title">Buat Data Barang</h4>
                <div class="example">
                  <form autocomplete="off" action="<?php echo base_url();?>barang/insert_barang" method="post">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="id_brg"
                        placeholder="A0000" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">Nama Barang</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="nama_brg"
                        placeholder="Pensil" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label >Jenis Barang</label>
                      <div >
                          <select class="form-control" name="jenis_brg" required="off">
                              <option value="">Pilih salah satu</option>
                              <option value="Obat">Obat</option>
                              <option value="Beras">Beras</option>
                              <option value="Snack">Snack</option>
                              <option value="Minuman">Minuman</option>
                              <option value="Makanan">Makanan</option>
                              <option value="Alat Tulis">Alat Tulis</option>
                              <option value="Alat Pembersih">Alat Pembersih</option>
                              <option value="Alat Elektronik">Alat Elektronik</option>
                              <option value="Keperluan Dapur">Keperluan Dapur</option>
                              <option value="Perlengkapan Bayi">Perlengkapan Bayi</option>
                              <option value="Perlengkapan Rumah Tangga">Perlengkapan Rumah Tangga</option>
                              <option value="dll.">dll.</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Harga Jual Barang</label>
                      <input type="money" class="form-control" id="inputBasicEmail" name="harga_jual"
                      placeholder="3000" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Harga Beli Barang</label>
                      <input type="money" class="form-control" id="inputBasicEmail" name="harga_beli"
                      placeholder="2000" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Keuntungan Barang</label>
                      <input type="money" class="form-control" id="inputBasicEmail" name="keuntungan_brg"
                      placeholder="1000" autocomplete="off" />
                    </div>
                    
                    <div class="form-group">
                      <label>Status Barang</label>
                      <div>
                          <select class="form-control" name="status_brg" required="off">
                              <option value="">Pilih salah satu</option>
                              <option value="Habis">Habis</option>
                              <option value="Tersedia">Tersedia</option>                              
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Buat</button>
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