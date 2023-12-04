<?php
session_start();
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'product') {
    $page = "product.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pembelian') {
    if ($_SESSION['level_usmb'] == 1) {
        $page = "pembelian.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'penjualan') {
    $page = "penjualan.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'stokgudang') {
    if ($_SESSION['level_usmb'] == 1) {
        $page = "stokgudang.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'laporanpenjualan') {
    $page = "lap_penjualan.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'laporanpembelian') {
    if ($_SESSION['level_usmb'] == 1) {
        $page = "lap_pembelian.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'laporankeuntungan') {
    if ($_SESSION['level_usmb'] == 1) {
        $page = "lap_keuntungan.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    if ($_SESSION['level_usmb'] == 1) {
        $page = "user.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proses/proses_logout.php";
} else {
    $page = "home.php";
    include "main.php";
}
?>