<?php 
//KONVERSI PHP KE PHP 7
require_once "parser-php-version.php";

	session_start();
	mysql_connect("localhost", "root", "");
	mysql_select_db("dvproduction");
	
	// settings
	$url = "";
	$title = "𝒹'𝒱 '𝓈 𝒫𝓇𝑜𝒹𝓊𝒸𝓉𝒾𝑜𝓃";
	$no = 1;
	
	function alert($command){
		echo "<script>alert('".$command."');</script>";
	}
	function redir($command){
		echo "<script>document.location='".$command."';</script>";
	}
	function validate_admin_not_login($command){
		if(empty($_SESSION['iam_admin'])){
			redir($command);
		}
	}
?>