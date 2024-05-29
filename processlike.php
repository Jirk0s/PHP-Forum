<?php
    require_once("dbconnect.php");
    require_once("functions.php");
    $userID = $_POST['userID'];
    $postID = $_POST['postID'];
    try{
            $query = "SELECT UserID, PostID FROM likesdislikes WHERE UserID = :userID AND PostID = :postID";
            $q = $db->prepare($query);
            $q->execute(array(":userID" => $userID, ":postID" => $postID));

            if($q->rowCount() == 0){
                $query = "INSERT INTO likesdislikes (UserID, PostID) VALUES (:userID, :postID)";
                $q = $db->prepare($query);
                $q->execute(array(":userID" => $userID, ":postID" => $postID));
                $query = "SELECT count(PostID) FROM likesdislikes WHERE PostID = :postID";
                $q = $db->prepare($query);
                $q->execute(array(":postID" => $postID));
                $item = $q->fetch(PDO::FETCH_ASSOC);
                echo $item['count(PostID)'];
            } else {
                $query = "DELETE FROM likesdislikes WHERE UserID = :userID AND PostID = :postID";
                $q = $db->prepare($query);
                $q->execute(array(":userID" => $userID, ":postID" => $postID));
                $query = "SELECT count(PostID) FROM likesdislikes WHERE PostID = :postID";
                $q = $db->prepare($query);
                $q->execute(array(":postID" => $postID));
                $item = $q->fetch(PDO::FETCH_ASSOC);
                echo $item['count(PostID)'];
            }
    }catch(PDOException $e){
        go("login.php");
    }
?>