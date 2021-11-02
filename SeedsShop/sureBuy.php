<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    
    th, td {
        padding: 15px;
    }
    </style>

    <title>Purchase</title>
</head>
<body>
    
    <?php
        if(isset($_COOKIE[$_SESSION["name"]])) {
            $cart = unserialize($_COOKIE[$_SESSION["name"]]);
        } else {
            header("Location: noProductsBuy.php");
        }
        
        $columns = 4;
        $rows = count($cart);

        $totalProductsPrice = 0;
        foreach ($cart as $key => $value) {
            $totalProductsPrice += $value['price'];
        }
        
        echo "<table>";
        echo "<td> Name </td>";
        echo "<td> Price per unit </td>";
        echo "<td> Quantity </td>";
        echo "<td> Total product price </td>";
        for ($i = 0; $i < $rows; $i++) {
            echo "<tr>";
            echo "<td> " . $cart[$i]["name"] . "</td>";
            echo "<td> " . $cart[$i]["price"] . "</td>";
            echo "<td> " . $cart[$i]["quantity"] . "</td>";
            echo "<td> " . $cart[$i]["totalProductPrice"] . "</td>";
            
            echo "</tr>";
        }
        echo "</table>";

        echo "<br><br>";
        echo "Total price: " . $totalProductsPrice;
    ?>


    <h1>Buy these products?</h1>
    <br>

    
    <h1><a href="buy.php">Yes</a></h1>
    <br>
    <h1><a href="mainPage.php">No</a></h1>

    <h2><a href="mainPage.php">Main page</a></h2>
</body>
</html>