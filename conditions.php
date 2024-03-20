<?php

$a = 10;

//Abit similar to like javascript arrow functions
$result = match($a) {
    1, 3, 5 => "Variable a is equal to one!",
    2 => "Variable a is equal to two!",
    default => "None were a match.",
};

echo $result;