<?php
    session_start();

    $cart = array();

    echo "Sesion name: " . $_SESSION["name"];

    if(isset($_COOKIE[$_SESSION["name"]])) {
        $cart = unserialize($_COOKIE[$_SESSION["name"]]);
    }

    $productQuantity = 1;
    
    $totalProductPrice = 0;
    $productPos = count($cart);

    if(isset($_GET['name']) && isset($_GET['price'])) {
        $newProduct = $_GET['name'];
        $newPrice = $_GET['price'];
        
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]["name"] == $newProduct) {
                $productPos = $i;
                $productQuantity = $cart[$productPos]['quantity'] + 1;
            }
        }

        $totalProductPrice = $newPrice * $productQuantity;
        
        $cart[$productPos]['name'] = $_GET['name'];
        $cart[$productPos]['price'] = $_GET['price'];
        $cart[$productPos]['quantity'] = $productQuantity;
        $cart[$productPos]['totalProductPrice'] = $totalProductPrice;
    }

    setcookie($_SESSION["name"], serialize($cart), (time() + (60 * 60)));

    header("Location: mainPage.php");
?>