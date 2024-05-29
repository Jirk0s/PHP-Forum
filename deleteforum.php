<?php
    require_once("message.php");
    require("functions.php");
    require("dbconnect.php");
    require("authorizeUser.php");
    $query = "SELECT owner FROM forums WHERE id = :forumid";
    try{
        $q = $db->prepare($query);
        $q->execute(array(":forumid" => $_GET["id"]));
        $foruminf = $q->fetch(PDO::FETCH_ASSOC);
        if($foruminf["owner"] != $_SESSION["loguser"]["id"]){
            go("index.php");
            exit();
        }
        $userpass = $_POST["password"];
        $query = "select password from users WHERE id = :id";
        $q = $db->prepare($query);
        $q->execute(array(":id" => $_SESSION["loguser"]["id"]));
        $userinf = $q->fetch(PDO::FETCH_ASSOC);
        if(md5($userpass) != $userinf["password"]){
            echo "Špatné heslo";
        }else{
            $query = "DELETE FROM forums WHERE id=:id";
            $q = $db->prepare($query);
            $q->execute(array(":id"=> $_GET["id"]));
            go("profil.php?id=".$_SESSION["loguser"]["id"]);
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

?>