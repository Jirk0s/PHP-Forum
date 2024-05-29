<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Register</title>
  <meta name="generator" content="GrapesJS Studio">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta property="og:type" content="website">
  <meta name="robots" content="index,follow">
  <link rel="stylesheet" href="styles/style.css">
</head>
<?php
require_once("dbconnect.php");
require_once("message.php");
include("functions.php");
?>

<body id="ii1rgb">
  <?php
  session_start();
  viewMenu($navlinksunlogined, 2);
  $umail = "";
  $uuser = "";

  if(isset($_GET["umail"])){
    $umail = base64_decode($_GET["umail"]);
  }
  if(isset($_GET["uuser"])){
    $uuser = base64_decode($_GET["uuser"]);
  }
  ?>
  <section id="i8lm3l" class="gjs-section">
    <div id="i1azg4" class="gjs-container">
      <form method="post" enctype="multipart/form-data">
        <div id="i71e5v" class="gjs-grid-row">
          <div id="i3kb6h" class="gjs-grid-column"><img id="iqqexq" src="assets/logo.png" />
            <div id="ihzqq4">Registrace</div>
            <input type="email" placeholder="Email" name="mail" id="ijn7lz" value="<?php echo $umail ?>" maxlength="40"/><input type="text" value="<?php echo $uuser ?>" maxlength="20" placeholder="Uživatelské jméno" name="username" id="ic1ejz" /><input type="password" placeholder="Heslo" name="pass1" id="ime10e" maxlength="255"/><input type="password" placeholder="Znovu heslo" name="pass2" id="iefrhh" maxlength="255"/>
            <input type="text" onfocus="(this.type='date')" placeholder="Datum Narození" alt="Datum Narození" name="date" id="ic1ejz" />
            <div class="gjs-custom-code" id="iy7afc">
              <input type="file" title="Avatar" name="usericon" id="i1htu8"/></div>
            <div id="ioeudp" class="gjs-grid-row">
              <div id="ina6wa" class="gjs-grid-column"><input type="checkbox" id="iy548i" name="check"/>
                <div id="if1x27" value="agreed">Souhlasím s <a href="terms.php" id="imfigh" class="gjs-link"><b id="ipovew">podmínkami</b></a>
                </div>
              </div>
            </div><input type="submit" id="iil4og" value="Registrovat se">
            <?php
            require("registerErrors.php");
          if(isset($_POST["mail"]) && !empty($_POST["mail"]) && !empty($_POST["username"]) && !empty($_POST["pass1"]) && !empty($_POST["pass2"]) && !empty($_POST["date"])){
            $pass1 = $_POST["pass1"];
            preg_match_all('/\d/',$pass1,$matches);
            $numberCount = count($matches[0]);
            $pass2 = $_POST["pass2"];
            $date = $_POST["date"];
            $mail = $_POST["mail"];
            $username = $_POST["username"];

            //Obrázek Upload

            $uploadError = 0;
            $path = "";
            if(isset($_FILES['usericon'])){
              $status = imageUpload('usericon');
              if($status == "error"){
                $uploadError = 1;
              }else{
                if($status == "noImage"){
                  $uploadError = 0;
                  $path = "./assets/default_user.png";
                }else{
                  $path = $status;
                }
              }
            }
              if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                printError($errorMessages["notValideEmail"]);
              } elseif (!isValidUsername($username)) {
                  go("register.php?umail=".base64_encode($_POST["mail"])."&uuser=".base64_encode($_POST["username"])."&error=1");
              } elseif (strlen($pass1) < 9) {
                  go("register.php?umail=".base64_encode($_POST["mail"])."&uuser=".base64_encode($_POST["username"])."&error=2");
              } elseif ($numberCount<3) {
                  go("register.php?umail=".base64_encode($_POST["mail"])."&uuser=".base64_encode($_POST["username"])."&error=3");
              } elseif ($pass1 != $pass2) {
                  go("register.php?umail=".base64_encode($_POST["mail"])."&uuser=".base64_encode($_POST["username"])."&error=4");
              } elseif (!isOlderThanTen($date)) {
                  go("register.php?umail=".base64_encode($_POST["mail"])."&uuser=".base64_encode($_POST["username"])."&error=5");
              } elseif (!isset($_POST["check"])) {
                  go("register.php?umail=".base64_encode($_POST["mail"])."&uuser=".base64_encode($_POST["username"])."&error=6");
              } elseif($uploadError == 1){
                  go("register.php?umail=".base64_encode($_POST["mail"])."&uuser=".base64_encode($_POST["username"])."&error=7");
              }else{
                //go("login.php");
                try{
                  $query = "SELECT email FROM users WHERE email=:email";
                  $q = $db->prepare($query);
                  $q->execute(array(":email" => $mail));
                  if($q->rowCount() == 1){
                    printError($errorMessages["alreadyRegistered"]);
                  }else{
                    $query = "INSERT INTO users (email, username, password, profile_picture, birthdate) VALUES (:email, :username, :password, :profile_picture, :birthdate)";
                    $q = $db->prepare($query);
                    $q->execute(array(":email" => $mail, ":username" => $username, ":password" => md5($pass1), ":profile_picture" => $path, ":birthdate" => $date));
                    alert("Úspěšně registrovaný!");
                    go("login.php");
                  }
                }catch(PDOException $e){
                  printError("Registration Error: ". $e->getMessage());
                }
              }
          }
            ?>
            <a id="ivz9gn" class="gjs-link" href="login.php">Máš účet? Přihlásit se!</a>
          </div>
        </div>
      </form>
    </div>
  </section>
</body>

</html>