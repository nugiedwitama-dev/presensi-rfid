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


$username=$_SESSION["username"];
$nama=$_SESSION["nama"];

?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Data Siswa</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!--isi -->
	<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> DATA SISWA
    </div>
		<table class="table table-bordered bg-success ">
			<thead>
				<tr style="background-color: grey; color: white; font-weight: bold ">
					<th style="width: 10px; text-align: center">No.</th>
					<th style="width: 200px; text-align: center">No.Kartu</th>
					<th style="text-align: center">NIS</th>
					<th style="width: 400px; text-align: center">Nama</th>
					<th style="width: 400px; text-align: center">Alamat</th>
					<th style="text-align: center">Jurusan</th>
					<th style="text-align: center">Kelas</th>
					<th style="width: 150px; text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>

				<?php
					//koneksi ke database
					include "koneksi.php";

					//baca data karyawan
					$sql = mysqli_query($konek, "select * from siswa");
					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				?>

				<tr style="font-weight: bold ;" >
					<td> <?php echo $no; ?> </td>
					<td> <?php echo $data['nokartu']; ?> </td>
					<td> <?php echo $data['nis']; ?> </td>
					<td> <?php echo $data['nama']; ?> </td>
					<td> <?php echo $data['alamat']; ?> </td>
					<td> <?php echo $data['jurusan']; ?> </td>
					<td> <?php echo $data['kelas']; ?> </td>
					<td>
						<a href="edit.php?id=<?php echo $data['id']; ?>"> <div class="btn btn-sm btn-success">Edit</div></a> 
						<a href="hapus.php?id=<?php echo $data['id']; ?>"> <div class="btn btn-sm btn-danger">Hapus</div></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<!-- tombol tambah data karyawan -->
		<a href="tambah.php"> <button class="btn btn-success">Tambah Data Siswa</button> </a>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>