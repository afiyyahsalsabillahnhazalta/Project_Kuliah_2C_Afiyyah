<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
</head>
<body>
    <?php
    $nama=$_POST["nama"];
    $email=$_POST["email"];
    $komentar=$_POST["komentar"];
    ?>
    <h1>Data Buku Tamu</h1>
    <hr>
    Nama Anda       : <?php echo $nama?> <br>
    Email Address   : <?php echo $email?> <br>
    Komentar        : <textarea name="komentar" cols="40" rows="5">
        <?php echo $komentar?> </textarea> <br>
</body>
</html>
