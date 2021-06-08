<?php 
session_start();

if (isset($_SESSION['email'])) {
    header('location:User/yetapproved.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>

<body>

    <form class="container" action="server.php" method="post">
        <h1>Sign In</h1>
        <input type="text" name="email" placeholder="Enter Email" required>
        <input type="Password" name="password" placeholder="Enter Password" required>
        <div class="src">
            <button type="submit" name="signin" value="Submit">Submit</button>
            <button type="reset" name="" value="Reset">Reset</button>
            <button type="button" onclick="document.location='portal.php'">Cancel</button>
        </div>
        <div class="CS">
            <a href="#" id="forgot">Forgot Password?</a>
            <p>Don't have an account? <a href="reg.php">Sign Up</a>.</p>
        </div>


    </form>
</body>

</html>