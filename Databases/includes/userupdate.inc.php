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

        //Method 1: By using none name order(?,?,?) need to make sure order correct
        // $query = "INSERT INTO users (username, pwd, email) 
        //VALUES (?, ?, ?);";
        
        // //Submit to database and give back data format
        // $stmt = $pdo->prepare($query);
    
        // $stmt->execute([$username, $pwd, $email]);
        
        // //Best practice to close of connection to save resources
        // $pdo = null;
        // $stmt = null;
    
        // //Send user back after submitting and kill of the script
        // header("Location: ../index.php");
        
        
        //Method 2 : By using name order
        //Right now is only changing 1 user info
        $query = "UPDATE users SET username = :username, pwd = :pwd, 
        email = :email WHERE id = 2;";

        //Submit to database and give back data format
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
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