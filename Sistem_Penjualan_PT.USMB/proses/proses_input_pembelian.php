<?php
session_start();
include "connect.php";
$kode_pembelian = (isset($_POST['kode_pembelian'])) ? htmlentities($_POST['kode_pembelian']) : " ";
$nama_barang = (isset($_POST['nama_barang'])) ? htmlentities($_POST['nama_barang']) : " ";
$tgl_pembelian = (isset($_POST['tgl_pembelian'])) ? htmlentities($_POST['tgl_pembelian']) : " ";
$qty = (isset($_POST['qty'])) ? htmlentities($_POST['qty']) : " ";
$harga_satuan = (isset($_POST['harga_satuan'])) ? htmlentities($_POST['harga_satuan']) : " ";
$jumlah_rp = (isset($_POST['jumlah_rp'])) ? htmlentities($_POST['jumlah_rp']) : " ";


if (!empty($_POST['input_pembelian_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_pembelian WHERE id_pembelian = '$kode_pembelian'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Order yang dimasukkan telah ada ")
            window.location="../pembelian"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_pembelian (id_pembelian, nama_barang, tgl_pembelian, qty, harga_satuan, jumlah_rp) VALUES ('$kode_pembelian', '$nama_barang', '$tgl_pembelian', '$qty', '$harga_satuan', '$jumlah_rp')");
        if ($query) {
            $message = '<script>alert("Data Berhasil dimasukkan")
                    window.location="../pembelian"</script>';

        } else {
            $message = '<script>alert("Data Gagal dimasukkan")
            window.location="../pembelian"</script>';
        }
    }
}
echo $message;
?>