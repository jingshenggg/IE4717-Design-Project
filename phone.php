<?php
//include "setup_session.php";
include "db_connect.php";
session_start();
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
    <main style="padding-bottom: 100px;">
      <div class="header">
        <h1>Phone</h1>
        <p>Check out the latest iPhone</p>
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

          <?php

                $product_query="SELECT * FROM product WHERE product_type='phone'";
                $result_products=$conn->query($product_query);
                $num_result_products=$result_products->num_rows;
                for($i=0;$i<$num_result_products;$i++)
                {
                  $row= $result_products->fetch_assoc();
                  echo    "<div class='column'>";
                  echo    "<h3>".$row['product_name']."</h3>";
                  
                  echo    "<h3 class='price'id='price-".$row['id']."'></h3>";

                  echo    "<form method='POST' action='add_to_cart.php?id=".$row['id']."'>";
                  echo    "<input type='text' name='product_type' value='phone' hidden>";
                  echo    "<input type='text' name='phone_model' value='".$row['product_name']."' hidden>";
                  echo    "<label for='phone_mem'>Choose memory:</label>";
                  echo    "<select name='phone_mem' id='phone_mem' onchange='priceupdate(".$row['id'].",this)'>";
                  echo      "<option value='128GB'>128 GB</option>";
                  echo      "<option value='256GB'>256 GB</option>";
                  echo      "<option value='512GB'>512 GB</option>";
                  echo      "<option value='1TB'>1 TB</option>";
                  echo    "</select>";
                  echo    "<br>";
                  // echo    "<label for='phone_color'>Choose color:</label>";
                  // echo    "<select name='phone_color' id='phone_color'>";
                  // echo      "<option value='deep_purple'>Deep Purple</option>";
                  // echo      "<option value='gold'>Gold</option>";
                  // echo      "<option value='silver'>Silver</option>";
                  // echo      "<option value='space_black'>Space Black</option>";
                  // echo    "</select>";
                  $prices_query="SELECT * FROM product_detail WHERE product_id=".$row['id'];
                  $result_prices=$conn->query($prices_query);
                  $num_result_prices=$result_prices->num_rows;
                  for($j=0;$j<$num_result_prices;$j++)
                  {
                    $product_detail= $result_prices->fetch_assoc();
                    if($product_detail['product_capacity']=='128GB')
                    {
                      echo  "<h3 id='price-".$row['id']."-".$product_detail['product_capacity']."'>$".$product_detail['product_price']."</h3>";
                    }
                    echo  "<h3 id='price-".$row['id']."-".$product_detail['product_capacity']."'style='display:none;'>$".$product_detail['product_price']."</h3>";
                    
                  }
                  
                  echo    "<br>";
                  echo    "<label><input type=submit class='btn' value='Add to cart' ></label>";
                  echo  "</form>";
                  echo  "</div>";

                }

          
          ?>

      </div>
    </main>

    <footer>
      <small><i>Copyright &copy; Phones & Accessories Hub</i></small>
      <br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
    </footer>
    <script>
     
        function priceupdate(id,select)
        {   
          var pricetag128 = document.getElementById(`price-${id}-128GB`);
          var pricetag256 = document.getElementById(`price-${id}-256GB`);
          var pricetag512 = document.getElementById(`price-${id}-512GB`);
          var pricetag1tb = document.getElementById(`price-${id}-1TB`);
          pricetag128.style="display:none";
          pricetag256.style="display:none";
          pricetag512.style="display:none";
          pricetag1tb.style="display:none";
          
          var pricetag = document.getElementById(`price-${id}-${select.value}`);
          pricetag.style="display:block";

        }
    </script>
  </body>


</html>