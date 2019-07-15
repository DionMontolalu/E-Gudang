<link href="<?php echo base_url('assets/datepicker/dist/DateTimePicker.css'); ?>" rel="stylesheet">
<br>
<div class="row">
<div class="container">
	<center><h2><i class="fa fa-print"></i> <?php echo $head; ?></h2></center>
	<hr><div id="dtBox"></div>

<?php echo form_open('laporan/Rmasuk') ?>
  <div class="row">
	<div class="col-md-3">
	  <label>Nama Gudang</label>
	  <select class="form-control" name="gudang_id" id="gudang">
		<option value="">--pilih gudang--</option>
        <?php
        	foreach ($gudang as $gdg) {
            	echo "<option value='$gdg[id_gudang]'>$gdg[nama_gudang]</option>";
            }
        ?>
	  </select>
	</div>

	<div class="col-md-3">
	  <label>Nama Barang</label>
	  <select class="form-control" name="barang_id" id="barang">
		<option></option>
	  </select>
	</div>

	<div class="col-md-4">
	  <div class="row">
	  	<div class="col-md-6">
	  	 <label>Mulai Tanggal</label>
	  	 <div class="input-group">
  		   <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  		   <input type="text" name="tgl_awal" class="form-control" data-field="date" readonly placeholder="Klik Disini"  value="<?php echo set_value('tgl_awal'); ?>">
    	 </div>
	  	</div>
	  	<div class="col-md-6">
	  	 <label>Sampai Tanggal</label>
	  	 <div class="input-group">
  		  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  		  <input type="text" name="tgl_akhir" class="form-control" data-field="date" readonly placeholder="Klik Disini"  value="<?php echo set_value('tgl_akhir'); ?>">
 		 </div>
	  	</div>
	  </div>
	</div>

	<div class="col-md-2">
	  <div class="row">
	  	<div class="col-md-4">
	  	<label>&nbsp</label>
	  		<button type="submit" class="btn btn-warning" name="view" title="Tampilkan"><i class="fa fa-play-circle"></i></button>
	  	</div>
	  	<div class="col-md-4">
	  	<label>&nbsp</label>
	  		<button type="submit" class="btn btn-success" name="print" title="Cetak"><i class="fa fa-print"></i></button>
	  	</div>
      <div class="col-md-4">
      <label>&nbsp</label>
        <button type="submit" class="btn btn-info" name="all" title="Cetak Semua"><i class="fa fa-files-o"></i></button>
      </div>
	  </div>
	</div>
  </div>
<?php echo form_close(); ?>

  <hr>
  <table id="table" class="table table-bordered table-user" width="100%">
	<thead>
		<tr>
      <td><b>NO</b></td>
			<td><b>TANGGAL</b></td>
			<td><b>NAMA GUDANG</b></td>
			<td><b>NAMA BARANG</b></td>
			<td><b>JUMLAH</b></td>
		</tr>
  	</thead>
  	<tbody>
  	 <?php
      $no = 1;
  	 	if (empty($data)) {
        echo "<tr><td colspan=5><center><b>-- Data tidak ditemukan --</b></center></td></tr>";
      }else{
        foreach ($data as $row) {
          $tgl = date('d-m-Y', strtotime($row->tgl));
          $gudang = $row->nama_gudang;
          $barang = $row->nama_barang;
          $item = $row->item;
     ?>
  		<tr>
  			<td><center><?php echo $no ?></center></td>
  			<td><center><?php echo $tgl ?></center></td>
  			<td><?php echo $gudang ?></td>
  			<td><?php echo $barang ?></td>
        <td><center><?php echo $item ?></center></td>
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

<script type="text/javascript">
$(function(){
  $.ajaxSetup({
    type:"POST",
    url: "<?php echo base_url('index.php/transaksi/Masuk/ambil_data') ?>",
    cache: false,
  });

  $("#gudang").change(function(){
    var value = $(this).val();
    if(value>0){
      $.ajax({
        data:{modul:'barang',id:value},
        success: function(respond){
          $("#barang").html(respond);
        }
      })
    }
  });
})
</script>

<script src="<?php echo base_url(); ?>assets/datepicker/dist/DateTimePicker.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#dtBox").DateTimePicker();
  });
</script>