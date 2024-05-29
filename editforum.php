<?php
        require_once("message.php");
        require_once("functions.php");
        require("dbconnect.php");
        require("authorizeUser.php");
        require("header.php");
        if(isset($_GET["id"])) {
          $forumid=$_GET["id"];
          
          $query = "SELECT owner FROM forums WHERE id = :forumid";
          try{
          $q = $db->prepare($query);
          $q->execute(array(":forumid" => $forumid));
          $foruminf = $q->fetch(PDO::FETCH_ASSOC);
          if($foruminf["owner"] != $_SESSION["loguser"]["id"]){
            if(!isset($_SESSION["loguser"]["adminstatus"])){
              go("index.php");
              exit();
            }
          }
          } catch(PDOException $e) {
            echo $e->getMessage();
          }
        } else $forumid=0;
        try{
          $query = "SELECT * FROM forums where id = :forumid";
          $q = $db->prepare($query);
          $q->execute(array(":forumid" => $forumid));
          $foruminf = $q->fetch(PDO::FETCH_ASSOC);
          $forumname = $foruminf["name"];
          $forumdesc = $foruminf["description"];
          $forumtheme = $foruminf["theme"];
          $forumicon = $foruminf["icon"];
          $forumowner = $foruminf["owner"];
        }catch(PDOException $e){
          echo $e->getMessage();
        }
?>
  <link rel="stylesheet" href="./styles/style.css">
</head>
<body id="ii1rgb">
  <form action="edit.php?type=forum&id=<?php echo $_GET["id"]?>" method="post" enctype="multipart/form-data" id="editforum">
  <?php
    viewMenus("");
  ?>
  <div id="iobma1" class="gjs-grid-row">
    <div id="ir3zst" class="gjs-grid-column"></div>
  </div>
  <div id="ievqtc" class="gjs-grid-row">
    <div id="ir9yjl" class="gjs-grid-column">
      <div id="i6t764" class="gjs-grid-row">
        <div id="idunlq" class="gjs-grid-column"><img src="<?php echo $foruminf["icon"] ?>" id="ibe8jf" />
          <h1 id="i42ceq" class="gjs-heading"><?php echo $foruminf["name"] ?></h1>
        </div>
      </div>
    </div>
  </div>
  <section id="itadko" class="gjs-section">
    <div id="ifpil6" class="gjs-container">
      <div id="ida6pm" class="gjs-grid-row">
        <div id="ibi2gl" class="gjs-grid-column"><input type="text" value="<?php echo $foruminf["name"] ?>" id="isuaft" required placeholder="Název fóra *" name="nazev"/><input type="text" required value="<?php echo $foruminf["description"] ?>" placeholder="Popis *" id="i30qz4" name="popis"/><input id="inor7m" type="file" name="file" style="margin:10px 0 10px 20px">
          <div class="gjs-grid-row" id="iigcdm">
            <div class="gjs-grid-column" id="i1y66h"><input type="submit" id="i3tlju" value="Uložit Změny"><input type="button" id="ivn2yi" onclick="deleteForum()" value="Ostranit Fórum"></div>
          </div>
          <h1 id="idnlmq" class="gjs-heading">Moderátor</h1>
          
          <div id="i4hg4k" class="gjs-grid-row">
            <div id="idmnxd" class="gjs-grid-column">
              <div id="ii9vvu">USERID</div><input type="text" id="i51o0u" name="" placeholder="Již brzy" disabled/>
            </div>
          </div>
          <?php /*?>
          <div id="iiefd3" class="gjs-grid-row">
            <div id="iek3l4" class="gjs-grid-column"><input type="button" id="idrtry" value="Přidat"></div>
      </div>
          <div id="icwxwr" class="gjs-grid-row">
            <div id="i0neyj" class="gjs-grid-column">
              <div id="iamlf9"><b>Moderátor:</b> <a href="" id="igc4sa" class="gjs-link">Jirka</a>(1)</div><img id="i9p2ab" src="https://cdn-icons-png.freepik.com/512/1345/1345874.png" />
            </div>
          </div>
        </div>
        <?php */?>
      </div>
    </div>
  </section>
  </form>
</body>
<script>
function deleteForum() {
    var password = prompt("Zadejte vaše heslo pro potvrzení:");

    if (password) {
        var id = "<?php echo isset($_GET["id"]) ? $_GET["id"] : ''; ?>";

        var passwordField = document.createElement("input");
        passwordField.setAttribute("type", "hidden");
        passwordField.setAttribute("name", "password");
        passwordField.setAttribute("value", password);
        document.getElementById("editforum").appendChild(passwordField);

        document.getElementById("editforum").action = "deleteforum.php?id=" + id;
        document.getElementById("editforum").method = "post";

        document.getElementById("editforum").submit();
    } else {
        alert("Akce zrušena.");
    }
}

</script>
</html>