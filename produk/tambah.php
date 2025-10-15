<?php
include '../template/header.php';

$query = "SELECT * FROM kategori";
$result_kategori = mysqli_query($conn, $query);

if (isset($_POST['simpan'])) {
  $nama = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['nama']));
  $merk = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['merk']));
  $harga_normal = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['harga_normal']));

  $harga_diskon = 0;
  if (!empty($_POST['harga_diskon'])) {
    $harga_diskon = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['harga_diskon']));
  }

  $kategori_id = $_POST['kategori_id'];

  $gambar = $_FILES['gambar']['name']; // image.user.png
  $gambar_tmp = $_FILES['gambar']['tmp_name'];

  $ext_gambar = explode('.', $gambar);

  $nama_gambar = uniqid() . '_' . time() . '.' . end($ext_gambar);

  move_uploaded_file($gambar_tmp, '../uploads/' . $nama_gambar);

  $query = "INSERT INTO produk (nama, merk, harga_normal, harga_diskon, gambar, kategori_id) VALUES ('$nama', '$merk', $harga_normal, $harga_diskon, '$nama_gambar', $kategori_id)";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "<script>alert('Data berhasil disimpan!'); window.location.href = '/produk/index.php';</script>";
  } else {
    echo "<script>alert('Data gagal disimpan!'); window.location.href = '/produk/index.php';</script>";
  }
}
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Produk</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Produk</h4>
            </div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Nama</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Nama Produk" name="nama" required>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Merk</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Merk" name="merk" required>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Kategori</label>
                  </div>
                  <div class="col-md-9">
                    <select name="kategori_id" id="kategori_id" class="form-control" required>
                      <?php while ($row = mysqli_fetch_assoc($result_kategori)): ?>
                        <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Harga</label>
                  </div>
                  <div class="col-md-9">
                    <input type="number" class="form-control" placeholder="Harga" name="harga_normal" required>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Harga Diskon</label>
                  </div>
                  <div class="col-md-9">
                    <input type="number" class="form-control" placeholder="Harga Diskon" name="harga_diskon">
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Gambar</label>
                  </div>
                  <div class="col-md-9">
                    <input type="file" class="form-control" name="gambar" required>
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