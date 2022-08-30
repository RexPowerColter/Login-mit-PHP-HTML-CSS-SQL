<?php
include "../connection.php";
require "../set_session.php";

if (isset($_POST["send"])) {

    $username = $_SESSION["user"];

    $login_query = $con->prepare("SELECT * FROM login WHERE login.username = ?");
    $login_query->bind_param("s", $username);
    $login_query->execute();
    $result = $login_query->get_result();
    $data_login = $result->fetch_assoc();

if (md5($_POST["password"]) == $data_login["password"] && $_POST["new_password"] == $_POST["confirm_password"] && md5($_POST["new_password"]) != $data_login["password"] && md5($_POST["confirm_password"]) != $data_login["password"] && $_POST["new_password"] != '' && $_POST["confirm_password"] != '') {
    $ps = $con->prepare("UPDATE login SET password = ? WHERE login.id = ?");
    $ps->bind_param("si", md5($_POST["new_password"]), $data_login["id"]);
    $ps->execute();
  
    header("location: ../view/index.php");
    $_SESSION["logged_in"] = true;
} elseif ($_POST["confirm_password"] == '' && $_POST["new_password"] == '') {
    echo "<p id='failed'> &#10007 New password cannot be null.";
} else {
    echo "<p id='failed'> &#10007 Fill out all the fields.";
}

}