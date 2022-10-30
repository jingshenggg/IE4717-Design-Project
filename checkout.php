<?php
    include "db_connect.php";
    session_start();
    //include "setup_session.php";
    if (isset($_GET['empty'])) {
        unset($_SESSION['cart']);
        header('location: ' . $_SERVER['PHP_SELF']);
        exit();
}

function displayEmpty()
{
	echo "<p class='centeredparagraph'><button class='btn'><a href='index.php' class='cc_empty_links'>Continue shopping</a></button>";
	echo '<footer>
		<small><i>Copyright &copy; Phones & Accessories Hub</i></small>
		<br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
	 	 </footer>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
	<meta charset=“utf-8”>
	<link href="./CSS/cart.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

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
					<div class="fas fa-shopping-cart" id="cart-btn" style="color: #bc96c6;">
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
	<main>
		<p class="centeredparagraph">
			<?php
			$total = 0;
			echo '<span class="cc_cart_items">';
			if(isset($_SESSION['cart']))
			{
				for ($i = 0; $i < count($_SESSION['cart']); $i++) {
					$total += $_SESSION['cart'][$i];
				}
			}

			if ($total == 1) {
				echo 'Your shopping cart contains ' . $total . " item.";
			} elseif ($total > 1) {
				echo 'Your shopping cart contains ' . $total . " items.";
			} else {
				echo 'Your shopping cart is empty.';
				displayEmpty();
				return;
			}
			echo '</span>';
			?>
		</p>
		<div class="cc_menu_wrapper">
			<table class="cc_table" align="center">
				<thead>
					<tr>
						<th>Item</th>
						<th>Quantity</th>
						<th>Unit Price</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$total = 0;
					$sql = "SELECT * FROM product_detail";
					$result = mysqli_query($conn, $sql);
					if ($result) {
						$num_of_productdetail=$result->num_rows;	
					}
					else{
						echo "Something went wrong when fetching data from database: " . mysqli_error($conn);

					}

					for ($i = 0; $i < $num_of_productdetail; $i++) {
							if(isset($_SESSION['cart']))
							{
								if ($_SESSION['cart'][$i]>0) {

									$product_detailquery="SELECT * FROM product_detail WHERE id=".($i+1)."";
									$productdetail = mysqli_query($conn, $product_detailquery);
									if($productdetail->num_rows>0){
										$cart=$productdetail->fetch_assoc();	
									}
									$product_query="SELECT * FROM product WHERE id=".$cart['product_id']."";
									$product = mysqli_query($conn, $product_query);
									if($product->num_rows>0){
										$item=$product->fetch_assoc();	
									}
		
									echo "<tr>";
									if(!$cart['product_capacity']==null)
									{
										echo "<td align='center'>" . $item['product_name'] ."(". $cart['product_capacity']. ")</td>";
									}
									else{
										echo "<td align='center'>" . $item['product_name'] . "</td>";
									}
									echo "<td align='center'>" .$_SESSION["cart"][$i]. "</td>";
									echo "<td align='center'>$" . $cart['product_price'] . "</td>";
									echo "</tr>";
									$total = $total + (float)$cart['product_price'] * (int)$_SESSION['cart'][$i];
								}
							}



					 }
                    echo "<tr>";
					echo "<td colspan=2 align='left' style='padding-left:80px;padding-top:10px;font-size:20px; font-weight:bold;'>Total price </td>";
					echo "<td align='center' style='font-size:20px;font-weight:bold;padding-top:10px;'>$" . number_format($total, 2) . "</td>";
					echo "</tr>";
					?>
				</tbody>
			</table>
            <br/>
            <br/>
            <p class="centeredparagraph"><a href="index.php" class="cc_links" style="margin-right:14%;">Continue shopping</a>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1" class="cc_links">Empty your cart</a></p>
			<div>
			<br/>
            <h2 class="centeredheader">
                    Place order
                </h2>
                <p class="centeredparagraph">
                    Please fill in the fields below. All fields with an asterisk* are required.<br>
                    You will get a confirmation e-mail once we receive the order!
                </p>
                    <form method="post" action="" onsubmit="return validateForm('order');">
                    <label for="firstname" class="label_jobapplication">First name*:  </label><input class="input_jobapplication" name="firstname" id="firstname" type="text" placeholder="First name" required><br>
                    <label for="lastname" class="label_jobapplication">Last name*:  </label><input class="input_jobapplication" name="lastname" id="lastname" type="text" placeholder="Last name" required><br>
                    <label for="email" class="label_jobapplication">E-mail*:  </label><input class="input_jobapplication" name="email" id="email" type="email" placeholder="E-mail address" required><br>
                    <label for="streetaddress" class="label_jobapplication">Street address*:  </label><input class="input_jobapplication" name="streetaddress" id="streetaddress" type="text" placeholder="Street address" required><br>
                    <label for="zipcode" class="label_jobapplication">Postal code*:  </label><input class="input_jobapplication" name="zipcode" id="zipcode" type="text" placeholder="Postal code" required><br>
                    <label for="additional_info" class="label_jobapplication">Additional info:  </label><textarea class="input_jobapplication" id="additional_info" rows="4" cols="40" placeholder="Additional info"></textarea><br>
                    <label for="payment" class="label_jobapplication">Payment*:  </label>
                    <select class="input_jobapplication" name='payment_method' required onchange="displayCreditcardInfo()">
                    <option selected>Choose here</option>
                    <option value="cash">Cash</option>
                    <option id="creditcard" value='creditcard'>Credit card</option>
                    <option value="invoice">Invoice</option>
                    </select><br>
                    <label for="creditcard_number" class="label_jobapplication" id="creditcard_number_label"></label>
                    <input name="creditcard_number" id="creditcard_number" placeholder="Creditcard number" type="hidden"><br>
                    <label for="cvc_number" class="label_jobapplication" id="cvc_number_label"></label>
                    <input id="cvc_number" placeholder="CVC" type="hidden"><br>
                    <br><br>
                    <span class=''><input class="submit_jobapplication" type="submit" value="Confirm order"></span>
                    <script src="scripts.js"></script>
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

