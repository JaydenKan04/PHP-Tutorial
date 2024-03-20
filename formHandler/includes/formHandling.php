<?php

//Use post when user is submitting data
//Use get when show data to user

// Use for checking users request method (get/post)
// var_dump($_SERVER["REQUEST_METHOD"]);

//Use for checking POST method for security
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //Use to convert input to html entities
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $favouritepet = htmlspecialchars($_POST["favouritepet"]);

    if(empty($firstname)){
        exit();
        header("Location: ../index.php");
    }


    //Takes all things to convert to html entities
    // htmlentities();

    echo "These are the data that the user submitted: <br>";
    echo "$firstname <br> $lastname <br> $favouritepet";

    //Return user back to front page for security reason
    header("Location: ../index.php");
}else{
    header("Location: ../index.php");
}