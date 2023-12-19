<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : " ";
$kode_penjualan = (isset($_POST['kode_penjualan'])) ? htmlentities($_POST['kode_penjualan']) : " ";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : " ";
$alamat = (isset($_POST['alamat_pelanggan'])) ? htmlentities($_POST['alamat_pelanggan']) : " ";

if (!empty($_POST['delete_itempenjualan_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_list_penjualan WHERE id_list_penjualan = '$id'");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dihapus")
            window.location="../?x=itempenjualan&penjualan=' . $kode_penjualan . '&pelanggan=' . $pelanggan . '&alamat_pelanggan=' . $alamat . '"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dihapus")
            window.location="../?x=itempenjualan&penjualan=' . $kode_penjualan . '&pelanggan=' . $pelanggan . '&alamat_pelanggan=' . $alamat . '"</script>';
        }
    }
echo $message;
?>