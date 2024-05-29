<?php
    require_once("header.php");
  ?>
  <meta name="robots" content="index,follow">
  <link rel="stylesheet" href="./styles/style.css">
</head>
    <?php
    session_start();
        require_once("message.php");
        require("functions.php");
        require("dbconnect.php");
    ?>
<body id="ian4o9">
    <?php
    viewMenus("");
    ?>
  <div id="is2rgb" class="gjs-grid-row">
    <div id="itmz1l" class="gjs-grid-column">
      <h1 id="iqhiap" class="gjs-heading">Předplatné</h1>
    </div>
  </div>
  <section id="ih260b" class="gjs-section">
    <div class="gjs-container" id="ifn90j">
      <div id="io56wh" class="gjs-grid-row">
        <div id="i0leya" class="gjs-grid-column">
          <h1 id="iwgiyg" class="gjs-heading">Balíčky</h1>
          <div id="i2drow">Podporované platební metody</div>
          <div id="iwgrm9" class="gjs-grid-row">
            <div class="gjs-grid-column" id="ir9nku">
              <img id="imi2pn" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Former_Visa_%28company%29_logo.svg/2560px-Former_Visa_%28company%29_logo.svg.png"/><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/2560px-MasterCard_Logo.svg.png" id="iz29ud"/><img src="https://pbs.twimg.com/profile_images/1659477276642213888/nJOrxIcU_200x200.png" id="isoz0l"/><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Bitcoin.svg/800px-Bitcoin.svg.png" id="i9c20q"/><img src="https://www.paypalobjects.com/webstatic/icon/pp258.png" id="i3ydmn"/>
            </div>
          </div><img src="https://www.gopay.com/blog/wp-content/uploads/2015/09/GoPay-logo.png" id="inafnm"/>
        </div>
      </div>
      <div id="i84rsk" class="gjs-grid-row">
        <div id="igdc3l" class="gjs-grid-column">
          <h1 id="idwklu" class="gjs-heading">FREE</h1>
          <div id="ijx9uz">Počet fór:
            1<br/>Nastavení pozadí fóra: Ne<br/>Přidání moderátora: Ano (1)<br/>Nahrávání souborů: Ne<br/>Vlastní banner: Ne<br/>Přidávání audio nahrávek: Ne<br/>YouTube videa: Ne<br/><br/>
          </div>
          <h1 id="ioxgig" class="gjs-heading">Zdarma</h1><input type="button" id="i8b4wi" value="Aktuální balíček">
        </div>
        <div id="i2hwso" class="gjs-grid-column">
          <h1 id="iyucmm" class="gjs-heading">PREMIUM</h1>
          <div id="irse2z">Počet fór:
            3<br/>Nastavení pozadí fóra: Ano<br/>Přidání moderátora: Ano (3)<br/>Nahrávání souborů: Ne<br/>Vlastní banner: Ano<br/>Přidávání audio nahrávek: Ne<br/>YouTube videa: Ne<br/><br/>
          </div>
          <h1 id="igeboh" class="gjs-heading">50kč / Měsíc</h1>
          <input type="button" id="i42shw" value="Momentálně nedostupné">
        </div>
        <div id="ii1uef" class="gjs-grid-column">
          <h1 id="ipdip4" class="gjs-heading">PREMIUM +</h1>
          <div id="ia1fbu">Počet fór:
            10<br/>Nastavení pozadí fóra: Ano<br/>Přidání moderátora: Ano (Neomezeně)<br/>Nahrávání souborů: Ano (1GB)<br/>Vlastní banner: Ano<br/>Přidávání audio nahrávek: Ano<br/>YouTube videa: Ano<br/><br/>
          </div>
          <h1 id="ibtygj" class="gjs-heading">100kč / Měsíc</h1>
          <input type="button" id="ixv09t" value="Momentálně nedostupné">
        </div>
      </div>
    </div>
  </section>
</body>
<script>
  var items = document.querySelectorAll('#iooxwl');
          for (var i = 0, len = items.length; i < len; i++) {
            (function(){
var n,t=this,e='gjs-collapse',a='max-height',o=0,i=function(){var n=document.createElement('void'),t={transition:'transitionend',OTransition:'oTransitionEnd',MozTransition:'transitionend',WebkitTransition:'webkitTransitionEnd'};for(var e in t)if(void 0!==n.style[e])return t[e]}(),r=function(n){o=1;var t=function(n){var t=window.getComputedStyle(n),e=t.display,o=parseInt(t[a]);if('none'!==e&&0!==o)return n.offsetHeight;n.style.height='auto',n.style.display='block',n.style.position='absolute',n.style.visibility='hidden';var i=n.offsetHeight;return n.style.height='',n.style.display='',n.style.position='',n.style.visibility='',i}(n),e=n.style;e.display='block',e.transition="".concat(a," 0.25s ease-in-out"),e.overflowY='hidden',''==e[a]&&(e[a]=0),0==parseInt(e[a])?(e[a]='0',setTimeout((function(){e[a]=t+'px'}),10)):e[a]='0'};e in t||t.addEventListener('click',(function(e){if(e.preventDefault(),!o){var l=t.closest("[data-gjs=navbar]"),c=null==l?void 0:l.querySelector("[data-gjs=navbar-items]");c&&r(c),n||(null==c||c.addEventListener(i,(function(){o=0;var n=c.style;0==parseInt(n[a])&&(n.display='',n[a]='')})),n=1)}})),t[e]=1
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

  #ian4o9 {
    font-family: Arial, Helvetica, sans-serif;
  }

  #is2rgb {
    min-height: 184px;
    background-image: linear-gradient(90deg, rgba(42, 43, 82, 1) 10%, rgba(96, 16, 105, 1) 60.09615384615385%, rgba(27, 86, 124, 1) 90%);
    background-position: 0px 0px;
    background-size: 100% 100%;
    background-repeat: repeat;
    background-attachment: scroll;
    background-origin: padding-box;
  }

  #iqhiap {
    color: rgba(255, 255, 255, 1);
    display: inline;
    font-size: 46px;
  }

  #itmz1l {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #ih260b {
    padding-top: 11px;
    padding-right: 0px;
    padding-bottom: 50px;
    padding-left: 0px;
  }

  #i84rsk {
    min-height: 476px;
  }

  #igdc3l {
    display: flex;
    flex-direction: column;
    margin-top: 5px;
    margin-right: 5px;
    margin-bottom: 5px;
    margin-left: 5px;
    border-top-style: inset;
    border-right-style: inset;
    border-bottom-style: inset;
    border-left-style: inset;
    border-top-width: 4px;
    border-right-width: 4px;
    border-bottom-width: 4px;
    border-left-width: 4px;
    border-top-color: rgba(0, 0, 0, 1);
    border-right-color: rgba(0, 0, 0, 1);
    border-bottom-color: rgba(0, 0, 0, 1);
    border-left-color: rgba(0, 0, 0, 1);
    align-items: center;
  }

  #i2hwso {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 5px;
    margin-right: 5px;
    margin-bottom: 5px;
    margin-left: 5px;
    border-top-style: inset;
    border-right-style: inset;
    border-bottom-style: inset;
    border-left-style: inset;
    border-top-width: 4px;
    border-right-width: 4px;
    border-bottom-width: 4px;
    border-left-width: 4px;
    border-top-color: rgba(0, 0, 0, 1);
    border-right-color: rgba(0, 0, 0, 1);
    border-bottom-color: rgba(0, 0, 0, 1);
    border-left-color: rgba(0, 0, 0, 1);
  }

  #idwklu {
    display: inline;
  }

  #iyucmm {
    display: inline;
  }

  #ii1uef {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 5px;
    margin-right: 5px;
    margin-bottom: 5px;
    margin-left: 5px;
    border-top-style: inset;
    border-right-style: inset;
    border-bottom-style: inset;
    border-left-style: inset;
    border-top-width: 4px;
    border-right-width: 4px;
    border-bottom-width: 4px;
    border-left-width: 4px;
    border-top-color: rgba(0, 0, 0, 1);
    border-right-color: rgba(0, 0, 0, 1);
    border-bottom-color: rgba(0, 0, 0, 1);
    border-left-color: rgba(0, 0, 0, 1);
  }

  #ipdip4 {
    display: inline;
  }

  #ijx9uz {
    padding: 10px;
  }

  #irse2z {
    padding: 10px;
  }

  #ia1fbu {
    padding: 10px;
  }

  #i42shw {
    width: 272px;
    height: 63px;
    margin-top: 73px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-width: 3px;
    border-right-width: 3px;
    border-bottom-width: 3px;
    border-left-width: 3px;
    border-top-color: rgba(0, 0, 0, 0.11);
    border-right-color: rgba(0, 0, 0, 0.11);
    border-bottom-color: rgba(0, 0, 0, 0.11);
    border-left-color: rgba(0, 0, 0, 0.11);
    font-size: 18px;
    font-weight: 600;
    color: rgba(4, 4, 4, 0.44);
  }

  #ixv09t {
    width: 272px;
    height: 63px;
    margin-top: 73px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-width: 3px;
    border-right-width: 3px;
    border-bottom-width: 3px;
    border-left-width: 3px;
    border-top-color: rgba(0, 0, 0, 0.11);
    border-right-color: rgba(0, 0, 0, 0.11);
    border-bottom-color: rgba(0, 0, 0, 0.11);
    border-left-color: rgba(0, 0, 0, 0.11);
    font-size: 18px;
    font-weight: 600;
    color: rgba(4, 4, 4, 0.44);
  }

  #igeboh {
    display: inline;
  }

  #ibtygj {
    display: inline;
  }

  #i8b4wi {
    width: 272px;
    height: 63px;
    margin-top: 73px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-width: 3px;
    border-right-width: 3px;
    border-bottom-width: 3px;
    border-left-width: 3px;
    border-top-color: rgba(0, 0, 0, 0.31);
    border-right-color: rgba(0, 0, 0, 0.31);
    border-bottom-color: rgba(0, 0, 0, 0.31);
    border-left-color: rgba(0, 0, 0, 0.31);
    font-size: 21px;
    font-weight: 600;
  }

  #ioxgig {
    display: inline;
  }

  #io56wh {
    min-height: 88px;
  }

  #iwgiyg {
    display: inline;
  }

  #i0leya {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  #iwgrm9 {
    width: 370px;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
    min-height: 10auto;
  }

  #imi2pn {
    color: black;
    width: 37px;
    height: 28px;
  }

  #ir9nku {
    justify-content: center;
    align-items: center;
    display: flex;
  }

  #iz29ud {
    color: black;
    width: 39px;
    height: 25px;
    margin-left: 9px;
  }

  #isoz0l {
    color: black;
    width: 39px;
    height: 37px;
    margin-left: 4px;
  }

  #i9c20q {
    color: black;
    width: 32px;
    height: 30px;
    margin-left: 4px;
  }

  #i2drow {
    padding: 10px;
    padding-top: 20px;
    padding-bottom: 0px;
  }

  #inafnm {
    width: 125px;
    height: 32px;
  }

  #i3ydmn {
    color: black;
    width: 32px;
    height: 30px;
    margin-left: 4px;
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

  @media (max-width: 480px) {
    #i42shw {
      width: 238px;
    }

    #ixv09t {
      width: 238px;
    }

    #i8b4wi {
      width: 238px;
    }
  }
</style>