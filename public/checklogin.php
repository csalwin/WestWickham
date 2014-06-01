<?php
session_start();
if($_REQUEST['usr']=="abc" && $_REQUEST['pswd']=="123"){
    $_SESSION['usr'] = "abc";
 $_SESSION['pswd'] = "123";
 header("Location: index.php?page=admin");
 }
else {
    header("Location: index.php?page=login");
}

