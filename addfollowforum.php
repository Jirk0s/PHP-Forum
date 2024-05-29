<?php
    require_once("dbconnect.php");
    require_once("functions.php");
    require_once("authorizeUser.php");
    if(isset($_GET["id"])){
        try{
        $id = $_GET["id"];
        $query="SELECT * FROM followersforum WHERE UserID = :userFrom AND ForumID = :ForumID";
        $q = $db->prepare($query);
        $q->execute(array(":userFrom" => $_SESSION["loguser"]["id"], ":ForumID" => $id));
        if($q->rowCount()== 0){
            $query = "INSERT INTO followersforum (UserID, ForumID) VALUES (:userFrom, :ForumID)";
            $q = $db->prepare($query);
            $q->execute(array(":userFrom" => $_SESSION["loguser"]["id"], ":ForumID" => $id));
            go("forum.php?id=".$id);
        }else{
            $query = "DELETE FROM followersforum WHERE UserID = :userFrom AND ForumID = :userTarget";
            $q = $db->prepare($query);
            $q->execute(array(":userFrom" => $_SESSION["loguser"]["id"], ":userTarget" => $id));
            go("forum.php?id=".$id);
        }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else go("index.php");
?>