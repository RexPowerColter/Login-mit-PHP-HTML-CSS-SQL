<?php
//This part here is used to get the content form the html header file, we will refactor this an make a static loader at the end.
require "html_header.php";
include "../connection.php";
include "../functions/login_logic.php";
require "../functions/check_user_login.php";


?>
<body>

<h1>Login Screen (Name here is placeholder for now...)</h1>


<main>
    <form action="../functions/login_logic.php" method="POST">
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