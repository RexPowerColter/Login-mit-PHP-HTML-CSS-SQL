<?php
//This part here is used to get the content form the html header file, we will refactor this an make a static loader at the end.

require "header.php";
include "../connection.php";


?>
<body>

<h1>Login Screen</h1>


<main>
    <form action="../controller/login.php" method="POST">
        <fieldset>
        <legend>Login</legend>
            <label for="username">Username</label>
            <input value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" name="username" type="text">
            <br>
            <label for="password">Password</label>
            <input value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" name="password" type="password">
            <br>
            <input type="submit" name="send" value="Submit">
            <input type="reset" value="Reset">
        </fieldset>
    </form>
</main>
    
</body>
</html>