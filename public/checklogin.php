<?php
session_start();
if($_REQUEST['usr']=="admin" && $_REQUEST['pswd']=="WWmattnunn253"){
    $_SESSION['usr'] = "admin";
 $_SESSION['pswd'] = "WWmattnunn253";
 header("Location: index.php?page=admin");
 }
else {
    header("Location: index.php?page=login");
}

