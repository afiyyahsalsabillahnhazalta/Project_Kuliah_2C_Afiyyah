<?php
session_start();
include "connect.php";
$kode_penjualan = (isset($_POST['kode_penjualan'])) ? htmlentities($_POST['kode_penjualan']) : " ";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : " ";
$alamat = (isset($_POST['alamat_pelanggan'])) ? htmlentities($_POST['alamat_pelanggan']) : " ";

if (!empty($_POST['edit_penjualan_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE id_penjualan = '$kode_penjualan'");
        $query = mysqli_query($conn, "UPDATE tb_penjualan SET pelanggan='$pelanggan', alamat_pelanggan='$alamat'
        WHERE id_penjualan = '$kode_penjualan' ");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dimasukkan")
            window.location="../penjualan"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dimasukkan")
            window.location="../penjualan"</script>';
        }
    }
echo $message;
?>

