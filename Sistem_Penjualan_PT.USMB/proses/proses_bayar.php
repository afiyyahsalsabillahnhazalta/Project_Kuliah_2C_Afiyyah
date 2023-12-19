<?php
session_start();
include "connect.php";
$kode_penjualan = (isset($_POST['kode_penjualan'])) ? htmlentities($_POST['kode_penjualan']) : " ";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : " ";
$alamat = (isset($_POST['alamat_pelanggan'])) ? htmlentities($_POST['alamat_pelanggan']) : " ";
$total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : " ";
$uang = (isset($_POST['uang'])) ? htmlentities($_POST['uang']) : " ";
$kembalian = $uang - $total;

if (!empty($_POST['bayar_validate'])) {
    if ($kembalian < 0) {
        $message = '<script>alert("Nominal Uang Tidak Mencukupi")
        window.location="../?x=itempenjualan&penjualan=' . $kode_penjualan . '&pelanggan=' . $pelanggan . '&alamat_pelanggan=' . $alamat . '"</script>';
    } else {
       $query = mysqli_query($conn, "INSERT INTO tb_bayar (id_bayar,nominal_uang,total_bayar) VALUES ('$kode_penjualan', '$uang ', '$total')");
            if ($query) {
                $message = '<script>alert("Pembayaran Berhasil \nUang Kembalian Rp. '.$kembalian.' ")
                window.location="../?x=itempenjualan&penjualan=' . $kode_penjualan . '&pelanggan=' . $pelanggan . '&alamat_pelanggan=' . $alamat . '"</script>';
            } else {
                $message = '<script>alert("Pembayaran Gagal")
                window.location="../?x=itempenjualan&penjualan=' . $kode_penjualan . '&pelanggan=' . $pelanggan . '&alamat_pelanggan=' . $alamat . '"</script>';
            }
        }
    }
echo $message;
?>