<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_penjualan.*,tb_bayar.*,nama, SUM(harga_per_dus*qty) AS harganya FROM tb_penjualan
    LEFT JOIN tb_user ON tb_user.id = tb_penjualan.salesman
    LEFT JOIN tb_list_penjualan ON tb_list_penjualan.kode_penjualan = tb_penjualan.id_penjualan
    LEFT JOIN tb_produk ON tb_produk.id = tb_list_penjualan.produk 
   JOIN tb_bayar ON tb_bayar.id_bayar = tb_penjualan.id_penjualan
   WHERE salesman=$_SESSION[id_usmb]  GROUP BY id_penjualan ORDER BY waktu_penjualan ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Laporan Penjualan
        </div>
        <div class="card-body">
            
            <?php
            if (empty($result)) {
                echo "Data penjualan tidak ada";
            } else {
                foreach ($result as $row) {
                    ?>

                    <?php
                }
                ?>
                <div class="table-responsive mt-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Penjualan</th>
                                <th scope="col">Waktu Penjualan</th>
                                <th scope="col">Waktu Pembayaran</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Salesman</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>

                                    <td>
                                        <?php echo $row['id_penjualan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_penjualan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_bayar'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['pelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['alamat_pelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format((int) $row['harganya'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama'] ?>
                                    </td>
                                    
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1"
                                                href="./?x=viewitem&penjualan= <?php echo $row['id_penjualan'] . "&pelanggan=" . $row['pelanggan'] . "&alamat_pelanggan=" . $row['alamat_pelanggan'] ?>"><i
                                                    class="bi bi-eye"></i></a>
                                            </div>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
