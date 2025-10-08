<?php
include '../template/header.php';

$id = $_GET['id'];

$query = "SELECT * FROM kategori WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['simpan'])) {
  $nama = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['nama']));

  $query = "UPDATE kategori SET nama = '$nama' WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "<script>alert('Data berhasil diubah!'); window.location.href = '/kategori/index.php';</script>";
  } else {
    echo "<script>alert('Data gagal diubah!'); window.location.href = '/kategori/index.php';</script>";
  }
}
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Kategori</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Kategori</h4>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Nama</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Nama Kategori" name="nama"
                      value="<?= $row['nama']; ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-9">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include '../template/footer.php'; ?>