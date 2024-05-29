<?php
require_once ("message.php");
require ("functions.php");
require ("dbconnect.php");
require ("authorizeAdmin.php");
require ("header.php");
?>
<link rel="stylesheet" href="styles/style.css">
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

    .navbar-brand {
        vertical-align: top;
        display: inline-block;
        padding: 5px;
        min-height: 50px;
        min-width: 50px;
        color: inherit;
        text-decoration: none;
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

    .gjs-heading {
        margin: 0;
    }

    #i3nl46 {
        display: inline;
        color: rgba(255, 255, 255, 1);
    }

    #ir7w3v {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #ioxmgv {
        min-height: 154px;
        background-image: linear-gradient(90deg, rgba(17, 7, 80, 1) 10%, rgba(29, 153, 222, 1) 50%, rgba(66, 82, 166, 1) 90%);
        background-position: 0px 0px;
        background-size: 100% 100%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-origin: padding-box;
    }

    #il66yv {
        color: black;
        width: 82px;
        height: 76px;
        border-top-left-radius: 100%;
        border-top-right-radius: 100%;
        border-bottom-right-radius: 100%;
        border-bottom-left-radius: 100%;
        border-top-color: rgba(0, 0, 0, 1);
        border-right-color: rgba(0, 0, 0, 1);
        border-bottom-color: rgba(0, 0, 0, 1);
        border-left-color: rgba(0, 0, 0, 1);
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-width: 2px;
        border-right-width: 2px;
        border-bottom-width: 2px;
        border-left-width: 2px;
    }

    #ib6ele {
        width: 260px;
        height: 34px;
        font-size: 16px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: rgba(0, 0, 0, 1);
        border-right-color: rgba(0, 0, 0, 1);
        border-bottom-color: rgba(0, 0, 0, 1);
        border-left-color: rgba(0, 0, 0, 1);
        border-top-width: 2px;
        border-right-width: 2px;
        border-bottom-width: 2px;
        border-left-width: 2px;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
        border-bottom-right-radius: 7px;
        border-bottom-left-radius: 7px;
        margin-top: 7px;
    }

    #i2fdst {
        width: 260px;
        height: 34px;
        font-size: 16px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: rgba(0, 0, 0, 1);
        border-right-color: rgba(0, 0, 0, 1);
        border-bottom-color: rgba(0, 0, 0, 1);
        border-left-color: rgba(0, 0, 0, 1);
        border-top-width: 2px;
        border-right-width: 2px;
        border-bottom-width: 2px;
        border-left-width: 2px;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
        border-bottom-right-radius: 7px;
        border-bottom-left-radius: 7px;
        margin-top: 5px;
    }

    #ihphnu {
        width: 260px;
        height: 34px;
        font-size: 16px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: rgba(0, 0, 0, 1);
        border-right-color: rgba(0, 0, 0, 1);
        border-bottom-color: rgba(0, 0, 0, 1);
        border-left-color: rgba(0, 0, 0, 1);
        border-top-width: 2px;
        border-right-width: 2px;
        border-bottom-width: 2px;
        border-left-width: 2px;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
        border-bottom-right-radius: 7px;
        border-bottom-left-radius: 7px;
        margin-top: 5px;
    }

    #ipeerl {
        width: 260px;
        height: 34px;
        font-size: 16px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: rgba(0, 0, 0, 1);
        border-right-color: rgba(0, 0, 0, 1);
        border-bottom-color: rgba(0, 0, 0, 1);
        border-left-color: rgba(0, 0, 0, 1);
        border-top-width: 2px;
        border-right-width: 2px;
        border-bottom-width: 2px;
        border-left-width: 2px;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
        border-bottom-right-radius: 7px;
        border-bottom-left-radius: 7px;
        margin-top: 5px;
    }

    #ih6mxo {
        display: inline;
        width: 209px;
        margin-top: 12px;
        margin-bottom: -9px;
    }

    #ibx8hg {
        width: 95px;
        height: 28px;
        margin-right: 5px;
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        border-top-color: rgba(0, 0, 0, 1);
        border-right-color: rgba(0, 0, 0, 1);
        border-bottom-color: rgba(0, 0, 0, 1);
        border-left-color: rgba(0, 0, 0, 1);
        background-color: rgba(0, 0, 0, 0);
    }

    #i2x10a {
        flex-basis: 428%;
    }

    #inslz9 {
        width: 107px;
        height: 28px;
        margin-right: 5px;
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        border-top-color: rgba(0, 0, 0, 1);
        border-right-color: rgba(0, 0, 0, 1);
        border-bottom-color: rgba(0, 0, 0, 1);
        border-left-color: rgba(0, 0, 0, 1);
        background-color: rgba(183, 40, 40, 0.96);
    }

    #izmjfn {
        flex-basis: 428%;
    }

    #i9xblz {
        padding-top: 1px;
        margin-top: 19px;
    }

    #iccsav {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    }

    #i8q5vy {
        min-height: 311px;
    }

    #i9hffg {
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 42px;
        padding-left: 0px;
    }

    #iu9df2 {
        font-family: Arial, Helvetica, sans-serif;
    }

    @media (max-width:992px) {
        .gjs-grid-row {
            flex-direction: column;
        }
    }

    @media (max-width:768px) {
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

</head>

<body id="iu9df2">
    <form action="editadmin.php?type=forum&id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data"
        id="editprofileform">
        <?php
        viewMenus("");
        $query = "SELECT * FROM forums WHERE id = ?";
        try {
            $q = $db->prepare($query);
            $q->execute(array($_GET["id"]));
            if ($q->rowCount() > 0) {
                $row = $q->fetch(PDO::FETCH_ASSOC);
                $name = $row["name"];
                $description = $row["description"];
                $theme = $row["theme"];
                $owner = $row["owner"];
                $icon = $row["icon"];
            } else
                go("admin.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        <div class="gjs-grid-row" id="ioxmgv">
            <div class="gjs-grid-column" id="ir7w3v">
                <a href="forum.php?id=<?php echo $_GET["id"] ?>">
                    <h1 class="gjs-heading" id="i3nl46">
                        <?php echo $name; ?>
                    </h1>
                </a>
            </div>
        </div>
        <section class="gjs-section" id="i9hffg">
            <div class="gjs-container" id="imwpo8">
                <div class="gjs-grid-row" id="i8q5vy">
                    <div class="gjs-grid-column" id="iccsav">
                        <img src="<?php echo $icon; ?>" id="il66yv" /><input type="text" name="nazev" value="<?php echo $name; ?>"
                            placeholder="Název" id="ib6ele" /><input type="text" name="Popis" value="<?php echo $description; ?>" placeholder="Popis"
                            id="i2fdst" /><input type="text" name="theme" value="<?php echo $theme; ?>" placeholder="Téma" id="ihphnu" /><input
                            type="number" name="majitel" placeholder="Majitel" value="<?php echo $owner; ?>" id="ipeerl" />
                            <?php
                            if(isset($_GET["error"])){
                                $error = $_GET["error"];
                                if($error == 1){
                                    printError("Error: Při nahravání obrázku došlo k chybě!");
                                }
                            }
                            ?>
                            <input type="file"
                            name="file" id="ih6mxo" />
                        <div class="gjs-grid-row" id="i9xblz">
                            <div class="gjs-grid-column" id="i2x10a"><input type="submit" id="ibx8hg" value="Uložit změny"></div>
                            <div class="gjs-grid-column" id="izmjfn"><input type="button" id="inslz9" value="Odstranit fórum" onclick="confirmDelete()"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>
<script>
  function confirmDelete() {
    var result = confirm("Opravdu chcete smazat toto fórum?");

    if (result) {
        document.getElementById("editprofileform").action = "deleteadmin.php?id=<?php echo $_GET["id"]?>&type=forum";
        document.getElementById("editprofileform").submit();
    }
}
</script>
<script>
    var items = document.querySelectorAll('#isjgpy');
    for (var i = 0, len = items.length; i < len; i++) {
        (function () {
            var n, t = this, e = 'gjs-collapse', a = 'max-height', o = 0, i = function () { var n = document.createElement('void'), t = { transition: 'transitionend', OTransition: 'oTransitionEnd', MozTransition: 'transitionend', WebkitTransition: 'webkitTransitionEnd' }; for (var e in t) if (void 0 !== n.style[e]) return t[e] }(), r = function (n) { o = 1; var t = function (n) { var t = window.getComputedStyle(n), e = t.display, o = parseInt(t[a]); if ('none' !== e && 0 !== o) return n.offsetHeight; n.style.height = 'auto', n.style.display = 'block', n.style.position = 'absolute', n.style.visibility = 'hidden'; var i = n.offsetHeight; return n.style.height = '', n.style.display = '', n.style.position = '', n.style.visibility = '', i }(n), e = n.style; e.display = 'block', e.transition = "".concat(a, " 0.25s ease-in-out"), e.overflowY = 'hidden', '' == e[a] && (e[a] = 0), 0 == parseInt(e[a]) ? (e[a] = '0', setTimeout((function () { e[a] = t + 'px' }), 10)) : e[a] = '0' }; e in t || t.addEventListener('click', (function (e) { if (e.preventDefault(), !o) { var l = t.closest("[data-gjs=navbar]"), c = null == l ? void 0 : l.querySelector("[data-gjs=navbar-items]"); c && r(c), n || (null == c || c.addEventListener(i, (function () { o = 0; var n = c.style; 0 == parseInt(n[a]) && (n.display = '', n[a] = '') })), n = 1) } })), t[e] = 1
        }.bind(items[i]))();
    }
</script>