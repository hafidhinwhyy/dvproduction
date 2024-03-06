<?php
	ob_start();
	include"../inc/config.php";
	validate_admin_not_login("login.php");
	if (@$_GET['act'] != "cetak") {
		include"inc/header.php";
	}
?>
<div class="container">
	<h4>Laporan Penjualan</h4>
	<div class="col-md-12">
		<hr/>
	</div>
	<div class="row">
		<table class="table table-striped" border="1">
			<tr>
				<th></th>
				<th>Nama</th>
				<th>Tanggal Digunakan</th>
				<th>Tanggal Pesan</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
			<tbody>
				<?php
					$totalSemua = 0;
					$totalOngkir = 0;
					$no = 0;
					$q = mysql_query("Select pesanan.* from pesanan order by id desc") or die (mysql_error());
					while ($data = mysql_fetch_object($q)) {
						$totalHarga = 0;
						$no++;
						$q2 = mysql_query("Select detail_pesanan.*, produk.harga from detail_pesanan INNER JOIN produk ON detail_pesanan.produk_id = produk.id where pesanan_id = '$data->id'") or die (mysql_error());
						while ($d = mysql_fetch_object($q2)) {
							$totalHarga += $d->harga * $d->qty;
						}
						$totalSemua += $totalHarga;
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data->nama; ?></td>
					<td><?php echo $data->tanggal_digunakan; ?></td>
					<td><?php echo $data->tanggal_pesan; ?></td>
					<td><?php echo "Rp. " .number_format($totalHarga, 0, ",", "."); ?></td>
					<td><?php echo $data->status; ?></td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td colspan="4" align="right">
						<font size="3">
							<b>TOTAL</b>
						</font>
					</td>
					<td>
						<font size="3"><?php echo "Rp. ". number_format($totalSemua, 0, ",", "."); ?></font>
					</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script>
	window.print();
</script>
<?php include"inc/footer.php"; ?>