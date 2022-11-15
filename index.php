<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
}


$username=$_SESSION["username"];
$nama=$_SESSION["nama"];
$level=$_SESSION["level"];

$levelakun = [];
if($level = 1){
	$levelakun = "Admin";
} else {
	$levelakun = "Guru";
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Menu Utama</title>
</head>
<body>
	<?php include "menu.php"; ?>

	<div class="container-fluid">
    <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i> Dashboard
    </div>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat datang <strong><?= $nama; ?></strong> di sistem presensi RFID SMK Dewantara Sumbang</p>
        <p class="mb-0">Anda login sebagai <strong><?=  $levelakun; ?></strong></p>
        <hr>
        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-cogs"></i> Control Panel
        </button>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                <i class="fas fa-cogs"></i> Control Panel
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3 text-info text-center">
                    <a href="jurusan.php"><p class="nav-link small text-info">JURUSAN</p>
                    <i class="fas fa-3x fa-user-graduate"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="tahunajaran.php"><p class="nav-link small text-info">THN AJARAN</p>
                    <i class="fas fa-3x fa-calendar-alt"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="kelas.php"><p class="nav-link small text-info">KELAS</p>
                    <i class="fas fa-3x fa-book"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="pilihjadwal.php"><p class="nav-link small text-info">JADWAL</p>
                    <i class="fas fa-3x fa-user-tie"></i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3 text-info text-center">
                    <a href="guru.php"><p class="nav-link small text-info">GURU</p>
                    <i class="fas fa-3x fa-sort-numeric-down"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="datasiswa.php"><p class="nav-link small text-info">SISWA</p>
                    <i class="fas fa-3x fa-print"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="matapelajaran.php"><p class="nav-link small text-info">MATA PELAJARAN</p>
                    <i class="fas fa-3x fa-list-ul"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="setting.php"><p class="nav-link small text-info">PENGATURAN</p>
                    <i class="fas fa-3x fa-info"></i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3 text-info text-center">
                    <a href="scan.php"><p class="nav-link small text-info">SCAN KARTU</p>
                    <i class="fas fa-3x fa-id-card-alt"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="absensi.php"><p class="nav-link small text-info">REKAP PRESENSI</p>
                    <i class="fas fa-3x fa-info-circle"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="usercontrol.php"><p class="nav-link small text-info">USER CONTROL</p>
                    <i class="fas fa-3x fa-laptop"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="logout.php"><p class="nav-link small text-info">LOGOUT</p>
                    <i class="fas fa-3x fa-images"></i>
                    </a>
                </div>
            </div>
            <hr>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

</div>

</body>
</html>