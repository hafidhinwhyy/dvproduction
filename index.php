<?php 
	include"inc/config.php";
	include"layout/header.php";
?>
	<div class="container" style="font-family: Maiandra GD;">
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
					if($ck > 0){ echo $ck; }else{ echo 0; } ?>
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
				<div class="col-md-16"></div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12 text-center">
						<img src="<?php echo $url.'assets/img/logo.png'; ?>" width="100%">
						<h2>Selamat Datang di 𝒹'𝒱 '𝓈 𝒫𝓇𝑜𝒹𝓊𝒸𝓉𝒾𝑜𝓃</h2>
						<h3>Menerima Pemesanan Berbagai Makanan Untuk Acara Anda</h3>
					</div>
					<div class="col-md-15">
						<div style="background:#ffffff; width:100%; height:auto; padding-top:3px;padding-bottom:3px; padding-left:10px;"><br>
							<h4>Best Seller</h4>
							<h5>(Minimum Pemesanan : 20 untuk Lontong, Tahu Isi, Risol, Combro & Misro)</h5>
						</div>
						<?php 
							$k = mysql_query("SELECT * FROM produk ORDER BY id ASC limit 3"); 
							while($data = mysql_fetch_array($k)){
						?>
						<div class="col-md-4 content-menu">
							<a href="<?php echo $url; ?>produk.php?id=<?php echo $data['id'] ?>">
							<img style="width: 243px; height: 180px; border-radius: 5px;" src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>">
							<h4><?php echo $data['nama'] ?></h4>
							</a>
							<p style="font-size:18px">Harga : Rp <?php echo number_format($data['harga'], 0, ',', '.') ?></p>
							<p>
								<a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">Pesan</a>
							</p>
						</div>  
						<?php } ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-15">
					<br/>
						<div style="background:#ffffff; width:100%; height:auto; padding-top:3px;padding-bottom:3px; padding-left:10px;">
							<h4>Terbaru</h4>
						</div>
						<?php 
							$k = mysql_query("SELECT * FROM produk ORDER BY id DESC limit 2"); 
							while($data = mysql_fetch_array($k)){
						?>
					<div class="col-md-4 content-menu">
						<a href="<?php echo $url; ?>produk.php?id=<?php echo $data['id'] ?>">
						<img style="width: 243px; height: 180px; border-radius: 5px;" src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>">
						<h4><?php echo $data['nama'] ?></h4>
						</a>
						<p style="font-size:18px">Harga : Rp <?php echo number_format($data['harga'], 0, ',', '.') ?></p>
						<p>
						
						<a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">Pesan</a>
						</p>
					</div>  
						<?php } ?>	
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php include"layout/footer.php"; ?>