<nav>
    <h1><i class="fa fa-university" aria-hidden="true"></i> PhD PORTAL</h1>
    <div class="navigation">
        <?php session_start(); if (!isset($_SESSION['email'])) { ?>
            <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> HOME</a>
            <a href="signin.php"><i class="fa fa-user" aria-hidden="true"></i> LOGIN</a>
            <a href="reg.php"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTER</a>
        <?php }else{ ?>
            <a href="logout.php"><i class="fa fa-user-plus" aria-hidden="true"></i> LOGOUT</a>
        <?php } ?>
    </div>
</nav>