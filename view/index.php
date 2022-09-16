
<?php
//This part here is used to get the content form the html header file, we will refactor this an make a static loader at the end.

require "header.php";
require "../controller/check.php";

?>

<body>
<h1>Index Page</h1>
<form action="../controller/color.php" method="POST">
    <fieldset id="index_page">
            <legend>Change the Color of the Webpage</legend>
            <input type="color" name="color" id="color" value="<?= isset($_SESSION['color']) ? $_SESSION['color'] : '#808080' ?>">
            <section>
                <input type="submit" name="send" value="Submit">
                <input type="reset" value="Reset">
            </section>
    </fieldset>
</form>

<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
    </div >

    <?php
if (isset($_SESSION['messages'])) {
    $msgs = $_SESSION['messages'];
    foreach ($msgs as $msg) {
        echo $msg;
    }
    unset($_SESSION['messages']);
}
?>
    
</body>
</html>