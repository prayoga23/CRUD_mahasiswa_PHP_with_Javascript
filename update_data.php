<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
 
// update data ke database
mysqli_query($conn,"update tbl_mahasiswa set nama='$nama', nim='$nim', tgl_lahir='$tgl_lahir', jk='$jk' where nim='$nim'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>