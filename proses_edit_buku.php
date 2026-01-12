<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $penerbit = $_POST['penerbit'];

    $sql = "UPDATE tb_buku SET 
            Kategori='$kategori', 
            `Nama Buku`='$nama_buku', 
            Harga='$harga', 
            Stok='$stok', 
            Penerbit='$penerbit' 
            WHERE Id_Buku='$id'";

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='admin.php';</script>";
    } else {
        die("Gagal update: " . mysqli_error($koneksi));
    }
}
?>