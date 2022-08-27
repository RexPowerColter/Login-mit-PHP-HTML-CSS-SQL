<?php

include "../connection.php";
require "../set_session.php";



unset($_SESSION["user"]);
header("location: ../view/login.php");