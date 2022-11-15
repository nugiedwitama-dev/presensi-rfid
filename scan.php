<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


$username=$_SESSION["username"];
$nama=$_SESSION["nama"];




?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Scan Kartu</title>

	<!-- scanning membaca kartu RFID -->
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function(){
				$("#cekkartu").load('bacakartu.php')
			}, 2000);
		});	
	</script>

</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid" style="padding-top: 3%">
		<div id="cekkartu"></div>
	</div>
	<br>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>