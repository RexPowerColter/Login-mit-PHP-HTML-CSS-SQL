<?php

include "../classes/Authorization.php";
include "../connection.php";



$authorization = new Authorization($con);
$authorization->check();

if($authorization->check() == true) {
    include "../view/login_view.php";
} else {
    header("location: login.php");
}