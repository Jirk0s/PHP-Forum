  <?php
    require_once("header.php");
  ?>
  <meta name="robots" content="index,follow">
  <link rel="stylesheet" href="./styles/style.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php
        require_once("message.php");
        require("functions.php");
        require("dbconnect.php");
        require("authorizeUser.php");
    ?>
<body id="ii1rgb">
  <?php
    if(isset($_SESSION['loguser']["id"])) {
      $userid=$_SESSION["loguser"]["id"];
    } else $userid=0;
    if(isset($_SESSION['loguser']["adminstatus"])){
      viewMenus(4);
    }else viewMenus(3);
  ?>
  <div class="gjs-grid-row" id="ilj1i3">
    <div class="gjs-grid-column" id="itvfoi"></div>
  </div>
  <div class="gjs-grid-row" id="ith1cp">
    <div class="gjs-grid-column" id="i9aegj">
      <div class="gjs-grid-row" id="idgj7e">
        <?php
         try{
          
            $query = "SELECT username, profile_picture, Followers FROM UserInfo WHERE id=?";
            $q = $db->prepare($query);
            $q->execute(array($_GET["id"]));
            $item = $q->fetch(PDO::FETCH_ASSOC);
            if($q->rowCount() != 0){
            echo '<div class="gjs-grid-column" id="i5f21e"><img src="'.$item["profile_picture"].'" id="in2pif" style="border-radius: 100%"/>';
            echo '<h1 class="gjs-heading" id="i58bmj">'.$item["username"].'</h1>';
            if($_GET["id"]==$_SESSION["loguser"]["id"]){
              echo '<img src="https://cdn-icons-png.flaticon.com/512/1057/1057107.png';
            }else{
              echo '<a href="addfollow.php?id='.$_GET["id"].'"><img src="https://cdn-icons-png.freepik.com/512/9131/9131530.png';
            }
            echo '  
            " id="in2pif" style="margin-left: 20px; width: 20px; height: 20px"/></a><span style="color:white; margin-left: 10px">'.$item["Followers"].'</span>';
            }else{
              echo '<div class="gjs-grid-column" id="i5f21e"><img src="assets/erroruser.png" id="in2pif" style="border-radius: 0%"/>';
              echo '<h1 class="gjs-heading" id="i58bmj">Uživatel neexituje</h1>';
            }
         }catch(Exception $e){
          echo "error: ". $e->getMessage();
         }
        ?>
        </div>
      </div>
    </div>
  </div>
  <div class="gjs-grid-row" id="i6rhj4">
    <?php
      if($_SESSION['loguser']['id'] == $_GET['id']){
        echo '<div class="gjs-grid-column" id="i2ts1b"><a class="gjs-link" href="editprofile.php?id='.$_GET["id"].'" id="i2mjqh">Editovat profil</a>';
        $query = "SELECT id FROM forums WHERE owner=?";
        $q = $db->prepare($query);
        $q->execute(array($_GET["id"]));
        if($q->rowCount() == 0){
          echo '<a class="gjs-link" href="forumcreate.php" id="i2mjqh" style="margin-left: 4px">Vytvořit Fórum</a>';
        }
      }
      if (isset($_GET["id"]) && $_GET["id"] == $_SESSION["loguser"]["id"]) {
        $query = "SELECT id, name FROM forums WHERE owner=? ";
        $q = $db->prepare($query);
        $q->execute(array($_SESSION["loguser"]["id"]));
        if ($q->rowCount() != 0) {
            foreach ($q as $item) {
                echo '<a class="gjs-link" style="margin-left: 4px" href="forum.php?id=' . $item["id"] . '" id="i2mjqh">Moje Fórum: ' . $item["name"] . '</a>';
            }
        }
        echo '<a class="gjs-link" style="margin-left: 4px; color: yellow" href="predplatne.php' . '" id="i2mjqh"><B>SDĚLMITO PREMIUM </B></a>';
    }    
      echo "</div>";
    ?>
  </div>
  <section class="gjs-section" id="ihojts">
    <div class="gjs-container" id="irb9ck">
      <?php
      if(isset($_GET["id"])){
        try{
          $query = 
          "SELECT * FROM LikesDislikes
           WHERE UserID =?
           ORDER BY PostID DESC
           ";
        $q = $db->prepare($query);
        $q->execute(array($_GET["id"]));
        $i = 0;
        while($item = $q->fetch(PDO::FETCH_ASSOC)){
          {
            echo "
            <script>
            $(document).ready(function(){
                $('#like".$i."').click(function(){
                    $.ajax({
                        url: './processlike.php',
                        type: 'POST',
                        data: {userID: '".$userid."', postID: '".$item['PostID']."'},
                        success: function(response){
                            $('#iibf1i".$i."').html(response);
                            }
                        });
                    });
                });
            </script>
            ";
            echo '<div class="gjs-grid-row" id="izof87" style="margin-top: 20px">';
            echo '<img src="'.$item["profile_picture"].'" id="icg1p6" style="border-radius: 100%"/>';
            echo '<div class="gjs-grid-row" id="i9zfe7"><div class="gjs-grid-column" id="iz1e3c">';
            echo '<div id="ikch7f"><a href="" class="gjs-link" id="igivzk" style="padding-top: 5px;">'.$item["username"].'</a> <a href="forum.php?id='.$item['ForumID'].'" class="gjs-link" id="igivzk" style="color: white; background: black; padding: 5px;">'.$item['name'].'</div>';
            echo '<h1 class="gjs-heading" id="it2lj2"><a href="post.php?id='.$item['PostID'].'" class="gjs-link" id="iijx6q">'.$item["Title"].'</a></h1>';
            echo '<div id="ibxvt6"><span id="it4kdg">'.$item["Content"].'</span></div>';
            //echo '<div class="gjs-image-box" id="i2iffs"></div>';
            echo '<div id="is64ak">'.formatDate($item["PostDate"]).'</div>
            <button class="likebut" style="display:inline"';
            if(isset($_SESSION["loguser"]["id"])){
              echo ' id="like'.$i.'"';
            }else echo 'onclick="redirectToLogin()"';
            echo'/>Like</button>';
            echo '<span id="iibf1i'.$i.'">'.$item["likes"].'</span>
            <button class="comments" onClick=toPost('.$item["PostID"].') style="display:inline">Comment</button>';
            echo '<div id="ihmy5i">'.$item["comments"].'</div></div></div></div>';
            $i++;
          }
        }
        }catch (PDOException $e){
        }
      }else{
        go("404.php");
      }
      ?>
    </div>
  </section>
</body>
<script>
        function redirectToLogin() {
            window.location.href = "login.php";
        }

        function toPost(id) {
            window.location.href = "post.php?id=" + id;
        }
</script>
</html>