<?php
	include"inc/config.php";
	if(!empty($_SESSION['iam_user'])){
		redir("index.php");
	}
	include"layout/header.php";
?>
	<div class="container" style="margin-top:50px; font-family: Maiandra GD;">
		<div class="col-md-12" style="padding: 0% 25%;">
			<div class="row">
				<div class="col-md-12">
					<?php
						if(!empty($_POST)){
							extract($_POST);
							$password = md5($password);
							$q = mysql_query("insert into user Values(NULL,'$nama','$email','$telephone','$alamat','$password','user')");
						if($q){
					?>
					<div class="alert alert-success">Register Berhasil.<br>
						<a href="<?php echo $url."login.php"; ?>">Silahkan Login</a>
					</div>
					<?php }else{ ?>
					<div class="alert alert-danger">Terjadi kesalahan dalam pengisian form. Silahkan Coba Lagi</div>
					<?php } } ?>
					<h3>Registrasi</h3>
					<hr>
					<div class="col-md-12 content-menu" style="margin-top:-20px; ">
						<form action="" method="post" enctype="multipart/form-data">
							<label>Nama Lengkap</label><br>
							<input type="text" class="form-control" name="nama" required placeholder="Masukkan Nama"><br>
							<label>Email</label><br>
							<input type="email" class="form-control" name="email" required placeholder="Masukkan Email"><br>
							<label>No Telp</label><br>
							<input type="text" class="form-control" name="telephone" required placeholder="Masukkan No Telp"><br>
							<label>Alamat</label><br>
							<input type="text" class="form-control" name="alamat" required placeholder="Masukkan Alamat"><br>
							<label>Password</label><br>
							<input type="password" class="form-control" name="password" required placeholder="Masukkan Password"><br>
							<input type="submit" name="form-input" value="Register" class="btn btn-success">
						</form>
						<br/>Sudah Punya Akun ? <a href="login.php">Login Sekarang !</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include"layout/footer.php"; ?>