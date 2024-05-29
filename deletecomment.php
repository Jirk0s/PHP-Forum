<?php
    require("functions.php");
    require("dbconnect.php");
    require("authorizeUser.php");
    try{
    if(isset($_GET["id"])){
    $query= "SELECT * FROM CommentsInfo
    WHERE CommentID = :id
      AND (CommentUserID = :owner OR PostOwner = :owner)
    ";
    $q = $db->prepare($query);
    $q->execute(array(":id" => $_GET["id"], ":owner" => $_SESSION["loguser"]["id"]));
    if($q->rowCount()> 0){
        $info = $q->fetch(PDO::FETCH_ASSOC);
        $postID = $info["PostParrentID"];
        $query= "DELETE from comments where ID = :id";
        $q = $db->prepare($query);
        $q->execute(array(":id" => $_GET["id"]));
        go("post.php?id=". $postID);
    }elseif($_SESSION["loguser"]["adminstatus"]>0){
        $query= "SELECT * from CommentsInfo where CommentID = :id";
        $q = $db->prepare($query);
        $q->execute(array(":id" => $_GET["id"]));
        $info = $q->fetch(PDO::FETCH_ASSOC);
        $postID = $info["PostParrentID"];
        $query= "DELETE from comments where ID = :id";
        $q = $db->prepare($query);
        $q->execute(array(":id" => $_GET["id"]));
        go("post.php?id=". $postID);
    }else go("index.php");
}else go("index.php");
}catch(PDOException $e){
    echo $e->getMessage();
}
?>