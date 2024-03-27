<?php

declare(strict_types=1);

function signupInputs(){

    if(isset($_SESSION["signup_data"]["username"]) && 
    !isset($_SESSION["errors_signup"]["usernameTaken"])){
        echo '<input type="text" name="username" 
        placeholder="Username" value ="'. $_SESSION["signup_data"]
        ["username"] . '">';
    }else{
        echo '<input type="text" name="username" placeholder="Username">';
    }

    echo '<input type="password" name="pwd" placeholder="Password">';

    if(isset($_SESSION["signup_data"]["email"]) && 
    !isset($_SESSION["errors_signup"]["emailUsed"]) &&
    !isset($_SESSION["errors_signup"]["invalidEmail"])){
        echo '<input type="text" name="email" placeholder="E-Mail"
        value = "'.  $_SESSION["signup_data"]["email"] . '">';
    }else{
        echo '<input type="text" name="email" placeholder="E-Mail">';
    }
}

function checkSignupErrors(){
    if(isset($_SESSION["error_signup"])){
        $errors = $_SESSION["error_signup"];

        echo "<br>";
        foreach($errors as $error){
            echo "<p class='form-error'>".$error."</p>";
        }

        unset($_SESSION["error_signup"]);

    }else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo "<br>";
        echo "<p class='form-success'>Signup success!</p>";
    }
}
