<?php
$page_title = "Dashboard";
include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app_header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app_nav.php";
$user_id = $_SESSION['user_id'];
?>

<!--TODO Create controller for search.-->
<div class="container-fluid p-5">
	<div class="jumbotron">
		<h1 class="display-4"><p class="text-secondary">Nevernote</p></h1>
		<div class="card mx-auto">

<div class="card-header">
          <center><h3 class="card-title p-4 pb-5"><?php echo $page_title?></h3></center>
<form id="search" action="index.php?function=createaccount" method="post">
  <div class="row">
    <div class="input-group col-md-10">
      <input type="text" name="search" placeholder="Search" class="form-control">
<span class="input-group-btn"><button form="search" type="submit" class="btn btn-default">Search</button>
</span>
    </div>



<div class="col-md-2">

      <button href="forms/newnote.php" class="btn btn-light text-secondary">New Note</button>
    </div>
  </div>
  </div>
</form>

<br>
      <div class="card-body">
<ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Notes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#profile">Categories</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <br>
    <?php
      $sql = <<<SQL
        SELECT note_title, note_content FROM notes WHERE user_id=$user_id
SQL;

      $result = $conn->query($sql);

      while ($row = mysqli_fetch_array($result)) {
        foreach($row as $key => $var) {
          $$key = $var;
        }
        echo "$note_title - $note_content <br>";
      }
    ?>
  </div>

  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <?php
      $cat_sql = <<<SQL
        SELECT category_name FROM categories WHERE user_id=$user_id
SQL;

      $cat_result = $conn->query($cat_sql);
      $cat_array = array();
      $echo = true;

      while ($cat_row = $cat_result->fetch_assoc()) {
        $cat_name = $cat_row['category_name'];
        foreach ($cat_array as $value) {
          if (1 == 1) {
            //The category is a duplicate. Don't echo the value.
            $echo = false;
          } else {
            // $echo = true;
            array_push($cat_array, $cat_name);
            echo "$cat_name is not equal to $value.";
          }
        } //foreach
        if ($echo) {
          echo "<a href='dashboard.php?cat=$cat_name'>$cat_name</a> <br>";
        }
      } //while

      ?>
  </div>
</div>

<script>
  $(function () {
    $('#myTab li:last-child a').tab('show')
  })
</script>

</div>
</div>
</div>
</div>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app_footer.php";?>
