
<?php
//This part here is used to get the content form the html header file, we will refactor this an make a static loader at the end.
require "html_header.php";
require "../functions/check_user_login.php";
require "../set_session.php";
login_user_check($con);
?>

<body>

<p>Hello this is the indexpage :)</p>
    
</body>
</html>