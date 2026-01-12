<?php
include 'koneksi.php';

// Logika Pencarian khusus Admin
if (isset($_GET['kata_cari'])) {
    $kata_cari = $_GET['kata_cari'];
    $query = "SELECT * FROM tb_buku WHERE `Nama Buku` LIKE '%$kata_cari%' OR Id_Buku LIKE '%$kata_cari%' ORDER BY Id_Buku ASC";
} else {
    // menampilkan semua data dari tb_buku
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
    <title>Admin - Manajemen Buku</title>
    <style>
        /* Pengaturan Dasar */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            background-color: #f0f2f5;
            color: #333;
        }

        /* Container Utama */
        fieldset {
            width: 95%;
            max-width: 1100px;
            margin: auto;
            padding: 30px;
            border: none;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-out;
        }

        legend {
            background-color: #e74c3c;
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
            transition: 0.3s;
        }

        .nav a:hover {
            color: #e74c3c;
            border-bottom: 2px solid #e74c3c;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Header Aksi (Tambah & Cari) */
        .admin-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .btn-tambah {
            background-color: #27ae60;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-tambah:hover {
            background-color: #219150;
            transform: scale(1.05);
        }

        /* Form Pencarian */
        input[type="text"] {
            padding: 10px;
            width: 250px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        .btn-cari {
            background-color: #34495e;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-reset {
            background-color: #95a5a6;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 13px;
            margin-left: 5px;
        }

        /* Desain Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            font-size: 0.85em;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        tbody tr:hover {
            background-color: #fff5f5;
        }

        /* Tombol Aksi dalam Tabel */
        .btn-edit {
            color: #2980b9;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .btn-hapus {
            color: #c0392b;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-edit:hover,
        .btn-hapus:hover {
            text-decoration: underline;
        }

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
    </style>
</head>

<body>

    <fieldset>
        <legend align="center">Panel Manajemen Admin</legend>

        <div class="nav">
            <a href="index.php">HOME</a>
            <a href="admin.php">ADMIN</a>
        </div>

        <h1>Manajemen Data Buku</h1>

        <div class="admin-actions">
            <a href="tambah_form.php" class="btn-tambah">+ Tambah Buku Baru</a>

            <form method="GET" action="admin.php">
                <input type="text" name="kata_cari" placeholder="Cari Nama/ID Buku..."
                    value="<?php echo isset($_GET['kata_cari']) ? htmlspecialchars($_GET['kata_cari']) : ''; ?>" />
                <button type="submit" class="btn-cari">Cari</button>
                <?php if (isset($_GET['kata_cari'])): ?>
                    <a href="admin.php" class="btn-reset">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Nama Buku</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Penerbit</th>
                    <th style="text-align: center;">Opsi Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td style="font-weight: bold; color: #e74c3c;"><?php echo $row['Id_Buku']; ?></td>
                            <td><?php echo $row['Nama Buku']; ?></td>
                            <td><strong>Rp <?php echo number_format($row['Harga'], 0, ',', '.'); ?></strong></td>
                            <td style="text-align: center;"><?php echo $row['Stok']; ?></td>
                            <td><?php echo $row['Penerbit']; ?></td>
                            <td align="center">
                                <a href="edit_buku.php?id=<?php echo $row['Id_Buku']; ?>" class="btn-edit">EDIT</a>
                                <a href="delete_buku.php?id=<?php echo $row['Id_Buku']; ?>" class="btn-hapus"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku <?php echo $row['Nama Buku']; ?>?')">HAPUS</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    echo "<tr><td colspan='6' align='center' style='padding: 30px; color: #999;'>Data buku tidak ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </fieldset>

</body>

</html>