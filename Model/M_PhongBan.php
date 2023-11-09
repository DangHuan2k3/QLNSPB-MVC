<?php
include_once('E_PhongBan.php');
class Model_PhongBan
{
    function getAllPhongBans()
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        $query = "SELECT * FROM `phongban`";

        $result = mysqli_query($link, $query);

        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $phongBans[$i++] = new Entity_PhongBan($row['IDPB'], $row['tenpb'], $row['mota']);
        }

        return $phongBans;
    }

    function add($phongban)
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        $query = "INSERT INTO `phongban`(`IDPB`, `tenpb`, `mota`) VALUES ('" . $phongban->id . "','" . $phongban->tenpb . "','" . $phongban->mota . "')";

        $result = mysqli_query($link, $query);

        return $result;
    }
}
