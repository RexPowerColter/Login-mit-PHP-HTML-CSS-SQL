<?php

//This part here is used to get the content form the html header file, we will refactor this an make a static loader at the end.
require "header.php";
require "../controller/check.php";
?>

<h2>Password Change Screen</h2>

<body>
    <form id="login_form" action="../controller/reset.php" method="POST">
        <fieldset>
            <legend>Change Password</legend>

            <label for="">Old Password</label>
            <input type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
            <label for="">New Password</label>
            <input type="password" name="new_password" value="<?= isset($_POST['new_password']) ? $_POST['new_password'] : '' ?>">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" value="<?= isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>">
            <br>
                <input type="submit" name="send">
                <input type="reset">
        </fieldset>
    </form>

    <a href="index.php" class="link_btns">Back</a>

</html>