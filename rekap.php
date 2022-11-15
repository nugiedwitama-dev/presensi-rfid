<?php 

include "koneksi.php";
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
}


$username=$_SESSION["username"];
$nama=$_SESSION["nama"];


?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>

</head>
<body>
	<?php include "menu.php"; ?>
	<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> REKAP PRESENSI
    </div>

	<!-- isi -->
	<div class="container-fluid">
	<table class="mt-3">
	<?php
		include "koneksi.php";

		$tanggal = date('Y-m-d');
		date_default_timezone_set('Asia/Jakarta');
		$sql = mysqli_query($konek, "select b.nama,c.mapel, c.kelas, c.tahun_ajaran, c.semester,  a.tanggal, a.mapel, a.jurusan, a.kelas, a.jam_masuk, a.jam_keluar from absensi a, siswa b, rekap c where a.nokartu=b.nokartu and c.mapel=a.mapel and c.kelas=a.kelas");
		while($data = mysqli_fetch_array($sql))
			$no = 0;
			$no++;
		{
			?>
			<tr>
			
            <td><strong>Mata Pelajaran</strong></td>
            <td>&nbsp;: <?= $data['mapel'] ?></td>
        </tr>
        <tr>
            <td><strong>Kelas</strong></td>
            <td>&nbsp;: <?= $data['kelas'] ?></td>
        </tr>
        <tr>
            <td><strong>Jurusan</strong></td>
            <td>&nbsp;: <?= $data['jurusan'] ?></td>
        </tr>
        <tr>
            <td><strong>Tahun Ajaran (Semester)</strong></td>
            <td>&nbsp;: <?= $data['tahun_ajaran'].'&nbsp;('.$data['semester'].')'; ?></td>
        </tr>
		<?php } ?>
    </table>
		<a href="export.php" class="btn btn-success">Export Excel</a>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: grey; color:white">
					<th style="width: 10px; text-align: center">No.</th>
					<th style="text-align: center">Nama</th>
					<th style="text-align: center">Tanggal</th>
					<th style="text-align: center">Mata Pelajaran</th>
					<th style="text-align: center">Jurusan</th>
					<th style="text-align: center">Kelas</th>
					<th style="text-align: center">Jam Masuk</th>
					<th style="text-align: center">Jam Keluar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include "koneksi.php";

					date_default_timezone_set('Asia/Jakarta');
					$tanggal = date('Y-m-d');

					$sql = mysqli_query($konek, "select b.nama,c.mapel, c.kelas,  a.tanggal, a.mapel, a.jurusan, a.kelas, a.jam_masuk, a.jam_keluar from absensi a, siswa b, rekap c where a.nokartu=b.nokartu and c.mapel=a.mapel and c.kelas=a.kelas");

					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				?>
				<tr>
					<td> <?php echo $no; ?> </td>
					<td> <?php echo $data['nama']; ?> </td>
					<td> <?php echo $data['tanggal']; ?> </td>
					<td> <?php echo $data['mapel']; ?> </td>
					<td> <?php echo $data['jurusan']; ?> </td>
					<td> <?php echo $data['kelas']; ?> </td>
					<td> <?php echo $data['jam_masuk']; ?> </td>
					<td> <?php echo $data['jam_keluar']; ?> </td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php include "footer.php"; ?>
	</div>
</body>
</html>
</script>
