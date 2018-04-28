<?php
$page_title = "Dashboard";
include_once $_SERVER['DOCUMENT_ROOT'] . "/noteapp/tpl/app-header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/noteapp/tpl/app-nav.php";
$user_id = $_SESSION['user_id'];
?>

<!--TODO Create controller for search.-->

<form action="index.php?function=createaccount" method="post">
  <div class="row">
    <div class="col-md-9">
      <input type="text" name="search" placeholder="Search" class="form-control">
    </div>
    <div class="col-md-1">
      <input type="submit" class="btn btn-outline-primary">
    </div>
    <div class="col-md-2">
      <a href="forms/newnote.php" class="btn btn-outline-primary">Create New Note</a>
    </div>
  </div>
</form>

<br>

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

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/noteapp/tpl/app-footer.php";?>
