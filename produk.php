<?php 
	include"inc/config.php";
	include"layout/header.php";
?>
	<div class="container" style="margin-top:10px; font-family: Maiandra GD;">
		<div class="row">
			<div class="col-md-3">
				<div style="width:100%; height:auto; padding-top:3px;padding-bottom:3px;">
					<h4 class="text-center">Kategori Menu</h4>
				</div>
				<ul class="kategori">
					<?php 
					$kategori = mysql_query("SELECT * FROM kategori_produk"); 
					while($data = mysql_fetch_array($kategori)){
					?>
					<li><a href="<?php echo $url; ?>produk.php?kategori=<?php echo $data['id'] ?>"><?php echo $data['nama']; ?> (
					<?php 
					$ck = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE kategori_produk_id='$data[id]'"));
						if($ck > 0){ echo $ck; 
						}else{ echo 0; } ?>
						)</a></li>
					<?php } ?>
				</ul>
				<div style="width:100%; height:auto; padding-top:3px;padding-bottom:3px;">
					<h4 class="text-center">Keranjang Belanja</h4>
				</div>
				<div style="width:100%; height:auto; padding-top:3px;padding-bottom:3px; padding-left:10px; border: 1px dashed #000;">
					<?php
					if(isset($_SESSION['cart'])){
					$total = 0;
					$cart = unserialize($_SESSION['cart']);
						if($cart == ''){
							$cart = [];
						}
						foreach($cart as $id => $qty){
							$product = mysql_fetch_array(mysql_query("select * from produk WHERE id='$id'"));
						if(isset($product)){
							$t = $qty * $product['harga'];
							$total += $t;
							}
						}
						echo '<h4 style="color:#f00;">Rp '. number_format($total, 0, ',', '.') .'</h4>';
						}else{
						echo '<h4 style="color:#f00;">Rp 0</h4>';
						}
						?>
					<a href="<?php echo $url; ?>keranjang.php">Go To Cart</a>
				</div>
				<div class="col-md-16">
				</div>
			</div>
			<?php
			if(!empty($_GET['id'])){ ?>
			<?php
				extract($_GET); 
				$k = mysql_query("SELECT * FROM produk where id='$id'"); 
				$data = mysql_fetch_array($k);
			?>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<h3>Detail : <?php echo $data['nama'] ?></h3>
						<br/>
						<div class="col-md-12 content-menu" style="margin-top:-20px;">
							<?php $kat = mysql_fetch_array(mysql_query("SELECT * FROM kategori_produk where id='$data[kategori_produk_id]'"));  ?>
							<small>Kategori :<a href="<?php echo $url; ?>produk.php?kategori=<?php echo $kat['id'] ?>"><?php echo $kat['nama'] ?></a></small>
							<a href="<?php echo $url; ?>produk.php?id=<?php echo $data['id'] ?>">
								<img src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" width="100%"> 
							</a>
							<br><br>
							<p><?php echo $data['deskripsi'] ?></p>
							<p style="font-size:18px">Harga : Rp <?php echo number_format($data['harga'], 0, ',', '.') ?></p>
							<p>
								<a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-success" href="#" role="button">Pesan</a>
							</p>
						</div>   
					</div>
				</div> 
			</div>
			<?php }elseif(!empty($_GET['kategori'])){ ?>	
			<?php
				extract($_GET); 
				$kat = mysql_fetch_array(mysql_query("SELECT * FROM kategori_produk where id='$kategori'")); 
			?>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<hr>
						<h3>Kategori : <?php echo $kat['nama'] ?></h3>
						<?php 
							$k = mysql_query("SELECT * FROM produk where kategori_produk_id='$kategori'");
							while($data = mysql_fetch_array($k)){
						?>
						<div class="col-md-4 content-menu">
							<a href="<?php echo $url; ?>produk.php?id=<?php echo $data['id'] ?>">
								<img style="width: 230px; height: 180px; border-radius: 5px;" src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>">
								<h4><?php echo $data['nama'] ?></h4>
							</a>
							<p style="font-size:18px">Harga : Rp <?php echo number_format($data['harga'], 0, ',', '.') ?></p>
							<p>
								<a href="<?php echo $url; ?>produk.php?id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" href="#" role="button">Lihat Detail</a>
								<a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">Pesan</a>
							</p>
						</div>  
						<?php } ?>
					</div>
				</div>
			</div>
			<?php }else{ ?>	
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							<h3>Semua Produk</h3>
							<h5>(Minimum Pemesanan : 20 untuk Lontong, Tahu Isi, Risol, Combro & Misro)</h5>
							<?php 
								$k = mysql_query("SELECT * FROM produk");
								while($data = mysql_fetch_array($k)){
							?>
							<div class="col-md-4 content-menu">
								<a href="<?php echo $url; ?>produk.php?id=<?php echo $data['id'] ?>">
									<img style="width: 233px; height: 180px; border-radius: 5px;" src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" >
									<h4><?php echo $data['nama'] ?></h4>
								</a>
								<p style="font-size:18px">Harga : Rp <?php echo number_format($data['harga'], 0, ',', '.') ?></p>
								<p>
									<a href="<?php echo $url; ?>produk.php?id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" href="#" role="button">Lihat Detail</a>
									<a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">Pesan</a>
								</p>
							</div>  
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php include"layout/footer.php"; ?>