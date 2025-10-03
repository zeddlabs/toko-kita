<?php
session_start();

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
      <a href="#home" class="nav-item">Home</a>
      <a href="#promo" class="nav-item">Promo</a>
      <a href="#products" class="nav-item">Produk</a>

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
    <section class="hero" id="home">
      <div class="img-left">
        <img src="assets/images/banner_1.png" alt="" />
      </div>

      <div class="img-top">
        <img src="assets/images/banner_2.png" alt="" />
      </div>

      <div class="hero-content">
        <div class="hero-title">
          <h1>Ultimate</h1>
          <h1>Sale</h1>
        </div>
        <p class="hero-text">New Collection</p>
        <a href="" class="hero-btn">Shop Now</a>
      </div>

      <div class="img-bottom">
        <img src="assets/images/banner_4.png" alt="" />
      </div>

      <div class="img-right">
        <img src="assets/images/banner_3.png" alt="" />
      </div>
    </section>

    <section class="promo" id="promo">
      <h1 class="promo-title">Promo</h1>
      <p class="promo-text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi
        distinctio libero corporis fugit molestiae totam unde voluptas
        accusantium nemo tenetur amet, quod deleniti magnam placeat provident
        est ducimus laudantium illo.
      </p>

      <div class="promo-content">
        <div class="product-card">
          <img src="assets/images/promo_1.png" alt="" class="product-image" />
          <div class="product-title">
            <div class="product-name">
              <p>Shiny Dress</p>
              <p>Al Karam</p>
            </div>
            <div class="product-rating">
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
          <p class="product-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequuntur commodi architecto a neque saepe dolor accusamus
            suscipit reprehenderit culpa dolorum odit eaque, animi repudiandae
            laboriosam atque asperiores? Unde, omnis debitis!
          </p>
          <div class="product-price">
            <p class="product-discount-price">Rp200.000</p>
            <p class="product-normal-price">Rp400.000</p>
          </div>
          <a href="#" class="product-add-to-cart">
            <i class="ph ph-shopping-cart"></i> Tambah Keranjang
          </a>
        </div>
        <div class="product-card">
          <img src="assets/images/promo_2.png" alt="" class="product-image" />
          <div class="product-title">
            <div class="product-name">
              <p>Long Dress</p>
              <p>Al Karam</p>
            </div>
            <div class="product-rating">
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
          <p class="product-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequuntur commodi architecto a neque saepe dolor accusamus
            suscipit reprehenderit culpa dolorum odit eaque, animi repudiandae
            laboriosam atque asperiores? Unde, omnis debitis!
          </p>
          <div class="product-price">
            <p class="product-discount-price">Rp200.000</p>
            <p class="product-normal-price">Rp400.000</p>
          </div>
          <a href="#" class="product-add-to-cart">
            <i class="ph ph-shopping-cart"></i> Tambah Keranjang
          </a>
        </div>
        <div class="product-card">
          <img src="assets/images/promo_3.png" alt="" class="product-image" />
          <div class="product-title">
            <div class="product-name">
              <p>Full Sweater</p>
              <p>Al Karam</p>
            </div>
            <div class="product-rating">
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
          <p class="product-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequuntur commodi architecto a neque saepe dolor accusamus
            suscipit reprehenderit culpa dolorum odit eaque, animi repudiandae
            laboriosam atque asperiores? Unde, omnis debitis!
          </p>
          <div class="product-price">
            <p class="product-discount-price">Rp200.000</p>
            <p class="product-normal-price">Rp400.000</p>
          </div>
          <a href="#" class="product-add-to-cart">
            <i class="ph ph-shopping-cart"></i> Tambah Keranjang
          </a>
        </div>
      </div>
    </section>

    <section class="products" id="products">
      <h1 class="products-title">Produk</h1>
      <p class="products-text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi
        distinctio libero corporis fugit molestiae totam unde voluptas
        accusantium nemo tenetur amet, quod deleniti magnam placeat provident
        est ducimus laudantium illo.
      </p>

      <div class="products-content">
        <div class="product-card">
          <img src="assets/images/promo_1.png" alt="" class="product-image" />
          <div class="product-title">
            <div class="product-name">
              <p>Shiny Dress</p>
              <p>Al Karam</p>
            </div>
            <div class="product-rating">
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
          <p class="product-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequuntur commodi architecto a neque saepe dolor accusamus
            suscipit reprehenderit culpa dolorum odit eaque, animi repudiandae
            laboriosam atque asperiores? Unde, omnis debitis!
          </p>
          <div class="product-price">
            <p class="product-discount-price">Rp200.000</p>
            <p class="product-normal-price">Rp400.000</p>
          </div>
          <a href="#" class="product-add-to-cart">
            <i class="ph ph-shopping-cart"></i> Tambah Keranjang
          </a>
        </div>
        <div class="product-card">
          <img src="assets/images/promo_2.png" alt="" class="product-image" />
          <div class="product-title">
            <div class="product-name">
              <p>Long Dress</p>
              <p>Al Karam</p>
            </div>
            <div class="product-rating">
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
          <p class="product-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequuntur commodi architecto a neque saepe dolor accusamus
            suscipit reprehenderit culpa dolorum odit eaque, animi repudiandae
            laboriosam atque asperiores? Unde, omnis debitis!
          </p>
          <div class="product-price">
            <p class="product-discount-price">Rp200.000</p>
            <p class="product-normal-price">Rp400.000</p>
          </div>
          <a href="#" class="product-add-to-cart">
            <i class="ph ph-shopping-cart"></i> Tambah Keranjang
          </a>
        </div>
        <div class="product-card">
          <img src="assets/images/promo_3.png" alt="" class="product-image" />
          <div class="product-title">
            <div class="product-name">
              <p>Full Sweater</p>
              <p>Al Karam</p>
            </div>
            <div class="product-rating">
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
          <p class="product-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequuntur commodi architecto a neque saepe dolor accusamus
            suscipit reprehenderit culpa dolorum odit eaque, animi repudiandae
            laboriosam atque asperiores? Unde, omnis debitis!
          </p>
          <div class="product-price">
            <p class="product-discount-price">Rp200.000</p>
            <p class="product-normal-price">Rp400.000</p>
          </div>
          <a href="#" class="product-add-to-cart">
            <i class="ph ph-shopping-cart"></i> Tambah Keranjang
          </a>
        </div>
        <div class="product-card">
          <img src="assets/images/promo_1.png" alt="" class="product-image" />
          <div class="product-title">
            <div class="product-name">
              <p>Shiny Dress</p>
              <p>Al Karam</p>
            </div>
            <div class="product-rating">
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
          <p class="product-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequuntur commodi architecto a neque saepe dolor accusamus
            suscipit reprehenderit culpa dolorum odit eaque, animi repudiandae
            laboriosam atque asperiores? Unde, omnis debitis!
          </p>
          <div class="product-price">
            <p class="product-discount-price">Rp200.000</p>
            <p class="product-normal-price">Rp400.000</p>
          </div>
          <a href="#" class="product-add-to-cart">
            <i class="ph ph-shopping-cart"></i> Tambah Keranjang
          </a>
        </div>
        <div class="product-card">
          <img src="assets/images/promo_2.png" alt="" class="product-image" />
          <div class="product-title">
            <div class="product-name">
              <p>Long Dress</p>
              <p>Al Karam</p>
            </div>
            <div class="product-rating">
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
          <p class="product-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequuntur commodi architecto a neque saepe dolor accusamus
            suscipit reprehenderit culpa dolorum odit eaque, animi repudiandae
            laboriosam atque asperiores? Unde, omnis debitis!
          </p>
          <div class="product-price">
            <p class="product-discount-price">Rp200.000</p>
            <p class="product-normal-price">Rp400.000</p>
          </div>
          <a href="#" class="product-add-to-cart">
            <i class="ph ph-shopping-cart"></i> Tambah Keranjang
          </a>
        </div>
        <div class="product-card">
          <img src="assets/images/promo_3.png" alt="" class="product-image" />
          <div class="product-title">
            <div class="product-name">
              <p>Full Sweater</p>
              <p>Al Karam</p>
            </div>
            <div class="product-rating">
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
          <p class="product-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequuntur commodi architecto a neque saepe dolor accusamus
            suscipit reprehenderit culpa dolorum odit eaque, animi repudiandae
            laboriosam atque asperiores? Unde, omnis debitis!
          </p>
          <div class="product-price">
            <p class="product-discount-price">Rp200.000</p>
            <p class="product-normal-price">Rp400.000</p>
          </div>
          <a href="#" class="product-add-to-cart">
            <i class="ph ph-shopping-cart"></i> Tambah Keranjang
          </a>
        </div>
      </div>

      <a href="" class="view-more-btn">Lihat Selengkapnya</a>
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