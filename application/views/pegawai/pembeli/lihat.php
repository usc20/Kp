  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Lihat Data Pembeli</h1>
      <ol class="breadcrumb">
        <li>Pembeli</li>
        <li>Lihat</li>
      </ol>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Data Pembeli</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--<tr>
                <td>A0000</td>
                <td>Ekky Melynda</td>
                <td>Kampus ITS Sukolilo, Surabaya</td>
                <td>081234567890</td> -->

             <?php foreach ($h->result() as $row){?>
              <tr>
                 <td><?php echo $row->ID_PMB;?></td>
                 <td><?php echo $row->NAMA_PMB;?></td>
                 <td><?php echo $row->ALAMAT_PMB;?></td>
                 <td><?php echo $row->NOTLP_PMB;?></td>
                 <td class="text-nowrap">
                  <button type="submit" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php echo base_url(); ?>pembeli/form_update_pembeli/<?php echo $row->ID_PMB;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>pembeli/halaman_delete_pembeli/<?php echo $row->ID_PMB;?>"><i class="icon wb-close" aria-hidden="true"></i></a>
                  </button>    
                </td>
            </tr>
        <?php }?>
            </tbody>
          </table>
          
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->