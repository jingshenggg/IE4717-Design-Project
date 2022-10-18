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

<!doctype html>
<html lang="en">
<head>
  <title>Phones</title>
  <meta charset = "uft-8">
  <link href="./CSS/styles.css" rel="stylesheet" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
</style>

<body>
	<header>
		<h2><a href="index.php" style="text-decoration:none">Phones & Accessories Hub</a></h2>
	</header>
	<nav>
		<div class="navbar">
			<ul>
				<li><a href="phone.php">Phones</a></li>
				<li><a href="airpod.php">Airpod</a></li>
				<li><a href="smartwatch.php">Smartwatch</a></li>
				<li><a href="cases.php">Cases</a></li>
			</ul>
			<div class="icon" style="padding-right: 100px">
				<input type="search" class="search-form" id="search-box" placeholder="search here...">
				<label for="search-box" class="fas fa-search"></label>
				<a href="cart.php"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
			</div>
		</div>
	</nav>
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
<div class="header">
  <h1>Phones</h1>
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
	<button class="btn">Buy</button>
	</div>
  
   <div class="column">
	<h3>iPhone 14 Max</h3>
	<button class="btn">Buy</button>
	</div>
   <div class="column">
	<h3>iPhone 14</h3>
	<button class="btn">Buy</button>

	</div>
  <div class="column">
  	<h3>iPhone 14 Plus</h3>
	<button class="btn">Buy</button>
	</div>
</div>	
  
  
<div class="row"> 
  <div class="column">
    <img src="./Image/iphonese.jpg" style="width:100%">
	</div>

  <div class="column">
    <img src="./Image/iphone13.jpg" style="width:100%">
	</div>
	
  <div class="column">
    <img src="./Image/iphone13 mini.jpg" style="width:100%">
	</div>

  <div class="column">
    <img src="./Image/iphone12.jpg" style="width:100%">
	</div>

</div>

<!-- buttons and text -->
<div class="row"> 
  <div class="column">
  	<h3>iPhone SE</h3>
	<button class="btn">Buy</button>
	</div>
  
   <div class="column">
	<h3>iPhone 13</h3>
	<button class="btn">Buy</button>
	</div>
   <div class="column">
	<h3>iPhone 13 Mini</h3>
	<button class="btn">Buy</button>

	</div>
  <div class="column">
  	<h3>iPhone 12</h3>
	<button class="btn">Buy</button>
	</div>
</div>	  

<footer>
  <small><i>Copyright &copy; Phones & Accessories Hub</i></small>
<br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
</footer>
</body>
</html>