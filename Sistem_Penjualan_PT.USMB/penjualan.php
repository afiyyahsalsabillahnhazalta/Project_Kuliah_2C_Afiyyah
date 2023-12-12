<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_barang");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<!DOCTYPE html>
<html lang="en">
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Pembelian
        </div>

        <body>
            <div class="container">
                <h1 class="mt-4">Form Faktur Penjualan</h1>
                <form id="penjualanForm">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="tanggalJual" placeholder="Tanggal Penjualan">
                        <label for="tanggaljual">Tanggal</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="namaPelanggan" placeholder="Nama Pelanggan">
                        <label for="namaPelanggan">Nama Pelanggan</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <textarea class="form-control" id="alamat" placeholder="Alamat"></textarea>
                        <label for="alamat">Alamat</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="namaSales" placeholder="Nama Sales">
                        <label for="namaSales">Nama Sales</label>
                    </div>
                    <br>

                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#ModalTambahUser"> Input Barang</button>
                            </div>
                        </div>
                        <br>
                        <!-- Modal tambah Barang-->
                        <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pembelian</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate
                                            action="proses/proses_input_pembelian.php" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="nama_barang" required>
                                                            <option selected hidden value="">Pilih Barang</option>
                                                            <option>Milano Krimer Kental Manis 500gr</option>
                                                            <option>Milano Krimer Kental Manis 1kg</option>
                                                            <option>Milano Soya 350ml</option>
                                                        </select>
                                                        <label for="nama_barang">Nama Barang</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Nama Barang.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="qty"
                                                            placeholder="Qty" name="qty" required>
                                                        <label for="qty">Qty</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Qty.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="harga_satuan"
                                                            placeholder="Harga Satuan" name="harga_satuan" required>
                                                        <label for="harga_satuan">Harga Satuan/Dus</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Harga Satuan/Dus.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="jumlah_rp"
                                                            placeholder="Jumlah_Rp" name="jumlah_rp" required>
                                                        <label for="jumlah_rp">Jumlah(Rp)</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Jumlah(Rp).
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"
                                                    name="input_barang_validate" value="12345">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Akhir Modal tambah barang-->
                       
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Harga Satuan/Dus</th>
                                                <th scope="col">Jumlah(Rp)</th>
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
                                                        <?php echo $row['nama_barang'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['qty'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format((int) $row['harga_satuan'], 0, ',', '.') ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format((int) $row['jumlah'], 0, ',', '.') ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">

                                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                                                data-bs-target="#ModalEdit<?php echo $row['nama_barang'] ?>"><i
                                                                    class="bi bi-pencil-square"></i></button>
                                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                                                data-bs-target="#ModalDelete<?php echo $row['nama_barang'] ?>"><i
                                                                    class="bi bi-trash"></i></button>

                                                        </div>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    
                    </script>
        </body>

</html>
