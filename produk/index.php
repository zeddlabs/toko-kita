<?php
include '../template/header.php';

$query = "SELECT produk.*, kategori.nama AS nama_kategori FROM produk INNER JOIN kategori ON produk.kategori_id = kategori.id";
$result = mysqli_query($conn, $query);

?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Produk</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Produk</h4>

              <a href="/produk/tambah.php" class="btn btn-primary ml-auto">Tambah Produk</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Merk</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Rating</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)):
                      ?>

                      <tr>
                        <td>
                          <?= $no++; ?>
                        </td>
                        <td>
                          <img src="../uploads/<?= $row['gambar']; ?>" width="150" alt="">
                        </td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['merk']; ?></td>
                        <td><?= $row['nama_kategori']; ?></td>
                        <td>
                          Harga Normal : <?= 'Rp' . number_format($row['harga_normal'], 0, ',', '.') ?>
                          <br>
                          <?= (!empty($row['harga_diskon'])) ? 'Harga Diskon : ' . 'Rp' . number_format($row['harga_diskon'], 0, ',', '.') : '' ?>
                        </td>
                        <td><?= $row['rating']; ?></td>

                        <td>
                          <a href="/produk/edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                          <a href="/produk/hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                      </tr>

                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include '../template/footer.php'; ?>