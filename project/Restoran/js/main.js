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
  $('.modal').modal();
});
$(document).ready(function(){
  $('.tooltipped').tooltip();
});
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.fab');
  var instances = M.FloatingActionButton.init(elems, {
    direction: 'left',
    hoverEnabled: false
  });
});
$(document).ready(function(){
  $('select').formSelect();
});
$("#password").on("focusout", function (e) {
  if ($(this).val() != $("#passwordConfirm").val()) {
      $("#passwordConfirm").removeClass("valid").addClass("invalid");
  } else {
      $("#passwordConfirm").removeClass("invalid").addClass("valid");
  }
});

$("#passwordConfirm").on("keyup", function (e) {
  if ($("#password").val() != $(this).val()) {
      $(this).removeClass("valid").addClass("invalid");
  } else {
      $(this).removeClass("invalid").addClass("valid");
  }
});

$(document).ready(function() {
  $('input#input_text, textarea#textarea2 , input#username').characterCounter();
});
$(document).ready(function(){
  $('.scrollspy').scrollSpy();
});
$(document).ready(function(){
  $('.parallax').parallax();
});
var toastHTML = '<span>Silahkan Order Meja Terlebih Dahulu</span><a href="include/user-ordermeja.php" class="btn-flat toast-action">Order</a>';  
$(document).ready(function(){
  $('select').formSelect();
});
  