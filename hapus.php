<?php
session_start();
if($_SESSION['level'] >1){
	echo "
	<script>
		alert('Halaman ini hanya bisa diakses oleh administrator');
		window.history.back();
	</script>
";
}
	include "koneksi.php";

	//baca id data yang akan dihapus
	$id = $_GET['id'];

	//hapus data
	$hapus = mysqli_query($konek, "delete from siswa where id='$id'");

	//jika berhasil terhapus tampilkan pesan Terhapus
	//kemudian kembali ke data karyawan
	if($hapus)
	{
		echo "
			<script>
				alert('Terhapus');
				location.replace('datasiswa.php');
			</script>
		";
	}
	else
	{
		echo "
			<script>
				alert('Gagal Terhapus');
				location.replace('datasiswa.php');
			</script>
		";
	}

?>