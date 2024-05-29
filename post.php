<?php
require_once("message.php");
require_once("functions.php");
require("dbconnect.php");
require("authorizeUser.php");
require("header.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="styles/style.css">
</head>
<body id="ii1rgb">
  <?php
    viewMenus("");
  ?>
  <div id="i6hekm" class="gjs-grid-row">
    <div id="is71th" class="gjs-grid-column">
      <?php
      if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $valid = 1;
        $query = "SELECT PostID, name, ForumIcon, ForumID FROM LikesDislikes WHERE PostID = ?";
        try {
          $q = $db->prepare($query);
          $q->execute(array($id));
          if ($q->rowCount() > 0) {
            $name = $q->fetch(PDO::FETCH_ASSOC);
            echo '<h1 id="iiy9fs" class="gjs-heading"><a href="forum.php?id='.$name["ForumID"].'" id="i0rowa" class="gjs-link" style="display:inline; position:relative; top:30px;">'.$name["name"].'</a></h1><img id="iimr36" style="border-radius: 100%" src="'.$name["ForumIcon"].'" />';
          } else {
            $valid=0;
            echo '<h1 id="iiy9fs" class="gjs-heading"><p id="i0rowa" class="gjs-link" style="display:inline; position:relative; top:30px;">Post Nenalezen!</p></h1><img style="display:inline" id="iimr36" src="assets/erroruser.png" />';
          }
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }else{
        go("index.php");
      }
      ?>
    </div>
  </div>
  <section id="is3rlo" class="gjs-section">
    <div id="itdlju" class="gjs-container">
      <?php
        if(isset($_GET["id"])) {
          $id = $_GET["id"];
          $query = "SELECT * FROM LikesDislikes WHERE PostID = ?";
          try {
            $q = $db->prepare($query);
            $q->execute(array($id));
            if ($q->rowCount() > 0) {
              $post = $q->fetch(PDO::FETCH_ASSOC);
              echo 
              '
              <div id="i15qss" class="gjs-grid-row">
              <div id="id9c4z" class="gjs-grid-column">
              ';
              echo "
              <script>
              $(document).ready(function(){
                  $('#like').click(function(){
                      $.ajax({
                          url: './processlike.php',
                          type: 'POST',
                          data: {userID: '" . $_SESSION["loguser"]["id"] . "', postID: '" . $post['PostID'] . "'},
                          success: function(response){
                              $('#iwm1ai').html(response);
                          }
                      });
                  });
              });
              </script>
              ";
              echo '<img id="icv4le" src="'.$post["profile_picture"].'" />.';
              echo '
              </div>
              <div id="ikanrf" class="gjs-grid-column">
                <div id="iychsz"><a href="profil.php?id='.$post["userID"].'" id="i19u1x" class="gjs-link">'.$post["username"].'</a></div>
                <h1 id="i58nej" class="gjs-heading">'.$post["Title"].'</h1>
                <div id="ih14fj">
                  <span id="i03c9j">'.$post["Content"].'</span>
                </div>';
                //echo '<div id="i6ps4t" class="gjs-image-box"></div>';
                echo '<div id="ifm0cg">'.formatDate($post["PostDate"]).'</div>
                ';
                echo '<button style="display:inline"';
                if (isset($_SESSION["loguser"]["id"])) {
                  echo ' id="like"';
                } else echo 'onclick="redirectToLogin()"';
                echo ' class="likebut" value="like"';
                echo '>like</button><div style="display:inline" id="iwm1ai">';
                echo $post['likes'];
                echo '</div>';
                if($post["userID"] == $_SESSION["loguser"]["id"] || $_SESSION["loguser"]["adminstatus"] == 1 || $post["ForumOwner"] == $_SESSION["loguser"]["id"]) {
                  echo '<a href="deletepost.php?postID='.$post["PostID"].'"><img src="https://cdn-icons-png.freepik.com/512/1345/1345874.png" id="isdm8k"/></a>';
                }
            }
            $query = "DELETE * FROM Posts WHERE ID = ?";
            $q = $db->prepare($query);
            echo '</div>
            ';
          }catch (PDOException $e){
            echo $e->getMessage();
          }
          
        }
      ?>
      </div>
      <?php
      /*
        if(isset($_GET["id"])){
          $id= $_GET["id"];
          $query = "SELECT * FROM CommentsInfo WHERE PostParrentID=?";
          $q = $db->prepare($query);
          $q->execute($id);
          foreach($q->fetchAll(PDO::FETCH_ASSOC) as $comment){

          }
        }
        */
      ?>
      <?php
              $query = "SELECT COUNT(PostParrentID) AS Count FROM comments WHERE PostParrentID = ?";
              $count = 0;
              try{
                $q = $db->prepare($query);
                $q->execute(array($_GET["id"]));
                $countComments = $q->fetch(PDO::FETCH_ASSOC);
                $count = $countComments["Count"];
              }catch (PDOException $e){
                echo $e->getMessage();
              }
      ?>
      <?php
      if($valid > 0) {
      echo 
      '
      <div id="iopsyf" class="gjs-grid-row">
      <div id="itjb03" class="gjs-grid-column">
        <div id="inx1f7" class="gjs-divider"></div>
        <div id="i21aii">Komentáře (';echo $count.')</div>
        <div class="gjs-grid-row" id="i3t7lq">
          <div class="gjs-grid-column" id="imq90p"><img id="iyceg2" src="'.$_SESSION["loguser"]["profile_picture"].'">
          </div>
          <div class="gjs-grid-column" id="inzit4">
            <form method="post" action="addcomment.php?id=';echo $_GET["id"].'">
            <textarea id="i8izta" name="comment" placeholder="Váš komentář zde..." minlength="2" required maxlength="1000"></textarea>
            <input type="submit" id="ixey6l">
            </form>
          </div>
        </div>
      </div>
    </div>
      ';
    }
      ?>
      <?php
        if($valid > 0){
          $query = "SELECT * FROM CommentsInfo WHERE PostParrentID= ? ORDER BY CommentLikeCount DESC";
          $q = $db->prepare($query);
          $q->execute(array($_GET["id"]));
          $i=0;
          foreach($q->fetchAll(PDO::FETCH_ASSOC) as $item){
            echo"
            <script>
            $(document).ready(function(){
                $('#like".$i."').click(function(){
                    $.ajax({
                        url: './processlikecomment.php',
                        type: 'POST',
                        data: {userID: '".$_SESSION["loguser"]["id"]."', commentID: '".$item['CommentID']."'},
                        success: function(response){
                            $('#iibf1i".$i."').html(response);
                            }
                        });
                    });
                });
            </script>
            ";
            echo '
            <div id="itbhp1" class="gjs-grid-row">
            <div id="ia7wsu" class="gjs-grid-column"><img src="'.$item["profile_picture"].'" id="icj58q" />
            </div>
            <div id="ilmlr3" class="gjs-grid-column">
              <div id="i0zo23"><a href="profil.php?id='.$item["CommentUserID"].'" id="i5e5vi" class="gjs-link">'.$item["UserName"].'</a></div>
              <span id="ivjmdg">'.$item["Content"].'</span>
              <div id="iw6za5">'.formatDate($item["date"]).'</div>
              <button class="likebut" style="display:inline"';
              if(isset($_SESSION["loguser"]["id"])){
                echo ' id="like'.$i.'"';
              }else echo 'onclick="redirectToLogin()"';
              echo'/>Like</button>';
              echo '<span id="iibf1i'.$i.'">'.$item["CommentLikeCount"].'</span>';
              if($item["CommentUserID"] == $_SESSION["loguser"]["id"] || isset($_SESSION["loguser"]["adminstatus"]) || $item["PostOwner"] == $_SESSION["loguser"]["id"]){
                echo '<a href="deletecomment.php?id='.$item["CommentID"].'"><img src="https://cdn-icons-png.freepik.com/512/1345/1345874.png" id="izhhz2" /></a>';
              }
              echo'
              
            </div>
          </div>
            ';
            $i++;
          }
        }
      ?>
    </div>
  </section>
</body>
<script>
  var items = document.querySelectorAll('#id30sc');
  for (var i = 0, len = items.length; i < len; i++) {
    (function() {
      var n, t = this,
        e = 'gjs-collapse',
        a = 'max-height',
        o = 0,
        i = function() {
          var n = document.createElement('void'),
            t = {
              transition: 'transitionend',
              OTransition: 'oTransitionEnd',
              MozTransition: 'transitionend',
              WebkitTransition: 'webkitTransitionEnd'
            };
          for (var e in t)
            if (void 0 !== n.style[e]) return t[e]
        }(),
        r = function(n) {
          o = 1;
          var t = function(n) {
              var t = window.getComputedStyle(n),
                e = t.display,
                o = parseInt(t[a]);
              if ('none' !== e && 0 !== o) return n.offsetHeight;
              n.style.height = 'auto', n.style.display = 'block', n.style.position = 'absolute', n.style.visibility = 'hidden';
              var i = n.offsetHeight;
              return n.style.height = '', n.style.display = '', n.style.position = '', n.style.visibility = '', i
            }(n),
            e = n.style;
          e.display = 'block', e.transition = "".concat(a, " 0.25s ease-in-out"), e.overflowY = 'hidden', '' == e[a] && (e[a] = 0), 0 == parseInt(e[a]) ? (e[a] = '0', setTimeout((function() {
            e[a] = t + 'px'
          }), 10)) : e[a] = '0'
        };
      e in t || t.addEventListener('click', (function(e) {
        if (e.preventDefault(), !o) {
          var l = t.closest("[data-gjs=navbar]"),
            c = null == l ? void 0 : l.querySelector("[data-gjs=navbar-items]");
          c && r(c), n || (null == c || c.addEventListener(i, (function() {
            o = 0;
            var n = c.style;
            0 == parseInt(n[a]) && (n.display = '', n[a] = '')
          })), n = 1)
        }
      })), t[e] = 1
    }.bind(items[i]))();
  }
</script>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
  }

  .gjs-grid-column.feature-item {
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 15px;
    padding-left: 15px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    min-width: 30%;
  }

  .gjs-grid-column.testimonial-item {
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 15px;
    padding-left: 15px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    min-width: 45%;
    background-color: rgba(247, 247, 247, 0.23);
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    align-items: flex-start;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-color: rgba(0, 0, 0, 0.06);
    border-right-color: rgba(0, 0, 0, 0.06);
    border-bottom-color: rgba(0, 0, 0, 0.06);
    border-left-color: rgba(0, 0, 0, 0.06);
  }

  .gjs-link:hover {
    color: rgb(36, 99, 235);
    text-decoration: underline;
  }

  .navbar {
    background-color: #222;
    color: #ddd;
    min-height: 50px;
    width: 100%;
  }

  .navbar-container {
    max-width: 950px;
    margin: 0 auto;
    width: 95%;
  }

  .navbar-items-c {
    display: inline-block;
    float: right;
  }

  .navbar-container::after {
    content: "";
    clear: both;
    display: block;
  }

  .navbar-menu {
    padding: 10px 0;
    display: block;
    float: right;
    margin: 0;
  }

  .navbar-menu-link {
    margin: 0;
    color: inherit;
    text-decoration: none;
    display: inline-block;
    padding: 10px 15px;
  }

  .navbar-burger {
    margin: 10px 0;
    width: 45px;
    padding: 5px 10px;
    display: none;
    float: right;
    cursor: pointer;
  }

  .navbar-burger-line {
    padding: 1px;
    background-color: white;
    margin: 5px 0;
  }

  .gjs-grid-column {
    flex: 1 1 0%;
    padding: 5px 0;
  }

  .gjs-grid-row {
    display: flex;
    justify-content: flex-start;
    align-items: stretch;
    flex-direction: row;
    min-height: auto;
    padding: 10px 0;
  }

  .gjs-container {
    width: 90%;
    margin: 0 auto;
    max-width: 1200px;
  }

  .gjs-section {
    display: flex;
    padding: 50px 0;
  }

  .gjs-link {
    vertical-align: top;
    max-width: 100%;
    display: inline-block;
    text-decoration: none;
    color: inherit;
  }

  .gjs-heading {
    margin: 0;
  }

  .gjs-image-box {
    height: 200px;
    width: 100%;
  }

  #is3rlo {
    padding-top: 27px;
    padding-right: 0px;
    padding-bottom: 23px;
    padding-left: 0px;
    font-family: Arial, Helvetica, sans-serif;
  }

  #i131be {
    font-family: Trebuchet MS, Helvetica, sans-serif;
  }

  #id9c4z {
    flex: 0 1 auto;
  }

  #i15qss {
    min-height: auto !important;
  }

  #icv4le {
    color: black;
    width: 72px;
    height: 67px;
    border-top-left-radius: 100%;
    border-top-right-radius: 100%;
    border-bottom-right-radius: 100%;
    border-bottom-left-radius: 100%;
  }

  #iychsz {
    padding: 10px;
  }

  #i58nej {
    margin-left: 10px;
  }

  #ih14fj {
    padding: 10px;
  }

  #i03c9j {
    font-size: 17px;
    text-align: justify;
    text-indent: 20px;
  }

  #ioui02 {
    color: black;
    width: 31px;
    height: 31px;
    margin-left: 14px;
    margin-bottom: -9px;
  }

  #isdm8k {
    color: black;
    width: 31px;
    height: 31px;
    margin-left: 14px;
    margin-bottom: -10px;
  }

  #i6ps4t {
    background-image: url('https://i0.wp.com/www.galvanizeaction.org/wp-content/uploads/2022/06/Wow-gif.gif?fit=450%2C250&ssl=1');
    background-size: contain;
    background-position: center center;
    background-attachment: scroll;
    background-repeat: no-repeat;
  }

  #iopsyf {
    min-height: 74px;
    padding-top: 10px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
  }

  .gjs-divider {
    height: 3px;
    width: 100%;
    margin: 10px;
    background-color: rgba(0, 0, 0, 0.05);
  }

  #inx1f7 {
    background-color: rgba(8, 8, 8, 1);
    height: 3px;
    width: 93%;
  }

  #itjb03 {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  #i21aii {
    padding: 10px;
    display: inline-block;
  }

  #icj58q {
    color: black;
    width: 72px;
    height: 67px;
    border-top-left-radius: 100%;
    border-top-right-radius: 100%;
    border-bottom-right-radius: 100%;
    border-bottom-left-radius: 100%;
  }

  #ia7wsu {
    flex: 0 1 auto;
    padding: 10px;
  }

  #i0zo23 {
    padding: 10px;
    padding-left: 0px;
  }

  #ivjmdg {
    font-size: 15px;
    text-align: justify;
    text-indent: 20px;
  }

  #ilmlr3 {
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
  }

  #itbhp1 {
    min-height: 0px;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
  }

  #i6hekm {
    min-height: 131px;
    background-color: #222222;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  #iiy9fs {
    color: rgba(255, 255, 255, 1);
    display: inline-block;
    margin-right: 7px;
  }

  #iimr36 {
    color: black;
    width: 61px;
    height: 61px;
    display: inline;
    margin-bottom: -50px;
  }

  #i5e5vi {
    font-size: 20px;
    font-weight: bold;
  }

  #ifm0cg {
    padding: 10px;
    padding-left: 2px;
    display: inline;
    padding-top: 5px;
    padding-bottom: 5px;
  }

  #iwm1ai {
    padding: 10px;
    padding-left: 2px;
    display: inline;
    padding-top: 5px;
    padding-bottom: 5px;
  }

  #iw6za5 {
    padding: 10px;
    padding-left: 1px;
    display: inline-block;
    justify-content: flex-start;
    flex-direction: row;
  }

  #imq90p {
    flex: 0 1 auto;
  }

  #i3t7lq {
    min-height: 157px;
    justify-content: center;
  }

  #inzit4 {
    flex: 0 0 auto;
  }

  #iyceg2 {
    color: black;
    width: 71px;
    height: 65px;
    border-top-left-radius: 100%;
    border-top-right-radius: 100%;
    border-bottom-right-radius: 100%;
    border-bottom-left-radius: 100%;
  }

  #i8izta {
    width: 517px;
    height: 128px;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px;
    border-bottom-left-radius: 6px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-width: 2px;
    border-right-width: 2px;
    border-bottom-width: 2px;
    border-left-width: 2px;
    display: block;
    font-family: Arial, Helvetica, sans-serif;
  }

  #ixey6l {
    margin-top: 3px;
    width: 88px;
    height: 32px;
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    border-bottom-right-radius: 7px;
    border-bottom-left-radius: 7px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
  }

  #i6lq9r {
    color: black;
    width: 31px;
    height: 31px;
    margin-left: 14px;
    margin-bottom: -9px;
  }

  #it49w5 {
    padding: 10px;
    padding-left: 2px;
    display: inline;
    padding-top: 5px;
    padding-bottom: 5px;
  }

  #izhhz2 {
    color: black;
    width: 31px;
    height: 31px;
    margin-left: 14px;
    margin-bottom: -10px;
  }

  @media (max-width: 992px) {
    .gjs-grid-row {
      flex-direction: column;
    }
  }

  @media (max-width: 768px) {
    .navbar-items-c {
      display: none;
      width: 100%;
    }

    .navbar-burger {
      display: block;
    }

    .navbar-menu {
      width: 100%;
    }

    .navbar-menu-link {
      display: block;
    }

    #i8izta {
      width: 340px;
    }

    #i3t7lq {
      flex-direction: row;
    }
  }

  @media (max-width: 480px) {
    #i3t7lq {
      flex-direction: column;
    }

    #i8izta {
      width: 277px;
    }

    #iyceg2 {
      border-top-color: rgba(255, 255, 255, 1);
      border-right-color: rgba(255, 255, 255, 1);
      border-bottom-color: rgba(255, 255, 255, 1);
      border-left-color: rgba(255, 255, 255, 1);
      border-top-width: 2px;
      border-right-width: 2px;
      border-bottom-width: 2px;
      border-left-width: 2px;
      border-top-style: solid;
      border-right-style: solid;
      border-bottom-style: solid;
      border-left-style: solid;
    }

    #imq90p {
      background-color: #222222;
    }
  }
</style>