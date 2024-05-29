
    <?php
        require_once("message.php");
        require_once("dbconnect.php");
        require_once("functions.php");
        require_once("header.php");
        require_once("authorizeAdmin.php");
    ?>
    <link rel="stylesheet" href="styles/style.css">
<body id="ii1rgb">
  <?php
        $actual_link = 'http://'.$_SERVER['HTTP_HOST'];
        viewMenus(2);
  ?>
  <div id="i7ylgf" class="gjs-grid-row">
    <div id="isnr4p" class="gjs-grid-column">
      <h1 id="i7kzlb" class="gjs-heading">ADMIN DASHBOARD</h1>
    </div>
  </div>
  <div id="ivtcrk" class="gjs-grid-row">
    <div id="iow60f" class="gjs-grid-column">
      <div id="ietz2y" class="gjs-grid-row">
        <div id="iuinnf" class="gjs-grid-column"><a id="itkxl7" href="prirucka.php" class="gjs-link">Příkazy (?)</a><img src="https://images.freeimages.com/fic/images/icons/127/sleek_xp_software/300/command_prompt.png" id="is1j03" />
        </div>
      </div>
    </div>
    <div id="ijmkc3" class="gjs-grid-column">
      <div id="isru4v">
        <div role="tablist" class="tab-container">
          <div role="tab" aria-controls="idonvj" id="i4uk0f" class="tab"><span id="icqk4i" style="cursor:pointer">Tabulky</span></div>
          <div role="tab" aria-controls="iscbxn" id="i43p0f" class="tab"><span id="i01av4" style="cursor:pointer">Terminál</span></div>
        </div>
        <div id="i7ykuf" class="tab-contents">
          <div role="tabpanel" id="idonvj" aria-labelledby="i4uk0f" hidden class="tab-content">
            <div id="i22cw4" class="gjs-grid-row">
              <div id="i9p33n" class="gjs-grid-column">
                <h1 id="i1bk4d" class="gjs-heading">Uživatelé</h1>
                <?php
                 $query = "SELECT * FROM users";
                 $q = $db ->prepare($query);
                 $q -> execute();
                 foreach ($q as $row) {
                  echo '
                  <div id="i46f7f" class="gjs-grid-row">
                    <div id="iq11un" class="gjs-grid-column"><img id="iwcqun" src="'.$row["profile_picture"].'" />
                      <div id="iag8xj"><a href="useradmin.php?id='.$row["id"].'"';
                      if ($row["adminstatus"] >0){
                        echo' style="color:red;"';
                      } 
                      echo' id="ihvlvb" class="gjs-link">'.$row["username"].'</a> ('.$row["id"].') ';
                      echo '</div>
                    </div>
                  </div>
                  ';
                 }
                ?>
              </div>
              <div id="icsefl" class="gjs-grid-column">
                <h1 id="iyi3y1" class="gjs-heading">Fóra</h1>
                <?php
                 $query = "SELECT * FROM forums";
                 $q = $db ->prepare($query);
                 $q -> execute();
                 foreach ($q as $row) {
                  echo'
                  <div id="ij6ogh" class="gjs-grid-row">
                  <div id="iynz2h" class="gjs-grid-column"><img src="'.$row["icon"].'" id="iqrm0y" />
                    <div id="ip3mlb"><a href="forumadmin.php?id='.$row["id"].'" id="i89teg" class="gjs-link">'.$row["name"].'</a> ('.$row["id"].')</div>
                  </div>
                  </div>
                  ';
                }
                ?>
              </div>
              <div id="i76b7v" class="gjs-grid-column">
                <h1 id="ihdyjn" class="gjs-heading">Příspěvky</h1>
                <?php
                  $query = "SELECT SUBSTRING(Title, 1, 26) as TitleSUB, id FROM Posts";
                  try{
                  $q = $db ->prepare($query);
                  $q ->execute();
                  foreach ($q as $row) {
                    echo'
                    <div id="iaeqzg" class="gjs-grid-row">
                    <div id="ie2b3j" class="gjs-grid-column">
                      <div id="ig17xg"><a href="post.php?id='.$row["id"].'" id="iym186" class="gjs-link">'.$row["TitleSUB"].'...</a> ('.$row["id"].')
                      </div>
                    </div>
                    </div>
                    ';
                  }
                }catch(Exception $e){
                  echo $e->getMessage();
                }
                ?>
              </div>
              <div id="i76b7v" class="gjs-grid-column">
                <h1 id="ihdyjn" class="gjs-heading">Komentáře</h1>
                <?php
                  $query = "SELECT SUBSTRING(Content, 1, 26) as TitleSUB,PostParrentID, id FROM comments";
                  try{
                  $q = $db ->prepare($query);
                  $q ->execute();
                  foreach ($q as $row) {
                    echo'
                    <div id="iaeqzg" class="gjs-grid-row">
                    <div id="ie2b3j" class="gjs-grid-column">
                      <div id="ig17xg"><a href="post.php?id='.$row["PostParrentID"].'" id="iym186" class="gjs-link">'.htmlspecialchars($row["TitleSUB"]).'...</a> ('.$row["id"].')
                      </div>
                    </div>
                    </div>
                    ';
                  }
                }catch(Exception $e){
                  echo $e->getMessage();
                }
                ?>
              </div>
            </div>
          </div>
          <div role="tabpanel" id="iscbxn" aria-labelledby="i43p0f" hidden class="tab-content">
            <div id="it529z" class="gjs-grid-row">
              <div id="i3fdjc" class="gjs-grid-column">
                <div id="ifwflv" class="gjs-typed"></div>
                <div id="iu1zzl"><b><?php
                $prompt = 0;
                if(isset($_POST["prompt"])){
                  $prompt = $_POST["prompt"];
                  echo $actual_link."/".$_SESSION["loguser"]["username"];
                  echo ': </b>'; 
                  echo $_POST["prompt"];
                }
                ?>
                </div>
                <div id="iu1zzl">MySQL: <?php 
                if(isset($_POST["prompt"]) && !empty($_POST["prompt"])){
                  echo getResult($_POST["prompt"]);
                }
                ?>
              </div></div>
            </div>
            <div id="iyz87r" class="gjs-grid-row">
              <div id="igb16k" class="gjs-grid-column">
                <form method="post">
                <input type="text" id="irkzao" name="prompt" placeholder="Příkaz..." /><input type="submit" id="ilx49j">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  var items = document.querySelectorAll('#ic6agj');
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
  var props = {
    "isru4v": {
      "classactive": "tab-active",
      "selectortab": "aria-controls"
    }
  };
  var ids = Object.keys(props).map(function(id) {
    return '#' + id
  }).join(',');
  var els = document.querySelectorAll(ids);
  for (var i = 0, len = els.length; i < len; i++) {
    var el = els[i];
    (function(t) {
      var e, n, r = this,
        o = t.classactive,
        a = t.selectortab,
        c = window,
        i = c.history,
        s = c._isEditor,
        b = '[role=tab]',
        p = document,
        l = p.body,
        u = p.location,
        f = l.matchesSelector || l.webkitMatchesSelector || l.mozMatchesSelector || l.msMatchesSelector,
        y = function(t, e) {
          for (var n = t || [], r = 0; r < n.length; r++) e(n[r], r)
        },
        d = function(t) {
          return t.getAttribute(a)
        },
        O = function(t, e) {
          return t.querySelector(e)
        },
        g = function() {
          return r.querySelectorAll(b)
        },
        j = function(t, e) {
          return !s && (t.tabIndex = e)
        },
        h = function(t) {
          y(g(), (function(t) {
            t.className = t.className.replace(o, '').trim(), t.ariaSelected = 'false', j(t, '-1')
          })), y(r.querySelectorAll("[role=tabpanel]"), (function(t) {
            return t.hidden = !0
          })), t.className += ' ' + o, t.ariaSelected = 'true', j(t, '0');
          var e = d(t),
            n = e && O(r, "#".concat(e));
          n && (n.hidden = !1)
        },
        v = O(r, ".".concat(o).concat(b));
      (v = v || (n = (u.hash || '').replace('#', '')) && O(r, (e = a, "".concat(b, "[").concat(e, "=").concat(n, "]"))) || O(r, b)) && h(v), r.addEventListener('click', (function(t) {
        var e = t.target,
          n = f.call(e, b);
        if (n || (e = function(t) {
            var e;
            return y(g(), (function(n) {
              e || n.contains(t) && (e = n)
            })), e
          }(e)) && (n = 1), n && !t.__trg && e.className.indexOf(o) < 0) {
          t.preventDefault(), t.__trg = 1, h(e);
          var r = d(e);
          try {
            i && i.pushState(null, null, "#".concat(r))
          } catch (t) {}
        }
      }))
    }.bind(el))(props[el.id]);
  }
  var props = {
    "ifwflv": {
      "strings": ["SDĚLMITO Terminal (c) Jiří Hart 2024"],
      "type-speed": 0,
      "start-delay": 0,
      "back-speed": 0,
      "smart-backspace": true,
      "back-delay": 700,
      "fade-out": false,
      "fade-out-class": "typed-fade-out",
      "fade-out-delay": 500,
      "show-cursor": true,
      "cursor-char": "|",
      "auto-insert-css": true,
      "bind-input-focus-events": false,
      "content-type": "html",
      "loop": false,
      "loop-count": null,
      "shuffle": false,
      "attr": "",
      "typedsrc": "https://cdn.jsdelivr.net/npm/typed.js@2.0.11"
    },
    "iqw6xu": {
      "strings": [""],
      "type-speed": 0,
      "start-delay": 0,
      "back-speed": 0,
      "smart-backspace": true,
      "back-delay": 744,
      "fade-out": false,
      "fade-out-class": "typed-fade-out",
      "fade-out-delay": 500,
      "show-cursor": true,
      "cursor-char": "|",
      "auto-insert-css": true,
      "bind-input-focus-events": false,
      "content-type": "html",
      "loop": false,
      "loop-count": null,
      "shuffle": false,
      "attr": "",
      "typedsrc": "https://cdn.jsdelivr.net/npm/typed.js@2.0.11"
    }
  };
  var ids = Object.keys(props).map(function(id) {
    return '#' + id
  }).join(',');
  var els = document.querySelectorAll(ids);
  for (var i = 0, len = els.length; i < len; i++) {
    var el = els[i];
    (function(e) {
      var t, n = this,
        o = (t = e.strings, Array.isArray(t) ? t : t.indexOf('\n') >= 0 ? t.split('\n') : []),
        r = function(e) {
          return parseInt(e, 10) || 0
        },
        a = function(e) {
          return !!e
        },
        s = function() {
          var t = n;
          t.innerHTML = '<span></span>';
          var s = parseInt("".concat(e['loop-count']), 10);
          "".concat(e['type-speed']);
          var p = {
            typeSpeed: r(e['type-speed']),
            startDelay: r(e['start-delay']),
            backDelay: r(e['back-delay']),
            backSpeed: r(e['back-speed']),
            smartBackspace: a(e['smart-backspace']),
            fadeOut: a(e['fade-out']),
            fadeOutClass: e['fade-out-class'],
            fadeOutDelay: r(e['fade-out-delay']),
            shuffle: a(e.shuffle),
            loop: a(e.loop),
            loopCount: isNaN(s) ? 1 / 0 : s,
            showCursor: a(e['show-cursor']),
            cursorChar: e['cursor-char'],
            autoInsertCss: a(e['auto-insert-css']),
            bindInputFocusEvents: a(e['bind-input-focus-events']),
            attr: e.attr,
            contentType: e['content-type']
          };
          o && o.length && (p.strings = o), new window.Typed(t.children[0], p)
        };
      if (window.Typed) s();
      else {
        var p = document.createElement('script');
        p.src = e.typedsrc, p.onload = s, document.head.appendChild(p)
      }
    }.bind(el))(props[el.id]);
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

  #i7kzlb {
    color: rgba(255, 255, 255, 1);
    display: block;
    margin-right: 7px;
  }

  #i7ylgf {
    min-height: 131px;
    background-color: #222222;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-image: linear-gradient(90deg, rgba(122, 88, 195, 1) 10%, rgba(42, 31, 69, 1) 49.03846153846153%, rgba(87, 37, 89, 1) 90%);
    background-position: 0px 0px;
    background-size: 100% 100%;
    background-repeat: repeat;
    background-attachment: scroll;
    background-origin: padding-box;
  }

  #iq1tdg {
    font-family: Trebuchet MS, Helvetica, sans-serif;
  }

  #isnr4p {
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
    flex: 0 1 auto;
  }

  #iow60f {
    flex-basis: 17%;
    flex-grow: 0;
  }

  #ivtcrk {
    min-height: 731px;
  }

  #itkxl7 {
    color: #d983a6;
    padding: 10px;
  }

  #is1j03 {
    color: black;
    width: 28px;
    height: 28px;
  }

  #iuinnf {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  #ietz2y {
    min-height: 12px;
  }

  .tab {
    padding: 7px 14px;
    display: inline-block;
    border-radius: 3px;
    margin-right: 10px;
  }

  .tab:focus {
    outline: none;
  }

  .tab.tab-active {
    background-color: #0d94e6;
    color: white;
  }

  .tab-container {
    display: inline-block;
  }

  .tab-content {
    animation: fadeEffect 1s;
  }

  .tab-contents {
    min-height: 100px;
    padding: 10px;
  }

  #i22cw4 {
    min-height: 423px;
    padding-bottom: 0px;
    padding-top: 0px;
  }

  #i9p33n {
    padding-top: 0px;
    padding-right: 9px;
    padding-bottom: 0px;
    padding-left: 9px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    flex: 0 1 auto;
  }

  #icsefl {
    padding-right: 9px;
    padding-bottom: 0px;
    padding-left: 9px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    padding-top: 0px;
    flex: 0 1 auto;
  }

  #i76b7v {
    padding-top: 0px;
    padding-right: 9px;
    padding-bottom: 0px;
    padding-left: 9px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    flex: 0 1 auto;
  }

  #i1bk4d {
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    border-bottom-style: solid;
  }

  #iyi3y1 {
    text-align: center;
    border-bottom-style: solid;
  }

  #ihdyjn {
    text-align: center;
    border-bottom-style: solid;
  }

  #i46f7f {
    min-height: 69px;
  }

  #iq11un {
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }

  #iwcqun {
    color: black;
    width: 53px;
    height: 49px;
    border-top-left-radius: 100%;
    border-top-right-radius: 100%;
    border-bottom-right-radius: 100%;
    border-bottom-left-radius: 100%;
  }

  #iag8xj {
    padding: 10px;
  }

  #ix7gbh {
    color: black;
    width: 26px;
    height: 27px;
    margin-left: 4px;
  }

  #iikccs {
    color: black;
    width: 27px;
    height: 27px;
    margin-left: 4px;
  }

  #iqrm0y {
    color: black;
    width: 53px;
    height: 49px;
    border-top-left-radius: 100%;
    border-top-right-radius: 100%;
    border-bottom-right-radius: 100%;
    border-bottom-left-radius: 100%;
  }

  #ip3mlb {
    padding: 10px;
  }

  #iu7cqc {
    color: black;
    width: 26px;
    height: 27px;
    margin-left: 4px;
  }

  #ipkemr {
    color: black;
    width: 27px;
    height: 27px;
    margin-left: 4px;
  }

  #iynz2h {
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }

  #ij6ogh {
    min-height: 69px;
  }

  #ig17xg {
    padding: 10px;
  }

  #i0lncg {
    color: black;
    width: 27px;
    height: 27px;
    margin-left: 4px;
  }

  #ie2b3j {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #iaeqzg {
    min-height: 69px;
  }

  #it529z {
    min-height: 323px;
    padding-bottom: 0px;
  }

  #i3fdjc {
    background-color: rgba(49, 49, 49, 1);
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  #iyz87r {
    min-height: 43px;
    padding-top: 0px;
  }

  #iu1zzl {
    padding: 10px;
    color: rgba(255, 227, 227, 1);
  }

  .gjs-typed {
    padding: 5px;
  }

  #iqw6xu {
    color: rgba(255, 255, 255, 1);
    margin-left: 5px;
  }

  #ifwflv {
    color: rgba(245, 245, 245, 1);
    font-weight: 600;
  }

  #irkzao {
    margin-left: 6px;
    width: 320px;
    height: 33px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-width: 2px;
    border-right-width: 2px;
    border-bottom-width: 2px;
    border-left-width: 2px;
  }

  #ilx49j {
    margin-left: 6px;
    width: 64px;
    height: 33px;
    background-color: rgba(0, 0, 0, 0);
  }

  @keyframes fadeEffect {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
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
  }
</style>