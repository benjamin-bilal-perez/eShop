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

    <title>Show cart</title>
</head>
<body>
    
    <?php
        if(isset($_COOKIE[$_SESSION["name"]])) {
            $cart = unserialize($_COOKIE[$_SESSION["name"]]);

            $columns = 4;
            $rows = count($cart);

            $totalProductsPrice = 0;
            foreach ($cart as $key => $value) {
                $totalProductsPrice += $value['price'];
            }
            
            echo "<table>";
            echo "<td> Name </td>";
            echo "<td> Unitary price </td>";
            echo "<td> Quantity </td>";
            echo "<td> Total product price </td>";
            echo "<td> Quit </td>";
            for ($i = 0; $i < $rows; $i++) {
                echo "<tr>";

                echo "<td> " . $cart[$i]["name"] . "</td>";
                echo "<td> " . $cart[$i]["price"] . "</td>";
                echo "<td> " . $cart[$i]["quantity"] . "</td>";
                echo "<td> " . $cart[$i]["totalProductPrice"] . "</td>";
                echo "<td><a href='removeProduct.php?pos=" . $i . "'> Remove from cart </a></td>";

                echo "</tr>";
            }
            echo "</table>";

            echo "<br><br>";
            echo "Total price: " . $totalProductsPrice;
        } else {
            echo "<h1>The cart is empty<h1>";
        }
    ?>

    <h2><a href="mainPage.php">Main page</a></h2>
</body>
</html>