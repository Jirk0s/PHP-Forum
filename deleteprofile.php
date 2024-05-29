<?php
    require_once("dbconnect.php");
    require_once("functions.php");
    require_once("authorizeUser.php");
    session_start();

    if($_GET["id"] != $_SESSION["loguser"]["id"]){
        go("editprofile.php?id=".$_SESSION["loguser"]["id"]);
        exit();
    }

    if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $query = "SELECT id FROM users WHERE email=:email AND password=:password";
        $q = $db->prepare($query);
        $q->execute(array(":email" => $email, ":password" => md5($password)));
        if($q->rowCount() > 0){
            $qurey = "DELETE FROM users WHERE id=:id";
            $q = $db->prepare($qurey);
            $q->execute(array(":id" => $_SESSION["loguser"]["id"]));
            session_destroy();
            go("index.php");
        }else{
            go("editprofile.php?id=".$_SESSION["loguser"]["id"]."&error=7");
        }
    }else{
        go("editprofile.php?id=".$_SESSION["loguser"]["id"]."&error=8");
    }
?>