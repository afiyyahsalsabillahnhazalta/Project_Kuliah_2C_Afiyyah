<?php
session_start();
include "connect.php";
$kode_penjualan = (isset($_POST['kode_penjualan'])) ? htmlentities($_POST['kode_penjualan']) : " ";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : " ";
$alamat = (isset($_POST['alamat_pelanggan'])) ? htmlentities($_POST['alamat_pelanggan']) : " ";

if (!empty($_POST['input_penjualan_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE id_penjualan = '$kode_penjualan'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Penjualan yang dimasukkan telah ada ")
            window.location="../penjualan"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_penjualan (id_penjualan, pelanggan, alamat_pelanggan, salesman) VALUES ('$kode_penjualan', '$pelanggan', '$alamat', '$_SESSION[id_usmb]')");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dimasukkan")
            window.location="../?x=itempenjualan&penjualan='.$kode_penjualan.'&pelanggan='.$pelanggan.'&alamat_pelanggan='.$alamat.'"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dimasukkan")</script>';
        }
    }
}
echo $message;
?>

