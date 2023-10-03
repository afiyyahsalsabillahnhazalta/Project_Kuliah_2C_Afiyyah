<?php
    $str = "Belajar PHP ternyata Menyenangkan";
    echo strtolower ($str); //ubah huruf ke kecil semua
    echo"<br>";
    echo strtoupper ($str); //ubah huruf ke besar semua
    echo "<br>";
    echo str_replace("Menyenangkan", "mudah lho", $str);
    //mengganti string
?>