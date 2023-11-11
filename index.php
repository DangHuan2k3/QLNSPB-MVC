<?php
session_start();
if (!isset($_SESSION['isloggedin'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <frameset rows="25%,*,10%" frameborder="0">
        <frame src="./Controller/Controller_Admin.php" name="header"> </frame>
        <frameset cols="25%,*" frameborder="0">
            <frame src="T2.php" name="tab"> </frame>
            <frame src="T3.php" name="frameMainContent"> </frame>
        </frameset>
        <frame src="T5.php"> </frame>
    </frameset>

    </html>
<?php
}
?>