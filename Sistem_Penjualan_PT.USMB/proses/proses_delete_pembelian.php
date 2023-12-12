<?php
session_start();
include "connect.php";

$message = "";

if (isset($_POST['delete_pembelian_validate'])) {
    $id_pembelian = (isset($_POST['id'])) ? htmlentities($_POST['id']) : " ";

    // Ambil data pembelian sebelum dihapus
    $querySelect = mysqli_query($conn, "SELECT * FROM tb_pembelian WHERE id = '$id_pembelian'");
    $dataPembelian = mysqli_fetch_assoc($querySelect);

    if ($dataPembelian) {
        // Mulai transaksi
        mysqli_begin_transaction($conn);

        // Proses pengurangan stok barang di tb_stokgudang
        $updateStok = mysqli_query($conn, "UPDATE tb_stokgudang SET qty = qty - '{$dataPembelian['qty']}' WHERE nama_barang = '{$dataPembelian['nama_barang']}'");

        if ($updateStok) {
            // Jika update stok berhasil, hapus data pembelian
            $queryDelete = mysqli_query($conn, "DELETE FROM tb_pembelian WHERE id = '$id_pembelian'");

            if ($queryDelete) {
                // Commit transaksi jika semuanya berhasil
                mysqli_commit($conn);
                $message = '<script>alert("Data berhasil dihapus")
                    window.location="../pembelian"</script>';
            } else {
                // Rollback transaksi jika ada kesalahan
                mysqli_rollback($conn);
                $message = '<script>alert("Data gagal dihapus")
                    window.location="../pembelian"</script>';
            }
        } else {
            // Rollback transaksi jika ada kesalahan
            mysqli_rollback($conn);
            $message = '<script>alert("Gagal memperbarui stok barang")
                window.location="../pembelian"</script>';
        }
    } else {
        $message = '<script>alert("Data pembelian tidak ditemukan")
            window.location="../pembelian"</script>';
    }

    echo $message;
}
?>
