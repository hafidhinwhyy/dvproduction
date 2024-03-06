<?php 
	include"inc/config.php";
	include"layout/header.php";
		if(!empty($_POST)){
			extract($_POST);
			$password = md5($password);
			$q = mysql_query("SELECT * FROM `user` WHERE email='$email' AND password='$password' AND status='user'")or die(mysql_error());
			if($q){
				$r = mysql_fetch_object($q);
				$_SESSION['iam_user'] = $r->id;
				if(!empty($_SESSION['iam_user'])){
					redir("index.php");
				}else{
					alert("Email atau Password anda salah");
					redir("login.php");
				}
			}
		}
?>
	<div class="container" style="font-family: Maiandra GD;">
			<div class="col-md-12" style="padding: 0% 25%;">
				<h3 style="font-family: Cambria; font-size: 35px;">Login</h3>
				<hr>
				<div class="content-menu" style="margin-top:-20px;">
						<form action="" method="post" enctype="multipart/form-data">
							<label>Email</label><br>
							<input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" /><br>
							<label>Password</label><br>
							<input type="password" class="form-control" name="password" placeholder="Password" required=""/><br>
							<input type="submit" name="form-input" value="Login" class="btn btn-success">
						</form>
						<br/>Belum Punya Akun ? <a href="register.php">Buat Akun Sekarang !</a> 
				</div>
			</div>
	</div>
	<?php include"layout/footer.php"; ?>