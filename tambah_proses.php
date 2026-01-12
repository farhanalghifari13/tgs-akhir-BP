<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id_Buku = mysqli_real_escape_string($koneksi, $_POST["Id_Buku"]);
    $Kategori = mysqli_real_escape_string($koneksi, $_POST["Kategori"]);
    $Nama_Buku = mysqli_real_escape_string($koneksi, $_POST["Nama_Buku"]);
    $Harga = mysqli_real_escape_string($koneksi, $_POST["Harga"]);
    $Stok = mysqli_real_escape_string($koneksi, $_POST["Stok"]);
    $Penerbit = mysqli_real_escape_string($koneksi, $_POST["Penerbit"]);
    
    $sql = "INSERT INTO tb_buku (Id_Buku, Kategori, `Nama Buku`, Harga, Stok, Penerbit) 
            VALUES ('$Id_Buku', '$Kategori', '$Nama_Buku', '$Harga', '$Stok', '$Penerbit')";

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "<script>alert('Buku berhasil ditambahkan!'); window.location='admin.php';</script>";
        exit();
    } else {
        die("Error Simpan Data: " . mysqli_error($koneksi));
    }
}
?>