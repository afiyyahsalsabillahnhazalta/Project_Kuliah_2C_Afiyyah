<html>
    <body>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        $d = date("D");
        $date = date("d-m-Y H:i:s");

        $dayTranslations = array(
            "Monday" => "Senin",
            "Tuesday" => "Selasa",
            "Wesnesday" => "Rabu",
            "Thursday" => "Kamis",
            "Friday" => "Jumat",
            "Saturday" => "Sabtu",
            "Sun" => "Minggu"
        );
        $d = $dayTranslations[$d];
        if ($d == "Mon"){
            echo "Selamat belajar <br>";
        } else
            echo "Ini hari $d <br>";
        echo $d . " ". $date;
        ?>
    </body>
</html>
