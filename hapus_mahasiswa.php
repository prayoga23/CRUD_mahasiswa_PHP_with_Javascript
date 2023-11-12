<?php
include 'koneksi.php';

if(isset($_GET['nim'])){
    $nim = $_GET['nim'];
    
    $sql = "DELETE FROM tbl_mahasiswa WHERE nim='$nim'";
    if (mysqli_query($conn, $sql)) {
        header("location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "NIM tidak ditemukan.";
}

mysqli_close($conn);
?>
