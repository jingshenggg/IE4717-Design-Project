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
        </div>
    </nav>
    <main style="padding-bottom: 100px;">
        <h1>Thank you!</h1>
        <p>We have sent a confirmation e-mail of your purchase to your e-mail address. Have a nice day!</p>
        <br>
        <br>
        <div class="contshop">
            <form action="index.php"><input type="submit" value="Continue shopping" class="btn" style="color: white;"/></form>
        </div>
    </main>
    <footer>
        <small><i>Copyright &copy; Phones & Accessories Hub</i></small>
        <br><i><a href="mailto:jingsheng@tey.com">jingsheng@tey.com</a></i>
    </footer>
    <?php
    $to      = 'f31ee@localhost';
    $subject = 'Purchase Confirmation';
    $message = 'Dear buyer, thank you for your purschase. Below is a receipt of your order.<br /><br/>';
    $message .= "<table align='center' border='1'>";
    $message .= "<thead>";
    $message .= "<tr>";
    $message .= "<th>Item</th>";
    $message .= "<th>Quantity</th>";
    $message .= "<th>Unit Price</th>";
    $message .= "</tr>";
    $message .= "</thead>";
    $message .= "<tbody>";

    $total = 0;
	$sql = "SELECT * FROM product_detail";
	$result = mysqli_query($conn, $sql);
	$num_of_productdetail = $result->num_rows;
					
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

                $message .= "<tr>";
                if (!$cart['product_capacity'] == null) {
                    $message .= "<td align='center'>" . $item['product_name'] . "(" . $cart['product_capacity'] . ")</td>";
                } else {
                    $message .= "<td align='center'>" . $item['product_name'] . "</td>";
                }
                $message .= "<td align='center'>" . $_SESSION["cart"][$i] . "</td>";
                $message .= "<td align='center'>$" . $cart['product_price'] . "</td>";
                $message .= "</tr>";
                $total = $total + (float)$cart['product_price'] * (int)$_SESSION['cart'][$i];
            }
        }
    }
    $message .= "<tr>";
    $message .= "<td colspan=2 align='left' style='text-align:center';padding-top:10px;font-size:20px; font-weight:bold;'>Total price </td>";
    $message .= "<td align='center' style='font-size:20px;font-weight:bold;padding-top:10px;'>$" . number_format($total, 2) . "</td>";
    $message .= "</tr>";
    $message .= "</tbody>";
    $message .= "</table>";

    $headers = 'From: f31ee@localhost' . "\r\n" .
        'Reply-To: f32ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

    mail($to, $subject, $message, $headers, '-ff32ee@localhost');
    unset($_SESSION['cart']);
    session_destroy();



    ?>
    
    
</body>

</html>