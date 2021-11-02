<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">


    <title>Main page</title>
</head>
<body>

    <?php
        // Ponemos los datos de la sesión
        if (empty($_SESSION)) {
            $_SESSION["name"] = $_GET['name'];
            $_SESSION["password"] = $_GET['password'];
        }
        echo "<br><br>";

        echo "<h1>Welcome " . $_SESSION["name"] . "!</h1>";
    ?>

    <br><br>
    <div id="div-principal-id">
        <h2>Articles:</h2>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bdSeedsShop";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                $sql = "SELECT pName, price, img, pDescription FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<img src='imgs/" . $row['img'] . "'style='width:150px;height:150px;'>";
                        echo "<p>" . $row['pDescription'] . "</p>";
                        echo "<a href='addToCart.php?name=" . $row['pName'] . "&price=" . $row['price'] . "'>Add to cart</a>";
                        echo "<br>";
                    }

                } else {
                    echo "Upps! No articles";
                }
            

                echo "<h1><a href='showCart.php'>Show cart</a></h1>";

                echo "<br><br>";

                echo "<h1><a href='sureBuy.php'>Buy</a></h1>";

                $conn->close();
            }
        ?>

    </div>

    <br><br>

    <p style="color: red;"> <a href="removeCart.php" style="color: red;">Remove cart</a></p>
    

    <br>
    <h3><a href="sureSignOut.php">Sign out</a></h3>
</body>
</html>