<HTMl>
    <HEAD>
        <title>Koneksi Database MySQL</title>
    </HEAD>
    <BODY>
        <h1>Koneksi database dengan mysqli_fetch_array</h1>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "db_saya") or die("Koneksi gagal");
        $query = mysqli_query($conn, "SELECT * FROM liga");
        $row = mysqli_fetch_array($query);
        $hasil = mysqli_query($conn, "select * from liga");
        while ($row = mysqli_fetch_array($hasil)){
            echo "Liga ".$row["negara"]; //array asosiatif
            echo " mempunyai ".$row[2]; //array numeris
            echo " wakil di liga champion <br>";
        }
        ?>
    </BODY>
</HTMl>