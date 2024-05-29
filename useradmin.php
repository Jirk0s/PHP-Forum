<?php
require_once ("message.php");
require ("functions.php");
require ("dbconnect.php");
require ("authorizeAdmin.php");
require ("header.php");
?>
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

    #ii37hw {
        font-family: Arial, Helvetica, sans-serif;
    }

    #ip4had {
        min-height: 154px;
        background-image: linear-gradient(90deg, rgba(36, 21, 134, 1) 10%, rgba(30, 88, 223, 1) 50%, rgba(67, 114, 167, 1) 90%);
        background-position: 0px 0px;
        background-size: 100% 100%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-origin: padding-box;
    }

    #iqprrs {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #itw2nt {
        display: inline;
        color: rgba(255, 255, 255, 1);
    }

    #izc4xh {
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 42px;
        padding-left: 0px;
    }

    #i09jk1 {
        min-height: 311px;
    }

    #ic5g72 {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    }

    #itsla9 {
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

    #i9rwlk {
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

    #if1ls8 {
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

    #iluzou {
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

    #ipz0ov {
        width: 20px;
        height: 15px;
        padding-top: 0px;
        margin-top: 9px;
    }

    #i8hcob {
        flex-basis: 428%;
    }

    #ibfq4p {
        padding: 10px;
        display: inline;
        padding-top: 0px;
        padding-bottom: 0px;
        padding-right: 0px;
        position: relative;
        top: -3px;
    }

    #i5tfxh {
        flex-basis: 428%;
    }

    #igqvds {
        padding-top: 1px;
    }

    #i01rxf {
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

    #i4fo9z {
        flex-basis: 428%;
    }

    #iqhfcf {
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

    #ihqar6 {
        display: inline;
        width: 209px;
        margin-top: 12px;
        margin-bottom: -9px;
    }

    #iad3hc {
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
<link rel="stylesheet" href="styles/style.css">
</head>

<body id="ii1rgb">
    <form action="editadmin.php?type=user&id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data" id="editprofileform">
        <?php
        viewMenus("");
        $query = "SELECT * FROM users WHERE id = ?";
        try {
            $q = $db->prepare($query);
            $q->execute(array($_GET["id"]));
            if ($q->rowCount() > 0) {
                $row = $q->fetch(PDO::FETCH_ASSOC);
                $username = $row["username"];
                $email = $row["email"];
                $birthdate = $row["birthdate"];
                $profile_picture = $row["profile_picture"];
                $adminstatus = $row["adminstatus"];
            } else
                go("admin.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        <div class="gjs-grid-row" id="ip4had">
            <div class="gjs-grid-column" id="iqprrs">
                <a href="profil.php?id=<?php echo $_GET["id"] ?>"><h1 class="gjs-heading" id="itw2nt"><?php echo $username ?></h1></a>
            </div>
        </div>
        <section class="gjs-section" id="izc4xh">
            <div class="gjs-container" id="ifzm7l">
                <div class="gjs-grid-row" id="i09jk1">
                    <div class="gjs-grid-column" id="ic5g72">
                        <img id="iad3hc" src="<?php echo $profile_picture ?>" /><input type="text" id="itsla9"
                            name="username" placeholder="Uživatelské jméno" value="<?php echo $username ?>"/><input type="email" name="mail"
                            placeholder="Email" id="iluzou" value="<?php echo $email ?>"/><input type="password" name="password" placeholder="Heslo"
                            id="if1ls8" /><input type="date" name="birthdate" placeholder="Datum narození"
                            id="i9rwlk" value="<?php echo $birthdate ?>"/><input type="file" name="file" id="ihqar6" />
                        <div class="gjs-grid-row" id="iwo86c">
                            <div class="gjs-grid-column" id="i8hcob">
                                <div id="ibfq4p">Admin:</div><input type="checkbox" 
                                <?php
                                    if($adminstatus == 1){
                                        echo "checked";
                                    }
                                ?>
                                id="ipz0ov" name="admin" value="1"/>
                            </div>
                        </div>
                        <div class="gjs-grid-row" id="igqvds">
                            <div class="gjs-grid-column" id="i5tfxh"><input type="submit" id="i01rxf"
                                    value="Uložit změny"></div>
                            <div class="gjs-grid-column" id="i4fo9z"><input type="button" onclick="confirmDelete()" id="iqhfcf"
                                    value="Odstranit profil"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>
<script>
  function confirmDelete() {
    var result = confirm("Opravdu chcete smazat tento profil?");

    if (result) {
        document.getElementById("editprofileform").action = "deleteadmin.php?id=<?php echo $_GET["id"]?>&type=user";
        document.getElementById("editprofileform").submit();
    }
}
</script>
<script>
    var items = document.querySelectorAll('#im8lwp');
    for (var i = 0, len = items.length; i < len; i++) {
        (function () {
            var n, t = this,
                e = 'gjs-collapse',
                a = 'max-height',
                o = 0,
                i = function () {
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
                r = function (n) {
                    o = 1;
                    var t = function (n) {
                        var t = window.getComputedStyle(n),
                            e = t.display,
                            o = parseInt(t[a]);
                        if ('none' !== e && 0 !== o) return n.offsetHeight;
                        n.style.height = 'auto', n.style.display = 'block', n.style.position = 'absolute', n.style.visibility = 'hidden';
                        var i = n.offsetHeight;
                        return n.style.height = '', n.style.display = '', n.style.position = '', n.style.visibility = '', i
                    }(n),
                        e = n.style;
                    e.display = 'block', e.transition = "".concat(a, " 0.25s ease-in-out"), e.overflowY = 'hidden', '' == e[a] && (e[a] = 0), 0 == parseInt(e[a]) ? (e[a] = '0', setTimeout((function () {
                        e[a] = t + 'px'
                    }), 10)) : e[a] = '0'
                };
            e in t || t.addEventListener('click', (function (e) {
                if (e.preventDefault(), !o) {
                    var l = t.closest("[data-gjs=navbar]"),
                        c = null == l ? void 0 : l.querySelector("[data-gjs=navbar-items]");
                    c && r(c), n || (null == c || c.addEventListener(i, (function () {
                        o = 0;
                        var n = c.style;
                        0 == parseInt(n[a]) && (n.display = '', n[a] = '')
                    })), n = 1)
                }
            })), t[e] = 1
        }.bind(items[i]))();
    }
</script>