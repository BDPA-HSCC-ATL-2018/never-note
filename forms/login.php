<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/web-assets/css/bootstrap.min.css">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">note app</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      </form>
    </nav>
    <br/>
    <div class="container-fluid">

    <title><?php echo $page_title; ?></title>
  </head>
  <body>
    <div class="jumbotron">
    <h1 class="display-4">Nevernote</h1>

    <center><div class="row">
 <div class="col-sm">

   <div class="card mb-10">

     <div class="card-body">
       <h3 class="card-title">Login</h3>
       <p class="card-text">

  <div class="mx-auto">
        <label for="first_name" class="col-md-4 col-form-label"></label>
        <div class="col-md-4">
          <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Username" required/>
          <div class="invalid-feedback">Dude, you need a First Name </div>
        </div>
      </div>

      <div class="mx-auto">
        <label for="middle_name" class="col-md-2 col-form-label" ></label>
        <div class="col-md-4">
          <input type="text" class="form-control" id="login_pw" name="login_pw" placeholder="Password" required/>
        </div>
      </div>
<br>
<a href="/note_app/Forms/dashboard.php" button type="button" class="btn btn-primary">Log In</button></a><br><br>
<a href="/note_app/Forms/signup.php" button type="button" class="btn btn-Dark">Don't have an account? Sign Up</button></a>
        </div>
      </center>

       </p>

     </div>
   </div>

 </div>

  </body>
  </html>