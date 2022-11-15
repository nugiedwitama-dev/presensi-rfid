<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
}


$username=$_SESSION["username"];
$nama=$_SESSION["nama"];

?>
<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$kode_mapel = $_POST['kode_mapel'];


		//simpan ke tabel karyawan
		$simpan = mysqli_query($konek, "update jadwal set kode_mata_pelajaran='$kode_mapel'");

		//jika berhasil tersimpan, tampilkan pesan Tersimpan,
		//kembali ke data karyawan
		if($simpan)
		{
			echo "
				<script>
					alert('Berhasil');
					location.replace('scan.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal');
					location.replace('pilihjadwal.php');
				</script>
			";
		}

	}
?>
<?php include "header.php"; ?>
<?php include "menu.php"; ?>
<div class="container-fluid">
 <center><h3>PILIH JADWAL</h3>
 <form method="post" class="mt-5">   
    <div class="form-group">
    <label>Pilih Jadwal</label>
    <select name="kode_mapel">
	<option value="">--PILIH JADWAL --</option>
	<?php
	include "koneksi.php";
	$get_jadwal = mysqli_query($konek,"select * from mata_pelajaran");

	$no=0;
	while($data = mysqli_fetch_array($get_jadwal)){
		$no++ ;
	
	?>
        <option value="<?=$data['kode_mata_pelajaran']?>"> <?=$data['kelas']?> - <?=$data['nama_mata_pelajaran']?></option>

	<?php } ?>
	</select>   
    </div>
    <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Pilih</button>
 </form>
 </center>
 </div><br><br><br><br><br><br>
 <?php include "footer.php";
