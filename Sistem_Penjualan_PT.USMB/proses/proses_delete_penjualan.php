<?php
include "connect.php";
$kode_penjualan = (isset($_POST['kode_penjualan'])) ? htmlentities($_POST['kode_penjualan']) : " ";

if (!empty($_POST['delete_penjualan_validate'])) {
    $select = mysqli_query($conn, "SELECT kode_penjualan FROM tb_list_penjualan WHERE kode_penjualan = '$kode_penjualan'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Penjualan Telah memiliki item penjualan, ini tidak dapat dihapus")
            window.location="../penjualan"</script>';
    } else {
        $query = mysqli_query($conn, "DELETE FROM tb_penjualan WHERE id_penjualan = '$kode_penjualan'");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dihapus")
            window.location="../penjualan"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dihapus");
    window.location="../penjualan"</script>';
        }
    }
}
echo $message;
?>