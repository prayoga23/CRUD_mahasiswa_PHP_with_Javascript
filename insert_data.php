<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
 
// menginput data ke database
mysqli_query($conn,"insert into tbl_mahasiswa values('$nim','$nama','$tgl_lahir', '$jk')");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>