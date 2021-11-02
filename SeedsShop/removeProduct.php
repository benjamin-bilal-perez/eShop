<?php
    session_start();

    if (isset($_GET["pos"])) {
        $pos = $_GET["pos"];
    }


    if(isset($_COOKIE[$_SESSION["name"]])) {
        $cart = unserialize($_COOKIE[$_SESSION["name"]]);
    }

    $cart[$pos]["quantity"] = $cart[$pos]["quantity"] - 1;

    if ($cart[$pos]["quantity"] <= 0) {
        if ($pos == 0) {
            array_splice($cart,$pos,$pos+1);
        } else {
            array_splice($cart,$pos,$pos);
        }

        if (count($cart) <= 0) {
            setcookie($_SESSION["name"], false, time()-60*60*24*7);
            header("Location: showCart.php");
        } else {
            setcookie($_SESSION["name"], serialize($cart), (time() + (60 * 60)));
            header("Location: showCart.php");
        }
    } else {
        setcookie($_SESSION["name"], serialize($cart), (time() + (60 * 60)));
        header("Location: showCart.php");
    }
?>