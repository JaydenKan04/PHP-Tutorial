<?php

//Check if got POST METHOD
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    //if want to output then need to sanitize using
    //htmlspecialchars
    try{
        require_once "./dbh.inc.php";        
        
        //Method 2 : By using name order
        $query = "INSERT INTO users (username, pwd, email) 
        VALUES (:username, :pwd, :email);";
        //Submit to database and give back data format
        $stmt = $pdo->prepare($query);
        
        $options = [
            'cost' => 12
        ];
        
        $hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);
        
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashedPwd);
        $stmt->bindParam(":email", $email);

        $stmt->execute();
    
        //Best practice to close of connection to save resources
        $pdo = null;
        $stmt = null;

        //Send user back after submitting and kill of the script
        header("Location: ../index.php");
        die();
    }catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
}else{
    header("Location: ../index.php");
    exit();
}