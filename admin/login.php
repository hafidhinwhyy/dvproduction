<?php include"../inc/config.php"; ?>
<?php
	if(!empty($_POST)){
		extract($_POST);
		$password = md5($password);
		$q = mysql_query("SELECT * FROM `user` WHERE email='$email' AND password='$password' AND status='admin'")or die(mysql_error());
		if($q){
			$r = mysql_fetch_object($q);
			$_SESSION['iam_admin'] = $r->id;
			if(!empty($_SESSION['iam_admin'])){
				redir("index.php");
			}else{
				alert("Email atau Password anda salah");
				redir("login.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login Admin</title>
		<link rel='stylesheet' href='../assets/bootstrap/css/bootstrap.min.css'>
		<link rel="stylesheet" href="../assets/css/style_login.css">
	</head>
	<body>
		<div class="wrapper">
			<form class="form-signin" action="" method="POST">       
				<h2 class="form-signin-heading">Login Admin</h2>
				<input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
				<input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
			</form>
		</div>
	</body>
</html>
<?php include"inc/footer.php"; ?>