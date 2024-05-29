<?php
    require_once("dbconnect.php");
    require_once("functions.php");
    require_once("authorizeUser.php");
    if(isset($_GET["id"])){
        try{
        $id = $_GET["id"];
        if($_SESSION["loguser"]["id"] == $id) {
            go("profil.php?id=".$id);
            exit();
        }
        $query="SELECT * FROM UserFollowers WHERE UserFrom = :userFrom AND UserTarget = :userTarget";
        $q = $db->prepare($query);
        $q->execute(array(":userFrom" => $_SESSION["loguser"]["id"], ":userTarget" => $id));
        if($q->rowCount()== 0){
            $query = "INSERT INTO UserFollowers (UserFrom, UserTarget) VALUES (:userFrom, :user)";
            $q = $db->prepare($query);
            $q->execute(array(":userFrom" => $_SESSION["loguser"]["id"], ":user" => $id));
            go("profil.php?id=".$id);
        }else{
            $query = "DELETE FROM UserFollowers WHERE UserFrom = :userFrom AND UserTarget = :userTarget";
            $q = $db->prepare($query);
            $q->execute(array(":userFrom" => $_SESSION["loguser"]["id"], ":userTarget" => $id));
            go("profil.php?id=".$id);
        }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else go("index.php");
?>