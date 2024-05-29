<?php
        require_once("message.php");
        require_once("functions.php");
        require("dbconnect.php");
        require("authorizeUser.php");
        require("header.php");
?>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body id="ii1rgb">
  <?php
    viewMenus("");
    $query = "SELECT id, name, icon FROM forumInfo WHERE id=?";
    try{
    $q = $db->prepare($query);
    $q->execute(array($_GET["forumid"]));
    if($q->rowCount() > 0){
      while($item = $q->fetch(PDO::FETCH_ASSOC)){
        echo '
        <div id="i4s9bx" class="gjs-grid-row">
        <div class="gjs-grid-column">
          <h1 id="ihxkes" class="gjs-heading"><a href="forum.php?id='.$item["id"].'" class="gjs-link">'.$item["name"].'</a></h1><img src="'.$item["icon"].'" id="i2zg8n" />
        </div>
      </div>
        ';
      }
    } else go("forum.php?id=".$_GET["forumid"]);
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  ?>
  <section id="ilunc7" class="gjs-section">
    <div id="i99wjf" class="gjs-container">
    <form method="post">
      <div id="i94vmv" class="gjs-grid-row">
        <div id="ilusbo" class="gjs-grid-column"><input type="text" id="iqgt0i" maxlength="60" minlength="3" name="title" placeholder="TITULEK" required/><textarea id="iedd3l" name="content" placeholder="Váš text zde..." required></textarea></div>
      </div>
      <div id="iw2u5k" class="gjs-grid-row">
        <div id="icbdjl" class="gjs-grid-column"><input type="submit" id="iedu68" minlength="10"value="Přidat příspěvek"><button class="bold" id="setBold">Bold</button></div>
      </div>
        <?php
          if(!isset($_GET['forumid']) || empty($_GET['forumid'])){
            	go("index.php");
          }else{
            if(isset($_POST["title"])){
              $title=nl2br2(disableAttributes($_POST["title"]));
              $content=nl2br2(disableAttributes($_POST["content"]));
              try{
                $query = "INSERT INTO Posts (title, content, PostOwner, ForumID) VALUES (?,?,?,?)";
                $q = $db->prepare($query);
                $q->execute(array($title, $content, $_SESSION["loguser"]["id"], $_GET["forumid"]));
                go("forum.php?id=".$_GET["forumid"]);
              }catch(PDOException $e){
                echo $e->getMessage();
              }
            }
          }
        ?>
      </form>
    </div>
  </section>
</body>
</html>