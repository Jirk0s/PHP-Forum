<?php
    require_once("dbconnect.php");
    require_once("functions.php");
    $userID = $_POST['userID'];
    $commentID = $_POST['commentID'];
    try{
            $query = "SELECT User, CommentID FROM commentslikes WHERE User = :userID AND CommentID = :commentID";
            $q = $db->prepare($query);
            $q->execute(array(":userID" => $userID, ":commentID" => $commentID));

            if($q->rowCount() == 0){
                $query = "INSERT INTO commentslikes (User, CommentID) VALUES (:userID, :commentID)";
                $q = $db->prepare($query);
                $q->execute(array(":userID" => $userID, ":commentID" => $commentID));
                $query = "SELECT count(CommentID) FROM commentslikes WHERE CommentID = :commentID";
                $q = $db->prepare($query);
                $q->execute(array(":commentID" => $commentID));
                $item = $q->fetch(PDO::FETCH_ASSOC);
                echo $item['count(CommentID)'];
            } else {
                $query = "DELETE FROM commentslikes WHERE User = :userID AND CommentID = :commentID";
                $q = $db->prepare($query);
                $q->execute(array(":userID" => $userID, ":commentID" => $commentID));
                $query = "SELECT count(CommentID) FROM commentslikes WHERE CommentID = :commentID";
                $q = $db->prepare($query);
                $q->execute(array(":commentID" => $commentID));
                $item = $q->fetch(PDO::FETCH_ASSOC);
                echo $item['count(CommentID)'];
            }
    }catch(PDOException $e){
        echo $e->getMessage();
        //go("login.php");
    }
?>