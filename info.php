<?php
	include"inc/config.php"; 
	include"layout/header.php";	
?>
	<div id="wrapper" style="margin-right:auto; margin-left:auto; width:900px;">
		<div class="container" style="margin-top:10px; margin-left:80px;">
			<div class="col-md-9">
				<div class="row">
					<?php
						$q = mysql_query("Select * from info_pembayaran limit 1") or die (mysql_error());
						$data = mysql_fetch_object($q);
					?>
					<pre><?php echo $data->info; ?></pre>
				</div>
			</div>
		</div>
	</div>
<?php
	include "layout/footer.php";
?>