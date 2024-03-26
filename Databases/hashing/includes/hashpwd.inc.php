<?php

//General hashing not for password hashing

// $sensitiveData = "Krossing";
// $salt = bin2hex(random_bytes(16)); //Generate random salt
// $pepper = "ASecretPepperString";

// // echo "<br>".$salt;

// $dataToHash = $sensitiveData . $salt . $pepper;
// $hash = hash("sha256", $dataToHash);

// // echo "<br>".$hash;

// /*-----*/

// $sensitiveData = "Krossing"; //This should be user register

// $storedSalt = $salt; //Store in database
// $storedHash = $hash; //Store in database
// $pepper = "ASecretPepperString";

// $dataToHash = $sensitiveData . $storedSalt . $pepper;
// $verificationHash = hash("sha256", $dataToHash);

// if($storedHash === $verificationHash){
//     echo "Data are the same!";
// }else{
//     echo "Data are not the same!";
// }

//Password hashing

$pwdSignup = "Krossing";

$options = [
    'cost' => 12
];

//Two common hashing algorithm
// PASSWORD_DEFAULT, PASSWORD_BCRYPT

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options); //What is in the database

$pwdLogin = "Krossing";

if(password_verify($pwdLogin, $hashedPwd)){
    echo "They are the same";
}else{
    echo "They are not the same!";
}