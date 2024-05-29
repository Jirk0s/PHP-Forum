<?php
require_once("dbconnect.php");
require_once("functions.php");
require_once("authorizeUser.php");

if(isset($_GET["type"]) && isset($_GET["id"])){
    $id = $_GET["id"];
    $userid = $_SESSION["loguser"]["id"];
    
    switch($_GET["type"]){
        case "user":
            if(isset($_POST["email"]) && isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password1"]) && ($id == $userid || $_SESSION["loguser"]["adminstatus"] > 0)){
                $username = $_POST["username"];
                $myMail = $_SESSION["loguser"]["mail"];
                $password = $_POST["password"];
                $mail = $_POST["email"];

                //FILE
                $uploadError = 0;
                $path = "";

                if(isset($_FILES['newAvatar'])){
                    $status = imageUpload('newAvatar');
                    if($status == "error"){
                        //Error 5 error Upload
                        go("editprofile.php?id=".$userid."&error=5");
                        exit();
                    }else{
                        if($status == "noImage"){
                            $uploadError = 0;
                            $path = $_SESSION["loguser"]["profile_picture"];
                        }else{
                            $path = $status;
                        }
                    }
                }else{
                    $path = $_SESSION["loguser"]["profile_picture"];
                }

                //echo $username . " | " . $password ." | ". $myMail ." | " . $path. " | " . $mail. "PASS: ";

                if($userid != $id){
                    go("index.php");
                }elseif(trim($mail) != trim($myMail)){
                    //ERROR 3 Maily se neshodují
                    go("editprofile.php?id=".$userid."&error=3");
                    // Error = 3
                }elseif(!isValidUsername($username)){
                    //Error 4 Validní Username
                    go("editprofile.php?id=".$userid."&error=4");
                    // Error = 4
                }else{
                    try{
                    $query = "SELECT password FROM users WHERE id = :id AND password = :password";
                    $q = $db->prepare($query);
                    $q->execute(array(":id" => $userid, ":password" => md5($password)));
                    $data = $q->fetch(PDO::FETCH_ASSOC);
                    //echo $data["password"]. "  Pass2: " . md5($_POST["password1"]);
                    if($q->rowCount() > 0){
                        if(isset($_POST["password1"]) && !empty($_POST["password1"])){
                            $query = "UPDATE users SET password = :password1 WHERE id = :id";
                            $q = $db->prepare($query);
                            $q->execute(array(":password1" => md5($_POST["password1"]), ":id" => $userid));
                        }
                        if(isset($_POST["email1"]) && !empty($_POST["email1"])){
                            $query = "UPDATE users SET email = :email1 WHERE id = :id";
                            $q = $db->prepare($query);
                            $q->execute(array(":email1" => $_POST["email1"], ":id" => $userid));
                            $_SESSION["loguser"]["mail"] = $_POST["email1"];
                        }                        
                        $query = "UPDATE users SET username = :username, profile_picture = :profile_picture WHERE id = :id";
                        $q = $db->prepare($query);
                        $q->execute(array(":username" => $username, ":profile_picture" => $path, ":id" => $userid));
                        $_SESSION["loguser"]["username"] = $username;
                        $_SESSION["loguser"]["profile_picture"] = $path;
                        go("profil.php?id=".$userid);
                    }else go("editprofile.php?id=".$userid."&error=1");
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
            }else{
                //Error 2 Není nastavené
                go("editprofile.php?id=".$userid."&error=2");
            }
            break;

        case "forum":{
            if(isset($_POST["nazev"]) && isset($_POST["popis"])){
                $nazev = $_POST["nazev"];
                $description = nl2br2(disableAttributes($_POST["popis"]));
                $uploadError = 0;
                $path = "";
                if(!isValidForumName($nazev)){
                    go("forum.php?id=".$_GET["id"]."&error=1");
                }else{
                    if(isset($_FILES['file'])){
                        $status = imageUpload('file');
                        if($status == "error"){
                            //Error 5 error Upload
                            go("editforum.php?id=".$id."&error=2");
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
                    $query = "UPDATE forums SET name = :name, description = :description WHERE id = :id";
                    $q = $db->prepare($query);
                    $q->execute(array(":name" => $nazev, ":description" => $description, ":id" => $_GET["id"]));
                    if($path != "noimage"){
                        $query = "UPDATE forums SET icon = :picture WHERE id = :id";
                        $q = $db->prepare($query);
                        $q->execute(array(":picture" => $path, ":id" => $_GET["id"]));
                    }
                    go("forum.php?id=".$_GET["id"]);
                }
            }else{
                go("forum.php?id=".$_GET["id"]."&error=2");
                //echo $_POST["nazev"]. "   ". $_POST["popis"];
            }
        }
            break;
    }
}
?>
