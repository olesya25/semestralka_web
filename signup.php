
<?php include_once 'header.php' ?>
<section class="main-content">
    <div class="main-wrap">
        <h2>Sign up!</h2>
        <form class="signup-form" action="resource/signup-funkc.php" method="post">
            <input type="text" name="jmeno" placeholder="First Name">
            <input type="text" name="prijmeni" placeholder="Second Name">
            <input type="text" name="mail" placeholder="E-mail adress">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="heslo" placeholder="Passworrd">
            <button type="submit" name="signBtn">Sign Up</button>

        </form>

    </div>
</section>
<?php include_once 'footer.php' ?>
