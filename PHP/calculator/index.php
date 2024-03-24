<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER
    ["PHP_SELF"]) ?>" method="get">
        <input type="number" name="num01" placeholder="Number One">
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num02" placeholder="Number Two">
        <button>Calculate</button>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            //Grab data
            $num01 = filter_input(INPUT_GET,"num01", 
            FILTER_SANITIZE_NUMBER_FLOAT);
            $num02 = filter_input(INPUT_GET,"num02", 
            FILTER_SANITIZE_NUMBER_FLOAT);
            //As FILTER_SANITIZE_STRING not recommended,
            //can use htmlspecialchars(recommended) instead or FILTER_SANITIZE_SPECIAL_CHARS
            $operator = htmlspecialchars($_GET["operator"]);

            //Error handling
            $errors = false;

            if(empty($num01) || empty($num02) || empty($operator)){
                echo "<p class='calc-error'>Fill in all the fields!</p>";
                $errors = true;
            }

            if(!is_numeric($num01) || !is_numeric($num02)){
                echo "<p class='calc-error'>Only write numbers!</p>";
                $errors = true;
            }

            $value = 0;

            //Calculate the numbers if no errors
            if(!$errors){
                switch($operator):
                    case "add":
                        $value = $num01 + $num02;
                        break;
                    case "subtract":
                        $value = $num01 - $num02;
                        break;
                    case "multiply":
                        $value = $num01 * $num02;
                        break;
                    case "divide":
                        $value = $num01 / $num02;
                        break;
                    default:
                        echo "<p class='calc-error'>Something went wrong!</p>";
                    endswitch;
            }

            echo "<p class='calc-result'>Result = $value</p>";
        }   
    ?>
</body>
</html>