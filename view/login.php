<?php
//This part here is used to get the content form the html header file, we will refactor this an make a static loader at the end.
require "html_header.php";
?>
<body>

<h1>Login Screen (Name here is placeholder for now...)</h1>


<main>
    <form action="../logic/login_logic.php" method="POST">
        <section>
            <label for="username">Username</label>
            <input name="username" type="text">
            <br>
            <label for="password">Password</label>
            <input name="password" type="password">
        </section>
        <section>
            <input type="submit" name="send" value="Submit">
            <input type="reset" value="Reset">
        </section>
    </form>
</main>
    
</body>
</html>