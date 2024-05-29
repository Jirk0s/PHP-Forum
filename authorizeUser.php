<?php
    require_once("functions.php");
    session_start();
    if(!isset($_SESSION["loguser"]["id"])){
        go("login.php");
    }else {
        if($_SESSION["loguser"]["time"] <= time()) {
            session_destroy();
            go("login.php");
        }else {
        $_SESSION["loguser"]["time"] = time()+6000;
        }
    }
?>