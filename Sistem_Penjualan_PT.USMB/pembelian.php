<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT *, SUM(harga_satuan*qty) AS jumlahnya FROM tb_pembelian
GROUP BY id");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Halaman Pembelian
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah Data</button>
        </div>
      </div>
      <!-- Modal tambah data Pembelian-->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pembelian</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_pembelian.php" method="POST">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="uploadFoto" name="kode_pembelian"
                        value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                      <label for="uploadFoto">Kode Pembelian</label>
                      <div class="invalid-feedback">
                        Masukkan Kode Pembelian.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" name="nama_barang" required>
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
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="date" class="form-control" id="tgl_pembelian" placeholder="Tanggal Pembelian"
                        name="tgl_pembelian" required>
                      <label for="tgl_pembelian">Tanggal Pembelian</label>
                      <div class="invalid-feedback">
                        Masukkan Tanggal Pembelian.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="qty" placeholder="Qty" name="qty" required>
                      <label for="qty">Qty</label>
                      <div class="invalid-feedback">
                        Masukkan Qty Pembelian.
                      </div>
                    </div>
                  </div>
                <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="harga_satuan" placeholder="Harga Satuan"
                        name="harga_satuan" required>
                      <label for="harga_satuan">Harga Satuan/Dus</label>
                      <div class="invalid-feedback">
                        Masukkan Harga Satuan/Dus.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_pembelian_validate" value="12345">Tambah Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--  Akhir Modal tambah data pembelian-->
      <?php
      if (empty($result)) {
        echo "Data produk tidak ada";
      } else {
        foreach ($result as $row) {
          ?>

          <!-- Modal Edit -->
          <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pembelian</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_edit_pembelian.php" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="uploadFoto" name="kode_pembelian"
                            value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                          <label for="uploadFoto">Kode Pembelian</label>
                          <div class="invalid-feedback">
                            Masukkan Kode Pembelian.
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingInput" placeholder="Nama barang"
                            name="nama_barang" required value="<?php echo $row['nama_barang'] ?>" readonly>
                          <label for="floatingInput">Nama barang</label>
                          <div class="invalid-feedback">
                            Masukkan Nama produk.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="date" class="form-control" id="tgl_pembelian" placeholder="Tanggal Pembelian"
                            name="tgl_pembelian" required value="<?php echo $row['tgl_pembelian'] ?>">
                          <label for="tgl_pembelian">Tanggal Pembelian</label>
                          <div class="invalid-feedback">
                            Masukkan Tanggal Pembelian.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="qty" placeholder="Qty" name="qty" readonly
                            value="<?php echo $row['qty'] ?>">
                          <label for="qty">Qty</label>
                          <div class="invalid-feedback">
                            Masukkan Qty Pembelian.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="harga_satuan" placeholder="Harga Satuan"
                            name="harga_satuan" required value="<?php echo $row['harga_satuan'] ?>">
                          <label for="harga_satuan">Harga Satuan/Dus</label>
                          <div class="invalid-feedback">
                            Masukkan Harga Satuan/Dus.
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="edit_pembelian_validate" value="12345">Save
                        changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Akhir Modal Edit-->

          <!-- Modal Delete -->
          <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Pembelian</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_delete_pembelian.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="col-lg-12">
                      Apakah Anda Ingin Menghapus Data
                      Dengan Kode Pembelian<b>
                        <?php echo $row['id'] ?>
                      </b> </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger" name="delete_pembelian_validate"
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
              <tr class="text-nowrap">
                <th scope="col">No</th>
                <th scope="col">Kode Pembelian</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Tanggal Pembelian</th>
                <th scope="col">Qty</th>
                <th scope="col">Harga Satuan/Dus</th>
                <th scope="col">Jumlah(Rp)</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $jumlah_rp = 0;
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
                    <?php echo $row['nama_barang'] ?>
                  </td>
                  <td>
                    <?php echo $row['tgl_pembelian'] ?>
                  </td>
                  <td>
                    <?php echo $row['qty'] ?>
                  </td>
                  <td>
                    <?php echo number_format((int) $row['harga_satuan'], 0, ',', '.') ?>
                  </td>
                  <td>
                  <?php echo number_format($row['jumlahnya'], 0, ',', '.') ?>
                  </td>
                  <td>
                    <div class="d-flex">

                      <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                      <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
                      
                    </div>

                  </td>
                </tr>
                <?php
                $jumlah_rp += $row['jumlahnya'];
              }
              ?>
            </tbody>
          </table>
        </div>
      <?php } ?>
    </div>
  </div>
</div>