<?php
include "setup_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Phone</title>
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
        <h1>Phone</h1>
        <p>Check out the latest appple phones</p>
      </div>

      <!-- Photo Grid -->
      <div class="row">
        <div class="column">
          <img src="./Image/iphone14pro.jpg" style="width:100%">
        </div>

        <div class="column">
          <img src="./Image/iphone14promax.jpg" style="width:100%">
        </div>

        <div class="column">
          <img src="./Image/iphone14.jpg" style="width:100%">
        </div>

        <div class="column">
          <img src="./Image/iphone14plus.jpg" style="width:100%">
        </div>
      </div>

      <!-- buttons and text -->
      <div class="row">
        <div class="column">
          <h3>iPhone 14 Pro</h3>
          <form method="get" action="add_to_cart.php">
            <input type="text" name="phone_model" value="iphone14pro" hidden>
            <label for="phone_mem">Choose memory:</label>
            <select name="phone_mem" id="phone_mem">
              <option value="Add to cart" name="128GB">128 GB</option>
              <option value="256GB">256 GB</option>
              <option value="512GB">512 GB</option>
              <option value="1TB">1 TB</option>
            </select>
            <br>
            <label for="phone_color">Choose color:</label>
            <select name="phone_color" id="phone_color">
              <option value="deep_purple">Deep Purple</option>
              <option value="gold">Gold</option>
              <option value="silver">Silver</option>
              <option value="space_black">Space Black</option>
            </select>
            <br>
            <label><input type=submit class="btn" value="Add to cart" name="iphone14pro"></label>
          </form>
        </div>

        <div class="column">
          <h3>iPhone 14 Pro Max</h3>
          <label for="phone_mem">Choose memory:</label>
          <select name="phone_mem" id="phone_mem">
            <option value="128GB">128 GB</option>
            <option value="256GB">256 GB</option>
            <option value="512GB">512 GB</option>
            <option value="1TB">1 TB</option>
          </select>
          <br>
          <label for="phone_color">Choose color:</label>
          <select name="phone_color" id="phone_color">
            <option value="deep_purple">Deep Purple</option>
            <option value="gold">Gold</option>
            <option value="silver">Silver</option>
            <option value="space_black">Space Black</option>
          </select>
          <br>
          <label><input type=submit class="btn" value="Add to cart" name=""></label>
        </div>
        <div class="column">
          <h3>iPhone 14</h3>
          <label for="phone_mem">Choose memory:</label>
          <select name="phone_mem" id="phone_mem">
            <option value="128GB">128 GB</option>
            <option value="256GB">256 GB</option>
            <option value="512GB">512 GB</option>
          </select>
          <br>
          <label for="phone_color">Choose color:</label>
          <select name="phone_color" id="phone_color">
            <option value="blue">Blue</option>
            <option value="purple">Purple</option>
            <option value="midnight">Midnight</option>
            <option value="starlight">Starlight</option>
            <option value="red">Red</option>
          </select>
          <br>
          <label><input type=submit class="btn" value="Add to cart" name=""></label>
        </div>
        <div class="column">
          <h3>iPhone 14 Plus</h3>
          <label for="phone_mem">Choose memory:</label>
          <select name="phone_mem" id="phone_mem">
            <option value="128GB">128 GB</option>
            <option value="256GB">256 GB</option>
            <option value="512GB">512 GB</option>
          </select>
          <br>
          <label for="phone_color">Choose color:</label>
          <select name="phone_color" id="phone_color">
            <option value="blue">Blue</option>
            <option value="purple">Purple</option>
            <option value="midnight">Midnight</option>
            <option value="starlight">Starlight</option>
            <option value="red">Red</option>
          </select>
          <br>
          <label><input type=submit class="btn" value="Add to cart" name=""></label>
        </div>
      </div>
    </main>

    <footer>
      <small><i>Copyright &copy; Phones & Accessories Hub</i></small>
      <br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
    </footer>
  </body>

</html>