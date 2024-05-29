<!doctype html>
<html lang="en">
<?php
require_once ("message.php");
require_once ("dbconnect.php");
require_once ("functions.php");
$search = "";
$type = "";
if (isset ($_GET["searchText"]))
  $search = $_GET["searchText"];
if (isset ($_GET["type"]))
  $type = $_GET["type"];
require_once ("header.php");
?>
  <link rel="stylesheet" href="./styles/style.css">
</head>

<body id="ii1rgb">
  <?php
  session_start();
  viewMenus(1);
  ?>
  <form method="get">
    <div id="iczdj" class="gjs-grid-row">
      <div id="i3qqb" class="gjs-grid-column">
        <input type="text" id="ir26s" placeholder="🔍 Zadej název" <?php if($type == "forums") echo 'value="'.$search.'" ';?>name="searchText" /><select type="text" name="type"
          options="[object Object],[object Object]" id="icqi54">
          <option value="forums" <?php if($type == "forums") echo 'selected="selected" ';?>>Fórum</option>
          <option value="users" <?php if($type == "users") echo 'selected="selected" ';?>>Uživatel</option>
        </select><input type="submit" id="ik184" value="Hledat">
      </div>
    </div>
  </form>
  <section id="igitph" class="gjs-section">
    <div id="imjmqb" class="gjs-container">
      <?php
      if (isset ($_GET["searchText"]) && !empty ($_GET["searchText"])) {
        $text = $_GET["searchText"];
        $type = $_GET["type"];
        if ($type == "users") {
          $query = "
          SELECT *
            FROM
          UserInfo
            WHERE
          username = :text
            OR
          username LIKE CONCAT('%', :text, '%')
          ";
          try {
            $q = $db->prepare($query);
            $q->execute(array(":text" => $text));
            foreach ($q as $item) {
              echo
                '
          <div id="iocu84" class="gjs-grid-row">
            <div id="irv4i1" class="gjs-grid-column"><img id="iaqnty" src="' . $item["profile_picture"] . '" /></div>
            <div id="i6lm57" class="gjs-grid-column">
              <h1 id="i3s39f" class="gjs-heading"><a href="profil.php?id=' . $item["id"] . '" id="i1uhbj" class="gjs-link">' . $item["username"] . '</a>';
              if($item["adminstatus"] == 1){
                echo '<h1 id="i3s39f" style="color: red; margin-left: 10px; font-size: 15px">FORUM ADMIN</h1>';
              }
              echo '</h1><img id="i6967g" src="assets/add.png" />
              <div id="iovi4n"><b id="iiniao">Sledující:</b> '.$item["Followers"].'<br /><b id="i8j9n">Postů: </b>' . $item["post_numb"] . '<br />';
              if (!empty ($item["name"])) {
                echo '<b>Majitel fóra: </b><a href="" id="iln07c" class="gjs-link">' . $item["name"] . '</a>';
              }
              echo '</div>
            </div>
          </div>
          ';
            }
          } catch (PDOException $e) {
            echo printError("ERROR:" . $e);
          }
        } else {
          $query = "
          SELECT *
            FROM
          jirihart.forumInfo
            WHERE name LIKE CONCAT('%', :text, '%')
          ";
          try {
            $q = $db->prepare($query);
            $q->execute(array(":text" => $text));
            foreach ($q as $item) {
              echo '
            <div id="iid5kn" class="gjs-grid-row">
            <div id="i5wiyk" class="gjs-grid-column"><img src="' . $item["icon"] . '" id="ioy60a" /></div>
            <div id="i5gabk" class="gjs-grid-column">
              <h1 id="ieo8kj" class="gjs-heading"><a href="forum.php?id=' . $item["id"] . '" id="ib9r2f" class="gjs-link">' . $item["name"] . '</a></h1>
              <div id="ir0bgd"><b id="iahjgg">Sledující: </b>' . $item["Followers"] . '<br /><b id="iv85zi">Příspěvků:</b> ' . $item["PostsCount"] . '<br /><b id="i5ziwg">Téma:</b> <a href="" class="gjs-link">' . $item["theme"] . '</a></div>
            </div>
          </div>
            ';
            }
          } catch (PDOException $e) {
            echo printError('' . $e);
          }
        }
      } else
        if ($type == "forums" || empty($type)) {
          $query = "
        SELECT *
      FROM
        jirihart.forumInfo
      LIMIT 6;
        ";
          $q = $db->prepare($query);
          $q->execute();
          foreach ($q as $item) {
            echo '
          <div id="iid5kn" class="gjs-grid-row">
          <div id="i5wiyk" class="gjs-grid-column"><img src="' . $item["icon"] . '" id="ioy60a" /></div>
          <div id="i5gabk" class="gjs-grid-column">
            <h1 id="ieo8kj" class="gjs-heading"><a href="forum.php?id=' . $item["id"] . '" id="ib9r2f" class="gjs-link">' . $item["name"] . '</a></h1>
            <div id="ir0bgd"><b id="iahjgg">Sledující: </b>' . $item["Followers"] . '<br /><b id="iv85zi">Příspěvků:</b> ' . $item["PostsCount"] . '<br /><b id="i5ziwg">Téma:</b> <a href="" class="gjs-link">' . $item["theme"] . '</a></div>
          </div>
        </div>
          ';
          }
        } else if ($type == "users") {
          $text = $_GET["searchText"];
          $type = $_GET["type"];
          $query = "
            SELECT *
            FROM
                UserInfo
            LIMIT 6
            ";
          try {
            $q = $db->prepare($query);
            $q->execute();
            foreach ($q as $item) {
              echo
                '
            <div id="iocu84" class="gjs-grid-row">
              <div id="irv4i1" class="gjs-grid-column"><img id="iaqnty" src="' . $item["profile_picture"] . '" /></div>
              <div id="i6lm57" class="gjs-grid-column">
                <h1 id="i3s39f" class="gjs-heading"><a href="profil.php?id=' . $item["id"] . '" id="i1uhbj" class="gjs-link">' . $item["username"] . '</a>'; 
                if($item["adminstatus"] == 1){
                  echo '🅰';
                }
                //echo'<img id="i6967g" src="assets/add.png" />';
                echo '</h1><div id="iovi4n"><b id="iiniao">Sledující:</b> '.$item["Followers"].'<br /><b id="i8j9n">Postů: </b>' . $item["post_numb"] . '<br />';
                
              if (!empty ($item["name"])) {
                echo '<b>Majitel fóra: </b><a href="" id="iln07c" class="gjs-link">' . $item["name"] . '</a><br />';
              }
              //echo '<b id="iiniao" style="color: dark-blue;">UserID: </b><a>'.getidtype0000($item["id"]).'</a><br />';
              echo '</div>
              </div>
            </div>
            ';
            }
          } catch (PDOException $e) {
            echo $e->getMessage();
          }
        }
      ?>
    </div>
  </section>
</body>

</html>