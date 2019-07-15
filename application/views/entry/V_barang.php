<!-- Datatable css -->
<link href="<?php echo base_url('assets/datatables/media/css/dataTables.bootstrap.css')?>" rel="stylesheet">

<br>
<div class="container">
	<center><h2><i class="fa fa-cube"></i> <?php echo $head; ?></h2></center>
	<hr>
<div id="notifications"><?php echo $this->session->flashdata('pesan');?></div>
	<div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table">
      <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> <b>Tambah Data</b></button>
      	<thead>
          <tr>
          	<th><center>No</center></th>
          	<th><center>Nama Barang</center></th>
          	<th><center>Stok</center></th>
            <th><center>Nama Gudang</center></th>
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
				$id = $row->id_barang;
				$barang = $row->nama_barang;
				$stok = $row->stok;
        $gudang = $row->nama_gudang;
	?>
		 <tr>
		 	<td><center><?php echo $no ?></center></td>
		 	<td> <?php echo $barang ?></td>
		 	<td><center><?php echo $stok ?></center></td>
      <td><center><?php echo $gudang ?></center></td>
		 	<td><center>
		 		<a href="#" class="btn btn-info ubah" data-toggle="modal" data-target="#ubahModal" data-id="<?php echo $id ?>" data-edbarang="<?php echo $barang ?>" data-edstok="<?php echo $stok ?>" data-gudang="<?php echo $gudang ?>"><i class="fa fa-edit"></i> Edit</a>
		 		<a href="#" data-toggle="modal" data-target="#hpsModal" data-adminid="<?php echo $id ?>" class="btn btn-danger hapus"><i class="fa fa-trash"></i> Hapus</a>
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
</div>

<!-- MODAL INSERT DATA -->
<?php echo form_open('entry/Barang/add'); ?>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#84B899;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;"><center><i class="fa fa-cube"></i> <b>Tambah Barang</b></center></h4>
        </div>
        <div class="modal-body">
          <div class="container">
           <div class="col-md-9">
            <label>Nama Barang</label>
            <input type="text" name="barang" class="form-control" placeholder="Nama Barang">
           </div>
           <div class="col-md-3">
            <label>Stok Barang</label>
            <input type="number" name="stok" class="form-control" placeholder="Stok">
           </div>
          </div><br>
          <div class="container">
            <div class="col-md-9">
              <label>Nama Gudang</label>
        <?php
          $gudang_atribute = 'class ="form-control select2"';
            echo form_dropdown('gudang', $gudang_pil, $gudang_selected, $gudang_atribute);
        ?>
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
<?php echo form_open('entry/Barang/update'); ?>
  <div class="modal fade" id="ubahModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#84B899;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;"><center><b><i class="fa fa-edit"></i> Ubah Barang</b></center></h4>
        </div>
        <div class="modal-body">
         	<div class="container">
           <div class="col-md-9">
           <input type="hidden" name="id" id="id">
            <label>Nama Barang</label>
            <input type="text" name="barang" id="barang" class="form-control" placeholder="Nama Barang">
           </div>
           <div class="col-md-3">
            <label>Stok Barang</label>
            <input type="number" name="stok" id="stok" class="form-control" placeholder="Stok">
           </div>
          </div><br>
          <div class="container">
            <div class="col-md-9">
              <label>Nama Gudang</label>
        <input type="text" name="gudang" class="form-control" placeholder="Nama Gudang" id="gdg1" readonly>
        <?php
          $gudang_atribute = 'class ="form-control select2" id="gdg2" style="display:none"';
            echo form_dropdown('gudang', $gudang_pil, $gudang_selected, $gudang_atribute);
        ?>
            </div>
            <div class="col-md-3"><label>&nbsp</label>
              <button type="button" class="btn btn-info" style="display:block;" id="show" onclick="Showing()"> Ganti Gudang</button>
              <button type="button" class="btn btn-warning" style="display:none;" id="hide" onclick="Hideing()"> Batal Ganti</button>
            </div>
          </div>     
        </div>
        <div class="modal-footer">
          <button type="submit" name="edit2" id="btn" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan Perubahan</button>
        </div>
      </div>
      
    </div>
  </div>
  <?php echo form_close(); ?>
<!-- END MODAL EDIT ADMIN -->

<!-- MODAL HAPUS ADMIN -->
<?php echo form_open('entry/Barang/delete'); ?>
  <div class="modal fade" id="hpsModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ff6666;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;"><center><b><i class="fa fa-trash"></i> Hapus Barang</b></center></h4>
        </div>
        <div class="modal-body">
          <center>
            <h4><b>Apa anda yakin akan menghapus data ini ?</b></h4>
            <input type="hidden" name="id_bar" id="min_id">
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

<script type="text/javascript">
  function Showing(){ //Show untuk menampilkan dropdown nama guru
    document.getElementById("gdg1").style.display="none";
    document.getElementById("gdg2").style.display="block";
    document.getElementById("show").style.display="none";
    document.getElementById("hide").style.display="block";
    //Button
    document.getElementById("btn").name="edit1";
  }
  function Hideing() {
    document.getElementById("gdg1").style.display="block";
    document.getElementById("gdg2").style.display="none";
    document.getElementById("show").style.display="block";
    document.getElementById("hide").style.display="none";
    //Button
    document.getElementById("btn").name="edit2";
  }
</script>

<!-- Script untuk edit admin -->
<script type="text/javascript">
  $(document).on("click", ".ubah", function(){
    var id = $(this).data('id');
    var barang = $(this).data('edbarang');
    var stok = $(this).data('edstok');
    var gudang = $(this).data('gudang');
    $("#id").val(id);
    $("#barang").val(barang);
    $("#stok").val(stok);
    $("#gdg1").val(gudang);
  });
</script>

<!-- Script untuk hapus admin -->
<script type="text/javascript">
  $(document).on("click", ".hapus", function(){
    var idmin = $(this).data('adminid');
    $("#min_id").val(idmin);
  });
</script>