<?php
include "db_connect.php";
include "setup_session.php";
if (isset($_GET['empty'])) {
	unset($_SESSION['cart']);
	header('location: ' . $_SERVER['PHP_SELF']);
	exit();
}
if (isset($_GET['plus'])) {
	$_SESSION['cart'][$_GET['plus']]++;
}
if (isset($_GET['minus'])) {
	$_SESSION['cart'][$_GET['minus']]--;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Phones & Accessories Hub</title>
	<meta charset=“utf-8”>
	<link href="./CSS/cart.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
	<header>
		<h2><a href="index.php" style="text-decoration:none">Phones & Accessories Hub</a></h2>
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
	<main>
		<p class="centeredparagraph">
			<?php
			$total = 0;
			echo '<span class="cc_cart_items">';
			for ($i = 0; $i < count($_SESSION['cart']); $i++) {
				$total += $_SESSION['cart'][$i];
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
			<table class="cc_table">
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
					$sql = "SELECT case_name, case_price FROM shop.case1";
					if (!$result = mysqli_query($conn, $sql)) {
						echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
					}
					for ($i = 0; $i < count($_SESSION['cart']); $i++) {
						$row = mysqli_fetch_assoc($result);
						if ($_SESSION['cart'][$i] > 0) {
							echo "<tr>";
							echo "<td align='center'>" . $row['case_name'] . "</td>";
							echo '<td align="center"><a href="' . "?minus=" . $i . '"><button type="button" class="cc_minus">-</button></a>';
							echo $_SESSION["cart"][$i];
							echo '<a href="' . "?plus=" . $i . '"><button type="button" class="cc_lplus">+</button></a>';
							echo "<td align='center'>$" . $row['case_price'] . "</td>";
							echo "</tr>";
							$total = $total + (float)$row['case_price'] * (int)$_SESSION['cart'][$i];
						}
					}
					echo "<tr>";
					echo "<td colspan=2 align='left' style='padding-left:35px;font-size:20px; font-weight:bold;'>Total price </td>";
					echo "<td align='center' style='font-size:20px;font-weight:bold;'>$" . number_format($total, 2) . "</td>";
					echo "</tr>";
					?>
				</tbody>
			</table>
			<p class="centeredparagraph"><a href="cart.php" class="cc_links" style="margin-right:13%;">Continue to checkout</a>
				<a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1" class="cc_links">Empty your cart</a>
			</p>
		</div>
	</main>
	<footer>
		<small><i>Copyright &copy; Phones & Accessories Hub</i></small>
		<br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
	</footer>
</body>

</html>


<?php
function displayEmpty()
{
	echo '<p class="centeredparagraph"><a href="index.php" class="cc_empty_links">Continue shopping</a>';
	echo '<footer>
		<small><i>Copyright &copy; Phones & Accessories Hub</i></small>
		<br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
	 	 </footer>';
}
?>