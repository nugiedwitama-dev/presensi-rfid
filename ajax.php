<?php

include "koneksi.php";

//variabel nim yang dikirimkan form.php
$kode_mata_pelajaran = $_GET['kode_mata_pelajaran'];

//mengambil data
$query = mysqli_query($konek, "select * from mata_pelajaran where nim='$kode_mata_pelajaran'");
$mapel = mysqli_fetch_array($query);
$data = array(
            'nama_mata_pelajaran'      =>  @$mapel['nama_mata_pelajaran'],
            'jurusan'   =>  @$mapel['jurusan'],
            'kelas'      =>  @$mapel['kelas'],);

//tampil data
echo json_encode($data);
?>