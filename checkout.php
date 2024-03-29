<!-- checkout page for customers to fill in details -->

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
	echo "<p class='centeredparagraph'><form action='index.php'><input type='submit' value='Continue shopping' class='btn' style='color: white;'/></form>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
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
						if (isset($_SESSION['cart'])) {
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
			if (isset($_SESSION['cart'])) {
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
						$num_of_productdetail = $result->num_rows;
					} else {
						echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
					}

					for ($i = 0; $i < $num_of_productdetail; $i++) {
						if (isset($_SESSION['cart'])) {
							if ($_SESSION['cart'][$i] > 0) {

								$product_detailquery = "SELECT * FROM product_detail WHERE id=" . ($i + 1) . "";
								$productdetail = mysqli_query($conn, $product_detailquery);
								if ($productdetail->num_rows > 0) {
									$cart = $productdetail->fetch_assoc();
								}
								$product_query = "SELECT * FROM product WHERE id=" . $cart['product_id'] . "";
								$product = mysqli_query($conn, $product_query);
								if ($product->num_rows > 0) {
									$item = $product->fetch_assoc();
								}

								echo "<tr>";
								if (!$cart['product_capacity'] == null) {
									echo "<td align='center'>" . $item['product_name'] . "(" . $cart['product_capacity'] . ")</td>";
								} else {
									echo "<td align='center'>" . $item['product_name'] . "</td>";
								}
								echo "<td align='center'>" . $_SESSION["cart"][$i] . "</td>";
								echo "<td align='center'>$" . $cart['product_price'] . "</td>";
								echo "</tr>";
								$total = $total + (float)$cart['product_price'] * (int)$_SESSION['cart'][$i];
							}
						}
					}
					echo "<tr>";
					echo "<td colspan=2 align='left' style='text-align:center';padding-top:10px;font-size:20px; font-weight:bold;'>Total price: </td>";
					echo "<td align='center' style='font-size:20px;font-weight:bold;padding-top:10px;'>$" . number_format($total, 2) . "</td>";
					echo "</tr>";
					?>
				</tbody>
			</table>
			<br />
			<br />
			<p class="centeredparagraph"><form action="index.php"><input type="submit" value="Continue shopping" class="btn" style="color: white;"/></form>
				<button onclick="clear_Cart()" class="btn" style="color:white;">Empty your cart</button>
			</p>
			<div>
				<br />
				<h2 class="centeredheader">
					Place order
				</h2>
				<p class="centeredparagraph">
					Please fill in the fields below. All fields with an asterisk* are required.<br>
					You will get a confirmation e-mail once we receive the order!
				</p>
				<form method="post" action="confirm_order.php" onsubmit="return validateForm('order');">
					<label for="firstname" >First name*: </label><input name="firstname" id="firstname" type="text" placeholder="First name" required><br>
					<label for="lastname" >Last name*: </label><input name="lastname" id="lastname" type="text" placeholder="Last name" required><br>
					<label for="email" >E-mail*: </label><input name="email" id="email" type="email" placeholder="E-mail address" required><br>
					<label for="streetaddress" >Street address*: </label><input name="streetaddress" id="streetaddress" type="text" placeholder="Street address" required><br>
					<label for="zipcode" >Postal code*: </label><input name="zipcode" id="zipcode" type="text" placeholder="Postal code" required><br>
					
					<div class="payment_selection" style="padding-top:10px;"></div>
					<label for="payment" >Payment*: </label>
					<select name='payment_method' required onchange="displayCreditcardInfo()">
						<option selected>Choose here</option>
						<option value="cash">Cash</option>
						<option id="creditcard" value='creditcard'>Credit card</option>
					</select><br>
					</div>
					<label for="creditcard_number"  id="creditcard_number_label"></label>
					<input name="creditcard_number" id="creditcard_number" placeholder="Creditcard number" type="hidden"><br>
					<label for="cvc_number"  id="cvc_number_label"></label>
					<input id="cvc_number" placeholder="CVC" type="hidden"><br>
					<br><br>
					<form action="confirm_order.php"><input type="submit" value="Confirm order" class="btn" style="color: white;"/></form>
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