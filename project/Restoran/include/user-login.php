<?php
include_once 'head.php';
include_once 'navbar-index2.php';
session_start();
if(!isset($_SESSION['id_level'])){

}elseif($_SESSION['id_level'] == 1){
    header("Location:../index.php");
}
?>
<br>
<br>
<br>
<div class="container">
<img src="image/login-user.gif" class="hide-on-med-and-down" alt=""><img width="330px" src="image/login-user.gif" class="hide-on-large-only" alt="">
<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s6"><a href="#test1">Login</a></li>
        <li class="tab col s6"><a class="active" href="#test2">Daftar</a></li>
      </ul>
    </div>
    <!-- form login -->
    <div id="test1" class="col s12">
        <br>
        <div class="row">
        <form class="col s12" method="post" action="user-ceklogin.php" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="text" class="validate" name="username">
                    <label for="email">Username</label>
                </div>
                <div class="input-field col s12">
                    <input id="passwordd" type="password" class="validate" name="passwordd">
                    <label for="passwordd">Password</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light indigo lighten-2" type="submit" name="login">Submit
                <i class="material-icons right">send</i>
            </button>              
            <label style='float: right;'>
				<a class='pink-text' href='lupa-admin.php'><b>Lupa Password?</b></a>
			</label>
        </form>
        </div>
    </div>
    <!-- form daftar -->
    <div id="test2" class="col s12" id="validas">
        <div class="row">
        <form class="col s12" method="post" action="user-cekdaftar.php" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s6">
                    <input id="username" type="text" class="validate" data-length="8" name="username">
                    <label for="username">Nama User</label>
                </div>
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>Foto Profil</span>
                        <input type="file" name="foto_profil">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="(Optional)">
                      </div>
                    </div>
                <div class="input-field col s12">
                    <input id="nama" type="text" class="validate" name="nama">
                    <label for="nama">Nama Lengkap</label>
                </div>
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s6">
                    <input id="passwordConfirm" type="password">
                    <span class="helper-text" id="lblPasswordConfirm" for="passwordConfirm" data-error="Password Tidak Sama" data-success="Password Sama">Password (Ulang)</span>
                </div>
            </div>
            <button class="btn waves-effect waves-light indigo lighten-2" type="submit" name="daftar">Submit
                <i class="material-icons right">send</i>
            </button>             
        </form>
        </div>
    </div>
  </div>
  </div>
  <div class="parallax-container">
                <div class="parallax"><img src="image/parallax1.jpg"></div>
            </div>
<?php
include_once 'footer.php';
?>
<script>
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

</script>

