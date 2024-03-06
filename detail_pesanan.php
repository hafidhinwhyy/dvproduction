<?php 
	include"inc/config.php"; 
	$aa = mysql_query("update pesanan SET `read`='1' where id=$_GET[id]") or die(mysql_error());
	include"layout/header.php";
?>
	<div class="container">
		<?php
			$q = mysql_query("select * from pesanan where id='$_GET[id]'");
			$data = mysql_fetch_object($q);
			$ongkir = $data->ongkir;
			$kota = $data->kota;
			$dataPembayaran = mysql_query("select * from pembayaran where id_pesanan='$data->id' and status='verified'") or die (mysql_error());
			$totalPembayaran = 0;
			while ($d = mysql_fetch_array($dataPembayaran)) {
				$totalPembayaran += $d['total'];
			}
			$q1 = mysql_query("select * from detail_pesanan where pesanan_id='$data->id'");
			$totalBayar = 0;
			while($data2=mysql_fetch_object($q1)){
				$katpro1 = mysql_query("select * from produk where id='$data2->produk_id'");
				$a = mysql_fetch_object($katpro1);
				$totalBayar += ($a->harga * $data2->qty);
			}
			$totalBayar += $ongkir;
		?>
		<h4 class="pull-left">Detail Pesanan</h4> 
		<a class="btn btn-sm btn-primary pull-right" href="profile.php">&laquo; Kembali</a>
		<br>
		<hr> 
		<div class="row col-md-12">
		<table class="table table-striped table-hove">
			<tr>
				<td width="200">Nama Pemesan</td> 
				<?php
					$katpro = mysql_query("select * from user where id='$data->user_id'");
							$user = mysql_fetch_array($katpro);
				?>
				<td><?php echo $user['nama'] ?></td> 
			</tr>
			<tr>
				<td>Tanggal Pesan</td>  
				<td><?php echo substr($data->tanggal_pesan,0,10); ?></td> 
			</tr>
			<tr>
				<td>Tanggal Digunakan</td>  
				<td><?php echo $data->tanggal_digunakan ?></td> 
			</tr>
			<tr>
				<td>No Telp</td> 
				<td><?php echo $data->telephone ?></td> 
			</tr>
			<tr>
				<td>Alamat</td> 
				<td><?php echo $data->alamat ?></td> 
			</tr>
			<tr>
				<td>Kecamatan</td> 
				<td><?php echo $data->kota ?></td> 
			</tr>
			<tr>
				<td>Total Bayar</td>
				<td><b><?php echo "Rp. " . number_format($totalBayar, 0, ",", "."); ?></b></td>
			</tr>
			<tr>
				<td>Dibayar</td>
				<td><?php echo "Rp. " . number_format($totalPembayaran, 0, ",", "."); ?></td>
			</tr>
			<tr>
				<td>Kekurangan</td>
				<td><?php echo "Rp. " . number_format($totalBayar - $totalPembayaran, 0, ",", "."); ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php echo $data->status; ?></td>
			</tr>
		</table>
		</div>
		<div class="row col-md-12"> 
		<h4>List Pesanan</h4> 
		<hr> 
		<table class="table table-striped table-hove"> 
		<thead> 
				<tr> 
					<th></th> 
					<th>Nama Produk</th> 
					<th>Harga Satuan</th> 
					<th>QTY</th> 
					<th>Harga</th>   
				</tr> 
			</thead> 
			<tbody> 
		<?php 
			$q = mysql_query("select * from detail_pesanan where pesanan_id='$_GET[id]'");
			$total = 0;
		while($data=mysql_fetch_object($q)){ ?> 
				<tr> 
					<th scope="row"><?php echo $no++; ?></th> 
					<?php
						$katpro = mysql_query("select * from produk where id='$data->produk_id'");
						$p = mysql_fetch_object($katpro);
					?>
					<td><?php echo $p->nama ?></td> 
					<td><?php echo number_format($p->harga, 0, ',', '.')  ?></td>  
					<td><?php echo $data->qty ?></td>
					<?php $t = $data->qty*$p->harga; 
						$total += $t;
					?>
					<td><?php echo number_format($t, 0, ',', '.')  ?></td>  
				</tr>
			<?php } ?>
				<tr>
					<td colspan="4" class="text-center">
					<h5><b>TOTAL HARGA</b></h5>
					</td>
					<td class="text-bold">
					<h5><b><?php  echo number_format($total, 0, ',', '.') ?></b></h5>
					</td>
				</tr>
			</tbody> 
		</table>
		</div>
    </div> <!-- /container -->
<?php include"layout/footer.php"; ?>