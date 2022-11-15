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
		$kelas = $_POST['kelas'];
        $mapel = $_POST['mapel'];


		//simpan ke tabel karyawan
		$simpan = mysqli_query($konek, "update rekap set kelas='$kelas',mapel='$mapel'");

		//jika berhasil tersimpan, tampilkan pesan Tersimpan,
		//kembali ke data karyawan
		if($simpan)
		{
			echo "
				<script>
					alert('Berhasil');
					location.replace('rekap.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal');
					location.replace('pilihrekap.php');
				</script>
			";
		}

	}

$get_jadwal = mysqli_query($konek,"select * from mata_pelajaran");
$get_mapel = mysqli_query($konek,"select * from mata_pelajaran");
{?>
<?php include "header.php"; ?>
<?php include "menu.php"; ?>
<div class="container-fluid">
 <center><h3>PILIH KELAS DAN MATA PELAJARAN</h3>
 <form method="post" class="mt-5">   
    <div class="form-group">
    <label>Pilih Kelas</label>
    <select name="kelas">
        <option>--PILIH KELAS --</option>	
		<?php while($data = mysqli_fetch_array($get_jadwal)){ ?>
        <option value="<?php echo $data['kelas'] ?>"><?= $data['kelas'] ?></option>  
		<?php }?>
    </select>   
    </div>
	<div class="form-group">
    <label>Pilih Mata Pelajaran</label>
    <select name="mapel">
        <option>--PILIH MATA PELAJARAN --</option>
		<?php while($mapel = mysqli_fetch_array($get_mapel)){ ?>
        <option value="<?php echo $mapel['nama_mata_pelajaran'] ?>"><?= $mapel['nama_mata_pelajaran'] ?></option>  
		<?php }?>
    </select>   
    </div>
<?php } ?>
    <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Pilih</button>
 </form>
 </center>
 </div><br><br><br><br><br><br>
 <?php include "footer.php";
