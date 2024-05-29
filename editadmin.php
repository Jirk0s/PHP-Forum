<?php
    require_once("dbconnect.php");
    require_once("functions.php");
    require_once("authorizeAdmin.php");
    switch($_GET["type"]){
        case "user":{
            try{
            $username = $_POST["username"];
            $email = $_POST["mail"];
            $date = $_POST["birthdate"];
            $password = $_POST["password"];
            echo $username."   ".$email."   ".$date."   ".$password."";
            if(isset($_POST["admin"]) && $_POST["admin"] === "1"){
                $adminstatus = 1;
            }else $adminstatus = "";
            if(isset($_FILES['file'])){
                $status = imageUpload('file');
                if($status == "error"){
                    //Error 5 error Upload
                    go("usersadmin.php?id=".$id."&error=2");
                    exit();
                }else{
                    if($status == "noImage"){
                        $uploadError = 0;
                        $path = "noimage";
                    }else{
                        $path = $status;
                    }
                }
            }else{
                $path = "noimage";
            }
            if($path != "noimage"){
                $query = "update users set profile_picture = :image where id = :id";
                $q = $db->prepare($query);
                $q->execute(array(":image" => $path, ":id" => $_GET["id"]));
            }
            if(isset($birthdate) && !empty($birthdate)){
                $query = "update users set birthdate = :birthdate where id = :id";
                $q = $db->prepare($query);
                $q->execute(array(":birthdate" => $birthdate, ":id" => $_GET["id"]));
            }
            if(isset($password) && !empty($password)){
                $query = "update users set password = :password where id = :id";
                $q = $db->prepare($query);
                $q->execute(array(":password" => md5($password), ":id" => $_GET["id"]));
            }
            $query = "update users set username = :username, email = :mail where id = :id";
            $q = $db->prepare($query);
            $q->execute(array(":username" => $username, ":mail" => $email, ":id" => $_GET["id"]));
            if($adminstatus == 1){
                $query = "update users set adminstatus = 1 where id = :id";
                $q = $db->prepare($query);
                $q->execute(array(":id" => $_GET["id"]));
            }else{
                $query = "update users set adminstatus = null where id = :id";
                $q = $db->prepare($query);
                $q->execute(array(":id" => $_GET["id"]));
            }
            go("useradmin.php?id=".$_GET["id"]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        }
            break;
        case "forum":{
            if(isset($_GET["id"])){
                $query = "SELECT id FROM forums where id = :id";
                try{
                $q = $db->prepare($query);
                $q->execute(array(":id" => $_GET["id"]));
                if($q->rowCount() > 0){
                    $id = $_GET["id"];
                    $name = $_POST["nazev"];
                    $description = $_POST["Popis"];
                    $theme = $_POST["theme"];
                    $owner = $_POST["majitel"];
                    if(isset($_FILES['file'])){
                        $status = imageUpload('file');
                        if($status == "error"){
                            //Error 5 error Upload
                            go("forumadmin.php?id=".$id."&error=1");
                            exit();
                        }else{
                            if($status == "noImage"){
                                $uploadError = 0;
                                $path = "noimage";
                            }else{
                                $path = $status;
                            }
                        }
                    }else{
                        $path = "noimage";
                    }
                    if($path != "noimage"){
                        $query = "update forums set icon = :image where id = :id";
                        $q = $db->prepare($query);
                        $q->execute(array(":image" => $path, ":id" => $_GET["id"]));
                    }
                    $query = "UPDATE forums SET name = :name, description = :description, theme = :theme, owner = :owner WHERE id = :id";
                    $q = $db->prepare($query);
                    $q->execute(array(":name" => $name, ":description" => $description, ":theme" => $theme, ":owner" => $owner, ":id" => $_GET["id"]));
                    go("forumadmin.php?id=".$_GET["id"]);
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            }else{
                go("index.php");
            }
        }
    }
?>