<?php
session_start();

if (isset($_SESSION['login'])) {
  header('Location: index.php');
  exit;
}

require 'config/koneksi.php';

if (isset($_POST['masuk'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
      $_SESSION['login'] = true;
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['foto'] = $row['foto'];

      if ($row['role'] == 'admin') {
        header('Location: admin/index.php');
      } else {
        header('Location: index.php');
      }

      exit;
    }
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
        <h1 class="login-logo">Toko Kita</h1>

        <form action="" method="post">
          <div class="form-input">
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <div class="form-input">
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <input type="submit" class="submit-btn" value="Masuk" name="masuk">
          <a href="/register.php" class="outline-btn">Daftar</a>
        </form>
      </div>
    </section>
  </main>
</body>

</html>