<?php
include "connect.php";

// Proses tambah data stok barang
if (isset($_POST['input_stokbarang_validate'])) {
    $id_produk = (isset($_POST['id_produk'])) ? $_POST['id_produk'] : "";
    $qty = (isset($_POST['qty'])) ? $_POST['qty'] : "";

    // Validasi input
    if (empty($id_produk) || empty($qty)) {
        echo '<script>alert("Semua kolom harus diisi")</script>';
    } else {
        // Ambil data produk
        $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id = '$id_produk'");
        $data_produk = mysqli_fetch_assoc($produk);

        if (!$data_produk) {
            echo '<script>alert("Produk tidak ditemukan")</script>';
        } else {
            $nama_barang = $data_produk['nama_barang'];
            $ukuran = $data_produk['ukuran'];

            // Insert data stok barang
            $insertStok = mysqli_query($conn, "INSERT INTO tb_stokbarang (id_produk, nama_barang, ukuran, qty) VALUES ('$id_produk', '$nama_barang', '$ukuran', '$qty')");

            if ($insertStok) {
                echo '<script>alert("Data Stok Barang berhasil ditambahkan")</script>';
            } else {
                echo '<script>alert("Gagal menambahkan data Stok Barang")</script>';
            }
        }
    }
}
?>
