<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Login</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bdSeedsShop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
    ?>

    <form action="login.php" method="GET">
        <label for="name">User name</label>
        <input type="text" name="name" required><br/>

        <label for="password">Password</label>
        <input type="password" name="password" required><br/>

        <input type="submit" value="Sign in">
    </form>
        
    <?php
        }
        if (isset($_GET["name"]) && 
        isset($_GET["password"])) {
            $name = $_GET["name"];
            $password = $_GET["password"];
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                $sql = "SELECT id FROM users where uName='$name' AND uPassword='$password'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $rows = mysqli_num_rows($result);
                    echo "Sign in successfully: ";
                    echo "Number of coincidences: " . $rows;
                    header("Location: mainPage.php?name=" . $_GET['name'] . "&password=" . $_GET['password']);
                } else {
                    echo "Invalid name or password, try again";
                }
            }
        }

        $conn->close();
    ?>

    <br><br><br><br>
    <p><a href="index.php">Index</a></p><br>

</body>
</html>