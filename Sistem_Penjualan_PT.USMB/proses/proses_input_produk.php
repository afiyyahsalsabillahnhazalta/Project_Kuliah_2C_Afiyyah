<?php
include "connect.php";
$nama_produk = (isset($_POST['nama_produk'])) ? htmlentities($_POST['nama_produk']) : " ";
$harga_satuan = (isset($_POST['harga_satuan'])) ? htmlentities($_POST['harga_satuan']) : " ";
$jumlah_per_dus = (isset($_POST['jumlah_per_dus'])) ? htmlentities($_POST['jumlah_per_dus']) : " ";
$harga_per_dus = (isset($_POST['harga_per_dus'])) ? htmlentities($_POST['harga_per_dus']) : " ";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : " ";


$kode_rand = rand(10000, 99999) . "-";
$target_dir = "../assets/img/" . $kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (!empty($_POST['input_produk_validate'])) {
    // Cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "Maaf, File Yang Dimasukkan Telah Ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { //500kb
                $message = "File foto yang diupload terlalu besar";
                $statusUpload = 0;
            } else {
                if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                    $message = "Maaf hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG dan GIF";
                    $statusUpload = 0;
                }
            }
        }
    }

    if ($statusUpload == 0) {
        $message = '<script>alert("' . $message . ', Gambar tidak dapat diupload")
        window.location="../product"</script>';
    } else {
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "INSERT INTO tb_produk (foto, nama_produk, harga_satuan, jumlah_per_dus, harga_per_dus, keterangan) VALUES ('" . $kode_rand . $_FILES['foto']['name'] . "','$nama_produk', '$harga_satuan', '$jumlah_per_dus', '$harga_per_dus', '$keterangan')");
                if ($query) {
                    $message = '<script>alert("Data Berhasil Dimasukkan")
            window.location="../product"</script>';
                } else {
                    $message = '<script>alert("Data Gagal Dimasukkan")
            window.location="../product"</script>';
                }
            } else {
                $message = '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload")
            window.location="../product"</script>';
            }
        }
    }
echo $message;
?>