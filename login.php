<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="generator" content="GrapesJS Studio">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta property="og:type" content="website">
  <meta name="robots" content="index,follow">
  <link rel="stylesheet" href="styles/index.css">
  <link rel="stylesheet" href="styles/style.css">

  <?php
    require("message.php");
    require_once("functions.php");
    require_once("dbconnect.php");
  ?>
</head>

<body id="ii1rgb">
  <?php
  $page = 3;
    viewMenu($navlinksunlogined, $page);
  ?>
  <section id="ifc0c5" class="gjs-section">
    <div id="i916zy" class="gjs-container">
      <form method="post">
        <div id="ic0lp3" class="gjs-grid-row">
          <div id="irhj02" class="gjs-grid-column">
            <img id="ios86h" src="assets/logo.png" />
            <div id="i7mddc">LOGIN</div>
            <input type="text" placeholder="Email" id="iw2cgc" name="email" value="<?= isset($_GET["mail"]) ? base64_decode($_GET["mail"]) : "" ?>"/>
            <input type="password" placeholder="Heslo" id="iow1u6" name="pswd" value=""/>
            <input type="submit" id="i1fuik" value="Přihlásit se">
            <div id="i1maqz">
            <?php
                if(isset($_GET["error"])){
                  $errorStatus = $_GET["error"];
                  switch($errorStatus){
                    case(1):
                      echo $errorMessages["noUser"];
                      break;
                    case(2):
                      echo $errorMessages["mailMissing"];
                      break;
                    case(3):
                      echo $errorMessages["passMissing"];
                      break;
                  }
                }
                if (isset($_POST["email"]) && !empty($_POST["email"]) && !empty($_POST["pswd"])) {
                  $login = $_POST["email"];
                  $pswd = md5($_POST["pswd"]);
                  $query = "SELECT email, adminstatus, username, profile_picture, registration_date, id FROM users WHERE email=:email AND password=:password";
                  try {
                    $q = $db->prepare($query);
                    $q->execute(array(":email" => $login, ":password" => $pswd));
                    if ($q->rowCount() == 1) {
                      $data = $q->fetch(PDO::FETCH_ASSOC);
                      session_start();
                      $_SESSION["loguser"]["profile_picture"] = $data['profile_picture'];
                      $_SESSION["loguser"]["registration_date"] = $data['registration_date'];
                      $_SESSION["loguser"]["mail"] = $data['email'];
                      $_SESSION["loguser"]["username"] = $data['username'];
                      $_SESSION["loguser"]["id"] = $data['id'];
                      $_SESSION["loguser"]["adminstatus"] = $data['adminstatus'];
                      $_SESSION["loguser"]["time"] = time() + 6000;
                      if($data['adminstatus'] != NULL){
                        header("Location: admin.php");
                        exit();
                      }
                      go("index.php");
                      exit();
                    } else {
                      go("login.php?mail=".base64_encode($_POST["email"])."&error=1");
                    }
                  } catch (PDOException $e) {
                    echo "Login Error: " . $e->getMessage();
                  }
                }
                if(isset($_POST["email"]) && empty($_POST["email"])) go("login.php?mail=".base64_encode($_POST["email"])."&error=2");
                if(isset($_POST["email"]) && empty($_POST["pswd"])) go("login.php?error=3");
            ?>
            </div>
            <a id="ioeonn" class="gjs-link" href="register.php">Ještě nemáš účet? Registuj se!<br /></a>
          </div>
        </div>
      </form>
    </div>
  </section>
  <?php
  require_once("disconnectdb.php");
  ?>
</body>

</html>