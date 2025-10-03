<?php
session_start();

require 'config/koneksi.php';

if (isset($_SESSION['login'])) {
  header('Location: index.php');
  exit;
}

if (isset($_POST['daftar'])) {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
  $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
  $password = password_hash(password: $_POST['password'], algo: PASSWORD_DEFAULT);

  $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

  $result = mysqli_query($conn, $query);

  if ($result) {
    $id_user = mysqli_insert_id($conn);

    $query = "INSERT INTO pelanggan (nama, alamat, no_hp, user_id) VALUES ('$nama', '$alamat', '$no_hp', '$id_user')";
  }

  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "<script>
      alert('Pendaftaran berhasil!');
      window.location.href = 'login.php';
    </script>";
  } else {
    echo "<script>
      alert('Pendaftaran gagal!');
      window.location.href = 'register.php';
    </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Toko Kita</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />

  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <main>
    <section class="login">
      <div class="login-img">
        <img src="assets/images/login_img.png" alt="" />
      </div>
      <div class="login-content">
        <h1 class="login-logo">Daftar Toko Kita</h1>

        <form action="" method="post">
          <div class="form-input">
            <input type="text" name="nama" placeholder="Nama" required />
          </div>
          <div class="form-input">
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <div class="form-input">
            <input type="text" name="alamat" placeholder="Alamat" required />
          </div>
          <div class="form-input">
            <input type="text" name="no_hp" placeholder="No. Handphone" required />
          </div>
          <div class="form-input">
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <input type="submit" class="submit-btn" value="Daftar" name="daftar">
          <a href="/login.php" class="outline-btn">Masuk</a>
        </form>
      </div>
    </section>
  </main>
</body>

</html>