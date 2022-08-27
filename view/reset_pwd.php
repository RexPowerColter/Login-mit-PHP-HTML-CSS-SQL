<?php
//This part here is used to get the content form the html header file, we will refactor this an make a static loader at the end.
require "html_header.php";
require "../functions/check_user_login.php";
require "../functions/reset.php";
require "../set_session.php";

login_user_check($con);
?>

<h2>Password Change Screen</h2>

<body>
    <form id="login_form" action="../functions/reset.php" method="POST">
        <label for="">Old Password</label>
        <input type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
        <label for="">New Password</label>
        <input type="password" name="new_password" value="<?= isset($_POST['new_password']) ? $_POST['new_password'] : '' ?>">
        <label for="">Confirm Password</label>
        <input type="password" name="confirm_password" value="<?= isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>">
        <div id="submit_div">
            <input type="submit" name="send">
            <input type="reset">
        </div>
    </form>

</html>