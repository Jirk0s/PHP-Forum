<?php
    require_once("functions.php");
    require_once("dbconnect.php");
    if (isset($_SESSION["loguser"]["id"])) {
        $id = $_SESSION["loguser"]["id"];
        $query = "SELECT id FROM forums WHERE owner =:id";
        $q = $db->prepare($query);
        $q->execute(array(":id"=> $id));
        if ($q->rowCount() > 0) {
            foreach ($q as $item){
                go("forum.php?id=".$item["id"]);
            }
        }
    } else{
        go("login.php");
    }
?>