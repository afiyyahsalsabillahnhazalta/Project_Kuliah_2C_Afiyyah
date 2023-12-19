<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_produk");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Daftar Produk
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah
                        Produk</button>
                </div>
            </div>
            <!-- Modal tambah produk baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_produk.php"
                                method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto"
                                                placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto produk</label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto produk.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Nama produk" name="nama_produk" required>
                                            <label for="floatingInput">Nama produk</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama produk.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Hargasatuan produk" name="harga_satuan" required>
                                            <label for="floatingInput">Harga Satuan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Harga Satuan produk.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Jumlahperdus produk" name="jumlah_per_dus" required>
                                            <label for="floatingInput">Jumlah Per Dus</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jumlah Per Dus Produk.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Hargaperdus produk" name="harga_per_dus" required>
                                            <label for="floatingInput">Harga Per Dus</label>
                                            <div class="invalid-feedback">
                                                Masukkan Harga Per Dus Produk.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Keterangan" name="keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_produk_validate"
                                        value="12345">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Akhir Modal tambah produk baru-->
            <?php
            if (empty($result)) {
                echo "Data produk tidak ada";
            } else {
                foreach ($result as $row) {
                    ?>
                    <!-- Modal View-->
                    <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_produk.php"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        name="nama_produk" value="<?php echo $row['nama_produk'] ?>">
                                                    <label for="floatingInput">Nama produk</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama produk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput"
                                                        name="harga_satuan" value="<?php echo $row['harga_satuan'] ?>">
                                                    <label for="floatingInput">Harga Satuan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Satuan produk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        name="jumlah_per_dus" value="<?php echo $row['jumlah_per_dus'] ?>">
                                                    <label for="floatingInput">Jumlah Per Dus</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jumlah Per Dus Produk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput"
                                                        name="harga_per_dus" value="<?php echo $row['harga_per_dus'] ?>">
                                                    <label for="floatingInput">Harga Per Dus</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Per Dus Produk.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        name="keterangan" value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  Akhir Modal View-->

                    <!-- Modal Edit -->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_produk.php"
                                        method="POST" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control py-3" id="uploadFoto"
                                                        placeholder="Your Name" name="foto" required>
                                                    <label class="input-group-text" for="uploadFoto">Upload Foto Produk</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan File Foto Produk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Nama produk" name="nama_produk" required
                                                        value="<?php echo $row['nama_produk'] ?>">
                                                    <label for="floatingInput">Nama produk</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama produk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="Hargasatuan produk" name="harga_satuan" required
                                                        value="<?php echo $row['harga_satuan'] ?>">
                                                    <label for="floatingInput">Harga Satuan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Satuan produk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Jumlahperdus produk" name="jumlah_per_dus" required
                                                        value="<?php echo $row['jumlah_per_dus'] ?>">
                                                    <label for="floatingInput">Jumlah Per Dus</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jumlah Per Dus Produk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="Hargaperdus produk" name="harga_per_dus" required
                                                        value="<?php echo $row['harga_per_dus'] ?>">
                                                    <label for="floatingInput">Harga Per Dus</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Per Dus Produk.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Keterangan" name="keterangan"
                                                        value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="input_produk_validate"
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
                    <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_produk.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                        <div class="col-lg-12">
                                            Apakah Anda Ingin Menghapus Produk? <b>
                                                <?php echo $row['nama_produk'] ?>
                                            </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="input_produk_validate"
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Produk</th>
                                <th scope="col">Foto Produk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Jumlah Per Dus</th>
                                <th scope="col">Harga Per Dus</th>
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
                                        <?php echo $row['id'] ?>
                                    </td>
                                    <td>
                                        <div style="width: 90px">
                                            <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                    </td>
                    </div>
                    <td>
                        <?php echo $row['nama_produk'] ?>
                    </td>
                    <td>
                        <?php echo number_format((int) $row['harga_satuan'], 0, ',', '.') ?>
                    </td>
                    <td>
                        <?php echo $row['jumlah_per_dus'] ?>
                    </td>
                    <td>
                        <?php echo number_format((int) $row['harga_per_dus'], 0, ',', '.') ?>
                    </td>
                    <td>
                        <div class="d-flex">
                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
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
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>