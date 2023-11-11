<?php
include_once("../Model/M_Admin.php");
class Controller_Admin
{
    public function invoke()
    {

        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == 'login') {
                $M_Admin = new Model_Admin();
                if ($M_Admin->isLogin($_REQUEST['txtUsername'], $_REQUEST['txtPassword'])) {
                    echo "Dang nhap thanh cong";
                    $_SESSION['isloggedin'] = '1';

?>
                    <script>
                        window.top.tab.location.href = '../T2_login.php';
                        window.top.header.location.href = '../T1.php';
                    </script>
                <?php
                    return;
                } else {
                    echo "Dang nhap that bai";
                    include('../View/Login/View_login.html');
                    return;
                }
            }
            if ($_REQUEST['action'] == 'logout') {
                include('../View/Login/View_login.html');
                ?>
                <script>
                    window.top.tab.location.href = '../T2.php';
                </script>
<?php
            }
        } else {
            include('../View/Login/View_login.html');
        }
    }
}

$C_Admin = new Controller_Admin();
$C_Admin->invoke();
