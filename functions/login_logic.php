<?php

require "../connection.php";

function login() {

    $login_query = $con->prepare("SELECT * FROM login WHERE login.username = ?");
    $login_query->bind_param("s", $_POST["username"]);
    $login_query->execute();
}