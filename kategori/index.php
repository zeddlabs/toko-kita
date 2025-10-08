<?php
include '../template/header.php';

$query = "SELECT * FROM kategori";
$result = mysqli_query($conn, $query);

?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Kategori</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Kategori</h4>

              <a href="/kategori/tambah.php" class="btn btn-primary ml-auto">Tambah Kategori</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Nama Kategori</th>
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
                        <td><?= $row['nama']; ?></td>

                        <td>
                          <a href="/kategori/edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                          <a href="/kategori/hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
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