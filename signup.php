

<?php
/**
 * Created by PhpStorm.
 * User: olesya
 * Date: 15/10/2018
 * Time: 21:17
 */
//add our database connection script
include_once 'resource/Database.php';

//process the form
if(isset($_POST['signupBtn'])){
    //inicializaci poli na ulozeni zprav o chybach
    $form_errors = array();

    //forma validace
    $required_fields = array('jmeno', 'prijmeni', 'mail', 'username', 'heslo');

    //prrojde vsichni prvky v poli, pokud neco chybi, tak zaradi to do pole s chybami
    foreach($required_fields as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " is a required field";
        }
    }

    //kontroluje zda pole s chybami je prazdny, pokud ano, tak vyplni se radek
    if(empty($form_errors)){
        //collect form data and store in variables
        $jmeno = $_POST['jmeno'];
        $prijmeni = $_POST['prijemni'];
        $mail = $_POST['mail'];
        $username = $_POST['username'];
        $heslo = $_POST['heslo'];

        //hashovani hesla
        $hashed_heslo = password_hash($heslo, PASSWORD_DEFAULT);
        try{

            //Sql insert
            $sqlInsert = "INSERT INTO uzivatel (jmeno, prijmeni, mail, username, heslo, datum_registrace)
              VALUES (:jmeno, :prijmeni, :mail, :username, :heslo, now())";

            $statement = $db->prepare($sqlInsert);

            //vlozit data do database
            $statement->execute(array(':jmeno' => $jmeno, ':prijmeni' => $prijmeni, ':mail' => $mail, ':username' => $username, ':heslo' => $hashed_heslo));

            //kontrloluju, jestli byla vytvorena 1 radka
            if($statement->rowCount() == 1){
                $result = "<p style='padding:20px; color: green;'> Registration Successful</p>";
            }
        }catch (PDOException $ex){
            $result  = "<p style='padding:20px; color: red;'> An error occurred: ".$ex->getMessage()."</p>";
        }
    }
    else{
        if(count($form_errors) == 1){
            $result = "<p style='color: red;'> There was 1 error in the form<br>";

            $result .= "<ul style='color: red;'>";
            //loop through error array and display all items
            foreach($form_errors as $error){
                $result .= "<li> {$error} </li>";
            }
            $result .= "</ul></p>";

        }else{
            $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";

            $result .= "<ul style='color: red;'>";
            //loop through error array and display all items
            foreach($form_errors as $error){
                $result .= "<li> {$error}</li>";
            }
            $result .= "</ul></p>";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Plan your training</h1><hr>
<!--Pripojeni k databazi-->


<h3>Registration Form</h3>
<?php if(isset($result)) echo $result; ?>

<form method="post" action="">
    <table>
        <tr><td>Name:</td> <td><input type="text" value="" name="jmeno"></td></tr>
        <tr><td>Surname:</td> <td><input type="text" value="" name="prijmeni"></td></tr>
        <tr><td>Email:</td> <td><input type="text" value="" name="mail"></td></tr>
        <tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
        <tr><td>Password:</td> <td><input type="password" value="" name="heslo"></td></tr>
        <tr><td></td><td><input style="float: right;" type="submit" name="signupBtn" value="Signup" ></td></tr>
    </table>
</form>
<p><a href="index.php">Back</a> </p>


</body>
</html>
