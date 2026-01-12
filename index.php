<?php
include 'koneksi.php';

if (isset($_GET['kata_cari'])) {
    $kata_cari = $_GET['kata_cari'];
    $query = "SELECT * FROM tb_buku WHERE `Nama Buku` LIKE '%$kata_cari%' ORDER BY Id_Buku ASC";
} else {
    $query = "SELECT * FROM tb_buku ORDER BY Id_Buku ASC";
}

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Toko Buku - Katalog</title>
    <style>
        /* Pengaturan Dasar */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            background-color: #f0f2f5;
            color: #333;
        }

        /* Container Fieldset */
        fieldset {
            width: 90%;
            max-width: 1000px;
            margin: auto;
            padding: 30px;
            border: none;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        legend {
            background-color: #2c3e50;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: bold;
        }

        /* Navigasi */
        .nav {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: bold;
            margin: 0 15px;
            padding-bottom: 5px;
            transition: border-bottom 0.3s ease;
        }

        .nav a:hover {
            border-bottom: 2px solid #3498db;
            color: #3498db;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
        }

        /* Form Pencarian */
        .search-container {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 12px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        button {
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s, background 0.3s;
        }

        button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .btn-reset {
            background-color: #95a5a6;
            margin-left: 5px;
        }

        .btn-reset:hover {
            background-color: #7f8c8d;
        }

        /* Desain Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.85em;
            letter-spacing: 1px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        /* Efek Hover Baris */
        tbody tr {
            transition: background-color 0.3s;
        }

        tbody tr:hover {
            background-color: #f1f7fd;
            cursor: default;
        }

        /* Animasi masuk */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        fieldset {
            animation: fadeIn 0.8s ease-out;
        }
    </style>
</head>

<body>

    <fieldset>
        <legend align="center">Sistem Informasi Toko F&R</legend>

        <div class="nav">
            <a href="index.php">HOME</a>
            <a href="admin.php">ADMIN</a>
        </div>

        <center>
            <h1>Katalog Buku</h1>
        </center>

        <div class="search-container">
            <form method="GET" action="index.php" style="text-align: center;">
                <label style="font-weight: bold;">Cari Judul : </label>
                <input type="text" name="kata_cari" placeholder="Ketik nama buku..."
                    value="<?php echo isset($_GET['kata_cari']) ? htmlspecialchars($_GET['kata_cari']) : ''; ?>" />
                <button type="submit">Cari Buku</button>
                <a href="index.php"><button type="button" class="btn-reset">Reset</button></a>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Kategori</th>
                    <th>Nama Buku</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Penerbit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td style="font-weight: bold; color: #3498db;"><?php echo $row['Id_Buku']; ?></td>
                        <td><span
                                style="background: #e1f5fe; padding: 4px 8px; border-radius: 4px; font-size: 0.9em;"><?php echo $row['Kategori']; ?></span>
                        </td>
                        <td><?php echo $row['Nama Buku']; ?></td>
                        <td><strong>Rp <?php echo number_format($row['Harga'], 0, ',', '.'); ?></strong></td>
                        <td style="text-align: center;"><?php echo $row['Stok']; ?></td>
                        <td><?php echo $row['Penerbit']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </fieldset>

    </table>
    </fieldset>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Tentang Toko</h3>
                <p><strong>Toko Buku F&R</strong> adalah platform manajemen katalog buku digital untuk mempermudah
                    pengelolaan inventaris Toko secara efisien, F&R sendiri adalah singkatan dari nama Farhan & Rogib.</p>
            </div>

            <div class="footer-section">
                <h3>Sistem</h3>
                <p>Database: <strong>db_toko_tugas</strong></p>
                <p>Status Koneksi: <span style="color: #2ecc71;">● Terhubung</span></p>
            </div>

            <div class="footer-section">
                <h3>Developer</h3>
                <p>Nama: <strong>1. M.Farhan Al-Ghifari</strong></p>
                <p>Nama: <strong>2. Raden Rogib</strong></p>
                <p>Project: Tugas Akhir Pemrograman Web</p>
            </div>
        </div>

</body>

</html>