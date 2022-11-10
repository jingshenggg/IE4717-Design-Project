<?php
include "setup_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Case</title>
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
          <li><a href="case.php" style="color: #bc96c6;">Case</a></li>
        </ul>
        <div class="icon" style="padding-right: 100px">
          <a href="cart.php">
            <div class="fas fa-shopping-cart" id="cart-btn">
						<?php
						$total = 0;
						if(isset($_SESSION['cart']))
						{
							for ($i = 0; $i < count($_SESSION['cart']); $i++) {
								if ($_SESSION['cart'][$i] > 0) {
									$total += $_SESSION['cart'][$i];
								}
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
      <?php
        $product_query="SELECT * FROM product WHERE product_type='case'";
        $result_products=$conn->query($product_query);
        $num_result_products=$result_products->num_rows;
        
        for($i=0;$i<$num_result_products;$i++) {
          $product= $result_products->fetch_assoc();
          $productdetail_query="SELECT * FROM product_detail WHERE product_id=".$product['id'];
          $result_productdetail=$conn->query($productdetail_query);
          if($result_productdetail->num_rows)
          {
            $productdetail= $result_productdetail->fetch_assoc();
          }      
          echo "<div class='column'>";
          echo "<h3>".$product['product_name']."</h3>";
          echo "<h3>$".$productdetail['product_price']."</h3>";
          echo "<form method='POST' action='add_to_cart.php?id=".$product['id']."'>";
          echo    "<input type='text' name='product_type' value='case' hidden>";
          echo "<label><input type=submit class='btn' value='Add to cart' ></label>";
          echo "</form>";
          echo "</div>";
        }
      ?>
    </div>
  </main>
  <footer>
    <small><i>Copyright &copy; Phones & Accessories Hub</i></small>
    <br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
  </footer>
</body>

</html>