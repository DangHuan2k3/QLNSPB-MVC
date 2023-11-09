<?php
class Model_Admin
{
    public function isLogin($username, $password)
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        $query = "SELECT * FROM `admin` WHERE `username` = '" . $username . "' and `password` = '" . $password . "'";

        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {
            return true;
        }

        return false;
    }
}
