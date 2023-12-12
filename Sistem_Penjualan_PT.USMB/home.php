<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_produk");
while ($row = mysqli_fetch_array($query)) {
  $result[] = $row;
}

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="col-lg-9 mt-2">
  <!-- Corousel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?php
      $slide = 0;
      $firstSlideButton = true;
      foreach ($result as $dataTombol) {
        ($firstSlideButton) ? $aktif = "active" : $aktif = "";
        $firstSlideButton = false;
        ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>"
          class="<?php echo $aktif ?>" aria-current="true" aria-label="Slide <?php echo $slide + 1 ?>"></button>
        <?php
        $slide++;
      } ?>
    </div>
    <div class="carousel-inner rounded">
      <?php
      $firstSlide = true;
      foreach ($result as $data) {
        ($firstSlide) ? $aktif = "active" : $aktif = "";
        $firstSlide = false;
        ?>
        <div class="carousel-item <?php echo $aktif ?>">
          <img src="assets/img/<?php echo $data['foto'] ?>" class="img-fluid"
            style="height:250px; width:1000px; object-fit:cover" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>
              <?php echo $data['nama_produk'] ?>
            </h5>
            <p>
              <?php echo $data['keterangan'] ?>
            </p>
          </div>
        </div>
      <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Akhir Courosel -->

  <!-- Judul -->
  <div class="card mt-4 border-0 bg-light">
    <div class="card-body text-center">
      <h5 class="card-title">PT. USAHA SEPAKAT MAJU BERSAMA</h5>
      <p class="card-text"> Aplikasi Manajemen Penjualan Produk Susu Milano.
      </p>
      </div>
  </div>
  <!-- Akhir Judul -->

  </div>