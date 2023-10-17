<html>
    <head>
        <title>Koneksi Database MySQL</title>
    </head>
    <body>
        <h1>Koneksi database dengan mysqli_fetch_assoc</h1>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "db_saya") or die("Koneksi gagal");
        $query = mysqli_query($conn, "SELECT * FROM liga");
        $row = mysqli_fetch_assoc($query);
        $hasil = mysqli_query($conn, "select * from liga");
        while ($row = mysqli_fetch_assoc($hasil)){
            echo "Liga ".$row["negara"]; //array asosiatif
            echo " mempunyai ".$row["champion"]; //array asosiatif
            echo " wakil di liga champion <br>";
        }
        ?>
    </body>
</html>