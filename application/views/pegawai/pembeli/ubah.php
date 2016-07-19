  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Ubah Data Pembeli</h1>
      <ol class="breadcrumb">
        <li>Pembeli</li>
        <li>Ubah</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Ubah Data Pembeli</h4>
                <div class="example">
                  <?php foreach ($h->result() as $row){?>
                  <form class="form-group" action="<?php echo base_url();?>pembeli/update_pembeli/<?php echo $row->ID_PMB;?>" method="post">
                    
                    <!-- <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="id_pmb"
                        placeholder="<?php echo $row->ID_PMB;?>" autocomplete="off" />
                    </div>  -->
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">Nama</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="nama_pmb"
                        value="<?php echo $row->NAMA_PMB;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Alamat</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="alamat_pmb"
                      value="<?php echo $row->ALAMAT_PMB;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Telp</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="notlp_pmb"
                      value="<?php echo $row->NOTLP_PMB; }?> " autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Ubah</button>
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