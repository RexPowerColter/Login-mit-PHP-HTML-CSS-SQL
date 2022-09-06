<?php

class connection {
    function get_con() {
        return new mysqli("localhost", "root", "root", "login");
    }
}