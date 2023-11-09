<?php

include_once('../Model/M_PhongBan.php');
include_once('../Model/M_NhanVien.php');


class Controller_PhongBan
{
    public function invoke()
    {
        if (isset($_REQUEST['mod1'])) {
            if (!isset($_REQUEST['IDPB'])) {
                $M_PhongBan = new Model_PhongBan();
                $phongBans = $M_PhongBan->getAllPhongBans();
                include_once('../View/Show/PhongBan/View_PhongBanList.html');
            }
        }

        if (isset($_REQUEST['mod3'])) {
            if (isset($_REQUEST['action'])) {
                $M_PhongBan = new Model_PhongBan();
                $result = $M_PhongBan->add(new Entity_PhongBan($_REQUEST['IDPB'], $_REQUEST['tenpb'], $_REQUEST['mota']));

                if ($result) {
                    $phongBans = $M_PhongBan->getAllPhongBans();
                    include_once('../View/Show/PhongBan/View_PhongBanList.html');
                } else {
                    echo 'Không thể thêm phòng ban này mới';
                }
            } else {

                $M_PhongBan = new Model_PhongBan();

                $phongbans = $M_PhongBan->getAllPhongBans();

?>
                <script>
                    function checkExistID() {
                        var IDPBs = [];
                        <?php
                        for ($i = 0; $i < sizeof($phongbans); $i++) {
                        ?>
                            IDPBs.push("<?php echo $phongbans[$i]->id ?>");
                        <?php
                        }
                        ?>

                        var IDPBnew = document.formChenPB.IDPB.value;

                        if (IDPBs.includes(IDPBnew)) {
                            alert('Tồn tại nhân viên có ID này rồi');
                            document.formChenPB.IDPB.value = "";
                            document.formChenPB.IDPB.focus();
                        }

                    }
                </script>
<?php
                include_once('../View/Add/PhongBan/View_FormAdd.html');
            }
        }
    }
}


$C_PhongBan = new Controller_PhongBan();
$C_PhongBan->invoke();
