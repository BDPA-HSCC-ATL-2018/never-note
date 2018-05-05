<?php
$conn = new mysqli('localhost', 'root', '','noteapp');
if ($conn->connect_error) {
  echo "<div class='alert alert-dark'>There was a problem connecting to the databse.</div>";
  return;
}
?>
