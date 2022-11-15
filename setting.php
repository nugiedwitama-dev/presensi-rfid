<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
}
if($_SESSION['level'] >1){
	echo "
	<script>
		alert('Halaman ini hanya bisa diakses oleh administrator');
		window.history.back();
	</script>
";
}