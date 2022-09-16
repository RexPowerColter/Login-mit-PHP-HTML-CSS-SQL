<style>
    body {
        background: linear-gradient(56deg, rgba(0,0,0,1) 0%, <?= isset($_SESSION['color']) ? $_SESSION['color'] : '#808080' ?> 100%);
    }
</style>

<section id="login_section">
    <p>You are logged in as <b><?= $_SESSION["user"] ?></b></p>
    <section>
        <a href="reset_pwd.php" class="link_btns">Change Password</a>
        <a href="../controller/logout.php" class="link_btns">Logout</a>
    </section>
</section>