<?php
/**
 * Created by PhpStorm.
 * User: olesya
 * Date: 24/10/2018
 * Time: 15:36
 */

if(isset($_POST['signBtn'])){

    require 'database_connect.php';

    $name = ($_POST['name']);
    $surname = ($_POST['surname']);
    $email = ($_POST['email']);
    $username = ($_POST['username']);
    $password = ($_POST['pass']);
    $password = md5($password);


    //Zachyceni chyb
    //Nejdrive zkontroluju zda vsechny radky jsou vyplnne
    if(empty($name) || empty($surname) || empty($email) || empty($username) || empty($password)){
        header("Location: ../signup.php?signup=empty");
        exit();
    }else{
            //kontroluju jestli byla zadana validni email adresa
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=invalidemail");
                exit();
            }else{

                    //Vlozi uzivatele do databazi

                $sqlQuery = 'INSERT INTO user (u_name, u_surname, u_password, u_email, u_username, u_registration_date) 
                                VALUES (:name, :surname, :hashed_password, :email, :username, now())';
                $statement = $connect->prepare($sqlQuery);
                    if($statement->execute([':name' => $name, ':surname' => $surname,
                        ':hashed_password' => $password, ':email' => $email, ':username' => $username])){
                        header("Location: ../signup.php?signup=success");
                        exit();
                    }

            }

    }


}else{
    header("Location: ../signup.php");
    exit();
}
