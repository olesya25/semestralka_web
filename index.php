<?php include_once 'header.php' ?>
<section class="main-content">
    <div class="main-wrap">
        <h1>This is a home page!</h1>
        <?php
        if(isset($_SESSION['u_id'])){
            echo "You are logged in!";
        }
        ?>
    </div>
</section>
<?php include_once 'footer.php' ?>
