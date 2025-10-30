<?php
session_start();

require 'config/koneksi.php';

$query = "SELECT produk.*, kategori.nama AS nama_kategori FROM produk INNER JOIN kategori ON produk.kategori_id = kategori.id ORDER BY produk.id DESC";
$result = mysqli_query($conn, $query);

$query_promo = "SELECT produk.*, kategori.nama AS nama_kategori FROM produk INNER JOIN kategori ON produk.kategori_id = kategori.id WHERE produk.harga_diskon > 0 ORDER BY produk.id DESC";
$result_promo = mysqli_query($conn, $query_promo);

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
  <header>
    <a href="" class="logo">Toko Kita</a>

    <nav class="nav-menu">
      <a href="/#home" class="nav-item">Home</a>
      <a href="/#promo" class="nav-item">Promo</a>
      <a href="/#products" class="nav-item">Produk</a>

      <?php

      if (isset($_SESSION['login'])) {
        echo '<a href="/logout.php" class="nav-item">Logout</a>';
      } else {
        echo '<a href="/login.php" class="nav-item">Masuk</a>
              <a href="" class="nav-item signup-btn">Daftar</a>';
      }

      ?>

      <button type="button" class="close-btn">
        <i class="ph ph-x"></i>
      </button>
    </nav>

    <button type="button" class="nav-toggle">
      <i class="ph ph-list"></i>
    </button>
  </header>

  <main>
    <section class="cart" id="cart">
      <h1 class="cart-title">Keranjang</h1>
      <p class="cart-text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi
        distinctio libero corporis fugit molestiae totam unde voluptas
        accusantium nemo tenetur amet, quod deleniti magnam placeat provident
        est ducimus laudantium illo.
      </p>

      <div class="cart-content">
        <table class="cart-table" cellspacing="0">
          <thead>
            <tr>
              <th>Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="cart-item-name">
                  <img src="assets/images/promo_1.png" alt="" />
                  <p>Lorem ipsum dolor sit amet</p>
                </div>
              </td>
              <td>Rp100.000</td>
              <td>1</td>
              <td>Rp100.000</td>
            </tr>
          </tbody>
        </table>

        <div class="cart-checkout">
          <div class=""></div>
          <div class="cart-checkout-content">
            <div class="cart-checkout-total">
              <p>Subtotal</p>
              <p>Rp100.000</p>
            </div>
            <form action="" method="post">
              <input type="hidden" value="id dari keranjang">
              <input type="submit" class="cart-checkout-btn" value="Checkout" name="checkout">
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer-container">
      <div class="footer-first-row">
        <div class="footer-content">
          <h2 class="footer-logo">Toko Kita</h2>
          <div class="footer-address">
            <p>Jl. William Iskandar / Pasar V</p>
            <p>Medan, Kode Pos 20221</p>
          </div>
          <div class="footer-contact">
            <p>
              <b>Email:</b>
              <a href="mailto:tokokita@gmail.com">tokokita@gmail.com</a>
            </p>
          </div>
        </div>
        <div class="footer-menu">
          <p>Menu</p>
          <div class="footer-menu-items">
            <a href="#home" class="footer-menu-item">Home</a>
            <a href="#promo" class="footer-menu-item">Promo</a>
            <a href="#products" class="footer-menu-item">Produk</a>
          </div>
        </div>
        <div class="footer-social">
          <p>Media Sosial</p>
          <div class="footer-social-items">
            <a href="" class="footer-menu-item"><i class="ph ph-facebook-logo"></i> Facebook</a>
            <a href="" class="footer-menu-item"><i class="ph ph-instagram-logo"></i> Instagram</a>
            <a href="" class="footer-menu-item"><i class="ph ph-x-logo"></i> X</a>
          </div>
        </div>
      </div>
      <div class="footer-second-row">
        <p>&copy; Copyright <b>Toko Kita</b>. All Rights Reserved</p>
      </div>
    </div>
  </footer>

  <script>
    const navToggle = document.querySelector(".nav-toggle");
    const navMenu = document.querySelector(".nav-menu");
    const closeBtn = document.querySelector(".close-btn");

    navToggle.addEventListener("click", () => {
      navMenu.classList.toggle("show");
    });

    closeBtn.addEventListener("click", () => {
      navMenu.classList.remove("show");
    });
  </script>
</body>

</html>