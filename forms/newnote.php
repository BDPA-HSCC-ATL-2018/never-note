<?php
$page_title= "New note";
include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app-header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/never-note/tpl/app-nav.php";
?>

<form action="../index.php?function=createnote" method="post">
  <div class="card">
    <div class="form-group">
      <div class="card-header"><input class="form-control" type="text" placeholder="Note Title" name="note-title"></div>
      <div class="card-body">
        <label for="note">Note</label>
        <input type="text" class="form-control" id="note" name="note">
        <label for="category">Category</label>
        <input type="text" class="form-control" id="category" name="category">
        <input type="submit" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>
</form>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/noteapp/tpl/app-footer.php"; ?>
