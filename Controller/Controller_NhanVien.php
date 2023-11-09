<?php

include_once('../Model/M_NhanVien.php');
include_once('../Model/M_PhongBan.php');


class Controller_NhanVien
{
    public function invoke()
    {
        if (isset($_REQUEST['mod1'])) {
            if (!isset($_REQUEST['IDPB'])) {
                $M_NhanVien = new Model_NhanVien();
                $nhanviens = $M_NhanVien->getAllNhanViens();
                include_once('../View/Show/NhanVien/View_NhanVienList.html');
            } else {
                $M_NhanVien = new Model_NhanVien();
                $nhanviens = $M_NhanVien->getNhanViensByIDPB($_REQUEST['IDPB']);
                include_once('../View/Show/NhanVien/View_NhanVien-PhongBan.html');
            }
        }

        if (isset($_REQUEST['mod2'])) {
            if (isset($_REQUEST['action'])) {
                $M_NhanVien = new Model_NhanVien();
                $nhanviens = $M_NhanVien->filterNhanVien($_REQUEST['field'], $_REQUEST['info_text']);
                include_once('../View/Filter/NhanVien/View_ListFilterNhanVien.html');
            } else {
                include_once('../View/Filter/NhanVien/View_FormFilterNhanVien.html');
            }
        }

        if (isset($_REQUEST['mod3'])) {
            if (isset($_REQUEST['action'])) {
                $M_NhanVien = new Model_NhanVien();
                $result = $M_NhanVien->add(new Entity_NhanVien($_REQUEST['IDNV'], $_REQUEST['hoten'], $_REQUEST['IDPB'], $_REQUEST['diachi']));

                if ($result) {
                    $nhanviens = $M_NhanVien->getAllNhanViens();
                    include_once('../View/Show/NhanVien/View_NhanVienList.html');
                } else {
                    echo 'Không thể thêm nhân viên mới';
                }
            } else {

                $M_PhongBan = new Model_PhongBan();
                $M_NhanVien = new Model_NhanVien();

                $phongbans = $M_PhongBan->getAllPhongBans();
                $nhanviens = $M_NhanVien->getAllNhanViens();
?>
                <script>
                    function checkExistID() {
                        var IDNVs = [];
                        <?php
                        for ($i = 0; $i < sizeof($nhanviens); $i++) {
                        ?>
                            IDNVs.push("<?php echo $nhanviens[$i]->IDNV ?>");
                        <?php
                        }
                        ?>

                        var IDNVnew = document.formChenNV.IDNV.value;

                        if (IDNVs.includes(IDNVnew)) {
                            alert('Tồn tại nhân viên có ID này rồi');
                            document.formChenNV.IDNV.value = "";
                            document.formChenNV.IDNV.focus();
                        }

                    }
                </script>
<?php
                include_once('../View/Add/NhanVien/View_FormAdd.html');
            }
        }

        if (isset($_REQUEST['mod4'])) {
            if (isset($_REQUEST['IDNV'])) {
                if (isset($_REQUEST['action'])) {
                    $M_NhanVien = new Model_NhanVien();
                    $result = $M_NhanVien->update(new Entity_NhanVien($_REQUEST['IDNV'], $_REQUEST['hoten'], $_REQUEST['IDPB'], $_REQUEST['diachi']));
                    if ($result) {
                        $nhanviens = $M_NhanVien->getAllNhanViens();
                        include_once('../View/Show/NhanVien/View_NhanVienList.html');
                    } else {
                        echo 'Không thể thêm nhân viên mới';
                    }
                } else {
                    $M_NhanVien = new Model_NhanVien();
                    $M_PhongBan = new Model_PhongBan();

                    $nhanvien = $M_NhanVien->getNhanVien($_REQUEST['IDNV']);
                    $phongbans = $M_PhongBan->getAllPhongBans();
                    include_once('../View/Update/NhanVien/View_FormUpdate.html');
                }
            } else {
                $M_NhanVien = new Model_NhanVien();
                $nhanviens = $M_NhanVien->getAllNhanViens();


                include_once('../View/Update/NhanVien/View_NhanVienList.html');
            }
        }
    }
}


$C_NhanVien = new Controller_NhanVien();
$C_NhanVien->invoke();
