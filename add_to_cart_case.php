<?php
    include "setup_session.php";
    if(isset($_GET['case1'])){
        $_SESSION['cart'][0]++;
        header("location:../IE4717-Design-Project/case.php");
    }elseif(isset($_GET['case2'])){
        $_SESSION['cart'][1]++;
        header("location:../IE4717-Design-Project/case.php");
    }elseif(isset($_GET['case3'])){
        $_SESSION['cart'][2]++;
        header("location:../IE4717-Design-Project/case.php");
    }elseif(isset($_GET['case4'])){
        $_SESSION['cart'][3]++;
        header("location:../IE4717-Design-Project/case.php");
    }
?>