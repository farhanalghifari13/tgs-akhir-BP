<?php
include "koneksi.php";

$id_produk = $_GET['id'];

$sql = "SELECT * FROM tb_buku WHERE Id_Buku='$id_produk'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("Data buku tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            padding: 40px;
        }

        fieldset {
            width: 500px;
            margin: auto;
            padding: 30px;
            border: none;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #34495e;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            outline: none;
        }

        input:focus {
            border-color: #3498db;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background: #2980b9;
        }

        .btn-batal {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #7f8c8d;
            text-decoration: none;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <fieldset>
        <h2>Edit Data Buku</h2>
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['Id_Buku']; ?>">

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" value="<?php echo $data['Kategori']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Buku</label>
                <input type="text" name="nama_buku" value="<?php echo $data['Nama Buku']; ?>" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" value="<?php echo $data['Harga']; ?>" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" value="<?php echo $data['Stok']; ?>" required>
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" value="<?php echo $data['Penerbit']; ?>" required>
            </div>

            <button type="submit">SIMPAN PERUBAHAN</button>
            <a href="admin.php" class="btn-batal">Kembali ke Admin</a>
        </form>
    </fieldset>
</body>

</html>