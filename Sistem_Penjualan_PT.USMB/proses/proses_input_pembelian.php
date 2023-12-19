<?php
session_start();
include "connect.php";

$kode_pembelian = (isset($_POST['kode_pembelian'])) ? htmlentities($_POST['kode_pembelian']) : " ";
$nama_produk = (isset($_POST['nama_barang'])) ? htmlentities($_POST['nama_barang']) : " ";
$tgl_pembelian = (isset($_POST['tgl_pembelian'])) ? htmlentities($_POST['tgl_pembelian']) : " ";
$qty = (isset($_POST['qty'])) ? htmlentities($_POST['qty']) : " ";
$harga_satuan = (isset($_POST['harga_satuan'])) ? htmlentities($_POST['harga_satuan']) : " ";
$jumlah_rp = (isset($_POST['jumlah_rp'])) ? htmlentities($_POST['jumlah_rp']) : " ";

$message = ""; 

if (!empty($_POST['input_pembelian_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_pembelian WHERE id = '$kode_pembelian'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Order yang dimasukkan telah ada ")
            window.location="../pembelian"</script>';
    } else {
        // Mulai transaksi
        mysqli_begin_transaction($conn);

        // Proses update stok barang
        $updateStok = mysqli_query($conn, "UPDATE tb_stokgudang SET qty = qty + '$qty' WHERE nama_barang = '$nama_produk'");

        if ($updateStok) {
            // Jika update stok berhasil, masukkan data pembelian
            $query = mysqli_query($conn, "INSERT INTO tb_pembelian (id, nama_barang, tgl_pembelian, qty, harga_satuan, jumlah_rp) VALUES ('$kode_pembelian', '$nama_produk', '$tgl_pembelian', '$qty', '$harga_satuan', '$jumlah_rp')");

            if ($query) {
                // Commit transaksi jika semuanya berhasil
                mysqli_commit($conn);

                $message = '<script>alert("Data Berhasil dimasukkan")
                    window.location="../stokgudang"</script>';
            } else {
                // Rollback transaksi jika ada kesalahan
                mysqli_rollback($conn);
                
                $message = '<script>alert("Data Gagal dimasukkan")
                    window.location="../pembelian"</script>';
            }
        } else {
            // Rollback transaksi jika ada kesalahan
            mysqli_rollback($conn);
            
            $message = '<script>alert("Gagal memperbarui stok barang")
                window.location="../pembelian"</script>';
        }
    }
}
echo $message;
?>
