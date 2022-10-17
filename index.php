<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Phones & Accessories Hub</title>
<meta charset=“utf-8”> 
<link href="./CSS/index.css" rel="stylesheet" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
	<header>
		<h2><a href="index.php" style="text-decoration:none">Phones & Accessories Hub</a></h2>
	</header>
	<nav>
		<div class="navbar">
			<ul>
				<li><a href="phone.html">Phones</a></li>
				<li><a href="airpod.html">Earbuds</a></li>
				<li><a href="smartwatch.html">Smartwatch</a></li>
				<li><a href="cases.html">Cases</a></li>
			</ul>
			<div class="icon">
				<!--search bar still required to edit-->
				<input type="search" class="search-form" id="search-box" placeholder="search here...">
				<label for="search-box" class="fas fa-search"></label>
				<a href="cart.html"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
				<div class="fas fa-user" id="login-btn"></div>
			</div>
		</div>
	</nav>
	<main>
        <div class="user-profile">
            <?php
            $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_user) > 0){
                $fetch_user = mysqli_fetch_assoc($select_user);
            };
            ?>

            <p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
            <p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
            <div class="flex">
            <a href="login.php" class="btn">login</a>
            <a href="register.php" class="option-btn">register</a>
            <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
            </div>
        </div>
		<div class="div1">
			<a href="#"><img src="./Image/iPhone14_homepage.jpeg"></a>
			<!--require edit-->	
		</div>
		<div class="div2">
			<a href="#"><img src="./Image/airpods_homepage.jpg"></a>
			<a href="#"><img src="./Image/applewatch_homepage.jpg"></a>
		</div>
		<div class="div3">
			<a href="#"><img src="./Image/phonecases_homepage.jpg"></a>
		</div>
	</main>	
	<footer>
		<small><i>Copyright &copy; Phones & Accessories Hub</i></small>
	<br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
	</footer>
</body>
</html>