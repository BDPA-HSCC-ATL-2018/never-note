<?php
  include_once "lib/db.php";
  if (isset($_REQUEST['function'])) {
    $function = $_REQUEST['function'];

    switch ($function) {
      case 'createnote':
        create_note($conn);
        break;

      default:
        # code...
        break;
    }
  } else {
    header("Location: forms/signup.php"); //Redirect to sigup.php if there was no request provided.
  }

  function create_note($conn) {
    $note_title = $_REQUEST['note-title'];
    $note = $_REQUEST['note'];
    $category_name = $_REQUEST['category'];
    $note_sql = <<<SQL
    INSERT INTO notes (user_id, category_id, note_title, note_content)
    VALUES (1, 1, "$note_title", "$note");
SQL;

    $cat_sql = <<<SQL
    INSERT INTO categories (user_id, category_name)
    VALUES (1, "$category_name");
SQL;

  $note_result = $conn->query($note_sql);
  $cat_result = $conn->query($cat_sql);

  if ($note_result && $cat_result) {
    header("Location:dashboard.php");
  } else  {
    echo "The record was not saved to the database." . $conn->error;
  }
  }
?>
