
<?php include_once 'header.php' ?>
<section class="main-content">
    <div class="main-wrap">
        <h2>Sign up!</h2>
<!--        <select name="user_type">-->
<!--            <option value="-1">select user type</option>-->
<!--            <option value="3">Coach</option>-->
<!--            <option value="2">User</option>-->
<!--        </select>-->
        <form class="signup-form" action="resource/signup-funkc.php" method="post">
            <input type="text" name="name" placeholder="First Name">
            <input type="text" name="surname" placeholder="Second Name">
            <input type="text" name="email" placeholder="E-mail adress">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pass" placeholder="Passworrd">
            <button type="submit" name="signBtn">Sign Up</button>

        </form>

    </div>
</section>
<?php include_once 'footer.php' ?>
