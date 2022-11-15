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
	include "koneksi.php";

	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nokartu = $_POST['nokartu'];
		$nama    = $_POST['nama'];
		$alamat  = $_POST['alamat'];
		$jurusan  = $_POST['jurusan'];
		$kelas  = $_POST['kelas'];

		//simpan ke tabel karyawan
		$simpan = mysqli_query($konek, "insert into siswa(nokartu, nama, alamat,jurusan, kelas)values('$nokartu', '$nama', '$alamat','$jurusan','$kelas')");

		//jika berhasil tersimpan, tampilkan pesan Tersimpan,
		//kembali ke data karyawan
		if($simpan)
		{
			echo "
				<script>
					alert('Tersimpan');
					location.replace('datasiswa.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('tambah.php');
				</script>
			";
		}

	}

	//kosongkan tabel tmprfid
	mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Siswa</title>

	<!-- pembacaan no kartu otomatis -->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#norfid").load('nokartu.php')
			}, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
		});
	</script>

</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Siswa</h3>

		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>

			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="text" name="nama" id="nama" placeholder="Masukan nama siswa" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"></textarea>
			</div>
			<div class="form-group">
				<label>Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" placeholder="Masukan jurusan" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<input type="text" name="kelas" id="kelas" placeholder="Masukan kelas" class="form-control" style="width: 400px">
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>