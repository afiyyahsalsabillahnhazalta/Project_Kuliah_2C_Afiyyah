<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_penjualan.*,tb_bayar.*,nama, SUM(harga_per_dus*qty) AS harganya FROM tb_penjualan
    LEFT JOIN tb_user ON tb_user.id = tb_penjualan.salesman
    LEFT JOIN tb_list_penjualan ON tb_list_penjualan.kode_penjualan = tb_penjualan.id_penjualan
    LEFT JOIN tb_produk ON tb_produk.id = tb_list_penjualan.produk 
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_penjualan.id_penjualan
    GROUP BY id_penjualan");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Penjualan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah
                        Data</button>
                </div>
            </div>
            <!-- Modal tambah penjualan baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penjualan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_penjualan.php"
                                method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="uploadFoto"
                                                name="kode_penjualan"
                                                value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                                            <label for="uploadFoto">Kode Penjualan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kode Penjualan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pelanggan"
                                                placeholder="Nama Pelanggan" name="pelanggan" required>
                                            <label for="pelanggan">Nama Pelanggan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pelanggan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="alamat_pelanggan"
                                                placeholder="Alamat Pelanggan" name="alamat_pelanggan" required>
                                            <label for="alamat_pelanggan">Alamat Pelanggan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Alamat Pelanggan.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_penjualan_validate"
                                        value="12345">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Akhir Modal tambah penjualan baru-->
            <?php
            if (empty($result)) {
                echo "Data penjualan tidak ada";
            } else {
                foreach ($result as $row) {
                    ?>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id_penjualan'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Penjualan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_penjualan.php"
                                        method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input readonly type="text" class="form-control" id="uploadFoto"
                                                        name="kode_penjualan" value="<?php echo $row['id_penjualan'] ?>">
                                                    <label for="uploadFoto">Kode Penjualan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Kode Penjualan.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pelanggan"
                                                        placeholder="Nama Pelanggan" name="pelanggan" required
                                                        value="<?php echo $row['pelanggan'] ?>">
                                                    <label for="pelanggan">Nama Pelanggan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Pelanggan.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="alamat_pelanggan"
                                                        placeholder="Alamat Pelanggan" name="alamat_pelanggan" required
                                                        value="<?php echo $row['alamat_pelanggan'] ?>">
                                                    <label for="alamat_pelanggan">Alamat Pelanggan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Alamat Pelanggan.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_penjualan_validate"
                                                value="12345">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Edit-->

                    <!-- Modal Delete -->
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_penjualan'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_penjualan.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_penjualan'] ?>" name="kode_penjualan">
                                        <div class="col-lg-12">
                                            Apakah Anda Ingin Menghapus Data Penjualan atas nama <b>
                                                <?php echo $row['pelanggan'] ?>
                                            </b> dengan kode penjualan <b>
                                                <?php echo $row['id_penjualan'] ?>
                                            </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_penjualan_validate"
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
                <div class="table-responsive mt-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Penjualan</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Salesman</th>
                                <th scope="col">Status</th>
                                <th scope="col">Waktu</th>
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
                                    <?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>Selesai</span>": "" ;?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_penjualan'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1"
                                                href="./?x=itempenjualan&penjualan= <?php echo $row['id_penjualan'] . "&pelanggan=" . $row['pelanggan'] . "&alamat_pelanggan=" . $row['alamat_pelanggan'] ?>"><i
                                                    class="bi bi-eye"></i></a>
                                            <button
                                                class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['id_penjualan'] ?>"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button
                                                class="<?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id_penjualan'] ?>"><i
                                                    class="bi bi-trash"></i></button>
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
