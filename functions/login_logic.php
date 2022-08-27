<?php

include "../connection.php";
require "../set_session.php";





if (isset($_POST["send"])) {


    $login_query = $con->prepare("SELECT * FROM login WHERE login.username = ?");
    $login_query->bind_param("s", $_POST["username"]);
    $login_query->execute();
    $result = $login_query->get_result();
    $data_login = $result->fetch_assoc();


    if ($_POST["username"] == $data_login["username"] && md5($_POST["password"]) == $data_login["password"]) {
        $_SESSION["logged_in"] = true;
        $_SESSION["user"] = $_POST["username"];

        header("location: ../view/index.php");
    } elseif (!isset($data_login["username"])) {
        echo "<p id='failed'> &#10007 User does not exist or the field isnt filled out.";
    } elseif (!isset($data_login["password"])) {
        echo "<p id='failed'> &#10007 Password is not set.";
    } else {
        echo "<p id='failed'> &#10007 Username or password is wrong";
    }
}