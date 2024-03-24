<?php

//Check if got POST METHOD
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    //if want to output then need to sanitize using
    //htmlspecialchars
    try{
        require_once "./dbh.inc.php";

        //Method 2 : By using name order
        //Right now is only changing 1 user info
        $query = "DELETE FROM users WHERE 
        username = :username AND pwd = :pwd;";

        //Submit to database and give back data format
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);

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