<?php 
	include"inc/config.php";
	if(empty($_SESSION['iam_user'])){
		redir("index.php");
	}
	$user = mysql_fetch_object(mysql_query("select * from user where id='$_SESSION[iam_user]'"));
	include"layout/header.php";
	$q = mysql_query("select * from pesanan where user_id='$_SESSION[iam_user]'");
			$j = mysql_num_rows($q);
?> 
	<div id="wrapper" style="margin-right:auto; margin-left:auto; width:900px;">
		<div class="container" style="margin-left:80px; font-family: Maiandra GD;">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12 content-menu" style="margin-top:20px;">
						<h3>Profile</h3>
						<hr>
						<div class="col-md-6 content-menu" style="margin-top:-20px;">
							<table class="table table-striped">
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $user->nama; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo $user->email; ?></td>
								</tr>
								<tr>
									<td>No Telp</td>
									<td>:</td>
									<td><?php echo $user->telephone; ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><?php echo $user->alamat; ?></td>
								</tr>
								<tr>
									<td>Password</td>
									<td>:</td>
									<td>******</td>
								</tr>
							</table>
						</div>   
						<div class="col-md-12 content-menu" style="margin-top:20px;">
							<h3>Riwayaat Pemesanan </h3>
								<table class="table table-striped table-hove"> 
									<thead> 
									<tr> 
										<th></th> 
										<th>Nama Pemesan</th> 
										<th>Tanggal Pesan</th> 
										<th>Tanggal Digunakan</th> 
										<th>No Telp</th> 
										<th>Alamat</th>  
									</tr> 
									</thead> 
									<tbody> 
										<?php while($data=mysql_fetch_object($q)){ ?> 
											<tr <?php if($data->read == 0 ){ echo 'style="background:#cce9f8 !important;"'; } ?> > 
											<th scope="row"><?php echo $no++; ?></th> 
											<?php
												$katpro = mysql_query("select * from user where id='$data->user_id'");
												$user = mysql_fetch_array($katpro);
											?>
											<td><?php echo $data->nama ?></td> 
											<td><?php echo substr($data->tanggal_pesan,0,10) ?></td> 
											<td><?php echo $data->tanggal_digunakan ?></td> 
											<td><?php echo $data->telephone ?></td> 
											<td><?php echo $data->alamat ?></td> 
											<td>  
											<a class="btn btn-sm btn-info" href="detail_pesanan.php?id=<?php echo $data->id ?>">Detail</a>
											</td> 
										</tr>
										<?php } ?>
									</tbody> 
								</table> 
						</div>   	
					</div>
				</div>
			</div> 
		</div>
	</div>
<?php include"layout/footer.php"; ?>