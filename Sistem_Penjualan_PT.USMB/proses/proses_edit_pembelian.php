<?php
session_start();
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : " ";
$nama_barang = (isset($_POST['nama_barang'])) ? htmlentities($_POST['nama_barang']) : " ";
$tgl_pembelian = (isset($_POST['tgl_pembelian'])) ? htmlentities($_POST['tgl_pembelian']) : " ";
$qty = (isset($_POST['qty'])) ? htmlentities($_POST['qty']) : " ";
$harga_satuan = (isset($_POST['harga_satuan'])) ? htmlentities($_POST['harga_satuan']) : " ";
$jumlah_rp = (isset($_POST['jumlah_rp'])) ? htmlentities($_POST['jumlah_rp']) : " ";

if (!empty($_POST['edit_pembelian_validate'])) {
    $query = mysqli_query($conn, "UPDATE tb_pembelian SET nama_barang='$nama_barang', tgl_pembelian='$tgl_pembelian', qty='$qty', harga_satuan='$harga_satuan', jumlah_rp='$jumlah_rp' WHERE id = $id");
        if ($query) {
            $message = '<script>alert("Data Berhasil Diupdate")
            window.location="../pembelian"</script>';
        } else {
            $message = '<script>alert("Data Gagal Diupdate")window.location="../pembelian"</script>';
        }
    }
echo $message;
?>