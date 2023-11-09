<?php

include_once('E_NhanVien.php');
class Model_NhanVien
{
    public function getAllNhanViens()
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        $query = "SELECT * FROM `nhanvien`";

        $result = mysqli_query($link, $query);
        $nhanviens = new ArrayObject();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $nhanviens[$i++] = new Entity_NhanVien($row['IDNV'], $row['hoten'], $row['IDPB'], $row['diachi']);
        }

        return $nhanviens;
    }

    public function getNhanVien($id)
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        $query = "SELECT * FROM `nhanvien` WHERE `IDNV` = '" . $id . "'";

        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_assoc($result);
        $nhanvien = new Entity_NhanVien($row['IDNV'], $row['hoten'], $row['IDPB'], $row['diachi']);

        return $nhanvien;
    }

    public function getNhanViensByIDPB($idpb)
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        $query = "SELECT * FROM `nhanvien` WHERE `IDPB` = '" . $idpb . "'";

        $result = mysqli_query($link, $query);

        $nhanviens = new ArrayObject();

        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $nhanviens[$i++] = new Entity_NhanVien($row['IDNV'], $row['hoten'], $row['IDPB'], $row['diachi']);
        }

        return $nhanviens;
    }

    public function filterNhanVien($field, $input)
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        if ($field != "IDNV")
            $query = "SELECT * FROM `nhanvien` WHERE `" . $field . "` LIKE '%" . $input . "%'";
        else
            $query = "SELECT * FROM `nhanvien` WHERE `" . $field . "` LIKE '" . $input . "'";

        echo $query;

        $nhanviens = new ArrayObject();

        $result = mysqli_query($link, $query);

        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $nhanviens[$i++] = new Entity_NhanVien($row['IDNV'], $row['hoten'], $row['IDPB'], $row['diachi']);
        }

        return $nhanviens;
    }

    public function add($nhanvien)
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        $query = "INSERT INTO `nhanvien`(`IDNV`, `hoten`, `IDPB`, `diachi`) VALUES ('" . $nhanvien->IDNV . "','" . $nhanvien->hoten . "','" . $nhanvien->IDPB . "','" . $nhanvien->diachi . "')";
        echo $query;
        $result = mysqli_query($link, $query);

        return $result;
    }

    public function update($nhanvien)
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        $query = "UPDATE `nhanvien` SET `hoten`='" . $nhanvien->hoten . "',`IDPB`='" . $nhanvien->IDPB . "',`diachi`='" . $nhanvien->diachi . "' WHERE `IDNV` = '" . $nhanvien->IDNV . "'";
        echo $query;
        $result = mysqli_query($link, $query);

        return $result;
    }

    public function delete($id)
    {
        $link = mysqli_connect("localhost", "root", "");

        mysqli_select_db($link, "baitapapdung");

        $query = "DELETE FROM `nhanvien` WHERE `IDNV` = '" . $id . "'";
        echo $query;
        mysqli_query($link, $query);
    }
}
