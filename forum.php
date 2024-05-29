<?php
        require_once("message.php");
        require_once("functions.php");
        require("dbconnect.php");
        require("authorizeUser.php");
        require("header.php");
        if(isset($_SESSION['loguser']["id"])) {
          $userid=$_SESSION["loguser"]["id"];
        } else $userid=0;
?>
  <link rel="stylesheet" href="./styles/style.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body id="ii1rgb">
  <?php
    viewMenus("");
  ?>
  <div id="ij7kgh" class="gjs-grid-row">
    <div id="ijj5el" class="gjs-grid-column"></div>
  </div>
  <div id="isqt8j" class="gjs-grid-row">
    <div id="ir1wm3" class="gjs-grid-column">
      <div id="iinplu" class="gjs-grid-row">
      <?php
        if(isset($_GET["id"])){
          $id = $_GET["id"];
          try{
          $query = "SELECT * FROM forumInfo WHERE id =:id";
          $q = $db->prepare($query);
          $q->execute(array(":id" => $id));
          if($q->rowCount() != 0){
            while($item = $q->fetch(PDO::FETCH_ASSOC)){
              echo '
                    <div id="ifjwda" class="gjs-grid-column"><img id="ikwewk"
                    src="'.$item["icon"].'" style="border-radius: 100%"  />
                  <h1 id="i8754v" class="gjs-heading">'.$item["name"].'</h1>';
                  if($_GET["id"]==$_SESSION["loguser"]["id"]){
                    echo '<img src="https://cdn-icons-png.flaticon.com/512/1057/1057107.png';
                  }else{
                    echo '<a href="addfollowforum.php?id='.$_GET["id"].'"><img src="https://cdn-icons-png.freepik.com/512/9131/9131530.png';
                  }
                  echo '  
                  " id="in2pif" style="margin-left: 20px; width: 20px; height: 20px"/></a><span style="color:white; margin-left: 10px">'.$item["Followers"].'</span>';
                  echo'
                </div>
              </div>
            </div>
          </div>
          <section id="i9ki7q" class="gjs-section">
            <div id="iqsxhl" class="gjs-container">
              <div id="izu6ey" class="gjs-grid-row">
                <div id="iye507" class="gjs-grid-column">
                  <h1 id="if8jrh" class="gjs-heading">'.$item["description"].'</h1>
                  <div id="ino2ky">('.$item["theme"].')</div>
                  <div id="icuvyz" class="gjs-grid-row"><div id="ictwi4" class="gjs-grid-column">
                    ';
                      if($item["owner"] == $_SESSION["loguser"]["id"]){
                        echo'<a id="iq119s" class="gjs-link" href="editforum.php?id='.$item["id"].'">Editovat Fórum</a>';
                      }
                    echo '
                    <a id="iq119s" class="gjs-link" href="addpost.php?forumid='.$item["id"].'">Přidat příspěvek</a></div>
                  </div>
                </div>
              </div>
              ';
            }
        }else{
                        echo '
                    <div id="ifjwda" class="gjs-grid-column"><img id="ikwewk"
                    src="assets/erroruser.png" />
                  <h1 id="i8754v" class="gjs-heading">Fórum neexistuje!</h1>
                </div>
              </div>
            </div>
          </div>
          <section id="i9ki7q" class="gjs-section">
            <div id="iqsxhl" class="gjs-container">
              <div id="izu6ey" class="gjs-grid-row">
                <div id="iye507" class="gjs-grid-column">
                  <div id="icuvyz" class="gjs-grid-row">
                    <div id="ictwi4" class="gjs-grid-column">
                    </div>
                  </div>
                </div>
              </div>
              ';
            }
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }
      ?>
      <?php
      try{
      $query = "SELECT * FROM LikesDislikes WHERE ForumID = :id ORDER BY PostID DESC;";
      $q = $db->prepare($query);
      $q->execute(array(":id" => $_GET["id"]));
      $i = 0;
      foreach($q as $item){
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
        echo'
          <div id="ixc6dc" class="gjs-grid-row">
          <div id="i52vjc" class="gjs-grid-column"><img
              src="'.$item["profile_picture"].'" id="iqg4jf" style="border-radius:100%"/>
            <div id="ikqz4i" class="gjs-grid-row">
              <div id="ihpb73" class="gjs-grid-column">
                <div id="i5fdxl"><a href="profil.php?id='.$item["PostOwner"].'" id="i6vnpu" class="gjs-link">'.$item["username"].'</a></div>
                <h1 id="in2pjt" class="gjs-heading"><a href="post.php?id='.$item["PostID"].'" id="irmm9m" class="gjs-link">'.$item["Title"].'</a></h1>
                <div id="icl5eu"><span id="it4kdg">'.$item["Content"].'</span></div>';
                echo '<div id="is64ak">'.formatDate($item["PostDate"]).'</div>
                <button class="likebut" style="display:inline"';
                if(isset($_SESSION["loguser"]["id"])){
                  echo ' id="like'.$i.'"';
                }else echo 'onclick="redirectToLogin()"';
                echo'/>Like</button>';
                echo '<span id="iibf1i'.$i.'">'.$item["likes"].'</span>
                <button class="comments" onClick=toPost('.$item["PostID"].') style="display:inline">Comment</button>';
                echo '<div id="ihmy5i">'.$item["comments"].'</div>
              </div>
            </div>
          </div>
        </div>
        ';
        $i++;
      }
    }catch(PDOException $e){
      echo $e->getMessage();
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