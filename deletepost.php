<?php
    require("functions.php");
    require("dbconnect.php");
    require("authorizeUser.php");
    session_start();
    if(isset($_GET["postID"])){
    $query= "SELECT * from LikesDislikes where PostID = :id AND PostOwner = :owner OR ForumOwner = :owner";
    $q = $db->prepare($query);
    $q->execute(array(":id" => $_GET["postID"], ":owner" => $_SESSION["loguser"]["id"]));
    if($q->rowCount()> 0){
        $info = $q->fetch(PDO::FETCH_ASSOC);
        $forumID = $info["ForumID"];
        $query= "DELETE from Posts where ID = :id";
        $q = $db->prepare($query);
        $q->execute(array(":id" => $_GET["postID"]));
        go("forum.php?id=". $forumID);
    }elseif($_SESSION["loguser"]["adminstatus"]>0){
        $query= "SELECT * from LikesDislikes where PostID = :id";
        $q = $db->prepare($query);
        $q->execute(array(":id" => $_GET["postID"]));
        $info = $q->fetch(PDO::FETCH_ASSOC);
        $forumID = $info["ForumID"];
        $query= "DELETE from Posts where ID = :id";
        $q = $db->prepare($query);
        $q->execute(array(":id" => $_GET["postID"]));
        go("forum.php?id=". $forumID);
    }else go("index.php");
}else go("index.php");
?>