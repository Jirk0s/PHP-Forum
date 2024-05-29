<?php
        require_once("message.php");
        require_once("functions.php");
        require("dbconnect.php");
        require("authorizeUser.php");
        require("header.php");
        require("HaveAlreadyForum.php");
?>
  <link rel="stylesheet" href="./styles/style.css">
</head>

<body id="ii1rgb">
<?php
    viewMenus(3);
?>
  </div>
  <section class="gjs-section" id="isu2hi">
    <div class="gjs-container" id="irlaft">
    <form method="post" enctype="multipart/form-data">
      <div class="gjs-grid-row" id="ivke39">
        <div class="gjs-grid-column" id="ir53zf"><img src="https://i.imgur.com/d8KrvUe.png" id="ihngcj" />
          <div id="iu1s77">Forum Creator</div><input type="text" placeholder="Jméno Fóra" name="forumName" id="iva2un"
            required /><textarea id="i7urld" required placeholder="Popis fóra" name="description"></textarea><select type="text"
            options="[object Object],[object Object]" id="iu5l93" name="theme">
            <option value="Zábava">Zábava</option>
            <option value="Technologie">Technologie</option>
            <option value="Hobby">Hobby</option>
            <option value="Fitness">Fitness</option>
            <option value="Vzdělání">Vzdělání</option>
            <option value="Sport">Sport</option>
            <option value="Umění">Umění</option>
            <option value="Události">Události</option>
            <option value="Lokální komunita">Lokální Komunita</option>
            <option value="Ostatní">Ostatní</option>
          </select><input type="password" name="pass" placeholder="Heslo" id="it7p17" required/>
          <div id="ivashi">FORUM AVATAR</div><input type="file" name="avatar" id="inor7m" placeholder="" />
          <div class="gjs-grid-row" id="ib0zfs">
          </div><input type="submit" id="i1fuik">
<?php
    if(isset($_POST["forumName"])) {
      $forumName = $_POST["forumName"];
      $forumDescription = nl2br2(disableAttributes($_POST["description"]));

      $uploadError = 0;
      $path = "";
      if(isset($_FILES['avatar'])){
        $status = imageUpload('avatar');
        if($status == "error"){
          $uploadError = 1;
        }else{
          if($status == "noImage"){
            $uploadError = 0;
            $path = "./assets/default_forum.png";
          }else{
            $path = $status;
          }
        }
      }
      echo "POSTED";
      if(!isValidUsername($forumName)) {
        printError($errorMessages["notValideForumName"]);
      }elseif($uploadError == 1){
          printError($errorMessages["notValidImage"]);
      }else{
        $query = "SELECT id FROM users WHERE id=:id AND password=:password";
        $q = $db->prepare($query);
        $q->execute(array(":password" => md5($_POST["pass"]), ":id" => $_SESSION["loguser"]["id"]));
        if($q->rowCount() > 0){
          $query = "select * from forums WHERE name=:name";
          $query = "INSERT INTO forums (name, description, theme, icon, owner) VALUES (:name, :description, :theme, :avatar, :user_id)";
          $q = $db->prepare($query);
          $q->execute(array(":name" => $forumName, ":description" => $forumDescription, ":theme" => $_POST["theme"], ":avatar" => $path, ":user_id" => $_SESSION["loguser"]["id"]));
          $query = "select id from forums WHERE owner=:owner";
          $q = $db->prepare($query);
          $q->execute(array(":owner"=> $_SESSION["loguser"]["id"] ));
          foreach($q->fetchAll(PDO::FETCH_ASSOC) as $row){
            go("forum.php?id=".$row["id"]); 
          }
        }else{
          printError($errorMessages["wrongPassword"]);
        }
      }
    }
?>
        </div>
      </div>
      </form>
    </div>
  </section>
</body>

</html>