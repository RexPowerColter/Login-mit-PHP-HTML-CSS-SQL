<?php

include "../classes/Authorization.php";
include "../connection.php";

session_start();

$authorization = new Authorization($con);
$authorization->login($_POST);