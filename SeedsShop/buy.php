<?php
    session_start();

    setcookie($_SESSION["name"], false, time()-60*60*24*7);

    header("Location: thanksbuying.php");
?>