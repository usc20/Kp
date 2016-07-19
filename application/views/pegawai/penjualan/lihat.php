  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Lihat Data Transaksi Penjualan</h1>
      <ol class="breadcrumb">
        <li>Transaksi Penjualan</li>
        <li>Lihat</li>
      </ol>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Data Transaksi Penjualan</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>ID Transaksi Penjualan</th>
                <th>ID Pembeli</th>
                <th>ID Pegawai</th>
                <th>Tanggal Transaksi Penjualan</th>
                <th>Total Transaksi Penjualan</th>
                <th>Bayar Transaksi Penjualan</th>
                <th>Kembalian Transaksi Penjualan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($h->result() as $row){?>
              <tr>
                 <td><?php echo $row->ID_TPU;?></td>
                 <td><?php echo $row->ID_PMB;?></td>
                 <td><?php echo $row->ID_PGW;?></td>
                 <td><?php echo $row->TGL_TPU;?></td>
                 <td><?php echo $row->TOTAL_TPU;?></td>
                 <td><?php echo $row->BAYAR_TPU;?></td>
                 <td><?php echo $row->KEMBALIAN_TPU;?></td>
                 <td class="text-nowrap">
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php echo base_url(); ?>transaksi_penjualan/form_update_TPU/<?php echo $row->ID_TPU;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>transaksi_penjualan/halaman_delete_TPU/<?php echo $row->ID_TPU;?>"><i class="icon wb-close" aria-hidden="true"></i></a>
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
