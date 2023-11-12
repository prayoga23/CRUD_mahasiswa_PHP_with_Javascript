<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Mahasiswa</title>
</head>
<body>
 
<h2>EDIT DATA MAHASISWA</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	
	<?php
	include 'koneksi.php';
	$nim = $_GET['nim'];
	$data = mysqli_query($conn,"select * from tbl_mahasiswa where nim='$nim'");
	if(mysqli_num_rows($data) > 0){
		$row = mysqli_fetch_array($data);
		$nama = $row['nama'];
		$tgl_lahir = $row['tgl_lahir'];
		$jk = $row['jk'];
		?>

		<form action="update_data.php" method="post">
            <label for="nim">NIM:</label>
			<input type="number" name="nim" value="<?php echo $nim; ?>"> <br>
			<label for="nama">Nama:</label>
			<input type="text" id="nama" name="nama" value="<?php echo $nama; ?>"><br>
			<label for="tgl_lahir">Tgl Lahir:</label>
			<input type="date" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>"><br>
			<label for="jk">Jenis Kelamin:</label>
			<select id="jk" name="jk">
				<option value="Laki-Laki" <?php if ($jk === 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
				<option value="Perempuan" <?php if ($jk === 'Perempuan') echo 'selected'; ?>>Perempuan</option>
			</select><br>
			<input type="submit" name="submit" value="Update DATA">
		</form>
	<?php } else {
		echo "Data not found";
	}
	?>
</body>
</html>
