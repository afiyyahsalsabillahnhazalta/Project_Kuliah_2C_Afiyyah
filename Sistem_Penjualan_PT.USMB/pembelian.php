<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_pembelian");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Halaman Data Pembelian
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
                      <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang"
                        name="nama_barang" required>
                      <label for="nama_barang">Nama Barang</label>
                      <div class="invalid-feedback">
                        Masukkan Nama Barang.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="date" class="form-control" id="tgl_pembelian" placeholder="Tanggal Pembelian"
                        name="tgl_pembelian" required>
                      <label for="tgl_pembelian">Tanggal Pembelian</label>
                      <div class="invalid-feedback">
                        Masukkan Tanggal Pembelian.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="qty" placeholder="Qty" name="qty" required>
                      <label for="qty">Qty</label>
                      <div class="invalid-feedback">
                        Masukkan Qty Pembelian.
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="harga_satuan" placeholder="Harga Satuan"
                        name="harga_satuan" required>
                      <label for="harga_satuan">Harga Satuan/Dus</label>
                      <div class="invalid-feedback">
                        Masukkan Harga Satuan/Dus.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="jumlah_rp" placeholder="Jumlah_Rp" name="jumlah_rp"
                        required>
                      <label for="jumlah_rp">Jumlah(Rp)</label>
                      <div class="invalid-feedback">
                        Masukkan Jumlah(Rp).
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_pembelian_validate" value="12345">Buat
                    Order</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--  Akhir Modal tambah order baru-->
      <?php
      if (empty($result)) {
        echo "Data Pembelian Tidak Ada";
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
                <th scope="col">No</th>
                <th scope="col">Kode Pembelian</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Tanggal Pembelian</th>
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
                    <?php echo $row['id_pembelian'] ?>
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
                    <?php echo number_format((int) $row['jumlah_rp'], 0, ',', '.') ?>
                  </td>

                  <td>
                    <div class="d-flex">
                      <!-- <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalView<?php echo $row['id_pembelian'] ?>"><i class="bi bi-eye"></i></button> -->
                      <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalEdit<?php echo $row['id_pembelian'] ?>"><i class="bi bi-pencil-square"></i></button>
                      <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalDelete<?php echo $row['id_pembelian'] ?>"><i class="bi bi-trash"></i></button>
                        <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalMasukGudang<?php echo $row['id_pembelian'] ?>">Masuk Gudang</button>
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