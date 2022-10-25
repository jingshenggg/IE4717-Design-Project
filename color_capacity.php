<?php
include "setup_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Phone</title>
    <meta charset="uft-8">
    <link href="./CSS/color_capacity.css" rel="stylesheet">
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
            <img src="./Image/iphone14pro.jpg" class="phone_image">
            <br>
            <!-- need to import from database -->
            <div class="phone_selection">
                <h3>iPhone 14 Pro</h3>
                <div class="phone_mem">
                    <label for="phone_mem">Choose memory:</label>
                    <select name="phone_mem" id="phone_mem">
                        <option value="128GB">128 GB</option>
                        <option value="256GB">256 GB</option>
                        <option value="512GB">512 GB</option>
                        <option value="1TB">1 TB</option>
                    </select>
                    <label for="phone_color">Choose color:</label>
                    <select name="phone_color" id="phone_color">
                        <option value="deep_purple">Deep Purple</option>
                        <option value="gold">Gold</option>
                        <option value="silver">Silver</option>
                        <option value="space_black">Space Black</option>
                    </select>
                </div>
                <br>
                <label><input type=submit class="btn" value="Add to cart" name=""></label>
            </div>
        </main>

        <footer>
            <small><i>Copyright &copy; Phones & Accessories Hub</i></small>
            <br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
        </footer>
    </body>

</html>