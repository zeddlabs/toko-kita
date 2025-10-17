<?php
include '../template/header.php';

$id = $_GET['id'];

$query = "SELECT pelanggan.*, users.email AS email_pelanggan, users.foto AS foto_pelanggan FROM pelanggan INNER JOIN users ON pelanggan.user_id = users.id WHERE pelanggan.id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['simpan'])) {
  $nama = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['nama']));
  $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
  $no_hp = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['no_hp']));
  $alamat = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['alamat']));
  $password = $_POST['password'];

  if (empty($password)) {
    $password = $row['password'];
  } else {
    $password = password_hash(password: $password, algo: PASSWORD_DEFAULT);
  }

  $foto = $row['foto_pelanggan'];
  if (!empty($_FILES['foto']['name'])) {
    $foto = $_FILES['foto']['name']; // image.user.png
    $foto_tmp = $_FILES['foto']['tmp_name'];

    $ext_foto = explode('.', $foto);

    $nama_foto = uniqid() . '_' . time() . '.' . end($ext_foto);

    move_uploaded_file($foto_tmp, '../uploads/' . $nama_foto);
  }

  $query_user = "UPDATE users SET
                nama = '$nama',
                email = '$email',
                password = '$password',
                foto = '$nama_foto'
                WHERE id = {$row['user_id']}";

  $result = mysqli_query($conn, $query_user);

  $query = "UPDATE pelanggan SET
            nama = '$nama',
            alamat = '$alamat',
            no_hp = '$no_hp'
            WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "<script>alert('Data berhasil diubah!'); window.location.href = '/pelanggan/index.php';</script>";
  } else {
    echo "<script>alert('Data gagal diubah!'); window.location.href = '/pelanggan/index.php';</script>";
  }
}
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Pelanggan</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Pelanggan</h4>
            </div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <div class="col-md-3"></div>
                  <div class="col-md-9">
                    <img class="img-thumbnail" src="../uploads/<?= $row['foto_pelanggan']; ?>" width="200" alt="">
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Foto</label>
                  </div>
                  <div class="col-md-9">
                    <input type="file" class="form-control" name="foto" accept="image/jpg, image/jpeg, image/png">
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Nama</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama"
                      value="<?= $row['nama']; ?>" required>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Email</label>
                  </div>
                  <div class="col-md-9">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                      value="<?= $row['email_pelanggan']; ?>" required>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>No. Handphone</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="No. Handphone" name="no_hp"
                      value="<?= $row['no_hp']; ?>" required>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Alamat</label>
                  </div>
                  <div class="col-md-9">
                    <textarea name="alamat" id="alamat" class="form-control" rows="4"
                      required><?= $row['alamat']; ?></textarea>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Password</label>
                  </div>
                  <div class="col-md-9">
                    <small>Biarkan kosong jika tidak ingin mengganti password</small>
                    <input type="password" class="form-control" placeholder="Password" name="password">
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