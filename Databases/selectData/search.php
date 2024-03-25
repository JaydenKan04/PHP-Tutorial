<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usersearch = $_POST["usersearch"];

    try{
        require_once "../insertUpdateDelete/includes/dbh.inc.php";

        $query = "SELECT * FROM comments WHERE username = :usersearch";

        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(":usersearch", $usersearch);

        $stmt->execute();

        //Store data in the array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $pdo = null;
        $stmt = null;
        
    }catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
}else{
    header("Location: ./index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <section>
    <h3>Search Result</h3>
    <?php
        if(empty($result)){
            echo "<div>";
            echo "<p>No result</p>";
            echo "</div>";
        }else{
            foreach($result as $row){
                echo "<div>";
                //Remember to sanitize the output
                echo "<h4>".htmlspecialchars($row["username"])."</h4>";
                echo "<p>".htmlspecialchars($row["comment_text"])."<p>";
                echo "<p>".htmlspecialchars($row["created_at"])."<p>";
                
                echo "</div>";
            }
        }
    ?>
    </section>

</body>
</html>