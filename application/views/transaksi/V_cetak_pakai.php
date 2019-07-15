<html>
<style>
body,table{
	font-family: Agency FB;
	font-size: 90%;
}
</style>
<title>notacetak</title>
<body style="padding: 10px;">
<?php 
	$no = 1;
	foreach ($data as $row) {
		$nama = $row->nama_pemakai;
		$tgl = date('d-m-Y', strtotime($row->tgl));
		$barang = $row->nama_barang;
		$item = $row->item;
		$pengirim = $row->pengirim;
		$pembawa = $row->pembawa;
		$penerima = $row->penerima;
		$ktr = $row->keterangan;
		//$hormat = $row->hormat;
?>

<span><strong style="font-size:150%">PT. MARGA DWITAGUNA</strong></span>
<hr>

		<div class="col-md-12" style="">
			<span>
		<table width='100%'>
		<tr>
			<td align=left style="font-size:120%">
			  Manado, <?php echo $tgl ?>
			  <br>
			  Proyek : <b><?php echo $nama ?></b>
			</td>
			<td>Tempat gambar</td>
		</tr>
		</table>
			<hr>
			<table border=0 width="100%" class="table table-striped img-responsive">
				<thead>
					<tr>
						<td colspan="6"><center style="font-size: 150%"><ins>Bukti Pengeluaran Gudang / Pengiriman Barang</ins></center><br></td>
					</tr>
					<tr>
						<th>No</th>						
						<th>Nama Barang</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody id="detail_cart">
					<tr>
						<td style="font-size: 130%;" align="center"><?php echo $no ?></td>
						<td style="font-size: 130%;" align="center"><?php echo $barang ?></td>
						<td style="font-size: 130%;" align="center"><?php echo $item ?></td>
						<td style="font-size: 130%;" align="center"><?php echo $ktr ?></td>
					</tr>	
				</tbody>				
			</table>
			<hr>
		<b style="font-size: 120%;">Cat. : Material yang tidak sesuai segera lapora ke kantor pusat.</b><br><br>
		<table width='100%'>
		<tr>
			<td align="center" style="font-size:120%"> Pengirim, <br><br>
				<?php echo $pengirim ?>
			</td>
			<td align="center" style="font-size:120%"> Pembawa,<br><br>
				<?php echo $pembawa ?>
			</td>
			<td align="center" style="font-size:120%"> Penerima,<br><br>
				<?php echo $penerima ?>
			</td>
		</tr>
		</table>
		</div>
<?php
	$no++;
	}
?>
<script type="text/javascript">
	window.print();
	document.location.href = '/e-gudang/index.php/transaksi/Pemakaian'
</script>
</body>
</html>