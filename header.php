<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<header>
    <nav>
        <div class="main-wrap">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <div class="nav-login">
                <?php
                    if(isset($_SESSION['u_id'])){
                        echo'
                <form action="resource/logout-funkc.php" method="post">
                    <button type="submit" name="logout">Logout</button>
                </form>';

                    }else{
                       echo '
                <form action="resource/login-funkc.php" method="post">
                    <input type="text" name="username" placeholder="Enter username">
                    <input type="password" name="password" placeholder="Enter password">
                    <button type="submit" name="loginBtn">Log in</button>
                </form>
                <a href="signup.php">Sign up</a>';
                    }
                ?>
            </div>
        </div>
    </nav>
</header>