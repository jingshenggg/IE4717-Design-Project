<?php
include "setup_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Phones & Accessories Hub</title>
	<meta charset=“utf-8”>
	<link href="./CSS/index.css" rel="stylesheet">
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
				<!--search bar still required to edit-->
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
		<div class="div1">
			<a href="phone.php"><img src="./Image/iPhone14_homepage.jpeg"></a>
			<!--require edit-->
		</div>
		<div class="div2">
			<a href="airpod.php"><img src="./Image/airpodspro_homepage.jfif"></a>
			<a href="smartwatch.php"><img src="./Image/applewatch_homepage.jpg"></a>
		</div>
		<div class="div3">
			<a href="case.php"><img src="./Image/phonecases_homepage.jpg"></a>
		</div>
	</main>
	<footer>
		<small><i>Copyright &copy; Phones & Accessories Hub</i></small>
		<br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
	</footer>
</body>

</html>