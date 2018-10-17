<?php

/**
 * Created by PhpStorm.
 * User: olesya
 * Date: 15/10/2018
 * Time: 21:16
 */



$dsn = 'mysql:host = localhost; dbname=workout_diary';
$dbuser = 'root';
$dbpass = 'mysql';

try{
    $db = new PDO($dsn, $dbuser, $dbpass);

    echo "Connected Successfully";

}catch (Exception $exception) {

    echo "Connection failed" . $exception->getMessage();
}


?>



