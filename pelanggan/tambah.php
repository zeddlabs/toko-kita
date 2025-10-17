<?php
include '../template/header.php';

if (isset($_POST['simpan'])) {
  $nama = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['nama']));
  $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
  $no_hp = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['no_hp']));
  $alamat = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['alamat']));
  $password = $_POST['password'];
  $password = password_hash(password: $password, algo: PASSWORD_DEFAULT);

  $foto = '';
  if (!empty($_FILES['foto']['name'])) {
    $foto = $_FILES['foto']['name']; // image.user.png
    $foto_tmp = $_FILES['foto']['tmp_name'];

    $ext_foto = explode('.', $foto);

    $nama_foto = uniqid() . '_' . time() . '.' . end($ext_foto);

    move_uploaded_file($foto_tmp, '../uploads/' . $nama_foto);
  }

  $query_user = "INSERT INTO users (nama, email, password, role, foto) VALUES ('$nama', '$email', '$password', 'pelanggan', '$nama_foto')";

  $result = mysqli_query($conn, $query_user);

  $user_id = mysqli_insert_id($conn);
  $query_pelanggan = "INSERT INTO pelanggan (nama, alamat, no_hp, user_id) VALUES ('$nama', '$alamat', '$no_hp', '$user_id')";
  $result = mysqli_query($conn, $query_pelanggan);

  if ($result) {
    echo "<script>alert('Data berhasil disimpan!'); window.location.href = '/pelanggan/index.php';</script>";
  } else {
    echo "<script>alert('Data gagal disimpan!'); window.location.href = '/pelanggan/index.php';</script>";
  }
}
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Pelanggan</h1>
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
                    <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama" required>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Email</label>
                  </div>
                  <div class="col-md-9">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>No. Handphone</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="No. Handphone" name="no_hp" required>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Alamat</label>
                  </div>
                  <div class="col-md-9">
                    <textarea name="alamat" id="alamat" class="form-control" rows="4" required></textarea>
                  </div>
                </div>
                <div class="row align-items-center form-group">
                  <div class="col-md-3 d-flex justify-content-end">
                    <label>Password</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
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