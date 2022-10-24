<?php
include "setup_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Phones</title>
  <meta charset="uft-8">
  <link href="./CSS/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  <main style="padding-bottom: 100px;">
    <header>
      <h2><a href="index.php" style="text-decoration:none" class="title">Phones & Accessories Hub</a></h2>
    </header>
    <nav>
      <div class="navbar">
        <ul>
          <li><a href="phone.php">Phone</a></li>
          <li><a href="airpod.php">Airpod</a></li>
          <li><a href="smartwatch.php">Smartwatch</a></li>
          <li><a href="case.php">Case</a></li>
        </ul>
        <div class="icon" style="padding-right: 100px">
          <input type="search" class="search-form" id="search-box" placeholder="search here...">
          <label for="search-box" class="fas fa-search"></label>
          <a href="cart.php">
            <div class="fas fa-shopping-cart" id="cart-btn">
              <?php
              $total = 0;
              for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i] > 0) {
                  $total += $_SESSION['cart'][$i];
                }
              }
              echo $total;
              ?>
            </div>
          </a>
        </div>
      </div>
    </nav>
    <div class="header">
      <h1>Case</h1>
      <p>Check out the latest cases</p>
    </div>

    <!-- Photo Grid -->
    <div class="row">
      <div class="column">
        <img src="./Image/case1.jfif" style="width:100%">
      </div>

      <div class="column">
        <img src="./Image/case2.jfif" style="width:100%">
      </div>

      <div class="column">
        <img src="./Image/case3.jfif" style="width:100%">
      </div>

      <div class="column">
        <img src="./Image/case4.jfif" style="width:100%">
      </div>

    </div>

    <!-- buttons and text -->
    <div class="row">
      <div class="column">
        <h3>iPhone 14 Pro Leather Case with MagSafe</h3>
        <form method="get" action="add_to_cart.php">
          <label><input type=submit class="btn" value="Add to cart" name="case1"></label>
        </form>
      </div>

      <div class="column">
        <h3>iPhone 14 Clear Case with MagSafe</h3>
        <form method="get" action="add_to_cart.php">
          <label><input type=submit class="btn" value="Add to cart" name="case2"></label>
        </form>
      </div>
      <div class="column">
        <h3>iPhone 14 Plus Silicone Case with MagSafe</h3>
        <form method="get" action="add_to_cart.php">
          <label><input type=submit class="btn" value="Add to cart" name="case3"></label>
        </form>
      </div>
      <div class="column">
        <h3>iPhone 14 Pro Max Leather Case with MagSafe</h3>
        <form method="get" action="add_to_cart.php">
          <label><input type=submit class="btn" value="Add to cart" name="case4"></label>
        </form>
      </div>
    </div>
  </main>
  <footer>
    <small><i>Copyright &copy; Phones & Accessories Hub</i></small>
    <br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
  </footer>
</body>

</html>