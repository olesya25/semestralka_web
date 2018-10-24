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

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['heslo']);

    //Zachyceni chyb
    //Kotroluju jestli vsichni radky jsou vyplnne

    if(empty($username) || empty($password)){
        header("Location: ../index.php?login=empty");
        exit();
    }else{
        $sqlQuery = "SELECT * FROM uzivatel WHERE username='$username'";
        $result = mysqli_query($connect, $sqlQuery);
        $checkResult = mysqli_num_rows($result);
        if($checkResult < 1){
            header("Location: ../index.php?login=noexist");
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                //dehesovani hesla
                $deHashed = password_verify($password, $row['heslo']);

                if($deHashed == false){
                    header("Location: ../index.php?login=error");
                    exit();
                }elseif ($deHashed == true){
                    $_SESSION['u_id'] = $row['id'];
                    $_SESSION['u_jmeno'] = $row['jmeno'];
                    $_SESSION['u_prijmeni'] = $row['prijmeni'];
                    $_SESSION['u_mail'] = $row['mail'];
                    $_SESSION['u_username'] = $row['username'];
                    header("Location: ../index.php?login=success");
                    exit();

                }
            }

        }

    }
}else{
    header("Location: ../index.php?login=error");
    exit();
}