<?php

//PHP will only use cookies to store the session ID and 
//will not allow passing the session ID through URLs. 
ini_set('session.use_only_cookies',1);
//This session make sure website only use session id by website
ini_set('session.use_strict_mode',1);

session_set_cookie_params([
    'lifetime' => 1800, //cookies get destroy after 3 minutes,
    'domain' => 'localhost', //cookies work only in localhost,
    'path' => '/', //cookies only work in sub domain,
    'secure' => true,
    'httponly' => true //Restrict script from client
]);

//Above must be created before starting the session
session_start();

// //used to replace the current session ID with a new one. 
// session_regenerate_id(true);

if (!isset($_SESSION['last_regeneration'])){
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();

}else{

    $interval = 60 * 30; //Every 30 minutes

    //If last session longer than 30 minutes
    if(time() - $_SESSION['last_regeneration'] >= $interval){

        //Generate new session
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();

    }
}