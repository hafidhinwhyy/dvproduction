<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/bootstrap/css/datetimepicker.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/navbar-fixed-top.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-blue" style="background:#87CEFA;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand" href="index.php" style="font-family: Lucida Handwriting;">d'V 's Production</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" > 
          <ul class="nav navbar-nav navbar-right" style="font-family: Berlin Sans FB;">
            <li><a href="index.php">Home</a></li>
            <li><a href="produk.php">Produk</a></li> 
            <li><a href="kontak.php">Kontak Kami</a></li> 
            <?php if(!empty($_SESSION['iam_user'])){ ?>
            <?php 
              $user = mysql_fetch_object(mysql_query("select * from user where id='$_SESSION[iam_user]'"));
            ?>
            <li><a href="pembayaran.php">Pembayaran</a></li>
            <li><a href="info.php">Info Pembayaran</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi <?php echo $user->nama; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Profil</a></li> 
                <li><a href="logout.php">Logout</a></li>  
              </ul>
            </li>
            <?php }else{ ?>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login/Register <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="login.php">Login</a></li> 
                <li><a href="register.php">Register</a></li>  
              </ul>
            </li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>