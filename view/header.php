<?php

require "../connection.php";
require "../session_starter.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <style>
    body {
        background: linear-gradient(56deg, rgba(0,0,0,1) 0%, <?= isset($_SESSION['color']) ? $_SESSION['color'] : '#808080' ?> 100%);
        background-size: 120% 120%;
        animation: gradient-animation 10s ease infinite;
}

::selection {
  background: rgba(255, 255, 255, 0.750);
  color: <?= isset($_SESSION['color']) ? $_SESSION['color'] : '#808080' ?>;
}

@keyframes gradient-animation {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
    </style>
    <title>Login</title>
</head>

