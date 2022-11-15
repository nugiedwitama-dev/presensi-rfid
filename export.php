<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>

</head>
<body>

	<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> REKAP PRESENSI
    </div>

	<!-- isi -->
	<div class="container-fluid">
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
	</div>
</body>
</html>
<script>
	function exportEx(){
		<?php
	?>
	}
</script>
