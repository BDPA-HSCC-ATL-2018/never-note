<?php
$page_title = "Login";
include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app_header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app_nav.php";
?>
<div class="jumbotron">
  <h1 class="display-4"><p class="text-secondary">Nevernote</p></h1>

<center>
  <div class="row">
    <div class="col-sm">

      <div class="card mb-10">

        <div class="card-body">
          <h3 class="card-title p-3">Login</h3>
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
            <input type="submit" class="btn btn-light">
          </form>

          </div>

      </p>
    </div>
    <div class="card-footer"><a href="../index.php" class="card-text py-1 text-muted">Don't have an account? Sign Up</a></div>
  </div>
</center>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app_footer.php";
?>
