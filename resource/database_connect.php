<?php
/**
 * Created by PhpStorm.
 * User: olesya
 * Date: 24/10/2018
 * Time: 15:29
 */

$dsn = 'mysql:host=localhost;dbname=workout_diary';
$dbUsername = 'root';
$dbPass = 'mysql';
$options =[];
try{

    $connect = new PDO($dsn, $dbUsername, $dbPass, $options);
}catch (PDOException $exception){

}
