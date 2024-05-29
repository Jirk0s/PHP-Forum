<?php
require_once("header.php");
?>
<link rel="stylesheet" href="styles/index.css">
<?php
require_once("message.php");
require_once("dbconnect.php");
require_once("functions.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="irtvgj">
  <?php
  session_start();
  viewMenus(0);
  ?>
  <div class="gjs-grid-row" id="i6vnv7">
    <div class="gjs-grid-column" id="iffe5f">
      <h1 class="gjs-heading" id="ij2jlv">SDĚLMI.TO</h1>
    </div>
  </div>
  <h1 class="gjs-heading" id="ie5v6n">AKTUÁLNĚ</h1>
  <section class="gjs-section" id="it9xe4">
    <div class="gjs-container" id="iqe975">
      <div class="gjs-grid-row" id="izfn3m">
        <div class="gjs-grid-column" id="iet92s">
          <?php

          try {
            $q = $db->prepare("SELECT SUBSTRING(Content, 1, 700) AS 255Content, LikesDislikes.* FROM LikesDislikes ORDER BY PostID DESC LIMIT 3");
            $q->execute();
            $i = 0;
            if (isset($_SESSION['loguser']["id"])) {
              $userid = $_SESSION["loguser"]["id"];
            } else $userid = 0;
            foreach ($q as $item) {
              echo '<div class="gjs-grid-row" id="i2kzex">';
              echo '<div class="gjs-grid-column" id="i92xoy"><img id="inczv1" style="border-radius: 100%;" src="' . $item['profile_picture'] . '"/>';
              echo '</div><div class="gjs-grid-column" id="iduqo5"><a style="" href="profil.php?id=' . $item["userID"] . '" class="gjs-link" id="i09ocr">' . $item['username'] . '</a>';
              echo '<h1 class="gjs-heading" id="iipfxh"><a href=post.php?id=' . $item["PostID"] . ' class="gjs-link" id="if6mei">' . $item['Title'] . '</a></h1>';
              echo '<div id="i7rzq5">' . $item['255Content'] . ' <a href="post.php?id=' . $item["PostID"] . '" id="if6mei" style="text-decoration:none; font-size:18px;color:blue; font-weight:bold;">↩</a>';
              echo "
            <script>
            $(document).ready(function(){
                $('#like" . $i . "').click(function(){
                    $.ajax({
                        url: './processlike.php',
                        type: 'POST',
                        data: {userID: '" . $userid . "', postID: '" . $item['PostID'] . "'},
                        success: function(response){
                            $('#inl3np" . $i . "').html(response);
                        }
                    });
                });
            });
            </script>
        ";
              //LIKES A DISLIKES
              echo '<br/></div><button style="display:inline"';
              if (isset($_SESSION["loguser"]["id"])) {
                echo ' id="like' . $i . '"';
              } else echo 'onclick="redirectToLogin()"';
              echo ' class="likebut" value="like"';
              echo '>like</button><div style="display:inline" id="inl3np' . $i . '">';
              echo $item['likes'];
              echo '</div>';
              echo '<button class="comments" onClick=toPost(' . $item["PostID"] . ') style="display:inline">Comment</button><div id="inl3np" style="display:inline">' . $item["comments"] . '</div>';
              echo '<a href="forum.php?id=' . $item['ForumID'] . '" class="gjs-link" id="igivzk" style="color: white; background: black; padding: 5px;">' . $item['name'] . '</a>';
              echo '</div></div>';
              $i++;
            }
          } catch (PDOException $e) {
            printError("Registration Error: " . $e->getMessage());
          }
          ?>
        </div>
        <div class="gjs-grid-column" id="in5rq1">
          <?php
          $query = "SELECT id, name, description, theme, icon FROM forums ORDER BY id DESC LIMIT 6";
          try {
            $q = $db->prepare($query);
            $q->execute();
            while ($item = $q->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="gjs-grid-row" id="ia1k4i">
                <div class="gjs-grid-column" id="i27kb1"><img style="border-radius:100%" id="iknn3p" src="' . $item['icon'] . '">';
              echo '
                </div>
                <div class="gjs-grid-column" id="i9i5n4">
                  <h1 class="gjs-heading" id="ipjgfh" style = "margin-left:5px"><a href="' . "forum.php?id=" . $item["id"] . '" class="gjs-link" id="i7e1yh">';
              echo $item['name'];
              echo '</a><div id="ii9cbh"><b id="iq2poj">';
              echo 'Téma: </b>' . $item['theme'];
              echo '</div>
                </div></div>';
            }
          } catch (PDOException $e) {
            printError("DB Error: " . $e->getMessage());
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <?php
  require_once("footer.php");
  ?>
</body>
<script>
  function redirectToLogin() {
    window.location.href = "login.php";
  }

  function toPost(id) {
    window.location.href = "post.php?id=" + id;
  }
</script>
<script>
  var items = document.querySelectorAll('#i58iuu');
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