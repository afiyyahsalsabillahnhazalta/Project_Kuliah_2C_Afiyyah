<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : " ";
$foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : " ";

if(!empty($_POST['input_produk_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_produk WHERE id = '$id'");
    if($query){
        unlink("../assets/img/$foto");
        $message = '<script>alert("Data Berhasil Dihapus")
            window.location="../product"</script>';
    }else{
    $message = '<script>alert("Data Gagal Dihapus");
    window.location="../product"</script>';
}
}echo $message;
?>