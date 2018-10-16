<?php
/**
 * Created by PhpStorm.
 * User: olesya
 * Date: 15/10/2018
 * Time: 21:16
 */


function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "iwillsurwive22";
    $db = "workout_diary";


    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}

?>
echo "Connected to the register database";