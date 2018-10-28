<?php
/**
 * Created by PhpStorm.
 * User: olesya
 * Date: 24/10/2018
 * Time: 17:54
 */
session_start();
if(isset($_POST['loginBtn'])){

    require 'database_connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    //Zachyceni chyb
    //Kotroluju jestli vsichni radky jsou vyplnne


        $sqlQuery = "SELECT * FROM user WHERE u_username = :username AND u_password = :password";
        $statment = $connect->prepare($sqlQuery);
        $statment->execute(array(':username' => $username,
                                ':password' => $password));
        $user = $statment->fetch();


        if($user){
                $_SESSION['u_id'] = $user['u_id'];
                $_SESSION['u_name'] = $user['u_name'];
                $_SESSION['u_surname'] = $user['u_surname'];
                $_SESSION['u_email'] = $user['u_email'];
                $_SESSION['u_username'] = $user['u_username'];
                header("Location: ../index.php?login=success");
                exit();
            }else{
                header("Location: ../index.php?login=invalid_pass");
                exit();
            }
        }else{
            header("Location: ../index.php?login=invalid_username");
            exit();
        }

