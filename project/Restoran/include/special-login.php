<?php 
include_once 'head.php';
?>
<nav class="blue darken-4">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo center"><img src="image/logo.png" height="50"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
<form action="special-ceklogin.php" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col s12 m2"></div>
    <div class="col s12 m7">
    <h2 class="header"><center><img src="../image/spesial.gif" height="100"></center></h2>
    <div class="card horizontal z-depth-5">
      <div class="card-image">
        <img src="https://news.indotrading.com/wp-content/uploads/2016/06/makanan-minuman.jpg">
      </div>
      <div class="card-stacked">
        <div class="card-content">
        <blockquote>
            Form Login Untuk Special User
        </blockquote>
          <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">verified_user</i>
                <input id="username" type="text" class="validate" name="username">
                <label for="username">Username</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Password</label>
            </div>
          </div>
        </div>
        <div class="card-action">
            <button class="btn waves-teal btn-flat" type="submit" name="login">Login
                <i class="material-icons right">send</i>
            </button>
        </div>
      </div>
    </div>
  </div>
    </div>
    </form>
    <div class="parallax-container">
      <div class="parallax"><img src="../image/parallax.jpg"></div>
    </div>
<?php include_once 'footer.php'; ?>