<?php

class Authorization {

    /**
     * Is used to establish a connection to db.
     */
    private $con = null;

    function __construct($con) {
        $this->con = $con;
    }

    function login($post_data) {

        $con = $this->con;

        if (isset($_POST["send"])) {

            $login_query = $con->prepare("SELECT * FROM login WHERE login.username = ?");
            $login_query->bind_param("s", $_POST["username"]);
            $login_query->execute();
            $result = $login_query->get_result();
            $data_login = $result->fetch_assoc();

            if ($_POST["username"] != "" && $_POST["password"] != "" && $_POST["username"] == $data_login["username"] && md5($_POST["password"]) == $data_login["password"]) {
                $_SESSION["logged_in"] = true;
                $_SESSION["user"] = $_POST["username"];

                header("location: ../view/index.php");
            } elseif (!isset($data_login["username"])) {
                echo "<p id='failed'> &#10007 User does not exist or the field isnt filled out.";
            } elseif (!isset($data_login["password"])) {
                echo "<p id='failed'> &#10007 Password is not set.";
            } else {
                echo "<p id='failed'> &#10007 Username or password is wrong";
            }
        }
    }

    function logout() {
        unset($_SESSION["user"]);
        unset($_SESSION["color"]);
        header("location: ../view/login.php");
    }

    function reset($post_data) {

        $con = $this->con;

        if (isset($_POST["send"])) {

            $username = $_SESSION["user"];
        
            $login_query = $con->prepare("SELECT * FROM login WHERE login.username = ?");
            $login_query->bind_param("s", $username);
            $login_query->execute();
            $result = $login_query->get_result();
            $data_login = $result->fetch_assoc();
        
        if (md5($_POST["password"]) == $data_login["password"] && $_POST["new_password"] == $_POST["confirm_password"] && md5($_POST["new_password"]) != $data_login["password"] && md5($_POST["confirm_password"]) != $data_login["password"] && $_POST["new_password"] != '' && $_POST["confirm_password"] != '') {
            $ps = $con->prepare("UPDATE login SET password = ? WHERE login.id = ?");
            $ps->bind_param("si", md5($_POST["new_password"]), $data_login["id"]);
            $ps->execute();
          
            header("location: ../view/index.php");
            $_SESSION["logged_in"] = true;
        } elseif ($_POST["confirm_password"] == '' && $_POST["new_password"] == '') {
            echo "<p id='failed'> &#10007 New password cannot be null.";
        } else {
            echo "<p id='failed'> &#10007 Fill out all the fields.";
        }
        
        }
    }

    function check() {


        //Checks if the current User is set and if its not then bring the user back to the login.php file.
        if (isset($_SESSION["user"])) {

            //Query to get all data from login table in database.
            $login_query = $this->con->prepare("SELECT * FROM login WHERE username = ?");
            $login_query->bind_param("s", $_SESSION["user"]);
            $login_query->execute();
            $result = $login_query->get_result();
            $data_login = $result->fetch_assoc();

            !isset($_SESSION['color']) ? $_SESSION['color'] = $data_login['color'] : $data_login['color'];
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }

    function color() {

        $con = $this->con;

        if (isset($_POST["send"])) {

            $login_query = $con->prepare("UPDATE login SET color = ? WHERE login.username = ?");
            $login_query->bind_param("ss", $_POST["color"], $_SESSION["user"]);
            $login_query->execute();

            $_SESSION["color"] = $_POST["color"];

            header("location: ../view/index.php");
        }
    }
}