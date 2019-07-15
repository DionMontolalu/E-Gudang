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
		$nama = $row->nama_gudang;
		$tgl = date('d-m-Y', strtotime($row->tgl));
		$barang = $row->nama_barang;
		$item = $row->item;
		$harga = number_format($row->harga);
		$jumlah = number_format($row->jumlah_harga);
		$ktr = $row->keterangan;
		$hormat = $row->hormat;
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
			  Kepada Yth.
			  Tn/Toko <b><?php echo $nama ?></b> <br>
			  di Tempat
			</td>
			<td>Tempat gambar</td>
		</tr>
		</table>
			<hr>
			<table border=0 width="100%" class="table table-striped img-responsive">
				<thead>
					<tr>
						<td colspan="6"><center style="font-size: 150%"><ins>Nota Permintaan Barang</ins></center><br></td>
					</tr>
					<tr>
						<th>No</th>						
						<th>Barang</th>
						<th>Banyak</th>
						<th>Harga Satuan</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody id="detail_cart">
					<tr>
						<td style="font-size: 100%;" align="center"><?php echo $no ?></td>
						<td style="font-size: 100%;" align="center"><?php echo $barang ?></td>
						<td style="font-size: 100%;" align="center"><?php echo $item ?></td>
						<td style="font-size: 100%;" align="center">Rp. <?php echo $harga ?></td>
						<td style="font-size: 100%;" align="center">Rp. <?php echo $jumlah ?></td>
						<td style="font-size: 100%;" align="center"><?php echo $ktr ?></td>
					</tr>	
				</tbody>				
			</table>
			<hr>
		<table width='100%'>
		<tr>
			<td align=left style="font-size:100%"> Nanti diperhitungkan atas rekening kami, terima kasih.
			</td>
			<td><center>Hormat kami,<br>
				<?php echo $hormat ?></center>
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
	document.location.href = '/e-gudang/index.php/transaksi/Masuk'
</script>
</body>
</html>