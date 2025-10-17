<?php
include '../template/header.php';

$query = "SELECT pelanggan.*, users.email AS email_pelanggan, users.foto AS foto_pelanggan FROM pelanggan INNER JOIN users ON pelanggan.user_id = users.id";
$result = mysqli_query($conn, $query);
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pelanggan</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Pelanggan</h4>

              <a href="/pelanggan/tambah.php" class="btn btn-primary ml-auto">Tambah Pelanggan</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Foto</th>
                      <th>Nama Pelanggan</th>
                      <th>Email</th>
                      <th>No. HP</th>
                      <th>Alamat</th>
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
                          <img
                            src="<?= $row['foto_pelanggan'] ? '../uploads/' . $row['foto_pelanggan'] : '../assets/stisla/img/avatar/avatar-1.png' ?>"
                            width="100" class="rounded-circle" alt="">
                        </td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email_pelanggan']; ?></td>
                        <td><?= $row['no_hp']; ?></td>
                        <td><?= $row['alamat']; ?></td>

                        <td>
                          <a href="/pelanggan/edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                          <a href="/pelanggan/hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
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