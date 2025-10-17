<?php
include '../template/header.php';

$query_produk = "SELECT * FROM produk";
$result_produk = mysqli_query($conn, $query_produk);
$total_produk = mysqli_num_rows($result_produk);

$query_kategori = "SELECT * FROM kategori";
$result_kategori = mysqli_query($conn, $query_kategori);
$total_kategori = mysqli_num_rows($result_kategori);

$query_pelanggan = "SELECT * FROM pelanggan";
$result_pelanggan = mysqli_query($conn, $query_pelanggan);
$total_pelanggan = mysqli_num_rows($result_pelanggan);
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fa fa-inbox" style="color: white;"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Produk</h4>
              </div>
              <div class="card-body">
                <?= $total_produk ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fa fa-align-left" style="color: white;"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Kategori</h4>
              </div>
              <div class="card-body">
                <?= $total_kategori ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fa fa-users" style="color: white;"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Pelanggan</h4>
              </div>
              <div class="card-body">
                <?= $total_pelanggan ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include '../template/footer.php'; ?>