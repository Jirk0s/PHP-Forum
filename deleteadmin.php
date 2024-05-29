<?php
require_once("dbconnect.php");
require_once("functions.php");
require_once("authorizeAdmin.php");
if(isset($_GET["id"]) && isset($_GET["type"])){
    $id = $_GET["id"];
    $type = $_GET["type"];
    switch($type){
        case "user":
            $query = "DELETE FROM users WHERE id = :id";
            break;
        case "forum":
            $query = "DELETE FROM forums WHERE id = :id";
            break;
        default:{
            go("admin.php");
            exit();
        }
    }
    try{
        $q = $db->prepare($query);
        $q->execute(array(":id" => $id));
        go("admin.php");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>