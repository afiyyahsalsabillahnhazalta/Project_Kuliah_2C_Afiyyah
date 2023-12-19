<?php
session_start();
include "connect.php";
$kode_penjualan = (isset($_POST['kode_penjualan'])) ? htmlentities($_POST['kode_penjualan']) : " ";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : " ";
$alamat = (isset($_POST['alamat_pelanggan'])) ? htmlentities($_POST['alamat_pelanggan']) : " ";
$produk = (isset($_POST['produk'])) ? htmlentities($_POST['produk']) : " ";
$qty = (isset($_POST['qty'])) ? htmlentities($_POST['qty']) : " ";

if (!empty($_POST['input_itempenjualan_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_penjualan WHERE produk = '$produk' && kode_penjualan='$kode_penjualan'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Item yang dimasukkan telah ada ")
        window.location="../?x=itempenjualan&penjualan=' . $kode_penjualan . '&pelanggan=' . $pelanggan . '&alamat_pelanggan=' . $alamat . '"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_list_penjualan (produk, kode_penjualan, qty) VALUES ('$produk', '$kode_penjualan', '$qty')");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dimasukkan")
            window.location="../?x=itempenjualan&penjualan=' . $kode_penjualan . '&pelanggan=' . $pelanggan . '&alamat_pelanggan=' . $alamat . '"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dimasukkan")
            window.location="../?x=itempenjualan&penjualan=' . $kode_penjualan . '&pelanggan=' . $pelanggan . '&alamat_pelanggan=' . $alamat . '"</script>';
        }
    }
}
echo $message;
?>