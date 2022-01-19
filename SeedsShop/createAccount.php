<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Create account</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bdSeedsShop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connectio failed: " . $conn->connect_error);
        } else {
    ?>

    <div id="div-form-id">
        <form action="createAccount.php" method="GET">
            <label for="name">Write your name (without spaces)</label>
            <input type="text" name="name" pattern="^\S+$" required><br/>

            <label for="password">Write your password</label>
            <input type="password" name="password" minlength="6" maxlength="30" required><br/>

            <input type="submit" value="Insert">
        </form>
    </div>
    
        
    <?php
        }
        if (isset($_GET["name"]) && 
        isset($_GET["password"])) {
            $name = $_GET["name"];
            $password = $_GET["password"];
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                $sql = "SELECT uName FROM users";
                $result = $conn->query($sql);

                $valid = true;

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["uName"] == $name) {
                            $valid = false;
                            echo "User already exists";
                            break;
                        }
                    }
                }

                if ($valid == true) {
                    $sql = "INSERT INTO users (uName, uPassword)
                    VALUES ('$name', '$password')";

                    if ($conn->query($sql) === TRUE) {
                        echo "User inserted successfully";
                    } else {
                        echo "Error when inserting the user: " . $conn->error;
                    }
                } else {
                    echo "<br>";
                    echo "User was not inserted";
                }
            }
        }

        $conn->close();
    ?>

    <br><br><br><br>
    <p><a href="index.php">Index</a></p><br>

</body>
</html>
