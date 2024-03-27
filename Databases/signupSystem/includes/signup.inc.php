<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try{
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLER
        $errors = [];

        if(isInputEmpty($username,$pwd, $email)){
            $errors["emptyInput"] = "Fill in all fields!";
        }

        if(isEmailInvalid($email)){
            $errors["invalidEmail"] = "Invalid email used!";
        }

        if(isUsernameTaken($pdo, $username)){
            $errors["usernameTaken"] = "Username already taken!";
        }

        if(isEmailRegistered($pdo, $email)){
            $errors["emailUsed"] = "Email already registered!";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["error_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData;

            header("Location: ../index.php");
            die();
        }

        createUser($pdo, $username, $pwd, $email);
        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    }
}else{
    header("Location: ../index.php");
    die();
}