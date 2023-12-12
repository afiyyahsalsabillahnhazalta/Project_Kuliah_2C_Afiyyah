<?php
session_start();
include "connect.php";
$nama_barang = (isset($_POST['nama_barang'])) ? htmlentities($_POST['nama_barang']) : " ";
$qty = (isset($_POST['qty'])) ? htmlentities($_POST['qty']) : " ";
$harga_satuan = (isset($_POST['harga_satuan'])) ? htmlentities($_POST['harga_satuan']) : " ";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : " ";


if (!empty($_POST['input_barang_validate'])) {
    $query = mysqli_query($conn, "INSERT INTO pembelian (nama_barang, qty, harga_satuan, jumlah) VALUES ('$nama_barang', '$qty', '$harga_satuan', '$jumlah')");
    if ($query) {
                $message = '<script>alert("Data Berhasil Dimasukkan")
                window.location="../penjualan"</script>';
            } else {
                $message = '<script>alert("Data Gagal Dimasukkan")</script>';
            }
    }    
echo $message;
?>