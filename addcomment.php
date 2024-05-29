<?php
require_once("functions.php");
require_once("dbconnect.php");
require_once("authorizeUser.php");
if(isset($_POST["comment"])){
    $query = "INSERT INTO comments(UserID, PostParrentID, Content) Values (:userID, :postID, :Content)";
    try{
    $q = $db->prepare($query);
    $q->execute(array("userID" => $_SESSION["loguser"]["id"],":postID" => $_GET["id"], ":Content" => nl2br2(disableAttributes($_POST["comment"]))));
    $destination = "post.php?id=".$_GET["id"];
    header("Location: ".$destination);
    exit;
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}else{
    go("index.php");
}
?>