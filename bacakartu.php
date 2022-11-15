<?php 
 
session_start();
error_reporting(E_ALL & ~E_NOTICE);

$username=$_SESSION["username"];
$nama=$_SESSION["nama"];

?>
<?php 
	include "koneksi.php";
	//baca tabel status untuk mode absensi
	$sql = mysqli_query($konek, "select * from status");
	$data = mysqli_fetch_array($sql);
	$mode_absen = $data['mode'];

	//uji mode absen
	$mode = "";
	if($mode_absen==1)
		$mode = "Masuk";
	else if($mode_absen==2)
		$mode = "Keluar";
	
	//baca tabel mata pelajaran
	$get_jadwal = mysqli_query($konek,"select a.kode_mata_pelajaran, b.nama_mata_pelajaran, b.jurusan, b.kelas from jadwal a, mata_pelajaran b where a.kode_mata_pelajaran=b.kode_mata_pelajaran");
	$data = mysqli_fetch_array($get_jadwal);
	$tampil_mapel = $data['kode_mata_pelajaran'];
	$nama_mapel = $data['nama_mata_pelajaran'];
	$jurusan = $data['jurusan'];
	$kelas = $data['kelas'];


	//baca tabel tmprfid
	$baca_kartu = mysqli_query($konek, "select * from tmprfid");
	$data_kartu = mysqli_fetch_array($baca_kartu);
	$nokartu    = $data_kartu['nokartu'];

?>


<div class="container-fluid" style="text-align: center;">
	<?php if($nokartu=="") { ?>
		<h4>Selamat Datang, <strong><?= $nama ?></strong></h4>
	<h4>Ubah Mata Pelajaran Sesuai Jadwal Anda : <a href="pilihjadwal.php"><button class="btn-primary btn-sm">Ubah Mata Pelajaran</button></a></h4>
	
	<h3>Mode Presensi : <?php echo $mode; ?> </h3>
	<h3>Nama Mata Pelajaran : <?php echo $nama_mapel ?></h3>
	<h3>Jurusan : <?php echo $jurusan ?></h3>
	<h3>Kelas : <?php echo $kelas ?></h3>
	<h3>Silahkan Tempelkan Kartu RFID Anda</h3>
	<img src="images/rfid.png" style="width: 200px"> <br>
	<img src="images/animasi2.gif">

	<?php } else {
		//cek nomor kartu RFID tersebut apakah terdaftar di tabel karyawan
		$cari_siswa = mysqli_query($konek, "select * from siswa where nokartu='$nokartu'");
		$jumlah_data = mysqli_num_rows($cari_siswa);

		if($jumlah_data==0)
			echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
		else
		{
			//ambil nama karyawan
			$data_siswa = mysqli_fetch_array($cari_siswa);
			$nama = $data_siswa['nama'];

			//tanggal dan jam hari ini
			date_default_timezone_set('Asia/Jakarta') ;
			$tanggal = date('Y-m-d');
			$jam     = date('H:i:s');

			//cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
			$cari_absen = mysqli_query($konek, "select * from absensi where nokartu='$nokartu' and mapel='$nama_mapel'");
			//hitung jumlah datanya
			$jumlah_absen = mysqli_num_rows($cari_absen);
			if($jumlah_absen == 0)
			{
				echo "<h1>Selamat Datang $nama <br> Presensi Anda Telah Berhasil</h1>";
				mysqli_query($konek, "insert into absensi(nokartu, tanggal, mapel, jurusan, kelas, guru, jam_masuk)values('$nokartu', '$tanggal', '$nama_mapel','$jurusan'
				,'$kelas','$nama', '$jam')");
			}
			else
			{
				
				if($mode_absen == 2)
				{
					echo "<h1>Terimakasih $nama <br> Anda telah selesai mengikuti kelas hari ini </h1>";
					mysqli_query($konek, "update absensi set jam_keluar='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
				}
				else{
					echo "<h1>Maaf $nama <br> Anda sudah melakukan presensi pada mata pelajaran ini, anda tidak perlu presensi lagi</h1>";
				}
			}
		}

		//kosongkan tabel tmprfid
		mysqli_query($konek, "delete from tmprfid");
	} ?>
</div>