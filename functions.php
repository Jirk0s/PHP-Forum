<?php

function go($destination = "index.php")
{
    header("Location: " . $destination);
    exit();
}

function viewMenus($page){
    include("message.php");
    if(isset($_SESSION["loguser"]["id"])){
      if($_SESSION["loguser"]["adminstatus"] == 1){
        viewMenu($navlinksAdmin, $page, 1);
      }else viewMenu($navlinkslogined, $page, 1);
    }else{
      viewMenu($navlinksunlogined, $page);
    }
}

function printError($message){
    echo '<div id="i1maqz">'.$message.'</div>';
}

//VIEW MENU

function viewMenu($menuItem, $active, $login = 0, $name = "nobody")
{
    echo '<div class="navbar" id="iww3tl">';
    echo '<div data-gjs="navbar" class="navbar-container" id="iizra3">';
    echo '<div id="i58iuu" class="navbar-burger">';
    echo '<div class="navbar-burger-line"></div>';
    echo '<div class="navbar-burger-line" id="il6hzs"></div>';
    echo '<div class="navbar-burger-line"></div>';
    echo '</div>';
    echo '<div data-gjs="navbar-items" class="navbar-items-c">';
    echo '<nav class="navbar-menu" id="iqyv0j">';
    //
    $i = 0;
    foreach ($menuItem as $text => $url) {
        if ($i == $active) echo '<a class="navbar-menu-link" id="ige6cj" href="' . $url . '" style="background-color:white; color:black;">' . $text . '</a>';
        else echo '<a class="navbar-menu-link" id="ige6cj" href="' . $url . '">' . $text . '</a>';
        $i++;
    }
    if ($login == 1) {
        if ($i == $active) {
            echo '<b><a class="navbar-menu-link" id="ige6cj" href="profil.php?id=' . $_SESSION["loguser"]["id"] . '"style="background-color:white; color:black;">' . $_SESSION["loguser"]["username"] . '</a></b>';
        } else {
            echo '<b><a class="navbar-menu-link" id="ige6cj" href="profil.php?id=' . $_SESSION["loguser"]["id"] . '">' . $_SESSION["loguser"]["username"] . '</a></b>';
        }
    }
    echo '</nav></div></div></div>';
}

//VALIDNÍ USERNAME

function isValidUsername($username) {
    $pattern = '/^[a-zA-Z0-9_\p{L} ]{3,20}$/u';
    if (preg_match($pattern, $username)) {
        return true;
    } else {
        return false;
    }
}
function isValidForumName($name) {
    $pattern = '/^[a-zA-Z0-9_\p{L} ()]{3,20}$/u';
    if (preg_match($pattern, $name)) {
        return true;
    } else {
        return false;
    }
}

function isValidDescription($name) {
    $pattern = '/^[a-zA-Z0-9_\p{L} ()]$/u';
    if (preg_match($pattern, $name)) {
        return true;
    } else {
        return false;
    }    
}

//DATUM < 10
function isOlderThanTen($birthdate) {
    $birthDateObj = new DateTime($birthdate);

    $currentDateObj = new DateTime();

    $ageDiff = $currentDateObj->diff($birthDateObj);

    $age = $ageDiff->y;

    return ($age >= 10);
}

//Nahrání obrázku
function imageUpload($image){
    $img_name = $_FILES[$image]['name'];
    $img_size = $_FILES[$image]['size'];
    $img_tmp = $_FILES[$image]['tmp_name'];
    $img_error = $_FILES[$image]['error'];

    if($img_error === 0){
        if($img_size <= 1206588){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_ext = array("jpeg", "jpg", "png");
            if(in_array($img_ex_lc, $allowed_ext)){
                $img_name = uniqid("IMG-",true).'.'. $img_ex_lc;
                $img_path = "uploads/".$img_name;
                move_uploaded_file($img_tmp, $img_path);
                return $img_path;
            }
            else{
                return "error";
            }
        }else{
            return "error";
        }
    }else{
        return "noImage";
    }
}

function alert($message){
    echo '<script>alert("'.$message.'")</script>';
}

function formatDate($date){
    $dateTime = new DateTime($date);
    return $dateTime->format('d.m.Y H:i');
}
function getidtype0000($id){
    return str_pad($id, 4, "0", STR_PAD_LEFT);
}
function disableAttributes($text) {
    $text = str_replace('<', '&lt;', $text);
    $text = str_replace('>', '&gt;', $text);
    $text = str_replace("    ", "&emsp;", $text);
    return $text;
}
function nl2br2($string) {
    return preg_replace('/\r?\n/', '<br>', $string);
}  
function maskEmail($email) {
    $parts = explode('@', $email);
    
    $username = $parts[0];
    $domain = $parts[1];
    
    $usernameLength = strlen($username);
    
    $maskedUsername = substr($username, 0, 3) . str_repeat('•', $usernameLength - 3);
    
    $maskedEmail = $maskedUsername . '@' . $domain;
    
    return $maskedEmail;
}

function getResult($prompt){
    include "dbconnect.php";
    $error = 0;
    if($prompt != 0){
        $query = $prompt;
        $error = 0; // inicializace proměnné $error
        if(stripos(strtolower($query), "password") !== false){
            $error = 1;
        }
        if(stripos(strtolower($query), "alter") !== false){
            $error = 2;
        }
        if(stripos(strtolower($query), "create") !== false){
            $error = 4;
        }
        if(stripos(strtolower($query), "drop") !== false){
            $error = 3;
        }
        if(stripos(strtolower($query), "*") !== false && stripos(strtolower($query), "users") !== false){
            $error = 1;
        }        
        try{
            if($error == 0){
            $q = $db->prepare($query);
            $q->execute();
            if ($q->rowCount() > 0) {
                while ($item = $q->fetch(PDO::FETCH_ASSOC)) {
                    foreach ($item as $key => $value) {
                        echo "    $key = $value / ";
                    }
                    echo "<br>";
                }
            }
        }else{
            switch($error){
                case 1:
                    echo "Nelze zobrazit heslo!";
                    break;
                case 2:
                    echo "Nelze editovat tabulky z databáze!";
                    break;
                case 3:
                    echo "Nelze odstranit tabulky z databáze!";
                    break;
                case 4:
                    echo "Nelze vytvořit tabulky v databázi!";
            }
        }
        }catch(PDOException $e){
            echo 'Špatně napsaný SQL dotaz <a style="cursor:help; font-weight: bold; font-size: 12px; position: relative; top:-3px;" title="'.$e->getMessage().'">?</a>';
        }
    }
}
