<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
}


$username=$_SESSION["username"];
$nama=$_SESSION["nama"];

if($_SESSION['level'] >1){
	echo "
	<script>
		alert('Halaman ini hanya bisa diakses oleh administrator');
		window.history.back();
	</script>
";
}

?>
<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//baca ID data yang akan di edit
	$id = $_GET['id'];

	//baca data karyawan berdasarkan id
	$cari = mysqli_query($konek, "select * from siswa where id='$id'");
	$hasil = mysqli_fetch_array($cari);


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
		$simpan = mysqli_query($konek, "update siswa set nokartu='$nokartu', nama='$nama', alamat='$alamat',jurusan='$jurusan',kelas='$kelas' where id='$id'");
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
					location.replace('edit.php?id=<?=$id ?>');
				</script>
			";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Edit data Siswa</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Edit Data Siswa</h3>

		<!-- form input -->
		<form method="POST">
			<div class="form-group">
				<label>No.Kartu</label>
				<input type="text" name="nokartu" readonly id="nokartu" placeholder="nomor kartu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['nokartu']; ?>">
			</div>
			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="text" name="nama" id="nama" placeholder="Masukan nama siswa" class="form-control" style="width: 400px" value="<?php echo $hasil['nama']; ?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"><?php echo $hasil['alamat']; ?></textarea>
			</div>
			<div class="form-group">
				<label>Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" placeholder="Masukan jurusan" class="form-control" style="width: 400px" value="<?php echo $hasil['jurusan']; ?>"> 
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<input type="text" name="kelas" id="kelas" placeholder="Masukan kelas" class="form-control" style="width: 400px" value="<?php echo $hasil['kelas']; ?>">
			</div>
			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>