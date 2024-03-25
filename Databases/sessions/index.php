<?php
    //Session is used mainly for login system, checkout carts

    //Started up a session inside this page
    session_start();

    //Store the username variable inside the session with cookies and
    //Will always be remembered in all the webpage
    $_SESSION["username"] == "Krossing";

    //Release the cookie
    // unset($_SESSION["username"]);

    //Purge all the session data
    // session_unset();

    //Completly terminates the session 
    //but does not release all data in current page
    //will only release in other page
    // session_destroy();

    //Use both
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo $_SESSION["username"];
    ?>
</body>
</html>