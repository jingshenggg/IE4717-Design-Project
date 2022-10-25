<?php
include "setup_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Airpod</title>
  <meta charset="uft-8">
  <link href="./CSS/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  </style>

  <body>
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

    <main style="padding-bottom: 100px;">
      <div class="header">
        <h1>AirPod</h1>
        <p>Check out the latest AirPods</p>
      </div>

      <!-- Photo Grid -->
      <div class="row">
        <div class="column">
          <img src="./Image/airpods(2).jpg" style="width:100%">
        </div>

        <div class="column">
          <img src="./Image/airpods(3).jpg" style="width:100%">
        </div>

        <div class="column">
          <img src="./Image/airpodspro.jpg" style="width:100%">
        </div>

        <div class="column">
          <img src="./Image/airpodsmax.jpg" style="width:100%">
        </div>

      </div>

      <!-- buttons and text -->
      <div class="row">
        <div class="column">
          <h3>AirPods (2nd Gen)</h3>
          <h3>$199.00</h3>
          <form method="get" action="add_to_cart.php">
            <label><input type=submit class="btn" value="Add to cart" name="airpod1"></label>
          </form>
        </div>

        <div class="column">
          <h3>AirPods (3rd Gen)</h3>
          <h3>$269.00</h3>
          <form method="get" action="add_to_cart.php">
            <label><input type=submit class="btn" value="Add to cart" name="airpod2"></label>
          </form>
        </div>
        <div class="column">
          <h3>AirPods Pro (2nd Gen)</h3>
          <h3>$359.00</h3>
          <form method="get" action="add_to_cart.php">
            <label><input type=submit class="btn" value="Add to cart" name="airpod3"></label>
          </form>
        </div>
        <div class="column">
          <h3>AirPods Max</h3>
          <h3>$799.00</h3>
          <form method="get" action="add_to_cart.php">
            <label><input type=submit class="btn" value="Add to cart" name="airpod4"></label>
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