<!-- Datatable css -->
<link href="<?php echo base_url('assets/datatables/media/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<br>
  <center><h2><i class="fa fa-exchange"></i> <?php echo $head; ?></h2></center>
  <hr>
<div id="notifications"><?php echo $this->session->flashdata('pesan');?></div>
  <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table">
    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> <b>Tambah Data</b></button>
        <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Nama Barang</center></th>
            <th><center>Jumlah<br>Item</center></th>
            <th><center>Pemakai</center></th>
            <th><center>Pengirim</center></th>
            <th><center>Keterangan</center></th>
            <th><center>Pembawa</center></th>
            <th><center>Penerima</center></th>
            <th><center>Aksi</center></th>
          </tr>
        </thead>
        <tbody>
  <?php
    if (empty($data)) {
      echo "<center><b>Tidak ada data</b></center>";
    }else{
      $no = 1;
      foreach ($data as $row) {
        $id = $row->id_out;
        $id_brg = $row->id_barang;
        $tgl = $row->tgl;
        $barang = $row->nama_barang;
        $pemakai = $row->nama_pemakai;
        $item = $row->item;
        $pengirim = $row->pengirim;
        $pembawa = $row->pembawa;
        $penerima = $row->penerima;
        $ktr = $row->keterangan;
        $stok = $row->stok;
  ?>
     <tr>
      <td><center><?php echo $no ?></center></td>
      <td><?php echo $barang ?></td>
      <td><center><?php echo $item ?></center></td>
      <td><?php echo $pemakai ?></td>
      <td><center><?php echo $pengirim ?></center></td>
      <td><center><?php echo $ktr ?></center></td>
      <td><center><?php echo $pembawa ?></center></td>
      <td><center><?php echo $penerima ?></center></td>
      <td><center>
        <a href="#" class="btn btn-info ubah" data-toggle="modal" data-target="#ubahModal" data-id="<?php echo $id ?>" title="Edit Data"><i class="fa fa-edit"></i></a>
        <a href="#" data-toggle="modal" data-target="#hpsModal" data-adminid="<?php echo $id ?>" data-idbrg="<?php echo $id_brg ?>" data-stokhps="<?php echo $stok ?>" data-itemhps="<?php echo $item ?>" class="btn btn-danger hapus" title="Hapus Data"><i class="fa fa-trash"></i></a>
        <a href='<?php echo site_url("transaksi/Pemakaian/cetak/$id"); ?>' class="btn btn-success hapus" title="Cetak"><i class="fa fa-print"></i></a>
      </center></td>
     </tr>
  <?php
      $no++;
      } 
    }
  ?>
        </tbody>
      </table>
    </div>

<!-- MODAL INSERT DATA -->
<?php echo form_open('transaksi/Pemakaian/add'); ?>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#84B899;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;"><center><i class="fa fa-exchange"></i> <b>Tambah Transaksi Pemakaian</b></center></h4>
        </div>
        <div class="modal-body">
          <div class="row">
           <div class="col-md-9">
            <label>Nama Pemakai</label>
        <?php
          $pemakai_atribute = 'class ="form-control select2"';
          echo form_dropdown('pemakai', $pemakaian, $pemakai_selected, $pemakai_atribute);
        ?>
           </div>
           <div class="col-md-3">
            <label>Tgl</label>
            <input type="text" name="tgl" class="form-control datepicker" placeholder="dd-mm-yyyy" required>
           </div>
          </div><br>
          <div class="row">
            <div class="col-md-9">
              <label>Jenis Barang</label>
        <?php
          $barang_atribute = 'class ="form-control select2"';
          echo form_dropdown('barangs', $barangs, $barang_selected, $barang_atribute);
        ?>
            </div>
            <div class="col-md-3">
            <label>Jumlah</label>
            <input type="number" name="item" class="form-control" placeholder="Jumlah" required>
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6">
              <label>Pengirim</label>
              <input type="text" name="pengirim" class="form-control" placeholder="Masukan Nama" required><br>
              <label>Keterangan</label>
              <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
            </div>
            <div class="col-md-6">
            <label>Pembawa</label>
            <input type="text" name="pembawa" class="form-control" placeholder="Masukan Nama" required><br>
            <label>Penerima</label>
            <input type="text" name="penerima" class="form-control" placeholder="Masukan Nama" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="save"><i class="fa fa-plus"></i> Tambahkan</button>
        </div>
      </div>
      
    </div>
  </div>
<?php echo form_close(); ?>
<!-- END MODAL INSERT -->

<!-- MODAL EDIT ADMIN -->
<?php echo form_open('Admin/update'); ?>
  <div class="modal fade" id="ubahModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#84B899;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;"><center><b><i class="fa fa-edit"></i> Ubah User</b></center></h4>
        </div>
        <div class="modal-body">
          <div class="row">
           <div class="col-md-9">
            <label>Nama Pemakai</label>
        <?php
          $pemakai_atribute = 'class ="form-control select2"';
          echo form_dropdown('pemakai', $pemakaian, $pemakai_selected, $pemakai_atribute);
        ?>
           </div>
           <div class="col-md-3">
            <label>Tgl</label>
            <input type="text" name="tgl" class="form-control datepicker" placeholder="dd-mm-yyyy" required>
           </div>
          </div><br>
          <div class="row">
            <div class="col-md-9">
              <label>Jenis Barang</label>
        <?php
          $barang_atribute = 'class ="form-control select2"';
          echo form_dropdown('barangs', $barangs, $barang_selected, $barang_atribute);
        ?>
            </div>
            <div class="col-md-3">
            <label>Jumlah</label>
            <input type="number" name="item" class="form-control" placeholder="Jumlah" required>
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6">
              <label>Pengirim</label>
              <input type="text" name="pengirim" class="form-control" placeholder="Masukan Nama" required><br>
              <label>Keterangan</label>
              <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
            </div>
            <div class="col-md-6">
            <label>Pembawa</label>
            <input type="text" name="pembawa" class="form-control" placeholder="Masukan Nama" required><br>
            <label>Penerima</label>
            <input type="text" name="penerima" class="form-control" placeholder="Masukan Nama" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="edit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan Perubahan</button>
        </div>
      </div>
      
    </div>
  </div>
  <?php echo form_close(); ?>
<!-- END MODAL EDIT ADMIN -->

<!-- MODAL HAPUS ADMIN -->
<?php echo form_open('transaksi/Pemakaian/delete'); ?>
  <div class="modal fade" id="hpsModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ff6666;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;"><center><b><i class="fa fa-trash"></i> Hapus Transaksi Pemakaian</b></center></h4>
        </div>
        <div class="modal-body">
          <center>
            <h4><b>Apa anda yakin akan menghapus data ini ?</b></h4>
            <input type="hidden" name="out_id" id="min_id">
            <input type="hidden" name="barang_id" id="idbarang">
            <input type="hidden" name="stok" id="stok">
            <input type="hidden" name="item" id="item">
          </center>
        </div>
        <div class="modal-footer">
          <div class="col-md-8">
            <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
            <button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Ya</button>
          </div>
        </div>
      </div>
      
    </div>
  </div>
<?php echo form_close();?>
<!-- END MODAL HAPUS ADMIN -->

<!-- Plugin datatable -->
<script type="text/javascript" src="<?php echo base_url('assets/datatables/media/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables/media/js/dataTables.bootstrap.min.js')?>"></script>
<script>
$('.datepicker').datepicker({
  autoclose: true,
  dateFormat: "dd-mm-yy",
  todayHighlight: true,
  orientation: "top auto",
  todayBtn: true,
  todayHighlight: true,  
});
</script>
<script>
  $('#notifications').slideDown('slow').delay(3500).slideUp('slow');
    $(document).ready(function () {
      $(function () {
        $('#table').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": false,
          "bInfo": true,
          "bAutoWidth": true,
          "pageLength": 25,
          dom: 'Bfrtip',
          buttons: ['excel', 'pdf', 'print']
        });
      });
    });
</script>

<!-- Script untuk edit admin -->
<script type="text/javascript">
$('#notifications').slideDown('slow').delay(3500).slideUp('slow');
  $(document).on("click", ".ubah", function(){
    var id = $(this).data('id');
    var user = $(this).data('eduser');
    var level = $(this).data('edlevel');
    $("#id").val(id);
    $("#user").val(user);
    $("#level").val(level);
  });
</script>

<!-- Script untuk hapus admin -->
<script type="text/javascript">
  $(document).on("click", ".hapus", function(){
    var idmin = $(this).data('adminid');
    var id_brg = $(this).data('idbrg');
    var stok = $(this).data('stokhps');
    var item = $(this).data('itemhps');
    $("#min_id").val(idmin);
    $("#idbarang").val(id_brg);
    $("#stok").val(stok);
    $("#item").val(item);
  });
</script>