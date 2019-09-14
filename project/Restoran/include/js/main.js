$(document).ready(function(){
    $('.materialboxed').materialbox();
  });

$(document).ready(function(){
    $('.sidenav').sidenav();
  });

$(document).ready(function(){
    $('.tabs').tabs();
  });

var txt="Restaurant Kecil yang di berada di Jarakan, Menjual Berbagai Makanan Trandisional ";
var speed=100;
var refresh=null;
function action() { document.title=txt;
txt=txt.substring(1,txt.length)+txt.charAt(0);
refresh=setTimeout("action()",speed);}action();

$(document).ready(function(){
  $('.parallax').parallax();
});
 var toastHTML = '<span>Silahkan Order Meja Terlebih Dahulu</span><a href="include/user-ordermeja.php" class="btn-flat toast-action">Order</a>';  