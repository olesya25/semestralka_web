<?php
/**
 * Created by PhpStorm.
 * User: olesya
 * Date: 24/10/2018
 * Time: 15:36
 */

if(isset($_POST['signBtn'])){

    require 'database_connect.php';

    $name = mysqli_real_escape_string($connect, $_POST['jmeno']);
    $surname = mysqli_real_escape_string($connect, $_POST['prijmeni']);
    $email = mysqli_real_escape_string($connect, $_POST['mail']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['heslo']);


    //Zachyceni chyb
    //Nejdrive zkontroluju zda vsechny radky jsou vyplnne
    if(empty($name) || empty($name) || empty($name) || empty($name) || empty($name)){
        header("Location: ../signup.php?signup=empty");
        exit();
    }else{
            //kontroluju jestli byla zadana validni email adresa
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=invalidemail");
                exit();
            }else{
               //Kontrroluju zda v databazi jiz neexistuje uzivatel se stejnym prihlasovacim jmenem
                $sqlQuery = "SELECT * FROM uzivatel WHERE username='$username'";
                $result = mysqli_query($connect, $sqlQuery);
                $checkResult = mysqli_num_rows($result);

                if($checkResult > 0){
                    header("Location: ../signup.php?signup=user_exists");
                    exit();
                }else{

                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    //Vlozi uzivatele do databazi

                    $sqlQuery = "INSERT INTO uzivatel (jmeno, prijmeni, heslo, mail, username, datum_registrace) 
                                  VALUES ('$name', '$surname', '$hashed_password', '$email', '$username', now())";
                    mysqli_query($connect, $sqlQuery);
                    header("Location: ../signup.php?signup=success");
                    exit();

                }


            }


    }


}else{
    header("Location: ../signup.php");
    exit();
}
