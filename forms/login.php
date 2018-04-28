<?php
$page_title = "Login";
include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app-header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app-nav.php";

if (password_verify("hash", '$2y$10$t3QqJcppy62o3WJDAEzcbOBuecRfAdAx.sNCUk1jrEMZfcArhoB3e')) {
  echo "Passwords are the same.";
} else {
  echo "Passwords are not the same.";
}
?>
<div class="jumbotron">
  <h1 class="display-4">Nevernote</h1>

<center>
  <div class="row">
    <div class="col-sm">

      <div class="card mb-10">

        <div class="card-body">
          <h3 class="card-title">Login</h3>
          <p class="card-text">
            <form action="../index.php?function=login" method="post">
            <div class="mx-auto">
              <label for="email" class="col-md-4 col-form-label"></label>
              <div class="col-md-4">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required/>
                <div class="invalid-feedback">Dude, you need a First Name </div>
              </div>
            </div>

            <div class="mx-auto">
              <label for="Password" class="col-md-2 col-form-label" ></label>
              <div class="col-md-4">
                <input type="password" class="form-control" id="login_pw" name="login_pw" placeholder="Password" required/>
              </div>
            </div>
            <br>
            <input type="submit" class="btn btn-primary">
          </form>
            <a href="../index.php" class="btn btn-dark">Don't have an account? Sign Up</a>
          </div>

      </p>
    </div>
  </div>
</center>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/noteapp/tpl/app-footer.php";
?>
