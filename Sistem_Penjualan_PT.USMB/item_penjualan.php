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

    // $kode = $record['id_penjualan'];
    // $pelanggan = $record['pelanggan'];
    // $alamat = $record['alamat_pelanggan'];
    $salesman = $record['salesman'];
}

$select_produk = mysqli_query($conn, "SELECT id, nama_produk FROM tb_produk");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Item Penjualan
        </div>
        <div class="card-body">
            <a href="penjualan" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i></a>
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
            <!-- Modal tambah item-->
            <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_itempenjualan.php"
                                method="POST">
                                <input type="hidden" name="kode_penjualan" value="<?php echo $kode ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <input type="hidden" name="alamat_pelanggan" value="<?php echo $alamat ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="produk" id="">
                                                <option selected hidden value="">Pilih Produk</option>
                                                <?php
                                                foreach ($select_produk as $value) {
                                                    echo "<option value= $value[id]>$value[nama_produk]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="produk">Produk</label>
                                            <div class="invalid-feedback">
                                                Pilih Produk.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Qty" name="qty" required>
                                            <label for="floatingInput">Qty</label>
                                            <div class="invalid-feedback">
                                                Masukkan Qty.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_itempenjualan_validate"
                                        value="12345">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Akhir Modal tambah item-->
            <?php
            if (empty($result)) {
                echo "Data produk tidak ada";
            } else {
                foreach ($result as $row) {
                    ?>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id_list_penjualan'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_itempenjualan.php"
                                        method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_penjualan'] ?>">
                                        <input type="hidden" name="kode_penjualan" value="<?php echo $kode ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                        <input type="hidden" name="alamat_pelanggan" value="<?php echo $alamat ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="produk" id="">
                                                        <option selected hidden value="">Pilih Produk</option>
                                                        <?php
                                                        foreach ($select_produk as $value) {
                                                            if ($row['produk'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_produk]</option>";
                                                            } else {
                                                                echo "<option value= $value[id]>$value[nama_produk]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="produk">Produk</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Produk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="Qty" name="qty" required value="<?php echo $row['qty'] ?>">
                                                    <label for="floatingInput">Qty</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Qty.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_itempenjualan_validate"
                                                value="12345">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Edit-->

                    <!-- Modal Delete -->
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_list_penjualan'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_itempenjualan.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_list_penjualan'] ?>" name="id">
                                        <input type="hidden" name="kode_penjualan" value="<?php echo $kode ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                        <input type="hidden" name="alamat_pelanggan" value="<?php echo $alamat ?>">
                                        <div class="col-lg-12">
                                            Apakah Anda Ingin Menghapus Produk <b>
                                                <?php echo $row['nama_produk'] ?>
                                            </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_itempenjualan_validate"
                                                value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Delete-->
                    <?php
                }
                ?>

                <!-- Modal bayar-->
                <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

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
                                <span class="text-danger fs-5 fw-semibold">Apakah Anda Yakin Ingin Melakukan Pembayaran?</span>
                                <form class="needs-validation" novalidate action="proses/proses_bayar.php"
                                    method="POST">
                                    <input type="hidden" name="kode_penjualan" value="<?php echo $kode ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                    <input type="hidden" name="alamat_pelanggan" value="<?php echo $alamat ?>">
                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="Nominal Uang" name="uang" required>
                                                <label for="floatingInput">Nominal Uang</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nominal Uang.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="bayar_validate"
                                            value="12345">Bayar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Akhir Modal bayar-->


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
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
                                    <td>
                                        <div class="d-flex">
                                        <button class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>" data-bs-toggle="modal"
                        data-bs-target="#ModalEdit<?php echo $row['id_list_penjualan'] ?>"><i
                          class="bi bi-pencil-square"></i></button>
                      <button class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>" data-bs-toggle="modal"
                        data-bs-target="#ModalDelete<?php echo $row['id_list_penjualan'] ?>"><i
                          class="bi bi-trash"></i></button>
                                        </div>

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
                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success "; ?> " data-bs-toggle="modal" data-bs-target="#tambahItem"><i
                        class="bi bi-plus-circle-fill"></i> Item</button>
                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary "; ?>" data-bs-toggle="modal" data-bs-target="#bayar"><i
                        class="bi bi-cash-coin"></i> Bayar</button>
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
            /* text-align: center; */

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
            justify-content: space-between;
            margin-top: 100px;
            text-align: center;
        }

        #ttd img {
            max-width: 150px;
            max-height: 100px;
        }

        .signature-line {
            width: 200px;
            border-top: 1px solid #000;
            margin-top: 10px;
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
        <!-- Tanda tangan pelanggan -->
        <div>
            <p class="signature-line"></p>
            <?php echo $pelanggan ?>
        </div>

        <!-- Tanda tangan salesman -->
        <div>
        <p class="signature-line"></p>
            <?php echo $salesman ?>
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

