  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Ubah Akun Admin</h1>
      <ol class="breadcrumb">
        <li>Akun Admin</li>
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
                <h4 class="example-title">Ubah Akun Admin</h4>
                <div class="example">
                  <?php foreach ($h->result() as $row){?>
                  <form class="form-group" action="<?php echo base_url();?>pemilik/update_pemilik/<?php echo $row->ID_PML;?>" method="post">
                    <!--<div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="id_pml"
                        value="<?php echo $row->ID_PML;?>" autocomplete="off" />
                    </div>-->

                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">Nama</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="nama_pml"
                        value="<?php echo $row->NAMA_PML;?>" autocomplete="off" />
                    </div>
                      <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">Password</label>
                        <input type="password" class="form-control" id="inputBasicFirstName" name="pswd_pml"
                        value="<?php echo $row->PSWD_PML;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Alamat</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="alamat_pml"
                      value="<?php echo $row->ALAMAT_PML;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Telp</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="notlp_pml"
                      value="<?php echo $row->NOTLP_PML; }?>" autocomplete="off" />
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