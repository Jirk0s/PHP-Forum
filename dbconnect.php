<?php
    $dbhost = "";
    $dbcharset = "utf8";
    $dbname = "";
    $dbuser = "";
    $dbpass = "";
    $dbtype = "mysql";
    try{
        if(!isset($db) || empty($db)){
            $db = new PDO($dbtype.":host=".$dbhost.";dbname=".$dbname.";charset=".$dbcharset,$dbuser,$dbpass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        //if($db) echo "Database connection established<br>";
    }catch(PDOException $e){
        echo "Problém s navázáním spojení s DB:".$e->getMessage()."";
        die(); //exit();
    }
?>