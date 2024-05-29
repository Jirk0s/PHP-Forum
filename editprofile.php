<?php
        require_once("message.php");
        require("functions.php");
        require("dbconnect.php");
        require("authorizeUser.php");
        if($_SESSION["loguser"]["id"] != $_GET["id"]){
          go("editprofile.php?id=".$_SESSION["loguser"]["id"]);
        }
?>
  <?php
    require_once("header.php");
  ?>
  <link rel="stylesheet" href="styles/style.css">
<head>
  <meta charset="utf-8">
  <title>editprofile</title>
  <meta name="generator" content="GrapesJS Studio">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta property="og:type" content="website">
  <meta name="robots" content="index,follow">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body id="ii1rgb">
  <?php echo '<form method="post" action="edit.php?type=user&id=';echo $_SESSION["loguser"]["id"].'" enctype="multipart/form-data" id="editprofileform">'?>
  <?php
  viewMenus("");
  ?>
  <div id="iypwpd" class="gjs-grid-row">
    <div id="izkwsh" class="gjs-grid-column"></div>
  </div>
  <div id="i9vlt4" class="gjs-grid-row">
    <div id="icbiqz" class="gjs-grid-column">
      <div id="imiyd4" class="gjs-grid-row">
        <?php
          
        ?>
        <div id="ixt2wi" class="gjs-grid-column"><img src="<?php echo  $_SESSION["loguser"]["profile_picture"] ?>" style="border-radius: 100%" required id="iloe01" /><input type="text" id="i04kuo" name="username" value="<?php echo  $_SESSION["loguser"]["username"] ?>"/></div>
      </div>
    </div>
  </div>
  <section id="i9zcty" class="gjs-section">
    <div class="gjs-container" style="margin-top:20px"><div id="igwjll" class="gjs-grid-row">
        <div id="itlvlg" class="gjs-grid-column">
          <input type="email" id="i7jawz" name="email" required placeholder="<?php echo maskEmail($_SESSION["loguser"]["mail"]);?>">
          <input type="email" name="email1" placeholder="Nový email" id="i2rmr9" />
          <input type="password" name="password" placeholder="Heslo *" id="iv33xi" required/>
          <input type="password" name="password1" placeholder="Nové heslo" id="iarxxg" />
          <div id="i9oc1v" class="gjs-custom-code"><input type="file" name="newAvatar" id="ia3wgg" /></div>
          <div id="ioti8k" class="gjs-grid-row">
            <div id="iwdglp" class="gjs-grid-column"><input type="submit" id="i8ciqg" value="Uložit změny"><input type="button" id="imknhl" onclick="confirmDelete()" value="Odstranit profil">
            </div>
          </div>
            
            <?php
            if(isset($_GET["error"])){
              $errorStatus = $_GET["error"];
              switch($errorStatus){
                case 1: printError("Zadali jste špatné heslo");
                break;
                case 2: printError("Vyplňtě prosím uživatelské jméno");
                break;
                case 3: printError("Zadali jste špatný email");
                break;
                case 4: printError("Uživatelské jméno není validní");
                break;
                case 5: printError($errorMessages["notValidImage"]);
                break;
                case 7: printError($errorMessages["noUser"]);
                break;
                case 8: printError("Vyplňte prosím pole označené *");
              }
            }
            ?>
          <h1 id="io75pp" class="gjs-heading">USERID: <span id="i0dgck"><?php echo $_GET["id"]?></span></h1>
        </div>
      </div>
    </div>
  </section>
  </form>
</body>
<script>
// Funkce, která zobrazí confirm dialog a přesměruje uživatele na deleteprofile.php,
// pokud uživatel stiskne "OK"
function confirmDelete() {
    // Zobrazíme confirm dialog s otázkou
    var result = confirm("Opravdu chcete smazat svůj profil?");

    // Pokud uživatel stiskne "OK" (tj. true)
    if (result) {
        // Přesměrujeme uživatele na deleteprofile.php
        document.getElementById("editprofileform").action = "deleteprofile.php?id=<?php echo $_GET["id"]?>";
        document.getElementById("editprofileform").submit();
    }
}
</script>
</html>