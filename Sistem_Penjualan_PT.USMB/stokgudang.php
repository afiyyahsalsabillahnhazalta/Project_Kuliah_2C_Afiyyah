<?php
include "proses/connect.php";

// Ambil data stok gudang
$query = mysqli_query($conn, "SELECT * FROM tb_stokgudang");
while ($record = mysqli_fetch_array($query)) {
    $stok_gudang[] = $record;
}
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Stok Barang Gudang
        </div>
        <div class="card-body">
            <div class="row">
                </div>

            <?php
            if (empty($stok_gudang)) {
                echo "Data stok barang gudang tidak ada";
            } else {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Produk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Stok </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($stok_gudang as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['nama_barang'] ?></td>
                                    <td><?php echo $row['qty'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
