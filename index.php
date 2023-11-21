<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>

    <?php
    include "koneksi.php";

    // Fetch data from the database
    $sql = "SELECT * FROM tbl_mahasiswa";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table width="600px" border="1">
                <tbody>
                    <tr>
                        <td>NIM</td>
                        <td>Nama</td>
                        <td>Tgl Lahir</td>
                        <td>Jenis Kelamin</td>
                        <td>Kelola</td>
                    </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['nim'] . '</td>
                    <td>' . $row['nama'] . '</td>
                    <td>' . $row['tgl_lahir'] . '</td>
                    <td>' . $row['jk'] . '</td>
                    <td>
                    <a href="edit_mahasiswa.php?nim=' . $row['nim'] . '"> <button>Edit</button></a> 
                    <a href="hapus_mahasiswa.php?nim=' . $row['nim'] . '"> <button>Hapus</button></a> 
                    </td>
                </tr>';
        }

        echo '</tbody></table>';
    } else {
        echo "Tidak Ada DATA";
    }

    mysqli_close($conn);
    ?>

    <h2>Form Data Mahasiswa</h2>
    <form action="insert_data.php" method="post">
        <label for="nim">NIM:</label>
        <input type="number" id="nim" name="nim"><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>
        <label for="tgl_lahir">Tgl Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir"><br>
        <label for="jk">Jenis Kelamin:</label>
        <select id="jk" name="jk">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br>
        <label for="jurusan">Jurusan:</label>
        <select id="jurusan" name="jurusan" required>
            <option value="Computer Science">Computer Science</option>
            <option value="Public Relation">Public Relation</option>
            <option value="Teknik Mesin">Teknik Mesin</option>
            <!-- Tambahkan jurusan lainnya disini -->
        </select><br>
        <label for="profile">My Profile:</label>
        <br>
        <textarea id="profile" name="profile" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" name="generate" value="Generate">
        <input type="submit" name="submit" value="Simpan">
    </form>
  
    <script>
        function generate() {
            const nim = document.getElementById('nim').value;
            const nama = document.getElementById('nama').value;
            const jurusan = document.getElementById('jurusan').value;

            const profileText = 'Nama: ' + nama + '\nJurusan: ' + jurusan + '\nNIM: ' + nim;

            document.getElementById('profile').value = profileText;
        }

        document.querySelector('form').addEventListener('submit', (e) => {
            e.preventDefault();
            generate();
        });
    </script>
</body>
</html>

