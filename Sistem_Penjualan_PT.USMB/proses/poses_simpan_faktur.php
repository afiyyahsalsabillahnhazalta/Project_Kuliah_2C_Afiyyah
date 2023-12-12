<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $tanggal = $_POST["tanggal"];
    $namaPelanggan = $_POST["nama_pelanggan"];
    $alamatPelanggan = $_POST["alamat_pelanggan"];
    $noHP = $_POST["no_hp"];
    $namaSalesman = $_POST["nama_salesman"];
    
    // Informasi Barang
    $namaBarang = $_POST["nama_barang"];
    $qty = $_POST["qty"];
    $hargaSatuan = $_POST["harga_satuan"];

    // Simpan data ke dalam database atau lakukan tindakan sesuai kebutuhan

    // Misalnya, tampilkan data dalam tabel
    echo "<h2>Data Faktur Penjualan</h2>";
    echo "<p><strong>Informasi Pelanggan:</strong></p>";
    echo "<p>Tanggal: $tanggal</p>";
    echo "<p>Nama Pelanggan: $namaPelanggan</p>";
    echo "<p>Alamat Pelanggan: $alamatPelanggan</p>";
    echo "<p>No. HP: $noHP</p>";
    echo "<p>Nama Salesman: $namaSalesman</p>";

    echo "<p><strong>Informasi Barang:</strong></p>";
    echo "<table class='table'>";
    echo "<tr><th>Nama Barang</th><th>Qty</th><th>Harga Satuan</th></tr>";
    for ($i = 0; $i < count($namaBarang); $i++) {
        echo "<tr><td>{$namaBarang[$i]}</td><td>{$qty[$i]}</td><td>{$hargaSatuan[$i]}</td></tr>";
    }
    echo "</table>";
} else {
    // Redirect atau tampilkan pesan kesalahan jika metode request bukan POST
    header("Location: index.php");
    exit();
}
?>
