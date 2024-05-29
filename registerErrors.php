<?php
 require_once("functions.php");
 if(isset($_GET["error"])){
 $error = $_GET["error"];
    switch($error){
        case 1: printError($errorMessages["notValidUsername"]);
        break;
        case 2: printError($errorMessages["smallPass"]);
        break;
        case 3: printError($errorMessages["notEnoughNumbers"]);
        break;
        case 4: printError($errorMessages["notEquals"]);
        break;
        case 5: printError($errorMessages["notOlderThanTen"]);
        break;
        case 7: printError($errorMessages["notValidImage"]);
        break;
        case 6: printError($errorMessages["noTerms"]);
        break;
        case 8: printError("Vyplňte prosím všechna pole.");
    }
}
?>