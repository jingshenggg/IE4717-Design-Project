<?php
include "db_connect.php";
session_start();
//include "setup_session.php";
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

function displayEmpty()
{
    echo "<div class='contshop'>";
    echo "<form action='index.php'><input type='submit' value='Continue shopping' class='btn'/></form>";
    echo "</div>";
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
                        // clear session ?
                        ?>
                    </div>
                </a>
            </div>
        </div>
    </nav>
    <main style="padding-bottom: 100px;">
        <h1>Thank you!</h1>
        <h2>Have a nice day!</h2>
        <br>
        <br>
        <div class="contshop">
            <form action="index.php"><input type="submit" value="Continue shopping" class="btn" /></form>
        </div>
    </main>
    <footer>
        <small><i>Copyright &copy; Phones & Accessories Hub</i></small>
        <br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
    </footer>
    <?php
    $to      = 'f32ee@localhost';
    $subject = 'the subject';
    $message = 'Dear buyer, thank you for your purschase. Below is a receipt of your order.';
    $headers = 'From: f31ee@localhost' . "\r\n" .
        'Reply-To: f32ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers, '-ff32ee@localhost');
    echo ("mail sent to : " . $to);
    ?>
    
</body>

</html>