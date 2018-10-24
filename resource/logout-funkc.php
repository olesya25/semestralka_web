<?php
/**
 * Created by PhpStorm.
 * User: olesya
 * Date: 24/10/2018
 * Time: 18:32
 */
if(isset($_POST['logout'])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}