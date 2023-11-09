<?php
session_start();
if (!isset($_SESSION['isloggedin'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>

    </head>

    <body bgcolor="#4dffd2">
        <table>
            <tr>
                <td><a href="T3.php" target="frameMainContent">Trang chủ</a></td>
            </tr>
            <tr>
                <td><a href="./Controller/Controller_NhanVien.php?mod1='1'" target="frameMainContent">Xem thông tin nhân viên</a></td>
            </tr>
            <tr>
                <td><a href="./Controller/Controller_PhongBan.php?mod1='1'" target="frameMainContent">Xem thông tin phòng ban</a></td>
            </tr>
            <tr>
                <td><a href="./Controller/Controller_NhanVien.php?mod2='1'" target="frameMainContent">Tìm kiếm nhân viên</a></td>
            </tr>
            <tr>
                <td><a href="./Controller/Controller_NhanVien.php?mod3='1'" target="frameMainContent" hidden>Thêm nhân viên</a></td>
            </tr>
            <tr>
                <td><a href="./Controller/Controller_PhongBan.php?mod3='1'" target="frameMainContent" hidden>Thêm phòng ban</a></td>
            </tr>
            <tr>
                <td><a href="./Controller/Controller_NhanVien.php?mod4='1'" target="frameMainContent" hidden>Thêm nhân viên</a></td>
            </tr>

        </table>
    </body>

    </html>


<?php
}
?>