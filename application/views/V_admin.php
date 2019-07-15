<!-- Datatable css -->
<link href="<?php echo base_url('assets/datatables/media/css/dataTables.bootstrap.css')?>" rel="stylesheet">

<br>
<div class="container">
	<center><h2><i class="fa fa-user"></i> <?php echo $head; ?></h2></center>
	<hr>
<div id="notifications"><?php echo $this->session->flashdata('pesan');?></div>
	<div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table">
      <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i> <b>Tambah Data</b></button>
      	<thead>
          <tr>
          	<th><center>No</center></th>
          	<th><center>Username</center></th>
          	<th><center>Level User</center></th>
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
				$id = $row->id_admin;
				$user = $row->username;
				$level = $row->level;
	?>
		 <tr>
		 	<td><center><?php echo $no ?></center></td>
		 	<td><center><?php echo $user ?></center></td>
		 	<td><center><?php echo $level ?></center></td>
		 	<td><center>
		 		<a href="#" class="btn btn-info ubah" data-toggle="modal" data-target="#ubahModal" data-eduser="<?php echo $user ?>" data-id="<?php echo $id ?>" data-edlevel="<?php echo $level ?>"><i class="fa fa-edit"></i> Edit</a>
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
<?php echo form_open('Admin/add'); ?>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#84B899;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;"><center><i class="fa fa-user-plus"></i> <b>Tambah Admin</b></center></h4>
        </div>
        <div class="modal-body">
          <div class="container">
           <div class="col-md-6">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username">
           </div>
           <div class="col-md-6">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
           </div>
          </div><br>
          <div class="container">
            <div class="col-md-6">
              <label>Level User</label>
                <select class="form-control" name="level">
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
                </select>
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
         	<div class="container">
          	<div class="col-md-6">
          	<input type="hidden" name="id_min" id="id">
          		<label>Username</label>
          		<input type="text" name="username" class="form-control" id="user" placeholder="Username">
          	</div>
          	<div class="col-md-6">
          		<label>Ganti Password</label>
          		<input type="password" name="password" class="form-control" id="pass" placeholder="Password" required>
          	</div>
          </div><br>
          <div class="container">
          	<div class="col-md-6">
          		<label>Level User</label>
          		<select class="form-control" name="level" id="level">
          			<option value="admin">Admin</option>
          			<option value="user">User</option>
          		</select>
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
<?php echo form_open('Admin/delete'); ?>
  <div class="modal fade" id="hpsModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ff6666;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;"><center><b><i class="fa fa-trash"></i> Hapus Admin</b></center></h4>
        </div>
        <div class="modal-body">
          <center>
            <h4><b>Apa anda yakin akan menghapus data ini ?</b></h4>
            <input type="hidden" name="id_min" id="min_id">
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

<!-- Script untuk edit admin -->
<script type="text/javascript">
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
    $("#min_id").val(idmin);
  });
</script>