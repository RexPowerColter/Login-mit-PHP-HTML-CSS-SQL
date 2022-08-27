<?php
include "../connection.php";



function login_user_check($con) {

//Checks if the current User is set and if its not then bring the user back to the login.php file.
if (isset($_SESSION["user"])) {


    //Query to get all data from login table in database.
    $login_query = $con->prepare("SELECT * FROM login WHERE username = ?");
    $login_query->bind_param("s", $_SESSION["user"]);
    $login_query->execute();
    $result = $login_query->get_result();
    $data_login = $result->fetch_assoc();

        ?>
<section id="login_section">
    <p>You are logged in as <b><?= $_SESSION["user"] ?></b></p>
    <a href="reset_pwd.php">Change Password</a>
    <a href="../functions/logout.php">Logout</a>
</section>
<?php


        } else {
            header("location: login.php");

        }


    
}