<?php
        require_once("message.php");
        require_once("dbconnect.php");
        require_once("functions.php");
        require_once("header.php");
        require_once("authorizeAdmin.php");
    ?>
<link rel="stylesheet" href="styles/style.css">
<style>
    * {
	box-sizing:border-box;
}
body {
	margin:0;
    }
    .gjs-grid-column.feature-item {
        padding-top:15px;
        padding-right:15px;
        padding-bottom:15px;
        padding-left:15px;
        display:flex;
        flex-direction:column;
        gap:15px;
        min-width:30%;
    }
    .gjs-grid-column.testimonial-item {
        padding-top:15px;
        padding-right:15px;
        padding-bottom:15px;
        padding-left:15px;
        display:flex;
        flex-direction:column;
        gap:15px;
        min-width:45%;
        background-color:rgba(247,247,247,0.23);
        border-top-left-radius:5px;
        border-top-right-radius:5px;
        border-bottom-right-radius:5px;
        border-bottom-left-radius:5px;
        align-items:flex-start;
        border-top-width:1px;
        border-right-width:1px;
        border-bottom-width:1px;
        border-left-width:1px;
        border-top-style:solid;
        border-right-style:solid;
        border-bottom-style:solid;
        border-left-style:solid;
        border-top-color:rgba(0,0,0,0.06);
        border-right-color:rgba(0,0,0,0.06);
        border-bottom-color:rgba(0,0,0,0.06);
        border-left-color:rgba(0,0,0,0.06);
    }
    .gjs-link:hover {
        color:rgb(36,99,235);
        text-decoration:underline;
    }
    .navbar {
        background-color:#222;
        color:#ddd;
        min-height:50px;
        width:100%;
    }
    .navbar-container {
        max-width:950px;
        margin:0 auto;
        width:95%;
    }
    .navbar-items-c {
        display:inline-block;
        float:right;
    }
    .navbar-container::after {
        content:"";
        clear:both;
        display:block;
    }
    .navbar-brand {
        vertical-align:top;
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        color:inherit;
        text-decoration:none;
    }
    .navbar-menu {
        padding:10px 0;
        display:block;
        float:right;
        margin:0;
    }
    .navbar-menu-link {
        margin:0;
        color:inherit;
        text-decoration:none;
        display:inline-block;
        padding:10px 15px;
    }
    .navbar-burger {
        margin:10px 0;
        width:45px;
        padding:5px 10px;
        display:none;
        float:right;
        cursor:pointer;
    }
    .navbar-burger-line {
        padding:1px;
        background-color:white;
        margin:5px 0;
    }
    .gjs-grid-column {
        flex:1 1 0%;
        padding:5px 0;
    }
    .gjs-grid-row {
        display:flex;
        justify-content:flex-start;
        align-items:stretch;
        flex-direction:row;
        min-height:auto;
        padding:10px 0;
    }
    .gjs-container {
        width:90%;
        margin:0 auto;
        max-width:1200px;
    }
    .gjs-section {
        display:flex;
        padding:50px 0;
    }
    .gjs-link {
        vertical-align:top;
        max-width:100%;
        display:inline-block;
        text-decoration:none;
        color:inherit;
    }
    .gjs-heading {
        margin:0;
    }
    .gjs-image-box {
        height:200px;
        width:100%;
    }
    #ifkn8k {
        display:inline;
        color:rgba(255,255,255,1);
    }
    #iie1rd {
        display:flex;
        justify-content:center;
        align-items:center;
    }
    #issgng {
        min-height:154px;
        background-image:linear-gradient(90deg,rgba(18,10,68,1) 10%,rgba(153,29,222,1) 50%,rgba(16,27,87,1) 90%);
        background-position:0px 0px;
        background-size:100% 100%;
        background-repeat:repeat;
        background-attachment:scroll;
        background-origin:padding-box;
    }
    #itzd32 {
        padding-top:0px;
        padding-right:0px;
        padding-bottom:42px;
        padding-left:0px;
        background-color:#312f41;
    }
    #i21nfj {
        font-family:Arial,Helvetica,sans-serif;
    }
    #i5s8pj {
        min-height:506px;
    }
    #iv2rd7 {
        text-align:center;
        color:rgba(255,255,255,1);
    }
    #ijxrzv {
        min-height:469px;
    }
    #iyb2vn {
        padding:10px;
        text-align:center;
        color:rgba(255,255,255,1);
    }
    #iy209n {
        color:rgba(147,208,255,1);
        padding:10px;
        display:block;
        text-align:center;
        padding-bottom:2px;
    }
    #im4ix2 {
        text-align:center;
        margin-top:21px;
        color:rgba(255,255,255,1);
    }
    #iq8lyc {
        background-image:url('https://i.imgur.com/9SxnQbH.png');
        background-size:contain;
        background-position:center center;
        background-attachment:scroll;
        background-repeat:no-repeat;
        height:452px;
        margin-top:11px;
        background-color:#312f42;
    }
    @media (max-width:992px) {
        .gjs-grid-row {
        flex-direction:column;
    }
    }@media (max-width:768px) {
        .navbar-items-c {
        display:none;
        width:100%;
    }
    .navbar-burger {
        display:block;
    }
    .navbar-menu {
        width:100%;
    }
    .navbar-menu-link {
        display:block;
    }
    }
    
</style>
</head>
<body id="i21nfj">
    <?php
    viewMenus("");
    ?>
  <div class="gjs-grid-row" id="issgng">
    <div class="gjs-grid-column" id="iie1rd">
      <h1 class="gjs-heading" id="ifkn8k">Terminál</h1>
    </div>
  </div>
  <section class="gjs-section" id="itzd32">
    <div class="gjs-container">
      <div class="gjs-grid-row" id="i5s8pj">
        <div class="gjs-grid-column" id="ipcmyl">
          <h1 class="gjs-heading" id="iv2rd7">Příručka<br/></h1>
          <div class="gjs-grid-row" id="ijxrzv">
            <div class="gjs-grid-column" id="idz3i6">
              <div id="iyb2vn">Pro terminál platí klasické SQL dotazy jako je například SELECT, UPDATE, INSERT a nebo
                DELETE<br/><b id="iwxjz2">Zakázané dotazy jsou ALTER, DROP a nebo SELECT password From users</b></div><a
                id="iy209n" title="" href="https://www.javatpoint.com/mysql-queries" class="gjs-link">MYSQL DOTAZY</a>
              <h1 class="gjs-heading" id="im4ix2">Schéma databáze:</h1>
              <div class="gjs-image-box" id="iq8lyc"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
<script>
  var items = document.querySelectorAll('#idd80o');
          for (var i = 0, len = items.length; i < len; i++) {
            (function(){
var n,t=this,e='gjs-collapse',a='max-height',o=0,i=function(){var n=document.createElement('void'),t={transition:'transitionend',OTransition:'oTransitionEnd',MozTransition:'transitionend',WebkitTransition:'webkitTransitionEnd'};for(var e in t)if(void 0!==n.style[e])return t[e]}(),r=function(n){o=1;var t=function(n){var t=window.getComputedStyle(n),e=t.display,o=parseInt(t[a]);if('none'!==e&&0!==o)return n.offsetHeight;n.style.height='auto',n.style.display='block',n.style.position='absolute',n.style.visibility='hidden';var i=n.offsetHeight;return n.style.height='',n.style.display='',n.style.position='',n.style.visibility='',i}(n),e=n.style;e.display='block',e.transition="".concat(a," 0.25s ease-in-out"),e.overflowY='hidden',''==e[a]&&(e[a]=0),0==parseInt(e[a])?(e[a]='0',setTimeout((function(){e[a]=t+'px'}),10)):e[a]='0'};e in t||t.addEventListener('click',(function(e){if(e.preventDefault(),!o){var l=t.closest("[data-gjs=navbar]"),c=null==l?void 0:l.querySelector("[data-gjs=navbar-items]");c&&r(c),n||(null==c||c.addEventListener(i,(function(){o=0;var n=c.style;0==parseInt(n[a])&&(n.display='',n[a]='')})),n=1)}})),t[e]=1
}.bind(items[i]))();
          }
</script>