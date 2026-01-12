<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Buku</title>
</head>

<body>
    <fieldset style="width: 400px; margin: auto;">
        <legend align="center">Tambah Data Buku</legend>
        <form action="tambah_proses.php" method="POST">
            <table>
                <tr>
                    <td>ID Buku</td>
                    <td>: <input type="text" name="Id_Buku" required></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>: <input type="text" name="Kategori" required></td>
                </tr>
                <tr>
                    <td>Nama Buku</td>
                    <td>: <input type="text" name="Nama_Buku" required></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>: <input type="number" name="Harga" required></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td>: <input type="number" name="Stok" required></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>: <input type="text" name="Penerbit" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" name="tambah">Simpan</button>
                        <a href="admin.php">Batal</a>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>