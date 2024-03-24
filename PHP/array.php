<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    <?php
    // $task = [
    //     "laundry" => "Daniel",
    //     "trash" => "Frida",
    //     "vacuum" => "Basse",
    //     "dishes" => "Bella"
    // ];

    // // sort($task);
    // // print_r($task);

    // $fruits = ["apple","banana","cherry"];

    // // //array_push only used for index array
    // // array_push($fruits, "mango");

    // // //The method below is used to insert element for associated array
    // // $task["dusting"] = "Tara";

    // // print_r($task);

    // $test = ["Mango","Strawberry"];

    // //array_splice(array, index, how many element is deleted, added element/array)
    // array_splice($fruits, 2, 0, $test);
    // print_r($fruits);

    $food = [
        "fruits" => array("apple","mango","cherry"),
        "meat" => array("chicken","fish","fish"),
        "vegetables" => array("cucumber","carrot")
    ];

    echo $food["vegetables"][0];
    ?>
</body>
</html>