<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_produk");
while ($row = mysqli_fetch_array($query)) {
  $result[] = $row;
}

$query_chart = mysqli_query($conn, "SELECT nama_produk, tb_produk.id, SUM(tb_list_penjualan.qty) AS total_qty FROM tb_produk
LEFT JOIN tb_list_penjualan ON tb_produk.id = tb_list_penjualan.produk 
GROUP BY tb_produk.id
ORDER BY tb_produk.id ASC");

// $result_chart = array();
while($record_chart = mysqli_fetch_array($query_chart)){
  $result_chart[] = $record_chart;
}

$array_produk = array_column($result_chart, 'nama_produk');
$array_produk_quote = array_map(function($produk){
  return "'".$produk."'";
}, $array_produk);
$string_produk = implode(',', $array_produk_quote);
// echo $string_produk."<br>";

$array_jumlah_penjualan = array_column($result_chart, 'total_qty');
$string_jumlah_penjualan = implode (',', $array_jumlah_penjualan);
// echo $string_jumlah_penjualan;
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
      <h5 class="card-title">PT. USAHA SEPAKAT MAJU BERSAMA LHOKSEUMAWE</h5>
      <p class="card-text"> Aplikasi Manajemen Penjualan Produk Susu Milano.
      </p>
    </div>
  </div>
  <!-- Akhir Judul -->

  <!-- Chard -->
  <div class="card mt-4 border-0 bg-light">
    <div class="card-body text-center">
      <div>
        <canvas id="myChart"></canvas>
      </div>
      <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: [<?php echo $string_produk ?>],
            datasets: [{
              label: 'Produk Terjual',
              data: [<?php echo $string_jumlah_penjualan ?>],
              borderWidth: 1,
               backgroundColor:[
                'rgba(202, 44, 44, 0.93)', 
                'rgba(76, 170, 203, 0.93)', 
                'rgba(231, 208, 41, 0.93)', 
                'rgba(131, 244, 145, 0.93)', 
                'rgba(202, 131, 175, 0.93)',
                'rgba(237, 150, 26, 0.93)'
               ]
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    </div>
  </div>
  <!-- Akhir Chard -->
</div>