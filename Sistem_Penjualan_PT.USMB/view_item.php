<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga_per_dus*qty) AS harganya, tb_penjualan.waktu_penjualan FROM tb_list_penjualan
LEFT JOIN tb_penjualan ON tb_penjualan.id_penjualan = tb_list_penjualan.kode_penjualan
    LEFT JOIN tb_produk ON tb_produk.id = tb_list_penjualan.produk 
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_penjualan.id_penjualan 
    GROUP BY id_list_penjualan
    HAVING tb_list_penjualan.kode_penjualan = $_GET[penjualan]");

$kode = $_GET['penjualan'];
$pelanggan = $_GET['pelanggan'];
$alamat = $_GET['alamat_pelanggan'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_produk = mysqli_query($conn, "SELECT id, nama_produk FROM tb_produk");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman View Item
        </div>
        <div class="card-body">
            <a href="laporanpenjualan" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i></a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kodePenjualan"
                            value="<?php echo $kode; ?>">
                        <label for="uploadFoto">Kode Penjualan</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="Pelanggan"
                            value="<?php echo $pelanggan; ?>">
                        <label for="uploadFoto">Pelanggan</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="Alamat" value="<?php echo $alamat; ?>">
                        <label for="uploadFoto">Alamat</label>
                    </div>
                </div>
            </div>

            <?php
            if (empty($result)) {
                echo "Data produk tidak ada";
            } else {
                foreach ($result as $row) {
                    ?>

                    <?php
                }
                ?>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['nama_produk'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harga_per_dus'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['qty'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['status'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <?php
                                $total += $row['harganya'];
                            }
                            ?>
                            <tr>
                                <td colspan="4" class="fw-bold">
                                    Total Harga
                                </td>
                                <td class="fw-bold">
                                    <?php echo number_format($total, 0, ',', '.') ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <div>
                <button onclick="printFaktur()" class="btn btn-info">Cetak Faktur</button>
            </div>
        </div>
    </div>
</div>

<div id="fakturContent" class="d-none">
    <style>
        #faktur {
            font-family: "Arial", sans-sarif;
            font-size: 20px;

        }

        #faktur h2 {
            text-align: center;
            color: #333;
        }

        #faktur p {
            margin: 5px 0;
        }

        #faktur table {
            font-size: 20px;
            border-collapse: collapse;
            margin-top: 10px;
            width: 100%;
        }

        #faktur th,
        #faktur td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        #faktur .total {
            font-weight: bold;
        }

        #ttd {
            display: flex;
            font-family: "Arial", sans-sarif;
            font-size: 20px;
            margin-top: 20px;
        }

        #ttd p {
            text-align: left;
            margin-right: 700px;
        }

        .signature-line {
            margin-bottom: 20px;
            line-height: 5;
        }
    </style>
    <div id="faktur">
        <h2>FAKTUR PENJUALAN</h2>
        <br>
        <p>Kode Penjualan :
            <?php echo $kode ?>
        </p>
        <p>Pelanggan :
            <?php echo $pelanggan ?>
        </p>
        <p>Alamat :
            <?php echo $alamat ?>
        </p>
        <p>Waktu Penjualan :
            <?php echo date('d/m/Y H:i:s', strtotime($result[0]['waktu_penjualan'])) ?>
        </p>

        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($result as $row) { ?>
                    <tr>
                        <td>
                            <?php echo $row['nama_produk'] ?>
                        </td>
                        <td>
                            <?php echo number_format($row['harga_per_dus'], 0, ',', '.') ?>
                        </td>
                        <td>
                            <?php echo $row['qty'] ?>
                        </td>
                        <td>
                            <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                        </td>
                    </tr>
                    <?php
                    $total += $row['harganya'];
                } ?>
                <tr class="total">
                    <td colspan="3">Total Harga</td>
                    <td>
                        <?php echo number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="ttd">
            <p class="signature-line"> Salesman
                <?php echo $salesman ?>
            </p>
            <p class="signature-line">Pelanggan
                <?php echo $pelanggan ?>
            </p>

        </div>
    </div>
</div>
</div>

<script>
    function printFaktur() {
        var fakturContent = document.getElementById("fakturContent").innerHTML;

        var printFrame = document.createElement('iframe');
        printFrame.style.display = 'none';
        document.body.appendChild(printFrame);
        printFrame.contentDocument.write(fakturContent);
        printFrame.contentWindow.print();
        document.body.removeChild(printFrame);
    }
</script>

