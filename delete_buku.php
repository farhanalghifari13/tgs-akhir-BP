<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = "DELETE FROM tb_buku WHERE Id_Buku='$id'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>
            alert('Data berhasil dihapus.');
            window.location.href = 'admin.php';
          </script>";
} else {
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>