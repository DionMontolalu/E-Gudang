<!DOCTYPE html>
<html>
<head>
	<title>Cetak Transaksi Masuk</title>
</head>
<body>
	<h2><center><?php echo $head ?></center></h2>
	<table border="1" align="center">
	  <thead>
		<tr>
			<th><center>NO</center></th>
			<th><center>TANGGAL</center></th>
			<th><center>NAMA GUDANG</center></th>
			<th><center>NAMA BARANG</center></th>
			<th><center>JUMLAH</center></th>
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

<script type="text/javascript">
	window.print();
	document.location.href = '/e-gudang/index.php/laporan/Rmasuk'
</script>
</body>
</html>